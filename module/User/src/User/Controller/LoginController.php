<?php

namespace User\Controller;

use User\Filter\Login;
use Zend\View\Model\ViewModel;
use User\Form\Usuario;
use Census\Controller\AbstractController;

class LoginController extends AbstractController
{
	public function indexAction()
	{
		$form = new Usuario();
		$request = $this->getRequest();
		
		if ($request->isPost()) {
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new Login());
			if ($form->isValid()) {
				
			}
		}
		
		return new ViewModel(array(
			'form' => $form
		));
	}
}