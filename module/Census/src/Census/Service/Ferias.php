<?php

namespace Census\Service;

use Census\Service\AbstractService;

class Ferias extends AbstractService
{
	public function insertFerias(array $data, $entity, $policial)
	{
		$query = $this->getEm()->createQuery("SELECT f.programacao,f.codigo,f.anoreferencia FROM Census\Entity\Ferias f WHERE f.anoreferencia = :anoreferencia AND f.polcodigo = :polcodigo");
		$query->setParameter('anoreferencia',$data['anoreferencia']);
		$query->setParameter('polcodigo',$policial);
		$ferias = $query->getResult();
		
		foreach ($ferias as $dado)
		{
			$this->delete('\Census\Entity\Ferias', $dado['codigo']);
		}
				
		return parent::insert($data, $entity);
	}
}