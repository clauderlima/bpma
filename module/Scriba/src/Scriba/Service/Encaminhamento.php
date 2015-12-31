<?php

namespace Scriba\Service;

class Encaminhamento extends AbstractService
{
	public function insert(array $data, $entity, $documento)
	{	
		
		$hoje = new \DateTime('now');
		$data['data'] = $hoje->format('Y-m-d');
		$data['doccodigo'] = $this->getEmRef('Scriba\Entity\Documento', $documento);
		$data['polcodigo'] = $this->getEmRef('Census\Entity\Policial', $data['polcodigo']);
		
		return parent::insert($data, $entity);
	}
	
	public function update(array $data, $entity, $id)
	{
		$data['polcodigo'] = $this->getEmRef('Census\Entity\Policial', $data['polcodigo']);
	
		return parent::update($data, $entity, $id);
	}
}