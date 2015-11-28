<?php

namespace Census\Form;

use Zend\Form\Form;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Select;
use Zend\Form\Element\Date;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\MultiCheckbox;
use Zend\Form\Element\Checkbox;

class Restricaomedica extends Form
{
	public function __construct(ServiceLocatorInterface $sm) 
	{
		parent::__construct('formCtgrafi');;
		
		$em = $sm->get('Doctrine\ORM\EntityManager');
		$arrRestricoes = array();
		
		$repoRestricoes = $em->getRepository('Census\Entity\Restricaotipo');
		$arrRestricoes += $repoRestricoes->fetchPairs();
		
		
		// polcodigo
		$polcodigo = new Hidden('polcodigo');
		$polcodigo->setLabel('Policial')
		->setAttributes(array(
				'id' => 'polcodigo',
				'class' => 'form-control',
		));
		$this->add($polcodigo);
		
		// inicio
		$inicio = new Date('inicio');
		$inicio->setLabel('Data Início')
		->setAttributes(array(
				'id' => 'inicio',
				'class' => 'form-control',
		));
		$this->add($inicio);
		
		// fim
		$fim = new Date('fim');
		$fim->setLabel('Data Fim')
			->setAttributes(array(
				'id' => 'fim',
				'class' => 'form-control',
		));
		$this->add($fim);
		
		// tipos (tabela restricao tipo)
		$retcodigo = new Select('retcodigo');
		$retcodigo->setLabel('Tipo')
			->setAttributes(array(
				'id' => 'retcodigo',
				'multiple' => true,
				'class' => 'form-control'))
			->setValueOptions($arrRestricoes);
		$this->add($retcodigo);
	
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