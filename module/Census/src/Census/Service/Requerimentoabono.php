<?php

namespace Census\Service;

class Requerimentoabono extends AbstractService
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