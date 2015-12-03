<?php

namespace Census\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Requerimentoabono
 *
 * @ORM\Table(name="requerimentoabono", indexes={@ORM\Index(name="fk_requerimentoAbono_policial1_idx", columns={"pol_Codigo"})})
 * @ORM\Entity
 */
class Requerimentoabono
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rab_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rab_Inicio", type="datetime", nullable=false)
     */
    private $inicio;

    /**
     * @var integer
     *
     * @ORM\Column(name="rab_QuantidadeDias", type="integer", nullable=false)
     */
    private $quantidadedias;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rab_DataSolicitacao", type="datetime", nullable=false)
     */
    private $datasolicitacao;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_Decisao", type="string", length=45, nullable=true)
     */
    private $decisao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rab_DataDecisao", type="datetime", nullable=true)
     */
    private $datadecisao;

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

    public function getInicio(){
        return $this->inicio;
    }

    public function setInicio($inicio){
        $this->inicio = new \DateTime($inicio);
        return $this;
    }

    public function getQuantidadedias(){
        return $this->quantidadedias;
    }

    public function setQuantidadedias($quantidadedias){
        $this->quantidadedias = $quantidadedias;
        return $this;
    }

    public function getDatasolicitacao(){
        return $this->datasolicitacao;
    }

    public function setDatasolicitacao($datasolicitacao){
        $this->datasolicitacao = new \DateTime($datasolicitacao);
        return $this;
    }

    public function getDecisao(){
        return $this->decisao;
    }

    public function setDecisao($decisao){
        $this->decisao = $decisao;
        return $this;
    }

    public function getDatadecisao(){
        return $this->datadecisao;
    }

    public function setDatadecisao($datadecisao){
        if ($datadecisao)
        {
        	$this->datadecisao = new \DateTime($datadecisao);
        } else 
        {
        	$this->datadecisao = NULL;
        }
        	
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

