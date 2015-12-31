<?php

namespace Scriba\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Protocolo
 *
 * @ORM\Table(name="protocolo", uniqueConstraints={@ORM\UniqueConstraint(name="pro_Numero_UNIQUE", columns={"pro_Numero"}), @ORM\UniqueConstraint(name="pro_Codigo_UNIQUE", columns={"pro_Codigo"})})
 * @ORM\Entity
 */
class Protocolo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pro_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="pro_Numero", type="integer", nullable=false)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_Ano", type="string", length=4, nullable=false)
     */
    private $ano;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_Descricao", type="string", length=155, nullable=false)
     */
    private $descricao;

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

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
        return $this;
    }

    public function getAno(){
        return $this->ano;
    }

    public function setAno($ano){
        $this->ano = $ano;
        return $this;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
        return $this;
    }

}

