<?php

namespace Census\Service;

use Census\Service\AbstractService;

class Policial extends AbstractService
{
	public function insert(array $data, $entity)
	{
		if ($data['foto']['name'])
		{
			$fotoArquivo = $data['foto']['tmp_name'];
			$fotoTamanho = $data['foto']['size'];
			$fotoTipo = $data['foto']['type'];
		
			$fotoData = base64_encode(file_get_contents($fotoArquivo));
		
			$data['fototipo'] = $fotoTipo;
			$data['foto'] = $fotoData;
		}

		return parent::insert($data, $entity);
	}
	
	public function update($data, $entity, $id)
	{
		if ($data['foto']['name'])
		{
			$fotoArquivo = $data['foto']['tmp_name'];
			$fotoTamanho = $data['foto']['size'];
			$fotoTipo = $data['foto']['type'];
				
			$fotoData = base64_encode(file_get_contents($fotoArquivo));
		
			$data['fototipo'] = $fotoTipo;
			$data['foto'] = $fotoData;
		} else
		{
			unset($data['foto']);
		}
		
		return parent::update($data, $entity, $id);
	}
}