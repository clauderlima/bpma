<?php

namespace Census\Service;

use Census\Service\AbstractService;

class Restricaomedica extends AbstractService
{
	public function insert(array $data, $entity)
	{
		$data['polcodigo'] = $this->getEmRef('Census\Entity\Policial', $data['polcodigo']);
	
		$arrTipo = array();
		
		if (count($data['retcodigo']))
		{
			foreach ($data['retcodigo'] as $tipo)
			{
				$emTipo = $this->getEmRef('Census\Entity\Restricaotipo', $tipo);
				$arrTipo[] = $emTipo;
			}
		}
		
		$data['retcodigo'] = $arrTipo;
		
		return parent::insert($data, $entity);
	}
	
	public function update(array $data, $entity, $id)
	{
		$data['polcodigo'] = $this->getEmRef('Census\Entity\Policial', $data['polcodigo']);
	
		$arrTipo = array();
		
		if (count($data['retcodigo']))
		{
			foreach ($data['retcodigo'] as $tipo)
			{
				$emTipo = $this->getEmRef('Census\Entity\Restricaotipo', $tipo);
				$arrTipo[] = $emTipo;
			}
		}
		
		$data['retcodigo'] = $arrTipo;
	
		return parent::update($data, $entity, $id);
	}
}