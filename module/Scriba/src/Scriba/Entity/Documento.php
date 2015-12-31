<?php

namespace Scriba\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Documento
 *
 * @ORM\Table(name="documento", indexes={@ORM\Index(name="fk_documento_protocolo1_idx", columns={"pro_Codigo"}), @ORM\Index(name="fk_documento_policial1_idx", columns={"pol_Codigo"})})
 * @ORM\Entity
 */
class Documento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="doc_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="doc_Tipo", type="string", length=100, nullable=false)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="doc_Numero", type="string", length=45, nullable=false)
     */
    private $numero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="doc_Data", type="datetime", nullable=false)
     */
    private $data;

    /**
     * @var string
     *
     * @ORM\Column(name="doc_Assunto", type="string", length=250, nullable=true)
     */
    private $assunto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="doc_Recebimento", type="datetime", nullable=false)
     */
    private $recebimento;

    /**
     * @var string
     *
     * @ORM\Column(name="doc_Status", type="string", length=45, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="doc_Origem", type="string", length=120, nullable=true)
     */
    private $origem;

    /**
     * @var \Policial
     *
     * @ORM\OneToOne(targetEntity="\Census\Entity\Policial")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pol_Codigo", referencedColumnName="pol_Codigo")
     * })
     */
    private $polcodigo;

    /**
     * @var \Protocolo
     *
     * @ORM\OneToOne(targetEntity="Protocolo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pro_Codigo", referencedColumnName="pro_Codigo")
     * })
     */
    private $procodigo;
    
    /**
     * @var \Encaminhamento
     *
     * @ORM\OneToOne(targetEntity="Encaminhamento", mappedBy="doccodigo")
     */
    private $enccodigo;

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

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
        return $this;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
        return $this;
    }

    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data = new \Datetime($data);
        return $this;
    }

    public function getAssunto(){
        return $this->assunto;
    }

    public function setAssunto($assunto){
        $this->assunto = $assunto;
        return $this;
    }

    public function getRecebimento(){
        return $this->recebimento;
    }

    public function setRecebimento($recebimento){
        $this->recebimento = new \Datetime($recebimento);
        return $this;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
        return $this;
    }

    public function getOrigem(){
        return $this->origem;
    }

    public function setOrigem($origem){
        $this->origem = $origem;
        return $this;
    }

    public function getPolcodigo(){
        return $this->polcodigo;
    }

    public function setPolcodigo($polcodigo){
        $this->polcodigo = $polcodigo;
        return $this;
    }

    public function getProcodigo(){
        return $this->procodigo;
    }

    public function setProcodigo($procodigo){
        $this->procodigo = $procodigo;
        return $this;
    }


    public function getEnccodigo(){
        return $this->enccodigo;
    }

    public function setEnccodigo($enccodigo){
        $this->enccodigo = $enccodigo;
        return $this;
    }

}

