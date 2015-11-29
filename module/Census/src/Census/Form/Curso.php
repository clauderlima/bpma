<?php 

namespace Census\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Select;
use Zend\Form\Element\Date;
use Zend\Form\Element\Submit;

class Curso extends Form
{
	public function __construct() 
	{
		parent::__construct('formCurso');

		// cur_Nome
		$nome = new Text('nome');
		$nome->setLabel('Nome do Curso')
			->setAttributes(array(
				'id' => 'tipo',
				'class' => 'form-control'
			));
		$this->add($nome);
		
		// cur_Unidade
		$unidade = new Text('unidade');
		$unidade->setLabel('Unidade')
			->setAttributes(array(
				'id' => 'unidade',
				'class' => 'form-control'
			));
		$this->add($unidade);
		
		// cur_CargaHoraria
		$cargahoraria = new Text('cargahoraria');
		$cargahoraria->setLabel('Carga Horária')
		->setAttributes(array(
				'id' => 'cargahoraria',
				'class' => 'form-control'
		));
		$this->add($cargahoraria);
		
		// cur_DataConclusao
		$conclusao = new Date('dataconclusao');
		$conclusao->setLabel('Data de conclusão')
		->setAttributes(array(
				'id' => 'conclusao',
				'class' => 'form-control'
		));
		$this->add($conclusao);
		
		// cur_Tipo
		$tipo = new Select('tipo');
		$tipo->setLabel('Tipo de Curso')
			->setAttributes(array(
				'id' => 'tipo',
				'class' => 'form-control'))
			->setValueOptions(array(
				'Curso de Formação' => 'Curso de Formação',
				'Curso de Especialização' => 'Curso de Especialização',
				'Curso de Habilitação' => 'Curso de Habilitação',
				'Curso de Aperfeiçoamento' => 'Curso de Aperfeiçoamento',
				'Curso de Graduação' => 'Curso de Graduação',
				'Curso de Pós-graduação' => 'Curso de Pós-graduação',
				'Programa de Atualização Básica em Segurança Pública' => 'Programa de Atualização Básica em Segurança Pública',

		));
		$this->add($tipo);
	
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