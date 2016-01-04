<?php 

namespace Census\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Select;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Password;

class Usuario extends Form
{
	public function __construct() 
	{
		parent::__construct('formUsuario');

		// usu_login
		$login = new Text('login');
		$login->setLabel('Login')
			->setAttributes(array(
				'id' => 'login',
				'class' => 'form-control'
			));
		$this->add($login);
		
		// usu_senha
		$senha = new Password('senha');
		$senha->setLabel('Senha')
			->setAttributes(array(
				'id' => 'senha',
				'class' => 'form-control'
			));
		$this->add($senha);
		
		// usu_status
		$status = new Select('status');
		$status->setLabel('Status')
			->setAttributes(array(
				'id' => 'status',
				'class' => 'form-control'))
			->setValueOptions(array(
				'' => 'Selecione',
				'Ativo' => 'Ativo',
				'Bloqueado' => 'Bloqueado',
			));
		$this->add($status);
		
		//submit
		$submit = new Submit('submit');
		$submit->setAttributes(array(
				'id' => 'submit',
				'value' => 'Enviar',
				'type' => 'button',
				'class' => 'btn btn-default'
		));
		$this->add($submit);
	}
}