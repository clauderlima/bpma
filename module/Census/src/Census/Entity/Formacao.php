<?php

namespace Census\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Formacao
 *
 * @ORM\Table(name="formacao", indexes={@ORM\Index(name="fk_formacao_policial1_idx", columns={"pol_Codigo"})})
 * @ORM\Entity
 */
class Formacao
{
    /**
     * @var integer
     *
     * @ORM\Column(name="for_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="for_Tipo", type="string", length=45, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="for_Nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="for_Conclusao", type="date", nullable=true)
     */
    private $conclusao;

    /**
     * @var string
     *
     * @ORM\Column(name="for_Instituicao", type="string", length=45, nullable=true)
     */
    private $instituicao;

    /**
     * @var string
     *
     * @ORM\Column(name="for_AreaConhecimento", type="string", length=45, nullable=true)
     */
    private $areaconhecimento;

    /**
     * @var \Policial
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Policial")
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

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }

    public function getConclusao(){
        return $this->conclusao;
    }

    public function setConclusao($conclusao){
        $this->conclusao = new \DateTime($conclusao);
        return $this;
    }

    public function getInstituicao(){
        return $this->instituicao;
    }

    public function setInstituicao($instituicao){
        $this->instituicao = $instituicao;
        return $this;
    }

    public function getAreaconhecimento(){
        return $this->areaconhecimento;
    }

    public function setAreaconhecimento($areaconhecimento){
        $this->areaconhecimento = $areaconhecimento;
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

