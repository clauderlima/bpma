<?php

namespace Census\Service;

class NumeracaoRequerimento extends AbstractService
{
	public function insert($entity, $matricula)
	{	
		
		$hoje = new \DateTime();
		$ano = $hoje->format('Y');
		
		$numero = $this->getEm()->createQueryBuilder()
		->select('n')
		->from('Census\Entity\NumeracaoRequerimento', 'n')
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
		
			
		
		$descricao = "Requerimento de Abono - " . $matricula . " - " . $hoje->format('d/m/Y');
		
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