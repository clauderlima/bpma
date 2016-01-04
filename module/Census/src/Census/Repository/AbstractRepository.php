<?php

namespace Census\Repository;

use Doctrine\ORM\EntityRepository;

class AbstractRepository extends EntityRepository
{
	public function fetchPairs() 
	{
		$arrResult = array();
		$result = $this->findAll();
		
		if ($result)
		{
			foreach ($result as $item)
			{
				$arrResult[$item->getCodigo()] = $item->getNome();
			}
		}
		
		return $arrResult;
	}
	
	public function tituloToSlug($strValor) {
		$filterString = new String();
		return $filterString->tituloToSlug($strValor);
	}
	
	public function getToken()
	{
		$filterString = new String();
		return $filterString->getToken();
	}
}