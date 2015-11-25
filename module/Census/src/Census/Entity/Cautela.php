<?php

namespace Census\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Cautela
 *
 * @ORM\Table(name="cautela", indexes={@ORM\Index(name="fk_cautela_policial1_idx", columns={"pol_Codigo"})})
 * @ORM\Entity
 */
class Cautela
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cau_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cauCodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="cau_Material", type="string", length=45, nullable=true)
     */
    private $cauMaterial;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cau_Data", type="date", nullable=true)
     */
    private $cauData;

    /**
     * @var string
     *
     * @ORM\Column(name="cau_Descricao", type="string", length=45, nullable=true)
     */
    private $cauDescricao;

    /**
     * @var string
     *
     * @ORM\Column(name="cau_NumeroSerie", type="string", length=45, nullable=true)
     */
    private $cauNumeroserie;

    /**
     * @var string
     *
     * @ORM\Column(name="cau_Tombamento", type="string", length=45, nullable=true)
     */
    private $cauTombamento;

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


    public function getCauCodigo(){
        return $this->cauCodigo;
    }

    public function setCauCodigo($cauCodigo){
        $this->cauCodigo = $cauCodigo;
        return $this;
    }

    public function getCauMaterial(){
        return $this->cauMaterial;
    }

    public function setCauMaterial($cauMaterial){
        $this->cauMaterial = $cauMaterial;
        return $this;
    }

    public function getCauData(){
        return $this->cauData;
    }

    public function setCauData($cauData){
        $this->cauData = $cauData;
        return $this;
    }

    public function getCauDescricao(){
        return $this->cauDescricao;
    }

    public function setCauDescricao($cauDescricao){
        $this->cauDescricao = $cauDescricao;
        return $this;
    }

    public function getCauNumeroserie(){
        return $this->cauNumeroserie;
    }

    public function setCauNumeroserie($cauNumeroserie){
        $this->cauNumeroserie = $cauNumeroserie;
        return $this;
    }

    public function getCauTombamento(){
        return $this->cauTombamento;
    }

    public function setCauTombamento($cauTombamento){
        $this->cauTombamento = $cauTombamento;
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

