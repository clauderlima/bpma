<?php

namespace Census\Filter;

use Zend\InputFilter\InputFilter;

class RequerimentoFerias extends InputFilter
{
	public function __construct() 
	{
		$this->add(array(
				'name'		=> 'inicioabono',
				'required'	=> false,
				'filters'	=> array(
		
				),
		));
		
		$this->add(array(
				'name'		=> 'quantidadedias',
				'required'	=> false,
				'filters'	=> array(
		
				),
		));
		
		$this->add(array(
				'name'		=> 'datasolicitacao',
				'required'	=> false,
				'filters'	=> array(
		
				),
		));
		
		$this->add(array(
				'name'		=> 'decisao',
				'required'	=> false,
				'filters'	=> array(
		
				),
		));
	}
	
}