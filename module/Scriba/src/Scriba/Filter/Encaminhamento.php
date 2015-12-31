<?php

namespace Scriba\Filter;

use Zend\InputFilter\InputFilter;

class Encaminhamento extends InputFilter
{
	public function __construct() 
	{
		$this->add(array(
			'name'		=> 'polcodigo',
			'required'	=> true,
			'filters'	=> array(		
			),
		));
	}
		
}