<?php 

namespace Census\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Select;
use Zend\Form\Element\Date;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Hidden;

class Formacao extends Form
{
	public function __construct() 
	{
		parent::__construct('formFormacao');

		// for_Tipo
		$tipo = new Select('tipo');
		$tipo->setLabel('Tipo')
			->setAttributes(array(
				'id' => 'tipo',
				'class' => 'form-control'))
			->setValueOptions(array(
				'' => "Selecione",
				'Ensino Médio' => 'Ensino Médio',
				'Bacharelado' => 'Bacharelado',
				'Licenciatura' => 'Licenciatura',
				'Tecnólogo' => 'Tecnólogo',
				'Sequencial' => 'Sequencial',
				'Modular' => 'Modular',
				'À Distância' => 'À Distância',
				'Pós Graduação' => 'Pós Graduação',
				'Mestrado' => 'Mestrado',
				'Doutorado' => 'Doutorado',
				));
		$this->add($tipo);
		
		// for_Nome
		$nome = new Text('nome');
		$nome->setLabel('Nome do Curso')
			->setAttributes(array(
				'id' => 'tipo',
				'class' => 'form-control'
				));
		$this->add($nome);
		
		// for_Conclusao
		$conclusao = new Date('conclusao');
		$conclusao->setLabel('Conclusão')
		->setAttributes(array(
				'id' => 'conclusao',
				'class' => 'form-control'
		));
		$this->add($conclusao);
		
		// for_Instituicao
		$instituicao = new Text('instituicao');
		$instituicao->setLabel('Instituição de Ensino')
			->setAttributes(array(
				'id' => 'instituicao',
				'class' => 'form-control'
			));
		$this->add($instituicao);
		
		// for_AreaConhecimento
		$areaconhecimento = new Select('areaconhecimento');
		$areaconhecimento->setLabel('Área de Conhecimento')
			->setAttributes(array(
				'id' => 'areaconhecimento',
				'class' => 'form-control'))
			->setValueOptions(array(
				'' => "Selecione",
				'Ensino Médio' => 'Ensino Médio',
				'Ciências Extatas e da Terra' => 'Ciências Extatas e da Terra',
				'Ciências Biológicas' => 'Ciências Biológicas',
				'Ciências da Saúde' => 'Ciências da Saúde',
				'Ciências Agrárias' => 'Ciências Agrárias',
				'Ciências Sociais Aplicadas' => 'Ciências Sociais Aplicadas',
				'Ciências Humanas' => 'Ciências Humanas',
				'Linguística, Letras e Artes' => 'Linguística, Letras e Artes',
				'Multidisciplinar' => 'Multidisciplinar'
			));
		$this->add($areaconhecimento);
	
		// pol_Codigo
		$polcodigo = new Hidden('polcodigo');
		$polcodigo->setLabel('Policial')
		->setAttributes(array(
				'id' => 'polcodigo',
				'class' => 'form-control',
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