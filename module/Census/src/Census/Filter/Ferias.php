<?php

namespace Census\Filter;

use Zend\InputFilter\InputFilter;
use Zend\Filter\Digits;

class Ferias extends InputFilter
{
	public function __construct() 
	{
		
		$this->add(array(
			'name'		=> 'anoreferencia',
			'required'	=> true,
			'filters'	=> array(
				array('name' => 'Zend\Filter\StripTags'),
				array('name' => 'Zend\Filter\StringTrim'),
				array('name' => 'Zend\Filter\Digits')
			),
			'validators' => array(
				array(
					'name' => 'Zend\Validator\NotEmpty',
					'options' => array(
						'messages' => array(
							\Zend\Validator\NotEmpty::IS_EMPTY => 'Campo obrigatório.'
						)
					)
				)
			)
		));
		
		$this->add(array(
			'name'		=> 'programacao',
			'required'	=> true,
			'filters'	=> array(
				
			),
			'validators' => array(
				array(
					'name' => 'Zend\Validator\NotEmpty',
					'options' => array(
						'messages' => array(
							\Zend\Validator\NotEmpty::IS_EMPTY => 'Campo obrigatório.'
						)
					)
				)
			)
		));
		
	}
	
}