<?php

namespace Census\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Alteracao
 *
 * @ORM\Table(name="alteracao", uniqueConstraints={@ORM\UniqueConstraint(name="alt_codigo_UNIQUE", columns={"alt_Codigo"})}, indexes={@ORM\Index(name="fk_alteracao_policial1_idx", columns={"pol_Codigo"})})
 * @ORM\Entity
 */
class Alteracao
{
    /**
     * @var integer
     *
     * @ORM\Column(name="alt_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="alt_Tipo", type="string", length=45, nullable=false)
     */
    private $tipo;
    
    /**
     * @var string
     *
     * @ORM\Column(name="alt_FaltaServico", type="string", length=1, nullable=false)
     */
    private $faltaservico;
    
    /**
     * @var string
     *
     * @ORM\Column(name="alt_QuantidadeDias", type="string", length=45, nullable=true)
     */
    private $quantidadedias;

    /**
     * @var string
     *
     * @ORM\Column(name="alt_Apuracao", type="string", length=45, nullable=true)
     */
    private $apuracao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="alt_DataApuracao", type="datetime", nullable=true)
     */
    private $dataapuracao;
    
    /**
     * @var string
     *
     * @ORM\Column(name="alt_Origem", type="string", length=45, nullable=true)
     */
    private $origem;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="alt_DataFato", type="datetime", nullable=true)
     */
    private $datafato;
    
    /**
     * @var string
     *
     * @ORM\Column(name="alt_Boletim", type="string", length=45, nullable=true)
     */
    private $boletim;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="alt_Data", type="datetime", nullable=true)
     */
    private $data;
    
    /**
     * @var string
     *
     * @ORM\Column(name="alt_Descricao", type="text", length=65535, nullable=true)
     */
    private $descricao;

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

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
        return $this;
    }

    public function getQuantidadedias(){
        return $this->quantidadedias;
    }

    public function setQuantidadedias($quantidadedias){
        $this->quantidadedias = $quantidadedias;
        return $this;
    }

    public function getApuracao(){
        return $this->apuracao;
    }

    public function setApuracao($apuracao){
        $this->apuracao = $apuracao;
        return $this;
    }

    public function getDataapuracao(){
        return $this->dataapuracao;
    }

    public function setDataapuracao($dataapuracao){
        $this->dataapuracao = new \DateTime($dataapuracao);
        return $this;
    }

    public function getOrigem(){
        return $this->origem;
    }

    public function setOrigem($origem){
        $this->origem = $origem;
        return $this;
    }

    public function getDatafato(){
        return $this->datafato;
    }

    public function setDatafato($datafato){
        $this->datafato = new \DateTime($datafato);
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

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
        return $this;
    }

    public function getPolcodigo(){
        return $this->polcodigo;
    }

    public function setPolcodigo($polcodigo){
        $this->polcodigo = $polcodigo;
        return $this;
    }


    public function getFaltaservico(){
        return $this->faltaservico;
    }

    public function setFaltaservico($faltaservico){
        $this->faltaservico = $faltaservico;
        return $this;
    }

}

