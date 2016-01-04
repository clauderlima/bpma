<?php 

namespace Census\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Submit;


class Recurso extends Form
{
	public function __construct() 
	{
		parent::__construct('formRecurso');

		// rec_Nome
		$nome = new Text('nome');
		$nome->setLabel('Nome do Recurso')
			->setAttributes(array(
				'id' => 'nome',
				'class' => 'form-control'
			));
		$this->add($nome);
		
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