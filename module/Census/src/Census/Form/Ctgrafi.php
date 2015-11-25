<?php

namespace Census\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Select;
use Zend\Form\Element\Date;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Form\Element\Hidden;

class Ctgrafi extends Form
{
	public function __construct(ServiceLocatorInterface $sm) 
	{
		parent::__construct('formCtgrafi');;
		
		$em = $sm->get('Doctrine\ORM\EntityManager');
		$arrArmas = array("" => "Selecione");
		
		$repoArmas = $em->getRepository('Census\Entity\Arma');
		$arrArmas += $repoArmas->fetchPairs();
		
		// ctg_Numero
		$numero = new Text('numero');
		$numero->setLabel('Número')
		->setAttributes(array(
				'id' => 'numero',
				'class' => 'form-control',
		));
		$this->add($numero);
		
		// ctg_Boletim
		$boletim = new Text('boletim');
		$boletim->setLabel('Boletim')
		->setAttributes(array(
				'id' => 'boletim',
				'class' => 'form-control',
		));
		$this->add($boletim);
		
		// ctg_Data
		$data = new Date('data');
		$data->setLabel('Data')
		->setAttributes(array(
				'id' => '$data',
				'class' => 'form-control',
		));
		$this->add($data);
		
		// arm_Codigo
		$armcodigo = new Select('armcodigo');
		$armcodigo->setLabel('Número de Série da Arma')
		->setAttributes(array(
				'id' => 'armcodigo',
				'class' => 'form-control',
				'options' => $arrArmas
				));
				$this->add($armcodigo);
				
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