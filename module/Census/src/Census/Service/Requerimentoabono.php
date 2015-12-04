<?php

namespace Census\Service;

class Requerimentoabono extends AbstractService
{
	public function insert(array $data, $entity)
	{	
		// $data['numero'] = str_pad($dataabono->getCodigo(), 4, "0", STR_PAD_LEFT);;
		
		$data['polcodigo'] = $this->getEmRef('Census\Entity\Policial', $data['polcodigo']);
		
		
		echo "<pre>";
		print_r($data);
		exit;
		return parent::insert($data, $entity);
	}
	
	public function update(array $data, $entity, $id)
	{
		$data['polcodigo'] = $this->getEmRef('Census\Entity\Policial', $data['polcodigo']);
	
		return parent::update($data, $entity, $id);
	}
}