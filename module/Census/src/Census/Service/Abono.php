<?php

namespace Census\Service;

class Abono extends AbstractService
{
	public function insert(array $data, $entity)
	{	
		// $data['numero'] = str_pad($dataabono->getCodigo(), 4, "0", STR_PAD_LEFT);;
		
		$data['polcodigo'] = $this->getEmRef('Census\Entity\Policial', $data['polcodigo']);
		
		
		// Busca um numero novo para o Requerimento
		$serviceNumReq = $this->getServiceLocator()->get('census-service-numeracaorequerimento');
		$numero = $serviceNumReq->insert('Census\Entity\NumeracaoRequerimento', $data['matricula']);
		
		$numeroRequerimento = str_pad($numero->getCodigo(), 5, "0", STR_PAD_LEFT)."/".$data['datasolicitacao']->format('Y');
		$data['numero'] = $numeroRequerimento;
		$data['nrecodigo'] = $this->getEmRef('Census\Entity\NumeracaoRequerimento', $numero->getCodigo());
		$data['inicioabono'] = $data['inicioabono']->format('Y/m/d');
		$data['fimabono'] = $data['fimabono']->format('Y/m/d');
		$data['datasolicitacao'] = $data['datasolicitacao']->format('Y/m/d');
		$data['datainclusao'] = $data['datainclusao']->format('Y/m/d');

		return parent::insert($data, $entity);
	}
	
	public function update(array $data, $entity, $id)
	{
		$data['polcodigo'] = $this->getEmRef('Census\Entity\Policial', $data['polcodigo']);
	
		return parent::update($data, $entity, $id);
	}
}