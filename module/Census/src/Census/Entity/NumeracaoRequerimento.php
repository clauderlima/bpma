<?php

namespace Census\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * NumeracaoRequerimento
 *
 * @ORM\Table(name="numeracao_requerimento")
 * @ORM\Entity
 */
class NumeracaoRequerimento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nre_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="nre_numero", type="bigint", nullable=false)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="nre_ano", type="string", length=4, nullable=false)
     */
    private $ano;

    /**
     * @var string
     *
     * @ORM\Column(name="nre_descricao", type="string", length=45, nullable=false)
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

