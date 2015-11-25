<?php

namespace Census\Repository;

class Ctgrafi extends AbstractRepository
{
	public function fetchPairs()
	{
		$arrResult = array();
		$result = $this->findAll();
	
		if ($result)
		{
			foreach ($result as $item)
			{
				$arrResult[$item->getCodigo()] = $item->getNumeroserie();
			}
		}
	
		return $arrResult;
	}
}