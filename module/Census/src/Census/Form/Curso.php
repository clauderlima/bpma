<?php 

namespace Census\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Select;
use Zend\Form\Element\Date;

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
		$conclusao = new Date('conclusao');
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
				'COMSOC' => 'Comunicação Social',
				'INF' => 'Informática',
				'TRA' => 'Trânsito'
		));
		$this->add($tipo);
	
		$submit = new Submit('submit');
		$submit->setValue('Salvar');
		$this->add($submit);
	}
}