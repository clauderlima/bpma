<?php

namespace User\Filter;

use Zend\InputFilter\InputFilter;

class Usuario extends InputFilter
{
	public function __construct()
	{
		$this->add(array(
			'name' => 'login',
			'required' => true,
			'filters' => array(
				array('name' => 'StringTrim'),
				array('name' => 'StripTags')
			),
			'validators' => array(
				array(
					'name' => 'NotEmpty',
					'options' => array(
						'messages' => array(
							'isEmpty' => 'Digite o usuário!'
						)
					)
				)
			)
		));
		
		$this->add(array(
			'name' => 'senha',
			'required' => true,
			'filters' => array(
				array('name' => 'StringTrim'),
				array('name' => 'StripTags')
			),
			'validators' => array(
				array(
					'name' => 'NotEmpty',
					'options' => array(
						'messages' => array(
						'isEmpty' => 'Digite sua senha!'
						)
					)
				)
			)
		));
	}
}