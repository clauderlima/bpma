<?php

namespace Census\Service;

class Perfil extends AbstractService
{
	public function insert(array $data, $entity)
	{
		
		if ($data['perfilcodigo'] > 0 )
		{
			$data['perfilcodigo'] = $this->getEmRef('Census\Entity\Perfil', $data['perfilcodigo']);
		} else
		{
			unset($data['perfilcodigo']);
		}
		
		parent::insert($data, $entity);
	}
	
	public function update(array $data, $entity, $id)
	{
		if ($data['perfilcodigo'] > 0 )
		{
			$data['perfilcodigo'] = $this->getEmRef('Census\Entity\Perfil', $data['perfilcodigo']);
		} else
		{
			unset($data['perfilcodigo']);
		}
		
		parent::update($data, $entity, $id );
	}

	
}