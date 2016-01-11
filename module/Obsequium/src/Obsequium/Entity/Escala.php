<?php

namespace Obsequium\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Escala
 *
 * @ORM\Table(name="escala", indexes={@ORM\Index(name="fk_escala_policial1_idx", columns={"pol_Codigo"})})
 * @ORM\Entity
 */
class Escala
{
    /**
     * @var integer
     *
     * @ORM\Column(name="esc_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="esc_tipo", type="string", length=45, nullable=false)
     */
    private $tipo;

    /**
     * @var integer
     *
     * @ORM\Column(name="esc_qtd_folgas", type="integer", nullable=false)
     */
    private $qtdfolgas;

    /**
     * @var boolean
     *
     * @ORM\Column(name="esc_escalado", type="boolean", nullable=false)
     */
    private $escalado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="esc_data", type="datetime", nullable=false)
     */
    private $data;

    /**
     * @var boolean
     *
     * @ORM\Column(name="esc_apto", type="boolean", nullable=false)
     */
    private $apto;

    /**
     * @var string
     *
     * @ORM\Column(name="esc_equipe", type="string", length=60, nullable=true)
     */
    private $equipe;

    /**
     * @var string
     *
     * @ORM\Column(name="esc_posto", type="string", length=120, nullable=false)
     */
    private $posto;

    /**
     * @var string
     *
     * @ORM\Column(name="esc_funcao", type="string", length=125, nullable=false)
     */
    private $funcao;

    /**
     * @var string
     *
     * @ORM\Column(name="esc_uniforme", type="string", length=60, nullable=false)
     */
    private $uniforme;

    /**
     * @var \Policial
     *
     * @ORM\ManyToOne(targetEntity="\Census\Entity\Policial")
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

    public function getQtdfolgas(){
        return $this->qtdfolgas;
    }

    public function setQtdfolgas($qtdfolgas){
        $this->qtdfolgas = $qtdfolgas;
        return $this;
    }

    public function getEscalado(){
        return $this->escalado;
    }

    public function setEscalado($escalado){
        $this->escalado = $escalado;
        return $this;
    }

    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data = new \DateTime($data);
        return $this;
    }

    public function getApto(){
        return $this->apto;
    }

    public function setApto($apto){
        $this->apto = $apto;
        return $this;
    }

    public function getEquipe(){
        return $this->equipe;
    }

    public function setEquipe($equipe){
        $this->equipe = $equipe;
        return $this;
    }

    public function getPosto(){
        return $this->posto;
    }

    public function setPosto($posto){
        $this->posto = $posto;
        return $this;
    }

    public function getFuncao(){
        return $this->funcao;
    }

    public function setFuncao($funcao){
        $this->funcao = $funcao;
        return $this;
    }

    public function getUniforme(){
        return $this->uniforme;
    }

    public function setUniforme($uniforme){
        $this->uniforme = $uniforme;
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

