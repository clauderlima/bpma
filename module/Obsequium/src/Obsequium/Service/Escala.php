<?php

namespace Obsequium\Service;

use Census\Service\AbstractService;

class Escala extends AbstractService
{
	public function insert(array $data, $entity)
	{
		
		$data['polcodigo'] = $this->getEmRef('Census\Entity\Policial', $data['polcodigo']);
		
		return parent::insert($data, $entity);
	}
	
	public function update(array $data, $entity, $id)
	{
		$data['polcodigo'] = $this->getEmRef('Census\Entity\Policial', $data['polcodigo']);
	
		return parent::update($data, $entity, $id);
	}
}