<?php

namespace Census\Controller;

use Zend\View\Model\ViewModel;
class ArmaController extends AbstractController
{
	public function indexAction()
	{
		$dataArma = $this->getEm('Census\Entity\Arma')->findAll();

		return new ViewModel(array(
			'armas' => $dataArma,
		));
	}

	public function adicionarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		 
		// Instaciando services
		$serviceArma = $this->getServiceLocator()->get('census-service-arma');
		 
		// Instaciando o Form
		$form = new \Census\Form\Arma();
		 
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Arma());
			 
			if ($form->isValid())
			{
				if ($serviceArma->insert($data, 'Census\Entity\Arma'))
				{
					$this->flashMessenger()->addSuccessMessage("Arma cadastrada com sucesso!");
					return $this->redirect()->toUrl('/arma');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar arma! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
		 
		$view = new ViewModel(array(
				'form' => $form
		));
		 
		$view->setTemplate('census/arma/form.phtml');
		 
		return $view;
	}
	
	public function editarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
			
		// Instaciando services
		$serviceArma = $this->getServiceLocator()->get('census-service-arma');
			
		// Instaciando o Form
		$form = new \Census\Form\Arma();
		$arma = $this->getEm('Census\Entity\Arma')->find($id)->toArray();
		
		$form->setData($arma);
			
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Arma());
	
			if ($form->isValid())
			{
				if ($serviceArma->update($data, 'Census\Entity\Arma',$id))
				{
					$this->flashMessenger()->addSuccessMessage("Arma cadastrada com sucesso!");
					return $this->redirect()->toUrl('/arma');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar arma! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
			
		$view = new ViewModel(array(
				'form' => $form
		));
			
		$view->setTemplate('census/arma/form.phtml');
			
		return $view;
	}

	public function deleteAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		
		$serviceArma = $this->getServiceLocator()->get('census-service-arma');
		
		$dadosArma = $this->getEm('Census\Entity\Arma')->find($id);
		
		if ($dadosArma)
		{
			if ($serviceArma->delete('Census\Entity\Arma', $id))
				return $this->redirect()->toUrl('/arma');
		}
	}
}