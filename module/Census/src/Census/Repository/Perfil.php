<?php

namespace Census\Repository;

use Core\Filter\String;
use Census\Repository\AbstractRepository;

class Perfil extends AbstractRepository
{
	public function findToArray($id)
	{
		$result = $this->find($id)->toArray();
		
		if (isset($result['perfil']))
			$result['perfil'] = $result['perfil']->getId();
		unset($result['children']);
		
		return $result;
	}
	
	public function getRoles() 
	{
		$roles = $this->findAll();
		$filterString = new String();
		$return = array();
		if (count($roles)) {
			foreach ($roles as $role) {
				$roleFilho = $filterString->tituloToSlug($role->getNome());
				$rolePai = $role->getPerfilcodigo() ? $filterString->tituloToSlug($role->getPerfilcodigo()->getNome()) : $filterString->tituloToSlug($role->getNome());   
				$return[$roleFilho] = $rolePai;
			}
		}
		
		return $return;
	}
	
	
	public function findPairs()
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
}