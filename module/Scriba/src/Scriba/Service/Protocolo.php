<?php

namespace Scriba\Service;

class Protocolo extends AbstractService
{
	public function numerar($entity, $tipo, $numerodocumento)
	{	
		
		$hoje = new \DateTime();
		$ano = $hoje->format('Y');
		
		$numero = $this->getEm()->createQueryBuilder()
			->select('n')
			->from('Scriba\Entity\Protocolo', 'n')
			->orderBy('n.numero', 'DESC')
			->where('n.ano = :ano')
			->setParameter('ano', $ano)
			->setMaxResults(1)
			->getQuery()->getResult();
		
		
		$novonumero = 1;
		
		if ($numero)
		{
			if ($numero[0]->getNumero())
			{
				$novonumero = $novonumero + $numero[0]->getNumero();
			}
		}
		
			
		
		$descricao = "Recebimento de " . $tipo . " - " . $numerodocumento . " - " . $hoje->format('d/m/Y');
		
		// Adiciona o Numero no Controle de Numeracao
		$datanumero = array(
				'numero' => $novonumero,
				'ano' => $ano,
				'descricao' => $descricao
		);

		return parent::insert($datanumero, $entity);
	}
	
	public function update(array $data, $entity, $id)
	{
		$data['polcodigo'] = $this->getEmRef('Census\Entity\Policial', $data['polcodigo']);
	
		return parent::update($data, $entity, $id);
	}
}