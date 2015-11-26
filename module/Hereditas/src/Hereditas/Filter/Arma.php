<?php

namespace Hereditas\Filter;

use Zend\InputFilter\InputFilter;

class Arma extends InputFilter
{
	public function __construct() 
	{
		$this->add(array(
			'name'		=> 'tombamento',
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