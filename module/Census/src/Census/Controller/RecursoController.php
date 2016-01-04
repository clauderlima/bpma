<?php

namespace Census\Controller;

use Zend\View\Model\ViewModel;

class RecursoController extends AbstractController
{
	public function indexAction()
	{
		$dados = $this->getEm('Census\Entity\Recurso')->findAll();

		return new ViewModel(array(
			'dados' => $dados,
		));
	}

	public function adicionarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		 
		// Instaciando services
		$service = $this->getServiceLocator()->get('census-service-recurso');
		 
		// Instaciando o Form
		$form = new \Census\Form\Recurso();
		 
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Formacao());
			 
			if ($form->isValid())
			{
				if ($service->insert($data, 'Census\Entity\Recurso'))
				{
					$this->flashMessenger()->addSuccessMessage("Recurso cadastrado com sucesso!");
					return $this->redirect()->toUrl('/recurso');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar curso! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
		 
		$view = new ViewModel(array(
				'form' => $form,
		));
		 
		$view->setTemplate('census/recurso/form.phtml');
		 
		return $view;
	}
	
	public function editarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
			
		// Instaciando services
		$service = $this->getServiceLocator()->get('census-service-recurso');
			
		// Instaciando o Form
		$form = new \Census\Form\Recurso();
		$recurso = $this->getEm('Census\Entity\Recurso')->find($id)->toArray();
		
		$form->setData($recurso);
		
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Recurso());
	
			if ($form->isValid())
			{
				if ($service->update($data, 'Census\Entity\Recurso', $id))
				{
					$this->flashMessenger()->addSuccessMessage("Recurso atualizado com sucesso!");
					return $this->redirect()->toUrl('/recurso');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar recurso! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
			
		$view = new ViewModel(array(
				'form' => $form,
		));
			
		$view->setTemplate('census/recurso/form.phtml');
			
		return $view;
	}

	public function deletarAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		
		$service = $this->getServiceLocator()->get('census-service-recurso');
		
		$dados = $this->getEm('Census\Entity\Recurso')->find($id);
		
		if ($dados)
		{
			if ($service->delete('Census\Entity\Recurso', $id))
				return $this->redirect()->toUrl('/recurso');
		}
	}
}