<?php

namespace Census\Repository;

use Core\Filter\String;
use Census\Repository\AbstractRepository;

class Acl extends AbstractRepository
{
	public function listaAcl()
	{
		$filterString = new String();
		$acl = $this->findAll();
		$arrPermissoes = array();
		$arrAcl = array();
		if (count($acl)) {
			foreach ($acl as $item) {
				$tipoPermissao = $item->getPermissao();
				$perfilSlug = $filterString->tituloToSlug($item->getPercodigo()->getNome());
				$arrPermissoes[$perfilSlug][$tipoPermissao] = $item->getReccodigo()->getNome();
				$arrAcl['acl']['previlege'] = $arrPermissoes;
			}
			
			return $arrAcl;
		}
	}
}