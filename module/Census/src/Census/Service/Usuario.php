<?php

namespace Census\Service;

class Usuario extends AbstractService
{
	public function insert(array $data, $entity)
	{	
		$data['polcodigo'] = $this->getEmRef('Census\Entity\Policial', $data['polcodigo']);
		$data['percodigo'] = $this->getEmRef('Census\Entity\Perfil', 2);
		
		return parent::insert($data, $entity);
	}
	
	public function update(array $data, $entity, $id)
	{
		$data['polcodigo'] = $this->getEmRef('Census\Entity\Policial', $data['polcodigo']);
	
		return parent::update($data, $entity, $id);
	}
	
	public function perfil(array $data, $entity, $id)
	{
		unset($data['polcodigo']);
		$data['percodigo'] = $this->getEmRef('Census\Entity\Perfil', $data['percodigo']);
	
		return parent::update($data, $entity, $id);
	}
}