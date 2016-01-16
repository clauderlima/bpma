<?php

namespace Scriba\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Encaminhamento
 *
 * @ORM\Table(name="encaminhamento", indexes={@ORM\Index(name="fk_encaminhamento_policial1_idx", columns={"pol_Codigo"}), @ORM\Index(name="fk_encaminhamento_documento1_idx", columns={"doc_Codigo"}), @ORM\Index(name="fk_encaminhamento_encaminhamento1_idx", columns={"enc_Encaminhamento"})})
 * @ORM\Entity
 * 
 */
class Encaminhamento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="enc_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="enc_Secao", type="string", length=120, nullable=false)
     */
    private $secao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="enc_Data", type="datetime", nullable=false)
     */
    private $data;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enc_Status", type="string", length=45, nullable=true)
     */
    private $status;

    /**
     * @var \Documento
     *
     * @ORM\ManyToOne(targetEntity="Documento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="doc_Codigo", referencedColumnName="doc_Codigo")
     * })
     */
    private $doccodigo;

    /**
     * @var \Encaminhamento
     *
     * @ORM\ManyToOne(targetEntity="Encaminhamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="enc_Encaminhamento", referencedColumnName="enc_Codigo")
     * })
     */
    private $encaminhamento;

    /**
     * @var \Policial
     *
     * @ORM\ManyToOne(targetEntity="Census\Entity\Policial")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pol_Codigo", referencedColumnName="pol_Codigo")
     * })
     * 
     */
    private $polcodigo;
    
    /**
     * @var \Policial
     *
     * @ORM\ManyToOne(targetEntity="Census\Entity\Policial")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pol_CodigoTramitador", referencedColumnName="pol_Codigo")
     * })
     *
     */
    private $polcodigotramitador;

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

    public function getSecao(){
        return $this->secao;
    }

    public function setSecao($secao){
        $this->secao = $secao;
        return $this;
    }

    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data = new \DateTime($data);
        return $this;
    }

    public function getDoccodigo(){
        return $this->doccodigo;
    }

    public function setDoccodigo($doccodigo){
        $this->doccodigo = $doccodigo;
        return $this;
    }

    public function getEncaminhamento(){
        return $this->encaminhamento;
    }

    public function setEncaminhamento($encaminhamento){
        $this->encaminhamento = $encaminhamento;
        return $this;
    }

    public function getPolcodigo(){
        return $this->polcodigo;
    }

    public function setPolcodigo($polcodigo){
        $this->polcodigo = $polcodigo;
        return $this;
    }
    
    public function getStatus(){
    	return $this->status;
    }
    
    public function setStatus($status){
    	$this->status = $status;
    	return $this;
    }


    public function getPolcodigotramitador(){
        return $this->polcodigotramitador;
    }

    public function setPolcodigotramitador($polcodigotramitador){
        $this->polcodigotramitador = $polcodigotramitador;
        return $this;
    }

}

