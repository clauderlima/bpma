<?php

namespace Census\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Restricaotipo
 *
 * @ORM\Table(name="restricaotipo")
 * @ORM\Entity(repositoryClass="Census\Repository\Restricaotipo")
 */
class Restricaotipo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ret_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $retcodigo;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Restricaomedica", mappedBy="retcodigo", cascade={"persist"})
     */
    private $rescodigo;

    /**
     * Constructor
     */

    public function __construct(array $data) {
    	$this->resCodigo = new \Doctrine\Common\Collections\ArrayCollection();
    	$hydrator = new ClassMethods();
    	$hydrator->hydrate($data, $this);
    }
    
    public function toArray()
    {
    	$hydrator = new ClassMethods();
    	return $hydrator->extract($this);
    }


    public function getRetcodigo(){
        return $this->retcodigo;
    }

    public function setRetcodigo($retcodigo){
        $this->retcodigo = $retcodigo;
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

