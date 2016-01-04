<?php

namespace Census\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Recurso
 *
 * @ORM\Table(name="recurso")
 * @ORM\Entity(repositoryClass="Census\Repository\Recurso")
 */
class Recurso
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rec_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="rec_Nome", type="string", length=250, nullable=false)
     */
    private $nome;

    public function __construct(array $data) {
    	$hydrator = new ClassMethods();
    	$hydrator->hydrate($data, $this);
    }
    
    public function toArray()
    {
    	$hydrator = new ClassMethods();
    	return $hydrator->extract($this);
    }
    
    public function getCodigo(){
        return $this->codigo;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
        return $this;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }

}

