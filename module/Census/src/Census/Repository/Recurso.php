<?php

namespace Census\Repository;

use Census\Repository\AbstractRepository;

class Recurso extends AbstractRepository
{
	public function getResources() 
	{
		$resources = $this->findAll();
		$arrResources = array();
		if (count($resources)) {
			foreach ($resources as $recource) {
				$arrResources[] = $recource->getNome();
			}
		}
		
		return $arrResources;
	}
}