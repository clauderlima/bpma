<?php

namespace Census\Controller;

use Zend\View\Model\ViewModel;
use Census\Service\Abono;


class RequerimentoController extends AbstractController
{
	public function indexAction() 
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		
		return (new ViewModel())
		->setVariable('id', $id);
	}
	
	public function abonoAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		
		$query = $this->getEm()->createQuery("SELECT p.codigo, p.postograduacao, p.nomeguerra 
				FROM Census\Entity\Policial p WHERE p.codigo = :codigo");
		$query->setParameter('codigo',$id);
		
		$dados = $query->getResult();
		
		$view = new ViewModel();
		$view->setVariable('dados', $dados);
		return $view;
		
	}
	
	public function requererAbonoAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		
		//Pega dados do Formulário de abono
		$inicio = $_POST['dataInicial'];
		$qtdDias = $_POST['quantidadeDias'];
		
		$abono = new \Census\Modulo\Abono($this->getServiceLocator()->get('servicemanager'));
		
		if ($abono->requer($id, $inicio, $qtdDias))
		{
			$this->flashMessenger()->addSuccessMessage("Curso cadastrado com sucesso!");
			return $this->redirect()->toUrl('/census');
		}

		return $this->redirect()->toUrl('/census/detalhes/' . $id);
		$view = new ViewModel();
		return $view;
		
	}
	
	public function editarabonoAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
			
		// Instaciando services
		$service = $this->getServiceLocator()->get('census-service-abono');
			
		// Instaciando o Form
		$form = new \Census\Form\Abono();
		$abono = $this->getEm('Census\Entity\Abono')->find($id)->toArray();
	
		$dataPolicial = $this->getEm('Census\Entity\Policial')->find($abono['polcodigo']->getCodigo())->toArray();
	
		$form->setData($abono);
	
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
				
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Abono());
	
			if ($form->isValid())
			{
				if ($service->update($data, 'Census\Entity\Abono', $id))
				{
					$this->flashMessenger()->addSuccessMessage("Curso cadastrado com sucesso!");
					return $this->redirect()->toUrl('/census/detalhes/' . $abono['polcodigo']->getCodigo());
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar curso! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
			
		$view = new ViewModel(array(
				'form' => $form,
				'policial' => $dataPolicial
		));
			
		$view->setTemplate('census/requerimento/abonoform.phtml');
			
		return $view;
	}
	
	public function deletarabonoAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
	
		$service = $this->getServiceLocator()->get('census-service-abono');
	
		$dados = $this->getEm('Census\Entity\Abono')->find($id);
	
		if ($dados)
		{
			if ($service->delete('Census\Entity\Abono', $id))
				return $this->redirect()->toUrl('/census/detalhes/' . $dados->getPolcodigo()->getCodigo());
		}
	}
	
	public function reproferiasAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		
		$query = $this->getEm()->createQuery("SELECT p.codigo, p.postograduacao, p.nomeguerra 
				FROM Census\Entity\Policial p WHERE p.codigo = :codigo");
		$query->setParameter('codigo',$id);
		
		$dados = $query->getResult();
		
		$view = new ViewModel();
		$view->setVariable('dados', $dados);
		return $view;	
	}
	
	public function imprimirabonoAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		$data = $this->getEm('Census\Entity\Abono')->find($id)->toArray();
		
		$abono = new \Census\Modulo\Abono($this->getServiceLocator()->get('servicemanager'));
		
		if ($abono->imprimirAbono($data))
		{
			$this->flashMessenger()->addSuccessMessage("Curso cadastrado com sucesso!");
			return $this->redirect()->toUrl('/census');
		}

		return $this->redirect()->toUrl('/census/detalhes/' . $id);
		$view = new ViewModel();
		return $view;
	}
	
	public function reprogramarferiasAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
	
		//Pega dados do Formulário de abono
		$novomes = $_POST['novomes'];
		$anoreferencia = $_POST['anoreferencia'];
	
		$reproferias = new \Census\Modulo\Reproferias($this->getServiceLocator()->get('servicemanager'));
	
		$reproferias->requer($id, $anoreferencia, $novomes);
	
		$filename = array(
				'arquivo' => $abono->getArquivo()
		);
	
		$view = new ViewModel();
		$view->setTerminal(true);
		return $view;
	
	}
	
}