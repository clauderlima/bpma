<?php

namespace Census\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Select;

class Arma extends Form
{
	public function __construct() 
	{
		parent::__construct('formPolicial');;
		
		//arm_Tombamento
		$tombamento = new Text('tombamento');
		$tombamento->setLabel('Tombamento')
		->setAttributes(array(
				'id' => 'tombamento',
				'class' => 'form-control',
		));
		$this->add($tombamento);
		
		//arm_Especie
		$especie = new Select('especie');
		$especie->setLabel('Especie')
			->setAttributes(array(
				'id' => 'especie',
				'class' => 'form-control'))
			->setValueOptions(array(
				'' => 'Selecione...',
				'Pistola' => 'Pistola',
				'Revólver' => 'Revólver',
			));
		$this->add($especie);
		
		//arm_Marca
		$marca = new Select('marca');
		$marca->setLabel('Marca')
			->setAttributes(array(
				'id' => 'marca',
				'class' => 'form-control'))
			->setValueOptions(array(
				'' => 'Selecione...',
				'Taurus' => 'Taurus',
		));
		$this->add($marca);
		
		//arm_Modelo
		$modelo = new Select('modelo');
		$modelo->setLabel('Modelo')
			->setAttributes(array(
				'id' => 'modelo',
				'class' => 'form-control'))
			->setValueOptions(array(
				'' => 'Selecione...',
				'PT 24/7 PRO' => 'PT 24/7 PRO',
		));
		$this->add($modelo);
		
		//arm_NumeroSerie
		$numeroserie = new Text('numeroserie');
		$numeroserie->setLabel('Número de Série')
			->setAttributes(array(
				'id' => 'numeroserie',
				'class' => 'form-control',
		));
		$this->add($numeroserie);
		
		//arm_Modelo
		$calibre = new Select('calibre');
		$calibre->setLabel('Calibre')
			->setAttributes(array(
				'id' => 'calibre',
				'class' => 'form-control'))
			->setValueOptions(array(
				'' => 'Selecione...',
				'.40mm' => '.40mm',
				'.38mm' => '.38mm',
			));
		$this->add($calibre);
		
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