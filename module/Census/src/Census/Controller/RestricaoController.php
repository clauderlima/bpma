<?php

namespace Census\Controller;

use Zend\View\Model\ViewModel;

class RestricaoController extends AbstractController
{
	public function indexAction()
	{
		$dataRestricao = $this->getEm('Census\Entity\Restricaomedica')->findAll();
		
/* 		$query = $this->getEm()->createQueryBuilder()
			->select('r.rescodigo,r.inicio,r.fim')
			->from('\Census\Entity\Restricaomedica','r')
			->getQuery(); */
		
/* 		$query = $this->getEm()->createQueryBuilder()
			->select('p.codigo,p.postograduacao,p.nomeguerra,r.rescodigo,r.inicio,r.fim')
			->from('\Census\Entity\Restricaomedica','r')
			->innerJoin('r.polcodigo','p')
			->where('r.polcodigo = p.codigo')
			->getQuery(); */
		
		
		//@TODO Colocar essa lógica no Model e verificar porque o doctrine não está trazendo as informaçõse
		
/* 		$query = $this->getEm()->createQueryBuilder()
			->select('p.codigo,p.postograduacao,p.nomeguerra,r.rescodigo,r.inicio,r.fim,t.tipo')
			->from('\Census\Entity\Restricaomedica','r')
			->innerJoin('r.polcodigo','p')
			->where('r.polcodigo = p.codigo')
			->innerJoin('r.retcodigo','t')
			->orderBy('p.antiguidade', 'ASC')
			->getQuery();
		 
		$dataRestricao = $query->getResult(); */
		
		/* $dataPolicial = array();
		
		foreach ($dataRestricao as $item)
		{
			foreach ($item as $chave => $valor)
			{
				switch ($chave) {
					case 'codigo':
						$policial['codigo'] = $valor;
					break;
					case 'postograduacao':
						$policial['postograduacao'] = $valor;
					break;
					case 'nomeguerra':
						$policial['nomeguerra'] = $valor;
					break;
					case 'rescodigo':
						$policial['rescodigo'] = $valor;
					break;
					case 'inicio':
						$policial['inicio'] = $valor->format('d/m/Y');
					break;
					case 'fim':
						$policial['fim'] = $valor->format('d/m/Y');
					break;
			
				}
			echo "<br>zz" . $item['codigo'] . "  " . $item['tipo'];
			}
			$dataPolicial[] = $policial;
		}
		
		echo "<br>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>";
		echo "<pre>";
		print_r($dataPolicial);
		
		echo "<br>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>";
		 */
		return new ViewModel(array(
			'dados' => $dataRestricao,
		));
	}

	public function adicionarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
		
		// Instaciando services
		$serviceRestricaotipo = $this->getServiceLocator()->get('census-service-restricao');
		
		// Instaciando o Form
		$form = new \Census\Form\RestricaoTipo();
		
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Restricaotipo());
		
			if ($form->isValid())
			{
				if ($serviceRestricaotipo->insert($data, 'Census\Entity\Restricaotipo'))
				{
					$this->flashMessenger()->addSuccessMessage("CTGRAFI cadastrado com sucesso!");
					return $this->redirect()->toUrl('/restricao');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar arma! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
		 
		$view = new ViewModel(array(
				'form' => $form,
		));
		 
		$view->setTemplate('census/restricao/form.phtml');
		 
		return $view;
	}
	
	public function editarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
			
		// Instaciando services
		$serviceRestricaotipo = $this->getServiceLocator()->get('census-service-restricao');
			
		// Instaciando o Form
		$form = new \Census\Form\RestricaoTipo();
		$restricaotipo = $this->getEm('Census\Entity\RestricaoTipo')->find($id)->toArray();
		
		$form->setData($restricaotipo);
			
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Restricaotipo());
	
			if ($form->isValid())
			{
				if ($serviceRestricaotipo->update($data, 'Census\Entity\Restricaotipo',$id))
				{
					$this->flashMessenger()->addSuccessMessage("CTGRAFI alterado com sucesso!");
					return $this->redirect()->toUrl('/restricao');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao alterar CTGRAFI! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
			
		$view = new ViewModel(array(
				'form' => $form,
		));
			
		$view->setTemplate('census/restricao/form.phtml');
			
		return $view;
	}
	
	public function cadastrarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
	
		// Instaciando services
		$serviceRestricaomedica = $this->getServiceLocator()->get('census-service-restricaomedica');
		$dataPolicial = $this->getEm('Census\Entity\Policial')->find($id)->toArray();
	
		// Instaciando o Form
		$form = new \Census\Form\Restricaomedica($this->getServiceLocator()->get('servicemanager'));
	
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Restricaomedica());
	
			if ($form->isValid())
			{
				if ($serviceRestricaomedica->insert($data, 'Census\Entity\Restricaomedica'))
				{
					$this->flashMessenger()->addSuccessMessage("CTGRAFI cadastrado com sucesso!");
					return $this->redirect()->toUrl('/restricao');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar arma! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
			
		$view = new ViewModel(array(
				'form' => $form,
				'policial' => $dataPolicial
		));
			
		$view->setTemplate('census/restricao/form-rm.phtml');
			
		return $view;
	}

}