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
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="ret_Tipo", type="string", length=45, nullable=false)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="ret_Descricao", type="string", length=45, nullable=false)
     */
    private $descricao;

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
    private $rescodigo;

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

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
        return $this;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
        return $this;
    }

    public function getRescodigo(){
        return $this->rescodigo;
    }

    public function setRescodigo($rescodigo){
        $this->rescodigo = $rescodigo;
        return $this;
    }

}

