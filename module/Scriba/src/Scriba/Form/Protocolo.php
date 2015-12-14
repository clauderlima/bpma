<?php

namespace Scriba\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Select;
use Zend\Form\Element\DateTime;
use Zend\Form\Element\Date;
use Zend\Form\Element\DateTimeLocal;

class Protocolo extends Form
{
	public function __construct() 
	{
		parent::__construct('formProtocolo');;
		
		
		// pro_Codigo
		
		
		// pol_Codigo
		$polcodigo = new Select('polcodigo');
		$polcodigo->setLabel('Recebedor')
			->setAttributes(array(
				'id' => 'polcodigo',
				'class' => 'form-control'))
			->setValueOptions(array(
				'' => 'Selecione...',
			));
		$this->add($polcodigo);
		
		// pro_Tipo
		$tipo = new Select('tipo');
		$tipo->setLabel('Tipo de Documento')
			->setAttributes(array(
				'id' => 'tipo',
				'class' => 'form-control'))
			->setValueOptions(array(
				'' => 'Selecione...',
				'Encaminhado' => 'Encaminhado',
				'Ofício' => 'Ofício',
				'Mensagem' => 'Mensagem',
				'Memorando' => 'Memorando',
				'Portaria' => 'Portaria',
				'Carta' => 'Carta',
				'Outros' => 'Outros',
			));
		$this->add($tipo);
		
		// pro_Numero
		$numero = new Text('numero');
		$numero->setLabel('Número do Documento')
			->setAttributes(array(
				'id' => 'numero',
				'class' => 'form-control',
		));
		$this->add($numero);
		
		// pro_Recebimento
		$recebimento = new DateTimeLocal('recebimento');
		$recebimento->setLabel('Data e Hora de Recebimento')
			->setAttributes(array(
				'id' => 'recebimento',
				'class' => 'form-control',
		));
		$this->add($recebimento);
		
		// pro_Secao	
		$secao = new Select('secao');
		$secao->setLabel('Seção')
			->setAttributes(array(
				'id' => 'secao',
				'class' => 'form-control'))
			->setValueOptions(array(
				'' => 'Selecione...',
				'Comandante' => 'Comandante',
				'SubComandante' => 'SubComandante',
				'Seção Administrativa' => 'Seção Administrativa',
				'Seção Operacional' => 'Seção Operacional',
				'Núcleo de Gestão de Pessoal' => 'Núcleo de Gestão de Pessoal',
				'Núcleo de Controle e Correição' => 'Núcleo de Controle e Correição',
				'SubSeção de Logística' => 'SubSeção de Logística',
				'Núcleo de Comunicação Social' => 'Núcleo de Comunicação Social',
				'SubSeção de Inteligência' => 'SubSeção de Inteligência',
				'Núcleo de Manutenção' => 'Núcleo de Manutenção',
				'Grupamento de Operações Ambientais' => 'Grupamento de Operações Ambientais',
				'Grupamento de Policamento Turístico' => 'Grupamento de Policamento Turístico',
				'Companhia Rural Sul' => 'Companhia Rural Sul',
				'Companhia Rural Leste' => 'Companhia Rural Leste',
				'Companhia Rural Oeste' => 'Companhia Rural Oeste',
			));
		$this->add($secao);
		
		// pro_Encaminhamento
		$encaminhamento = new DateTime('encaminhamento');
		$encaminhamento->setLabel('Data de Encaminhamento')
			->setAttributes(array(
				'id' => 'encaminhamento',
				'class' => 'form-control',
		));
		$this->add($encaminhamento);
		
		// pro_Acao
		
		
		// pro_Assunto
		$assunto = new Text('assunto');
		$assunto->setLabel('Assunto')
			->setAttributes(array(
				'id' => 'assunto',
				'class' => 'form-control',
		));
		$this->add($assunto);
		
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