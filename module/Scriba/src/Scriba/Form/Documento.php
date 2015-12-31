<?php

namespace Scriba\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Select;
use Zend\Form\Element\Date;
use Zend\Form\Element\DateTimeLocal;

class Documento extends Form
{
	public function __construct() 
	{
		parent::__construct('formDocumento');;
		

		// Tipo
		$tipo = new Select('tipo');
		$tipo->setLabel('Tipo de Documento')
			->setAttributes(array(
				'id' => 'tipo',
				'class' => 'form-control'
			))
			->setValueOptions(array(
					'' => 'Selecione...',
					'Ofício' => 'Ofício',
					'Mensagem' => 'Mensagem',
					'Memorando' => 'Memorando',
					'Portaria' => 'Portaria',
					'Requerimento' => 'Requerimento',
					'Carta' => 'Carta',
			));
		$this->add($tipo);
					
		// Numero
		$numero = new Text('numero');
		$numero->setLabel('Número do Documento')
			->setAttributes(array(
				'id' => 'numero',
				'class' => 'form-control',
		));
		$this->add($numero);
		
		// Data
		$data = new Date('data');
		$data->setLabel('Data do Documento')
			->setAttributes(array(
				'id' => 'data',
				'class' => 'form-control',
		));
		$this->add($data);
		
		// Assunto
		$assunto = new Text('assunto');
		$assunto->setLabel('Assunto')
			->setAttributes(array(
				'id' => 'assunto',
				'class' => 'form-control',
		));
		$this->add($assunto);
		
		// Recebimento
		$recebimento = new DateTimeLocal('recebimento');
		$recebimento->setLabel('Data e Hora de Recebimento')
			->setAttributes(array(
				'id' => 'recebimento',
				'class' => 'form-control',
		));
		$this->add($recebimento);
		
		// Origem
		$origem = new Text('origem');
		$origem->setLabel('Origem do Documento')
			->setAttributes(array(
				'id' => 'origem',
				'class' => 'form-control',
		));
		$this->add($origem);

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