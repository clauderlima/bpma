<?php

namespace Census\Service;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;
use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator\ClassMethods;
use Core\Filter\String;

class AbstractService implements ServiceLocatorAwareInterface
{
	/**
	 * @var EntityManager
	 */
	protected $em;
	
	/**
	 * @var ServiceManager
	 */
	protected $sm;
	
	/**
	 * @return \Zend\ServiceManager\ServiceLocatorInterface
	 */
	public function getServiceLocator() {
		return $this->sm;
	}
	
	/**
	 * @return \Zend\ServiceManager\ServiceLocatorInterface
	 */
	public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
	{
		$this->sm = $serviceLocator;
	}
	
	public function getEm($entity = null)
	{
		if ($entity === null){
			return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		} else {
			$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
			return $em->getRepository($entity);
		}
	
	}
	
	public function getEmRef($entity, $id) {
		return $this->getEm()->getReference($entity, $id);
	}
	
	public function insert(array $data, $entity)
	{
		$entity = new $entity($data);

/*   		echo "<pre>";
		var_dump($entity);
		echo " xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ";
		var_dump($data);
		exit ;    */
		
		$em = $this->getEm();
		$em->persist($entity);
		$em->flush();
		
		return $entity;
	}
	
	public function update(array $data, $entity, $id)
	{
		$entity = $this->getEmRef($entity, $id);
		$hydrator = new ClassMethods();
		$hydrator->hydrate($data, $entity);
		
		$em = $this->getEm();
		$em->persist($entity);
		$em->flush();
	
		return $entity;
	}
	
	
	public function delete($entity, $id)
	{
		$findEntity = $this->getEm($entity)->find($id);
		
		if ($findEntity)
		{
			$entity = $this->getEmRef($entity, $id);
			
			$em = $this->getEm();
			$em->remove($entity);
			$em->flush();
		}
	
		return true;
	}
	
	// Função para transformar titulo da notícia em url amigavel, função full
	public function tituloToSlug($strValor) {
		$filterString = new String();
		return $filterString->tituloToSlug($strValor);
	}
	
	public function getToken()
	{
		$filterString = new String();
		return $filterString->getToken();
	}
	
	public function getIdUsuario()
	{
		return 1;
	}
}