<?php

namespace Census\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Curso
 *
 * @ORM\Table(name="curso", indexes={@ORM\Index(name="fk_curso_policial1_idx", columns={"pol_Codigo"})})
 * @ORM\Entity
 */
class Curso
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cur_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $curCodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="cur_Nome", type="string", length=45, nullable=false)
     */
    private $curNome;

    /**
     * @var string
     *
     * @ORM\Column(name="cur_Unidade", type="string", length=45, nullable=true)
     */
    private $curUnidade;

    /**
     * @var string
     *
     * @ORM\Column(name="cur_CargaHoraria", type="string", length=45, nullable=false)
     */
    private $curCargahoraria;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cur_DataConclusao", type="date", nullable=false)
     */
    private $curDataconclusao;

    /**
     * @var string
     *
     * @ORM\Column(name="cur_Tipo", type="string", length=45, nullable=true)
     */
    private $curTipo;

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


    public function getCurCodigo(){
        return $this->curCodigo;
    }

    public function setCurCodigo($curCodigo){
        $this->curCodigo = $curCodigo;
        return $this;
    }

    public function getCurNome(){
        return $this->curNome;
    }

    public function setCurNome($curNome){
        $this->curNome = $curNome;
        return $this;
    }

    public function getCurUnidade(){
        return $this->curUnidade;
    }

    public function setCurUnidade($curUnidade){
        $this->curUnidade = $curUnidade;
        return $this;
    }

    public function getCurCargahoraria(){
        return $this->curCargahoraria;
    }

    public function setCurCargahoraria($curCargahoraria){
        $this->curCargahoraria = $curCargahoraria;
        return $this;
    }

    public function getCurDataconclusao(){
        return $this->curDataconclusao;
    }

    public function setCurDataconclusao($curDataconclusao){
        $this->curDataconclusao = $curDataconclusao;
        return $this;
    }

    public function getCurTipo(){
        return $this->curTipo;
    }

    public function setCurTipo($curTipo){
        $this->curTipo = $curTipo;
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

