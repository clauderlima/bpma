<?php

namespace Census\Service;

class Ctgrafi extends AbstractService
{
	public function insert(array $data, $entity)
	{
		$data['armcodigo'] = $this->getEmRef('Hereditas\Entity\Arma', $data['armcodigo']);
		$data['polcodigo'] = $this->getEmRef('Census\Entity\Policial', $data['polcodigo']);

		return parent::insert($data, $entity);
	}
	
	public function update(array $data, $entity, $id)
	{
		$data['armcodigo'] = $this->getEmRef('Hereditas\Entity\Arma', $data['armcodigo']);
		$data['polcodigo'] = $this->getEmRef('Census\Entity\Policial', $data['polcodigo']);
	
		return parent::update($data, $entity, $id);
	}
}