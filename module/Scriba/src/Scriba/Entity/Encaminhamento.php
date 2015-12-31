<?php

namespace Scriba\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Encaminhamento
 *
 * @ORM\Table(name="encaminhamento", indexes={@ORM\Index(name="fk_encaminhamento_policial1_idx", columns={"pol_Codigo"}), @ORM\Index(name="fk_encaminhamento_documento1_idx", columns={"doc_Codigo"})})
 * @ORM\Entity
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
     * @var integer
     *
     * @ORM\Column(name="enc_Encaminhamento", type="integer", nullable=true)
     */
    private $encaminhamento;

    /**
     * @var \Documento
     *
     * @ORM\OneToOne(targetEntity="Documento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="doc_Codigo", referencedColumnName="doc_Codigo")
     * })
     */
    private $doccodigo;

    /**
     * @var \Policial
     *
     * @ORM\OneToOne(targetEntity="\Census\Entity\Policial")
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
        $this->data = new \Datetime($data);
        return $this;
    }

    public function getEncaminhamento(){
        return $this->encaminhamento;
    }

    public function setEncaminhamento($encaminhamento){
        $this->encaminhamento = $encaminhamento;
        return $this;
    }

    public function getDoccodigo(){
        return $this->doccodigo;
    }

    public function setDoccodigo($doccodigo){
        $this->doccodigo = $doccodigo;
        return $this;
    }

    public function getPolcodigo(){
        return $this->polcodigo;
    }

    public function setPolcodigo($polcodigo){
        $this->polcodigo = $polcodigo;
        return $this;
    }

}

