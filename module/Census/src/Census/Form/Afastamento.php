<?php 

namespace Census\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Select;
use Zend\Form\Element\Date;

class Afastamento extends Form
{
	public function __construct() 
	{
		parent::__construct('formAfastamento');
		
		// afa_Codigo 
		
		// pol_Codigo
		
		// afa_Tipo
		$tipo = new Select('tipo');
		$tipo->setLabel('Tipo de Afastamento')
			->setAttributes(array(
				'id' => 'tipo',
				'class' => 'form-control'))
			->setValueOptions(array(
				'AB' => 'Abono',
				'FE' => 'Férias',
				'LE' => 'Licença Especial'
		));
		$this->add($tipo);
	
		// afa_Referencia
		$referencia = new Text('referencia');
		$referencia->setLabel('Tipo de Afastamento')
			->setAttributes(array(
				'id' => 'tipo',
				'class' => 'form-control'))
			->setValueOptions(array(
				'2014' => '2014',
				'2015' => '2015',
				'2016' => '2016',
		));
		$this->add($referencia);
		
		// afa_DataInicio
		$datainicio = new Date('datainicio');
		$datainicio->setLabel('Tipo de Afastamento')
			->setAttributes(array(
				'id' => 'datainicio',
				'class' => 'form-control',
		));
		$this->add($datainicio);
		
		// afa_DataFim
		$datafim = new Date('datafim');
		$datafim->setLabel('Tipo de Afastamento')
			->setAttributes(array(
				'id' => 'datafim',
				'class' => 'form-control',
		));
		$this->add($datafim);
		
		// afa_Observacao
		$observacao = new Text('observacao');
		$observacao->setLabel('Observação')
			->setAttributes(array(
				'id' => 'observacao',
				'class' => 'form-control',
		));
		$this->add($observacao);
		
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