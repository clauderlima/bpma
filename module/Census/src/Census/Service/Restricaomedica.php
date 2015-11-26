<?php

namespace Census\Service;

use Census\Service\AbstractService;

class Restricaomedica extends AbstractService
{
	public function insert(array $data, $entity)
	{
		$data['polcodigo'] = $this->getEmRef('Census\Entity\Policial', $data['polcodigo']);
	
		$arrTipo = array();
		
		if (count($data['tipo']))
		{
			foreach ($data['tipo'] as $tipo)
			{
				//$emTipo = $this->getEmRef('Census\Entity\Restricaotipo', $tipo);
				//echo "<pre>" . print_r($emTipo) . "<br>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
				$emTipo = $this->getEm('Census\Entity\Restricaotipo');
				$entityTipo = $emTipo->findOneByRetcodigo($tipo);
				$arrTipo = $emTipo;
			}
		}
		
		$data['tipo'] = $arrTipo;
		
		
		return parent::insert($data, $entity);
	}
	
	public function update(array $data, $entity, $id)
	{
		$data['armcodigo'] = $this->getEmRef('Hereditas\Entity\Arma', $data['armcodigo']);
		$data['polcodigo'] = $this->getEmRef('Census\Entity\Policial', $data['polcodigo']);
	
		return parent::update($data, $entity, $id);
	}
}