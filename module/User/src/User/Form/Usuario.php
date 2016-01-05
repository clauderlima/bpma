<?php

namespace User\Form;

use Zend\Form\Element\Password;

use Zend\Form\Form;
use Zend\Form\Element\Text;

class Usuario extends Form
{
	public function __construct()
	{
		parent::__construct('form-login');		
		
		$login = new Text('login');
		$login->setLabel('Digite seu usuário')
			->setAttributes(array(
				'id' => 'login',
				'class' => 'form-control',
				'placeholder' => 'Digite o seu login'
			));
		$this->add($login);
		
		$senha = new Password('senha');
		$senha->setLabel('Senha')
			->setAttributes(array(
				'id' => 'senha',
				'class' => 'form-control',
				'placeholder' => 'Digite a sua senha'
			));
		$this->add($senha);
		
	}
}