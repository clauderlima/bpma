<?php

namespace Census\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Dispensamedica
 *
 * @ORM\Table(name="dispensaMedica", indexes={@ORM\Index(name="fk_dispensaMedica_policial1_idx", columns={"pol_Codigo"})})
 * @ORM\Entity
 */
class Dispensamedica
{
    /**
     * @var integer
     *
     * @ORM\Column(name="dis_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dis_InicioData", type="date", nullable=true)
     */
    private $inicio;
    
    /**
     * @var string
     *
     * @ORM\Column(name="dis_Motivo", type="string", length=45, nullable=false)
     */
    private $motivo;
    
    /**
     * @var string
     *
     * @ORM\Column(name="dis_CID", type="string", length=45, nullable=false)
     */
    private $cid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dis_FimData", type="date", nullable=true)
     */
    private $fim;

    /**
     * @var \Policial
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Policial")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pol_Codigo", referencedColumnName="pol_Codigo")
     * })
     */
    private $polcodigo;

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

    public function getInicio(){
        return $this->inicio;
    }

    public function setInicio($inicio){
        $this->inicio = new \DateTime($inicio);
        return $this;
    }

    public function getFim(){
        return $this->fim;
    }

    public function setFim($fim){
        $this->fim = new \DateTime($fim);
        return $this;
    }

    public function getPolcodigo(){
        return $this->polcodigo;
    }

    public function setPolcodigo($polcodigo){
        $this->polcodigo = $polcodigo;
        return $this;
    }


    public function getMotivo(){
        return $this->motivo;
    }

    public function setMotivo($motivo){
        $this->motivo = $motivo;
        return $this;
    }


    public function getCid(){
        return $this->cid;
    }

    public function setCid($cid){
        $this->cid = $cid;
        return $this;
    }

}

