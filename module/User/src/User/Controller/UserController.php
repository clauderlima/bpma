<?php

namespace User\Controller;

use Census\Controller\AbstractController;
use Zend\View\Model\ViewModel;

class UserController extends AbstractController
{
	public function indexAction()
	{
		return new ViewModel();
	}
	
	public function loginAction()
	{
		$form = new \User\Form\Usuario();
		$request = $this->getRequest();
		
		if ($request->isPost()) {
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \User\Filter\Usuario());
			if ($form->isValid()) {
				$authService = $this->getServiceLocator()->get('user-service-auth');
				if ($authService->authenticate($data) == 'logado')
				{
					$this->flashMessenger()->addSuccessMessage('Bem vindo ao SGP!');
					return $this->redirect()->toUrl('/');
				}
				
				$this->flashMessenger()->addErrorMessage('Usuário ou senha incorretos!');
				return $this->redirect()->toUrl('/user/login');;
			}
		}
		
		return new ViewModel(array(
			'form' => $form
		));
	}
	
	public function logoutAction()
	{
		$serviceAuth = $this->getServiceLocator()->get('user-service-auth');
		$serviceAuth->logout();
	
		return $this->redirect()->toRoute('home');
	}
}