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
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="cur_Nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="cur_Unidade", type="string", length=45, nullable=true)
     */
    private $unidade;

    /**
     * @var string
     *
     * @ORM\Column(name="cur_CargaHoraria", type="string", length=45, nullable=false)
     */
    private $cargahoraria;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cur_DataConclusao", type="date", nullable=false)
     */
    private $dataconclusao;

    /**
     * @var string
     *
     * @ORM\Column(name="cur_Tipo", type="string", length=45, nullable=true)
     */
    private $tipo;

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

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }

    public function getUnidade(){
        return $this->unidade;
    }

    public function setUnidade($unidade){
        $this->unidade = $unidade;
        return $this;
    }

    public function getCargahoraria(){
        return $this->cargahoraria;
    }

    public function setCargahoraria($cargahoraria){
        $this->cargahoraria = $cargahoraria;
        return $this;
    }

    public function getDataconclusao(){
        return $this->dataconclusao;
    }

    public function setDataconclusao($dataconclusao){
        $this->dataconclusao = new \DateTime($dataconclusao);
        return $this;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
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

