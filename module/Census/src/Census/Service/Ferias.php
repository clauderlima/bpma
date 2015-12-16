<?php

namespace Census\Service;

use Census\Service\AbstractService;

class Ferias extends AbstractService
{
	public function insert(array $data, $entity)
	{
		
		//Código utilizado para não duplicar férias do mesmo ano
		/* $query = $this->getEm()->createQuery("SELECT f.programacao,f.codigo,f.anoreferencia FROM Census\Entity\Ferias f WHERE f.anoreferencia = :anoreferencia AND f.polcodigo = :polcodigo");
		$query->setParameter('anoreferencia',$data['anoreferencia']);
		$query->setParameter('polcodigo',$data['polcodigo']);
		$ferias = $query->getResult();
		
		foreach ($ferias as $dado)
		{
			$this->delete('\Census\Entity\Ferias', $dado['codigo']);
		} */
		
		$data['polcodigo'] = $this->getEmRef('\Census\Entity\Ferias', $data['polcodigo']);
		
		
		return parent::insert($data, $entity);
	}
}