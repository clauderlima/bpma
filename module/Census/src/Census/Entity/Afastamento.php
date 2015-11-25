<?php

namespace Census\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Afastamento
 *
 * @ORM\Table(name="afastamento", indexes={@ORM\Index(name="fk_afastamento_policial1_idx", columns={"pol_Codigo"})})
 * @ORM\Entity
 */
class Afastamento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="afa_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $afaCodigo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="afa_Tipo", type="boolean", nullable=true)
     */
    private $afaTipo;

    /**
     * @var string
     *
     * @ORM\Column(name="afa_Referencia", type="string", length=4, nullable=true)
     */
    private $afaReferencia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="afa_DataInicio", type="date", nullable=true)
     */
    private $afaDatainicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="afa_DataFim", type="date", nullable=true)
     */
    private $afaDatafim;
    
    /**
     * @var string
     *
     * @ORM\Column(name="afa_Observacao", type="string", length=240, nullable=true)
     */
    private $afaObservacao;

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

    public function getAfaCodigo(){
        return $this->afaCodigo;
    }

    public function getAfaTipo(){
        return $this->afaTipo;
    }

    public function setAfaTipo($afaTipo){
        $this->afaTipo = $afaTipo;
        return $this;
    }

    public function getAfaReferencia(){
        return $this->afaReferencia;
    }

    public function setAfaReferencia($afaReferencia){
        $this->afaReferencia = $afaReferencia;
        return $this;
    }

    public function getAfaDatainicio(){
        return $this->afaDatainicio;
    }

    public function setAfaDatainicio($afaDatainicio){
        $this->afaDatainicio = new \DateTime($afaDatainicio);
        return $this;
    }

    public function getAfaDatafim(){
        return $this->afaDatafim;
    }

    public function setAfaDatafim($afaDatafim){
        $this->afaDatafim = new \Datetime($afaDatafim);
        return $this;
    }

    public function getAfaObservacao(){
        return $this->afaObservacao;
    }

    public function setAfaObservacao($afaObservacao){
        $this->afaObservacao = $afaObservacao;
        return $this;
    }

    public function getPolCodigo(){
        return $this->polCodigo;
    }

}

