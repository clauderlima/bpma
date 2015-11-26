<?php

namespace Census\Repository;

class Restricaomedica extends AbstractRepository
{
	public function fetchPairs()
	{
		$arrResult = array();
		$result = $this->findAll();
	
		if ($result)
		{
			foreach ($result as $item)
			{
				$arrResult[$item->getCodigo()] = $item->getTipo();
			}
		}
	
		return $arrResult;
	}
}