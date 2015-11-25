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
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $disCodigo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dis_InicioData", type="date", nullable=true)
     */
    private $disIniciodata;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dis_FimData", type="date", nullable=true)
     */
    private $disFimdata;

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


    public function getDisCodigo(){
        return $this->disCodigo;
    }

    public function setDisCodigo($disCodigo){
        $this->disCodigo = $disCodigo;
        return $this;
    }

    public function getDisIniciodata(){
        return $this->disIniciodata;
    }

    public function setDisIniciodata($disIniciodata){
        $this->disIniciodata = $disIniciodata;
        return $this;
    }

    public function getDisFimdata(){
        return $this->disFimdata;
    }

    public function setDisFimdata($disFimdata){
        $this->disFimdata = $disFimdata;
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

