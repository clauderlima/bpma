<?php

namespace User\Repository;

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
				$perfilSlug = $filterString->titleToSlug($item->getPerfil()->getNome());
				$arrPermissoes[$perfilSlug][$tipoPermissao] = $item->getResource()->getNome();
				$arrAcl['acl']['previlege'] = $arrPermissoes;
			}
			
			return $arrAcl;
		}
	}
}