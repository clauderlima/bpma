<?php 

namespace Census\Form;

use Zend\Form\Element\Date;
use Zend\Form\Element\Text;
use Zend\Form\Element\Submit;
use Zend\Form\Form;

class Dispensamedica extends Form
{
	public function __construct() 
	{
		parent::__construct('formDispensamedica');

		// dis_InicioData
		$inicio = new Date('inicio');
		$inicio->setLabel('Data do início')
		->setAttributes(array(
				'id' => 'inicio',
				'class' => 'form-control'
		));
		$this->add($inicio);
		
		
		// dis_FimData
		$fim = new Date('fim');
		$fim->setLabel('Data do fim')
		->setAttributes(array(
				'id' => 'fim',
				'class' => 'form-control'
		));
		$this->add($fim);
		
		// dis_Motivo
		$motivo = new Text('motivo');
		$motivo->setLabel('Motivo da Dispensa')
			->setAttributes(array(
				'id' => 'motivo',
				'class' => 'form-control'
			));
		$this->add($motivo);
		
		// dis_CID
		$cid = new Text('cid');
		$cid->setLabel('CID')
			->setAttributes(array(
				'id' => 'cid',
				'class' => 'form-control'
			));
		$this->add($cid);
		
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