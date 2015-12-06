<?php 

namespace Census\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Select;
use Zend\Form\Element\Date;
use Zend\Form\Element\Submit;

class Abono extends Form
{
	public function __construct() 
	{
		parent::__construct('formABono');

		// inicio;
		$inicio = new Date('inicioabono');
		$inicio->setLabel('Data de Início')
		->setAttributes(array(
				'disabled' => 'disabled',
				'id' => 'inicio',
				'class' => 'form-control'
		));
		$this->add($inicio);
		
		// quantidadedias;
		$quantidadedias = new Text('quantidadedias');
		$quantidadedias->setLabel('Quatidade de Dias')
		->setAttributes(array(
				'disabled' => 'disabled',
				'id' => 'quantidadedias',
				'class' => 'form-control'
		));
		$this->add($quantidadedias);
		
		// datasolicitacao;
		$datasolicitacao = new Date('datasolicitacao');
		$datasolicitacao->setLabel('Data da Solicitação')
		->setAttributes(array(
				'disabled' => 'disabled',
				'id' => 'datasolicitacao',
				'class' => 'form-control'
		));
		$this->add($datasolicitacao);
		
		// decisao;
		$tipo = new Select('decisao');
		$tipo->setLabel('Decisão')
			->setAttributes(array(
				'id' => 'decisao',
				'class' => 'form-control'))
			->setValueOptions(array(
				'' => 'Selecione',
				'Deferido' => 'Deferido',
				'Indeferido' => 'Indeferido',
				'Cancelado' => 'Cancelado',
				));
				$this->add($tipo);
		
		// datadecisao;
		$datadecisao = new Date('datadecisao');
		$datadecisao->setLabel('Data da decisão')
		->setAttributes(array(
				'id' => 'datadecisao',
				'class' => 'form-control'
		));
		$this->add($datadecisao);
		
		// polcodigo;
		$polcodigo = new Text('polcodigo');
		$polcodigo->setLabel('Nome do Curso')
		->setAttributes(array(
				'id' => 'polcodigo',
				'class' => 'form-control'
		));
		$this->add($polcodigo);

	
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