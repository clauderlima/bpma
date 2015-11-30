<?php

namespace Census\Controller;

use Zend\View\Model\ViewModel;
class AlteracaoController extends AbstractController
{
	public function indexAction()
	{
		$data = $this->getEm('Census\Entity\Alteracao')->findAll();

		return new ViewModel(array(
			'dados' => $data,
		));
	}

	public function adicionarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
		 
		// Instaciando services
		$service = $this->getServiceLocator()->get('census-service-alteracao');
		$dataPolicial = $this->getEm('Census\Entity\Policial')->find($id)->toArray();
		 
		// Instaciando o Form
		$form = new \Census\Form\Alteracao();
		 
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Alteracao());
			 
			if ($form->isValid())
			{
				if ($service->insert($data, 'Census\Entity\Alteracao'))
				{
					$this->flashMessenger()->addSuccessMessage("Alteração cadastrada com sucesso!");
					return $this->redirect()->toUrl('/alteracao');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar alteração! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
		 
		$view = new ViewModel(array(
				'form' => $form,
				'policial' => $dataPolicial
		));
		 
		$view->setTemplate('census/alteracao/form.phtml');
		 
		return $view;
	}
	
	public function editarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
			
		// Instaciando services
		$service = $this->getServiceLocator()->get('census-service-alteracao');
			
		// Instaciando o Form
		$form = new \Census\Form\Alteracao();
		$alteracao = $this->getEm('Census\Entity\Alteracao')->find($id)->toArray();
		
		$dataPolicial = $this->getEm('Census\Entity\Policial')->find($alteracao['polcodigo']->getCodigo())->toArray();
		
		$form->setData($alteracao);
		
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Alteracao());
	
			if ($form->isValid())
			{
				if ($service->update($data, 'Census\Entity\Alteracao', $id))
				{
					$this->flashMessenger()->addSuccessMessage("Alteração alterada com sucesso!");
					return $this->redirect()->toUrl('/alteracao');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao modificar alteração! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
			
		$view = new ViewModel(array(
				'form' => $form,
				'policial' => $dataPolicial
		));
			
		$view->setTemplate('census/alteracao/form.phtml');
			
		return $view;
	}

	public function deletarAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		
		$service = $this->getServiceLocator()->get('census-service-alteracao');
		
		$alteracao = $this->getEm('Census\Entity\Alteracao')->find($id);
		
		if ($alteracao)
		{
			if ($service->delete('Census\Entity\Alteracao', $id))
				return $this->redirect()->toUrl('/alteracao');
		}
	}
}