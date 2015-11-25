<?php

namespace Census\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Restricaotipo
 *
 * @ORM\Table(name="restricaoTipo", indexes={@ORM\Index(name="fk_restricaoTipo_restricaoMedica1_idx", columns={"res_Codigo"})})
 * @ORM\Entity
 */
class Restricaotipo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ret_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $retCodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="ret_Tipo", type="string", length=45, nullable=false)
     */
    private $retTipo;

    /**
     * @var string
     *
     * @ORM\Column(name="ret_Descricao", type="string", length=45, nullable=false)
     */
    private $retDescricao;

    /**
     * @var \Restricaomedica
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Restricaomedica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="res_Codigo", referencedColumnName="res_Codigo")
     * })
     */
    private $resCodigo;

    public function __construct(array $data) {
    	$hydrator = new ClassMethods();
    	$hydrator->hydrate($data, $this);
    }
    
    public function toArray()
    {
    	$hydrator = new ClassMethods();
    	return $hydrator->extract($this);
    }


    public function getRetCodigo(){
        return $this->retCodigo;
    }

    public function setRetCodigo($retCodigo){
        $this->retCodigo = $retCodigo;
        return $this;
    }

    public function getRetTipo(){
        return $this->retTipo;
    }

    public function setRetTipo($retTipo){
        $this->retTipo = $retTipo;
        return $this;
    }

    public function getRetDescricao(){
        return $this->retDescricao;
    }

    public function setRetDescricao($retDescricao){
        $this->retDescricao = $retDescricao;
        return $this;
    }

    public function getResCodigo(){
        return $this->resCodigo;
    }

    public function setResCodigo($resCodigo){
        $this->resCodigo = $resCodigo;
        return $this;
    }

}

