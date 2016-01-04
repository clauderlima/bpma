<?php 

namespace Census\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Submit;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Form\Element\Select;

class Perfil extends Form
{
	public function __construct(ServiceLocatorInterface $sl) 
	{
		parent::__construct('formRecurso');
		
		$em = $sl->get('Doctrine\ORM\EntityManager');
		
		// definindo variáveis
		$arrPerfil = array('0' => 'Perfil Principal');
		
		$repoPerfil = $em->getRepository('Census\Entity\Perfil');
		$arrPerfil += $repoPerfil->findPairs();

		// per_Perfil
		$perfilcodigo = new Select('perfilcodigo');
		$perfilcodigo->setLabel('Perfil parentesco')
			->setAttributes(array(
				'id' => 'perfilcodigo',
				'class' => 'form-control',
				'options' => $arrPerfil
			));
		$this->add($perfilcodigo);

		// per_Nome
		$nome = new Text('nome');
		$nome->setLabel('Nome do Perfil')
			->setAttributes(array(
				'id' => 'nome',
				'class' => 'form-control'
			));
		$this->add($nome);
		
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