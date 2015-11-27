<?php

namespace Census\Repository;

class Restricaotipo extends AbstractRepository
{
	public function fetchPairs()
	{
		$arrResult = array();
		$result = $this->findAll();
	
		if ($result)
		{
			foreach ($result as $item)
			{
				$arrResult[$item->getRetcodigo()] = $item->getTipo() . " - " . $item->getDescricao();
			}
		}
	
		return $arrResult;
	}
}