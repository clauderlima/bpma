<?php

namespace Census\Form;

use Zend\Form\Form;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Select;
use Zend\Form\Element\Text;
use Zend\Form\Element\Date;

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
		$anoReferencia->setLabel('Referência')
			->setAttributes(array(
				'id' => 'anoReferencia',
				'class' => 'form-control',
				'placeholder' => ''
			))
			->setValueOptions(array(
				''		=> 'Selecione...',
				'2005'		=> '2005',
				'2006'		=> '2006',
				'2007'		=> '2007',
				'2008'		=> '2008',
				'2009'		=> '2009',
				'2010'		=> '2010',
				'2011'		=> '2011',
				'2012'		=> '2012',
				'2013'		=> '2013',
				'2014'		=> '2014',
				'2015'		=> '2015',
				'2016'		=> '2016',
			));
		$this->add($anoReferencia);
		
		$naogozo = new Select('naogozo');
		$naogozo->setLabel('Gozada?')
		->setAttributes(array(
				'id' => 'naogozo',
				'class' => 'form-control',
				'placeholder' => ''
		))
		->setValueOptions(array(
				''		=> 'Selecione...',
				'Sim'		=> 'Sim',
				'Não'		=> 'Não',
		));
		$this->add($naogozo);
		
		
		$parcela = new Select('parcela');
		$parcela->setLabel('Parcela')
		->setAttributes(array(
				'id' => 'parcela',
				'class' => 'form-control',
				'placeholder' => ''
		))
		->setValueOptions(array(
				''		=> 'Selecione...',
				'1'		=> '1ª Parcela',
				'2'		=> '2ª Parcela',
				'3'		=> '3ª Parcela',
		));
		$this->add($parcela);
		
		// fer_Boletim
		$boletim = new Text('boletim');
		$boletim->setLabel('Boletim Publicado')
			->setAttributes(array(
				'id' => 'boletim',
				'class' => 'form-control'
		));
		$this->add($boletim);
		
		$qtddias = new Text('qtddias');
		$qtddias->setLabel('Qtd Dias')
		->setAttributes(array(
				'id' => 'qtddias',
				'class' => 'form-control'
		));
		$this->add($qtddias);
		
		$inicio = new Date('inicio');
		$inicio->setLabel('Data Início')
		->setAttributes(array(
				'id' => 'inicio',
				'class' => 'form-control'
		));
		$this->add($inicio);
		
		//fer_Programacao
		$programacao = new Select('programacao');
		$programacao->setLabel('Mês')
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