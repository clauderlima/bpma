<?php

namespace Census\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Ctgrafi
 *
 * @ORM\Table(name="ctgrafi", uniqueConstraints={@ORM\UniqueConstraint(name="ctg_Codigo_UNIQUE", columns={"ctg_Codigo"})}, indexes={@ORM\Index(name="fk_ctgraf_arma1_idx", columns={"arm_Codigo"}), @ORM\Index(name="fk_ctgraf_policial1_idx", columns={"pol_Codigo"})})
 * @ORM\Entity
 */
class Ctgrafi
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ctg_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="ctg_Numero", type="string", length=45, nullable=false)
     */
    private $numero;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ctg_Boletim", type="string", length=45, nullable=false)
     */
    private $boletim;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ctg_Data", type="datetime", nullable=false)
     */
    private $data;

    /**
     * @var \Arma
     *
     * @ORM\ManyToOne(targetEntity="Hereditas\Entity\Arma")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="arm_Codigo", referencedColumnName="arm_Codigo")
     * })
     */
    private $armcodigo;

    /**
     * @var \Policial
     *
     * @ORM\ManyToOne(targetEntity="Policial")
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

    public function getBoletim(){
        return $this->boletim;
    }

    public function setBoletim($boletim){
        $this->boletim = $boletim;
        return $this;
    }

    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data = new \DateTime($data);
        return $this;
    }

    public function getArmcodigo(){
        return $this->armcodigo;
    }

    public function setArmcodigo($armcodigo){
        $this->armcodigo = $armcodigo;
        return $this;
    }

    public function getPolcodigo(){
        return $this->polcodigo;
    }

    public function setPolcodigo($polcodigo){
        $this->polcodigo = $polcodigo;
        return $this;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
        return $this;
    }

}

