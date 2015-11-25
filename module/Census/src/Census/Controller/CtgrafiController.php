<?php

namespace Census\Controller;

use Zend\View\Model\ViewModel;

class CtgrafiController extends AbstractController
{
	public function indexAction()
	{
		$dataCtgrafi = $this->getEm('Census\Entity\Ctgrafi')->findAll();

		return new ViewModel(array(
			'dados' => $dataCtgrafi,
		));
	}

	public function adicionarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
		 
		// Instaciando services
		$serviceCtgrafi = $this->getServiceLocator()->get('census-service-ctgrafi');
		
		$dataPolicial = $this->getEm('Census\Entity\Policial')->find($id)->toArray();
		 
		// Instaciando o Form
		$form = new \Census\Form\Ctgrafi($this->getServiceLocator()->get('servicemanager'));
		 
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Ctgrafi());
			
			if ($form->isValid())
			{
				if ($serviceCtgrafi->insert($data, 'Census\Entity\Ctgrafi'))
				{
					$this->flashMessenger()->addSuccessMessage("CTGRAFI cadastrado com sucesso!");
					return $this->redirect()->toUrl('/arma');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar arma! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
		 
		$view = new ViewModel(array(
				'form' => $form,
				'policial' => $dataPolicial
		));
		 
		$view->setTemplate('census/ctgrafi/form.phtml');
		 
		return $view;
	}
	
	public function editarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
			
		// Instaciando services
		$serviceCtgrafi = $this->getServiceLocator()->get('census-service-ctgrafi');
			
		// Instaciando o Form
		$form = new \Census\Form\Ctgrafi($this->getServiceLocator()->get('servicemanager'));
		$ctgrafi = $this->getEm('Census\Entity\Ctgrafi')->find($id)->toArray();
		
		$dataPolicial = $this->getEm('Census\Entity\Policial')->find($ctgrafi['polcodigo']->getCodigo())->toArray();
		
		$form->setData($ctgrafi);
			
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Ctgrafi());
	
			if ($form->isValid())
			{
				if ($serviceCtgrafi->update($data, 'Census\Entity\Ctgrafi',$id))
				{
					$this->flashMessenger()->addSuccessMessage("CTGRAFI alterado com sucesso!");
					return $this->redirect()->toUrl('/ctgrafi');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao alterar CTGRAFI! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
			
		$view = new ViewModel(array(
				'form' => $form,
				'policial' => $dataPolicial
		));
			
		$view->setTemplate('census/ctgrafi/form.phtml');
			
		return $view;
	}

}