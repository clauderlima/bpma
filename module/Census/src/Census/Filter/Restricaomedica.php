<?php

namespace Census\Filter;

use Zend\InputFilter\InputFilter;

class Restricaomedica extends InputFilter
{
	public function __construct() 
	{
		$this->add(array(
			'name'		=> 'inicio',
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