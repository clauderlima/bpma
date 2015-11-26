<?php

namespace Census\Controller;

use Zend\View\Model\ViewModel;

class RestricaoController extends AbstractController
{
	public function indexAction()
	{
		$dataRestricao = $this->getEm('Census\Entity\Restricaotipo')->findAll();
		
		return new ViewModel(array(
			'dados' => $dataRestricao,
		));
	}

	public function cadastrarAction()
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

}