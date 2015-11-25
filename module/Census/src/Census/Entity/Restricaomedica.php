<?php

namespace Census\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Restricaomedica
 *
 * @ORM\Table(name="restricaoMedica", indexes={@ORM\Index(name="fk_restricaoMedica_policial1_idx", columns={"pol_Codigo"})})
 * @ORM\Entity
 */
class Restricaomedica
{
    /**
     * @var integer
     *
     * @ORM\Column(name="res_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $resCodigo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="res_InicioData", type="date", nullable=false)
     */
    private $resIniciodata;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="res_FinalData", type="date", nullable=false)
     */
    private $resFinaldata;

    /**
     * @var \Policial
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Policial")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pol_Codigo", referencedColumnName="pol_Codigo")
     * })
     */
    private $polCodigo;

    public function __construct(array $data) {
    	$hydrator = new ClassMethods();
    	$hydrator->hydrate($data, $this);
    }
    
    public function toArray()
    {
    	$hydrator = new ClassMethods();
    	return $hydrator->extract($this);
    }


    public function getResCodigo(){
        return $this->resCodigo;
    }

    public function setResCodigo($resCodigo){
        $this->resCodigo = $resCodigo;
        return $this;
    }

    public function getResIniciodata(){
        return $this->resIniciodata;
    }

    public function setResIniciodata($resIniciodata){
        $this->resIniciodata = $resIniciodata;
        return $this;
    }

    public function getResFinaldata(){
        return $this->resFinaldata;
    }

    public function setResFinaldata($resFinaldata){
        $this->resFinaldata = $resFinaldata;
        return $this;
    }

    public function getPolCodigo(){
        return $this->polCodigo;
    }

    public function setPolCodigo($polCodigo){
        $this->polCodigo = $polCodigo;
        return $this;
    }

}

