<?php

namespace Census\Service;

use Census\Service\AbstractService;

class Policial extends AbstractService
{
	public function insert(array $data, $entity)
	{
		//$data['slug'] = parent::tituloToSlug($data['nome']);

		return parent::insert($data, $entity);
	}
}