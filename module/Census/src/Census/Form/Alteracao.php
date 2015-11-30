<?php 

namespace Census\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Select;
use Zend\Form\Element\Date;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Textarea;
use Zend\Form\Element\Checkbox;

class Alteracao extends Form
{
	public function __construct() 
	{
		parent::__construct('formAlteracao');

		// alt_Tipo
		$tipo = new Select('tipo');
		$tipo->setLabel('Tipo de Punição')
			->setAttributes(array(
				'id' => 'tipo',
				'class' => 'form-control'))
			->setValueOptions(array(
				'' => 'Selecione',
				'Advertência' => 'Advertência',
				'Impedimento' => 'Impedimento',
				'Repreensão' => 'Repreensão',
				'Detenção' => 'Detenção',
				'Prisão' => 'Prisão',
				'Licenciamento' => 'Licenciamento',
			));
		$this->add($tipo);
		
		// alt_Apuracao
		$apuracao = new Text('apuracao');
		$apuracao->setLabel('Apuração')
			->setAttributes(array(
				'id' => 'apuracao',
				'class' => 'form-control'
			));
		$this->add($apuracao);
		
		// alt_FaltaServico
		$faltaservico = new Checkbox('faltaservico');
		$faltaservico->setLabel('Falta Serviço')
		->setAttributes(array(
				'id' => 'faltaservico',
				'class' => 'form-control',
		));
		$this->add($faltaservico);
		
		// alt_Origem
		$origem = new Text('origem');
		$origem->setLabel('Origem do Fato')
		->setAttributes(array(
				'id' => 'origem',
				'class' => 'form-control'
		));
		$this->add($origem);
		
		// alt_DataFato
		$datafato = new Date('datafato');
		$datafato->setLabel('Data do Fato')
		->setAttributes(array(
				'id' => 'datafato',
				'class' => 'form-control'
		));
		$this->add($datafato);
		
		// alt_DataApuracao
		$dataapuracao = new Date('dataapuracao');
		$dataapuracao->setLabel('Data Apuração')
		->setAttributes(array(
				'id' => 'dataapuracao',
				'class' => 'form-control'
		));
		$this->add($dataapuracao);
		
		// alt_Descricao
		$descricao = new Textarea('descricao');
		$descricao->setLabel('Descricao')
		->setAttributes(array(
				'id' => 'descricao',
				'class' => 'form-control'
		));
		$this->add($descricao);
		
		// alt_Punicao
		$punicao = new Text('punicao');
		$punicao->setLabel('Punição')
		->setAttributes(array(
				'id' => 'punicao',
				'class' => 'form-control'
		));
		$this->add($punicao);
		
		// alt_QuantidadeDias
		$quantidadedias = new Text('quantidadedias');
		$quantidadedias->setLabel('Q. Dias')
		->setAttributes(array(
				'id' => 'quantidadedias',
				'class' => 'form-control'
		));
		$this->add($quantidadedias);
		
		// alt_Data
		$data = new Date('data');
		$data->setLabel('Data')
		->setAttributes(array(
				'id' => 'data',
				'class' => 'form-control'
		));
		$this->add($data);
		
		// alt_Boletim
		$boletim = new Text('boletim');
		$boletim->setLabel('Boletim')
		->setAttributes(array(
				'id' => 'boletim',
				'class' => 'form-control'
		));
		$this->add($boletim);
	
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