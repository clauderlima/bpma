<?php

namespace Scriba\Form;

use Zend\Form\Form;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Select;

class Encaminhamento extends Form
{
	public function __construct() 
	{
		parent::__construct('formEncaminhamento');;
		
		// pro_Secao	
		$secao = new Select('secao');
		$secao->setLabel('Destino')
			->setAttributes(array(
				'id' => 'secao',
				'class' => 'form-control'))
			->setValueOptions(array(
				'' => 'Selecione...',
				'Cmd' => 'Comando',
				'Sec' => 'Secretaria',
				'SAd' => 'Seção Administrativa',
				'SOp' => 'Seção Operacional',
				'NGP' => 'Núcleo de Gestão de Pessoal',
				'NCC' => 'Núcleo de Controle e Correição',
				'SSLog' => 'SubSeção de Logística',
				'NCS' => 'Núcleo de Comunicação Social',
				'SSInt' => 'SubSeção de Inteligência',
				'NMan' => 'Núcleo de Manutenção',
				'NProj' => 'Núcleo de Projetos',
				'GOA' => 'Grupamento de Operações Ambientais',
				'GPTur' => 'Grupamento de Policamento Turístico',
				'CiaSul' => 'Companhia Rural Sul',
				'CiaLeste' => 'Companhia Rural Leste',
				'CiaOeste' => 'Companhia Rural Oeste',
			));
		$this->add($secao);
		
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