<?php

namespace Census\Controller;

use Zend\View\Model\ViewModel;
use Census\Service\Abono;
use Zend\Mvc\Controller\flashMessenger;


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
		
		$abono = new \Census\Modulo\RequerimentoAbono($this->getServiceLocator()->get('servicemanager'));
		
		if ($abono->requer($id, $inicio, $qtdDias))
		{
			$this->flashMessenger()->addSuccessMessage("Curso cadastrado com sucesso!");
		}

		return $this->redirect()->toUrl('/census/detalhes/' . $id);
		$view = new ViewModel();
		return $view;
		
	}
	
	public function editarAbonoAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
			
		// Instaciando services
		$service = $this->getServiceLocator()->get('census-service-requerimentoabono');
			
		// Instaciando o Form
		$form = new \Census\Form\RequerimentoAbono();
		$abono = $this->getEm('Census\Entity\RequerimentoAbono')->find($id)->toArray();
	
		$dataPolicial = $this->getEm('Census\Entity\Policial')->find($abono['polcodigo']->getCodigo())->toArray();
	
		$form->setData($abono);
	
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
				
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\RequerimentoAbono());
	
			if ($form->isValid())
			{
				if ($service->update($data, 'Census\Entity\RequerimentoAbono', $id))
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
	
	public function deletarAbonoAction()
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
	
	public function imprimirAbonoAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		$data = $this->getEm('Census\Entity\RequerimentoAbono')->find($id)->toArray();
		
		$abono = new \Census\Modulo\RequerimentoAbono($this->getServiceLocator()->get('servicemanager'));
		
		if ($abono->imprimir($data))
		{
			$this->flashMessenger()->addSuccessMessage("Curso cadastrado com sucesso!");
		}

		return $this->redirect()->toUrl('/census/detalhes/' . $id);
		$view = new ViewModel();
		return $view;
	}
	
	public function reproFeriasAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
	
		//$query = $this->getEm()->createQuery("SELECT p.codigo, p.postograduacao, p.nomeguerra
		//		FROM Census\Entity\Policial p WHERE p.codigo = :codigo");
		
		$query = $this->getEm()->createQueryBuilder()
			->select('f', 'p')
			->from('Census\Entity\Ferias', 'f')
			->innerJoin('f.polcodigo', 'p')
			->where('p.codigo = :codigo')
			->setParameter('codigo',$id);
	
		$dados = $query->getQuery()->getResult();
		
		if (!$dados)
		{
			$this->flashMessenger()->addErrorMessage("O policial não possui férias programada no sistema");
			return $this->redirect()->toUrl('/ferias/adicionar/' . $id);
		}
		
		$view = new ViewModel();
		$view->setVariable('dados', $dados);
		return $view;
	}
	
	public function requererReproFeriasAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
	
		//Pega dados do Formulário de abono
		$novomes = $_POST['novomes'];
		$anoreferencia = $_POST['anoreferencia'];
	
		$reproferias = new \Census\Modulo\RequerimentoFerias($this->getServiceLocator()->get('servicemanager'));
		
		$reproferias->requerreproferias($id, $anoreferencia, $novomes);
	
		return $this->redirect()->toUrl('/census/detalhes/' . $id);
		
		$view = new ViewModel();
		$view->setTerminal(true);
		return $view;
	
	}
	
	public function editarReproFeriasAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
			
		// Instaciando services
		$service = $this->getServiceLocator()->get('census-service-requerimentoferias');
			
		// Instaciando o Form
		$form = new \Census\Form\RequerimentoFerias();
		$abono = $this->getEm('Census\Entity\RequerimentoFerias')->find($id)->toArray();
		
		$dataPolicial = $this->getEm('Census\Entity\Policial')->find($abono['polcodigo']->getCodigo())->toArray();
		
		$form->setData($abono);
		
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
		
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\RequerimentoFerias());
		
			if ($form->isValid())
			{
				if ($service->update($data, 'Census\Entity\RequerimentoFerias', $id))
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
			
		$view->setTemplate('census/requerimento/feriasform.phtml');
			
		return $view;
	}
	
	public function deletarReproFeriasAction()
	{
	
	}
	
	public function imprimirReproFeriasAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		$data = $this->getEm('Census\Entity\RequerimentoFerias')->find($id)->toArray();

		$reproferias = new \Census\Modulo\RequerimentoFerias($this->getServiceLocator()->get('servicemanager'));
		
		if ($reproferias->imprimirreproferias($data))
		{
			$this->flashMessenger()->addSuccessMessage("Curso cadastrado com sucesso!");
		}
		die;
		return $this->redirect()->toUrl('/census/detalhes/' . $id);
		$view = new ViewModel();
		return $view;
	}
	
	public function naogozoFeriasAction()
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
	
	public function requererNaogozoFeriasAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		
		//Pega dados do Formulário
		$anoreferencia = $_POST['anoreferencia'];
		
		$naogozoferias = new \Census\Modulo\RequerimentoFerias($this->getServiceLocator()->get('servicemanager'));
		
		$naogozoferias->requernaogozo($id, $anoreferencia);
		
		return $this->redirect()->toUrl('/census/detalhes/' . $id);
		
		$view = new ViewModel();
		$view->setTerminal(true);
		return $view;
	}
	
	public function editarNaogozoFeriasAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
			
		// Instaciando services
		$service = $this->getServiceLocator()->get('census-service-requerimentoferias');
			
		// Instaciando o Form
		$form = new \Census\Form\RequerimentoFerias();
		$abono = $this->getEm('Census\Entity\RequerimentoFerias')->find($id)->toArray();
		
		$dataPolicial = $this->getEm('Census\Entity\Policial')->find($abono['polcodigo']->getCodigo())->toArray();
		
		$form->setData($abono);
		
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
		
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\RequerimentoFerias());
		
			if ($form->isValid())
			{
				if ($service->update($data, 'Census\Entity\RequerimentoFerias', $id))
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
			
		$view->setTemplate('census/requerimento/feriasform.phtml');
			
		return $view;
	}
	
	public function deletarNaogozoFeriasAction()
	{
	
	}
	
	public function imprimirNaogozoFeriasAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		$data = $this->getEm('Census\Entity\RequerimentoFerias')->find($id)->toArray();
		
		$service = new \Census\Modulo\RequerimentoFerias($this->getServiceLocator()->get('servicemanager'));
		
		if ($service->imprimirnaogozo($data))
		{
			$this->flashMessenger()->addSuccessMessage("Curso cadastrado com sucesso!");
		}
		
		return $this->redirect()->toUrl('/census/detalhes/' . $id);
		$view = new ViewModel();
		return $view;
	}
	
	public function parcelamentoFeriasAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		
		//$query = $this->getEm()->createQuery("SELECT p.codigo, p.postograduacao, p.nomeguerra
		//		FROM Census\Entity\Policial p WHERE p.codigo = :codigo");
		
		$query = $this->getEm()->createQueryBuilder()
			->select('f', 'p')
			->from('Census\Entity\Ferias', 'f')
			->innerJoin('f.polcodigo', 'p')
			->where('p.codigo = :codigo')
			->setParameter('codigo',$id);
		
		$dados = $query->getQuery()->getResult();
		
		if (!$dados)
		{
			$this->flashMessenger()->addErrorMessage("O policial não possui férias programada no sistema");
			return $this->redirect()->toUrl('/ferias/adicionar/' . $id);
		}
		
		$view = new ViewModel();
		$view->setVariable('dados', $dados);
		return $view;
	}
	
	public function requererParcelamentoFeriasAction()
	{
	
		$id = (int) $this->params()->fromRoute('id', 0);
		
		//Pega dados do Formulário
		$dadosform = $this->getRequest()->getPost()->toArray();
		
		$parcelamento = new \Census\Modulo\RequerimentoFerias($this->getServiceLocator()->get('servicemanager'));
		
		$parcelamento->requerparcelamentoferias($id, $dadosform);
		
		return $this->redirect()->toUrl('/census/detalhes/' . $id);
	}
	
	public function editarParcelamentoFeriasAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
			
		// Instaciando services
		$service = $this->getServiceLocator()->get('census-service-requerimentoferias');
			
		// Instaciando o Form
		$form = new \Census\Form\RequerimentoFerias();
		$abono = $this->getEm('Census\Entity\RequerimentoFerias')->find($id)->toArray();
		
		
		$dataPolicial = $this->getEm('Census\Entity\Policial')->find($abono['polcodigo']->getCodigo())->toArray();
		
		$form->setData($abono);
		
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
		
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\RequerimentoFerias());
		
			if ($form->isValid())
			{
				if ($service->update($data, 'Census\Entity\RequerimentoFerias', $id))
				{
					$this->flashMessenger()->addSuccessMessage("Requerimento editado com sucesso!");
					return $this->redirect()->toUrl('/census/detalhes/' . $abono['polcodigo']->getCodigo());
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao editar requerimento! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
		
		$view = new ViewModel(array(
			'form' => $form,
			'policial' => $dataPolicial
		));
			
		$view->setTemplate('census/requerimento/feriasform.phtml');
			
		return $view;
	}
	
	public function deletarParcelamentoFeriasAction()
	{
	
	}
	
	public function imprimirParcelamentoFeriasAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		$data = $this->getEm('Census\Entity\RequerimentoFerias')->find($id)->toArray();
		
		$service = new \Census\Modulo\RequerimentoFerias($this->getServiceLocator()->get('servicemanager'));
		
		if ($service->imprimirparcelamentoferias($data))
		{
			$this->flashMessenger()->addSuccessMessage("Curso cadastrado com sucesso!");
		}
		
		return $this->redirect()->toUrl('/census/detalhes/' . $id);
		$view = new ViewModel();
		return $view;
	}
	
	public function gozoOportunoFeriasAction()
	{
		
	}
	
	public function requererGozoOportunoFeriasAction()
	{
	
	}
	
	public function editarGozoOportunoFeriasAction()
	{
	
	}
	
	public function deletarGozoOportunoFeriasAction()
	{
	
	}
	
	public function imprimirGozoOportunoFeriasAction()
	{
	
	}
	
	public function InterrupcaoFeriasAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		
		//$query = $this->getEm()->createQuery("SELECT p.codigo, p.postograduacao, p.nomeguerra
		//		FROM Census\Entity\Policial p WHERE p.codigo = :codigo");
		
		$query = $this->getEm()->createQueryBuilder()
			->select('f', 'p')
			->from('Census\Entity\Ferias', 'f')
			->innerJoin('f.polcodigo', 'p')
			->where('p.codigo = :codigo')
			->setParameter('codigo',$id);
		
		$dados = $query->getQuery()->getResult();
		
		if (!$dados)
		{
			$this->flashMessenger()->addErrorMessage("O policial não possui férias programada no sistema");
			return $this->redirect()->toUrl('/ferias/adicionar/' . $id);
		}
		
		$view = new ViewModel();
		$view->setVariable('dados', $dados);
		return $view;
	}
	
	public function requererInterrupcaoFeriasAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		
		//Pega dados do Formulário
		$dadosform = $this->getRequest()->getPost()->toArray();
		
		$interrupcao = new \Census\Modulo\RequerimentoFerias($this->getServiceLocator()->get('servicemanager'));
		
		$interrupcao->requerinterrupcaoferias($id, $dadosform);
		
		return $this->redirect()->toUrl('/census/detalhes/' . $id);
	}
	
	public function editarInterrupcaoFeriasAction()
	{
	
	}
	
	public function deletarInterrupcaoFeriasAction()
	{
	
	}
	
	public function imprimirInterrupcaoFeriasAction()
	{
	
	}
	
	public function licensaEspecialAction()
	{
	
	}
	
	public function requererLicensaEspecialAction()
	{
	
	}
	
	public function editarLicensaEspecialAction()
	{
	
	}
	
	public function deletarLicensaEspecialAction()
	{
	
	}
	
	public function imprimirLicensaEspecialAction()
	{
	
	}
	
}