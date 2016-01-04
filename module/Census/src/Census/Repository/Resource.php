<?php

namespace User\Repository;

use Census\Repository\AbstractRepository;

class Resource extends AbstractRepository
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