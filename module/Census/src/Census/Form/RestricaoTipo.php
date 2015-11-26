<?php 

namespace Census\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Submit;

class RestricaoTipo extends Form
{
	public function __construct() 
	{
		parent::__construct('formRestricaoTipo');
		
		// res_Nome
		$tipo = new Text('tipo');
		$tipo->setLabel('Codigo')
			->setAttributes(array(
				'id' => 'tipo',
				'class' => 'form-control',
			));
		$this->add($tipo);
		
		// res_CodigoRestricao
		$codigorestricao = new Text('codigorestricao');
		$codigorestricao->setLabel('Codigo')
			->setAttributes(array(
				'id' => 'codigorestricao',
				'class' => 'form-control',
			));
		$this->add($codigorestricao);
		
		// res_Descriçao
		$descricao = new Text('descricao');
		$descricao->setLabel('Descrição')
			->setAttributes(array(
				'id' => 'descricao',
				'class' => 'form-control',
			));
		$this->add($descricao);
		
		$submit = new Submit('submit');
		$submit->setValue('Salvar');
		$this->add($submit);
	}
}