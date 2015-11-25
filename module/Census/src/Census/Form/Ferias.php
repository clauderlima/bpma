<?php

namespace Census\Form;

use Zend\Form\Form;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Select;

class Ferias extends Form
{
	public function __construct()
	{
		parent::__construct('formFerias');
		
		
// 		//pol_Codigo
// 		$codigo = new Hidden('codigo');
// 		$codigo->setLabel('')
// 		->setAttributes(array(
// 				'id' => 'codigo',
// 				'class' => 'form-control',
// 				'placeholder' => ''
// 		));
// 		$this->add($codigo);
		
		//fer_AnoReferencia
		$anoReferencia = new Select('anoreferencia');
		$anoReferencia->setLabel('Ano Referência')
			->setAttributes(array(
				'id' => 'anoReferencia',
				'class' => 'form-control',
				'placeholder' => ''
			))
			->setValueOptions(array(
				''		=> 'Selecione...',
				'2014'		=> '2014',
				'2015'		=> '2015',
				'2016'		=> '2016',
			));
		$this->add($anoReferencia);
		
		//fer_Programacao
		$programacao = new Select('programacao');
		$programacao->setLabel('Programação')
		->setAttributes(array(
				'id' => 'programacao',
				'class' => 'form-control',
				'placeholder' => ''
		))
		->setValueOptions(array(
				''		=> 'Selecione...',
				'JAN'		=> 'Janeiro',
				'FEV'		=> 'Fevereiro',
				'MAR'		=> 'Março',
				'ABR'		=> 'Abril',
				'MAI'		=> 'Maio',
				'JUN'		=> 'Junho',
				'JUL'		=> 'Julho',
				'AGO'		=> 'Agosto',
				'SET'		=> 'Setembro',
				'OUT'		=> 'Outubro',
				'NOV'		=> 'Novembro',
				'DEZ'		=> 'Dezembro',
		));
		$this->add($programacao);
		
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