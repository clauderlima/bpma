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
		return new ViewModel();
	}
}