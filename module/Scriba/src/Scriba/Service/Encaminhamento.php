<?php

namespace Scriba\Service;

class Encaminhamento extends AbstractService
{
	public function inserir(array $data, $entity, $documento)
	{	
		$em = $this->getEm();
		
		$encaminhamento = $em->createQueryBuilder()
			->select('e')
			->from('Scriba\Entity\Encaminhamento', 'e')
			->where('e.doccodigo = :doccodigo')
			->setParameter('doccodigo', $documento)
			->orderBy('e.codigo', 'DESC')
			->setMaxResults(1)
			->getQuery()->getResult();
		
		if ($encaminhamento)
		{
			$data['encaminhamento'] = $this->getEmRef('Scriba\Entity\Encaminhamento', $encaminhamento[0]->getCodigo());
		}
		
		$hoje = new \DateTime('now');
		$data['data'] = $hoje->format('Y-m-d');
		$data['doccodigo'] = $this->getEmRef('Scriba\Entity\Documento', $documento);
		$data['polcodigo'] = $this->getEmRef('Census\Entity\Policial', $data['polcodigo']);
		$data['status'] = "Tramitado";
		
		return parent::insert($data, $entity);
	}
	
	public function arquivar(array $data, $entity, $documento)
	{
		$em = $this->getEm();
	
		$encaminhamento = $em->createQueryBuilder()
			->select('e')
			->from('Scriba\Entity\Encaminhamento', 'e')
			->where('e.doccodigo = :doccodigo')
			->setParameter('doccodigo', $documento)
			->orderBy('e.codigo', 'DESC')
			->setMaxResults(1)
			->getQuery()->getResult();
	
		if ($encaminhamento)
		{
			$data['encaminhamento'] = $this->getEmRef('Scriba\Entity\Encaminhamento', $encaminhamento[0]->getCodigo());
		}
	
		$hoje = new \DateTime('now');
		$data['data'] = $hoje->format('Y-m-d');
		$data['doccodigo'] = $this->getEmRef('Scriba\Entity\Documento', $documento);
		$data['polcodigo'] = $this->getEmRef('Census\Entity\Policial', $data['polcodigo']);
		$data['status'] = "Arquivado";
	
		return parent::insert($data, $entity);
	}
	
	public function update(array $data, $entity, $id)
	{
		$data['polcodigo'] = $this->getEmRef('Census\Entity\Policial', $data['polcodigo']);
	
		return parent::update($data, $entity, $id);
	}
}