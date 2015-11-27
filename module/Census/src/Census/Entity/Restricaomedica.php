<?php

namespace Census\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Restricaomedica
 *
 * @ORM\Table(name="restricaomedica", indexes={@ORM\Index(name="fk_restricaoMedica_policial1_idx", columns={"pol_Codigo"})})
 * @ORM\Entity
 */
class Restricaomedica
{
    /**
     * @var integer
     *
     * @ORM\Column(name="res_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rescodigo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="res_InicioData", type="date", nullable=false)
     */
    private $inicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="res_FinalData", type="date", nullable=false)
     */
    private $fim;

    /**
     * @var \Policial
     *
     * @ORM\OneToOne(targetEntity="Policial")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pol_Codigo", referencedColumnName="pol_Codigo")
     * })
     */
    private $polcodigo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Restricaotipo", inversedBy="rescodigo", cascade={"persist"})
     * @ORM\JoinTable(name="restricaomedica_restricaotipo",
     *   joinColumns={
     *     @ORM\JoinColumn(name="res_Codigo", referencedColumnName="res_Codigo")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ret_Codigo", referencedColumnName="ret_Codigo")
     *   }
     * )
     */
    private $retcodigo;

    /**
     * Constructor
     */
    public function __construct(array $data) {
 
    	$this->retcodigo = new \Doctrine\Common\Collections\ArrayCollection();
    	$hydrator = new ClassMethods();
    	$hydrator->hydrate($data, $this);
    }
    
    public function toArray()
    {
    	$hydrator = new ClassMethods();
    	return $hydrator->extract($this);
    }

    public function getRescodigo(){
        return $this->rescodigo;
    }

    public function setRescodigo($rescodigo){
        $this->rescodigo = $rescodigo;
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

    public function getRetcodigo(){
        return $this->retcodigo;
    }

    public function setRetcodigo($retcodigo){
        $this->retcodigo = $retcodigo;
        return $this;
    }

}