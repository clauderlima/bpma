<?php

namespace Scriba\Filter;

use Zend\InputFilter\InputFilter;

class Protocolo extends InputFilter
{
	public function __construct() 
	{
		$this->add(array(
			'name'		=> 'tipo',
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