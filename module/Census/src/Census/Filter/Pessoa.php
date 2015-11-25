<?php

namespace Census\Filter;

use Zend\InputFilter\InputFilter;

class Pessoa extends InputFilter
{
	public function __construct() 
	{
		$this->add(array(
			'name' => 'pes_Nomecompleto',
			'allow_empty' => false
		));
	}
}