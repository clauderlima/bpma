<?php

namespace Scriba\Service;

class Documento extends AbstractService
{
	public function insert(array $data, $entity)
	{
		$data['polcodigo'] = $this->getEmRef('Census\Entity\Policial', 351);
		
		// Protocolar e Numerar o recebimento
		$service = $this->getServiceLocator()->get('scriba-service-protocolo');
		$numero = $service->numerar('Scriba\Entity\Protocolo', $data['tipo'], $data['numero']);
		$data['procodigo'] = $numero;

		return parent::insert($data, $entity);
	}

	public function update(array $data, $entity, $id)
	{
		$data['polcodigo'] = $this->getEmRef('Census\Entity\Policial', $data['polcodigo']);

		return parent::update($data, $entity, $id);
	}
}