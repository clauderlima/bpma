<?php

namespace User\Service;

use Zend\Permissions\Acl\Resource\GenericResource;
use Zend\Permissions\Acl\Role\GenericRole;
use Zend\Permissions\Acl\Acl as ZendAcl;
use Census\Service\AbstractService;

class Acl extends AbstractService
{
	public function build() 
	{
		$authService = $this->getServiceLocator()->get('user-service-auth');
		$role = $authService->getRole();
		$repositoryPerfil = $this->getEm('Census\Entity\Perfil');
		$repositoryResource = $this->getEm('Census\Entity\Recurso');
		$repositoryAcl = $this->getEm('Census\Entity\Acl');
		
		$config = $repositoryAcl->listaAcl();
		$config['acl']['roles'] = $repositoryPerfil->getRoles();
		$config['acl']['roles']['visitante'] = null;
		$config['acl']['resources'] = $repositoryResource->getResources();
		
		$acl = new ZendAcl();
		foreach ($config['acl']['roles'] as $role => $parent) {
			$acl->addRole(new GenericRole($role), $parent);
		}
		
		foreach ($config['acl']['resources'] as $resouce) {
			$acl->addResource(new GenericResource($resouce));
		}
		
		if (isset($config['acl']['privilege'])) {
			foreach ($config['acl']['privilege'] as $role => $privilege) {
				if (isset($privilege['allow'])) {
					foreach ($privilege['allow'] as $permissao) {
						$acl->allow($role, $permissao);
					}
				}
				if (isset($privilege['deny'])) {
					foreach ($privilege['deny'] as $permissao) {
						$acl->deny($role, $permissao);
					}
				}
			}
		}
		
		return $acl;
	}
}