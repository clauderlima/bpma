<?php

namespace Census\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Ferias
 *
 * @ORM\Table(name="ferias", indexes={@ORM\Index(name="fk_ferias_policial1_idx", columns={"pol_Codigo"})})
 * @ORM\Entity
 */
class Ferias
{
    /**
     * @var integer
     *
     * @ORM\Column(name="fer_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="fer_Opcao1", type="string", length=45, nullable=true)
     */
    private $opcao1;

    /**
     * @var string
     *
     * @ORM\Column(name="fer_Opcao2", type="string", length=45, nullable=true)
     */
    private $opcao2;

    /**
     * @var string
     *
     * @ORM\Column(name="fer_Opcao3", type="string", length=45, nullable=true)
     */
    private $opcao3;

    /**
     * @var string
     *
     * @ORM\Column(name="fer_AnoReferencia", type="string", length=4, nullable=true)
     */
    private $anoreferencia;

    /**
     * @var string
     *
     * @ORM\Column(name="fer_Programacao", type="string", length=45, nullable=true)
     */
    private $programacao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fer_Inicio", type="datetime", nullable=true)
     */
    private $inicio;

    /**
     * @var integer
     *
     * @ORM\Column(name="fer_Parcela", type="integer", nullable=true)
     */
    private $parcela;

    /**
     * @var string
     *
     * @ORM\Column(name="fer_NaoGozo", type="string", length=25, nullable=true)
     */
    private $naogozo;

    /**
     * @var string
     *
     * @ORM\Column(name="fer_Boletim", type="string", length=45, nullable=true)
     */
    private $boletim;

    /**
     * @var integer
     *
     * @ORM\Column(name="fer_QtdDias", type="integer", nullable=true)
     */
    private $qtddias;

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

    public function getOpcao1(){
        return $this->opcao1;
    }

    public function setOpcao1($opcao1){
        $this->opcao1 = $opcao1;
        return $this;
    }

    public function getOpcao2(){
        return $this->opcao2;
    }

    public function setOpcao2($opcao2){
        $this->opcao2 = $opcao2;
        return $this;
    }

    public function getOpcao3(){
        return $this->opcao3;
    }

    public function setOpcao3($opcao3){
        $this->opcao3 = $opcao3;
        return $this;
    }

    public function getAnoreferencia(){
        return $this->anoreferencia;
    }

    public function setAnoreferencia($anoreferencia){
        $this->anoreferencia = $anoreferencia;
        return $this;
    }

    public function getProgramacao(){
        return $this->programacao;
    }

    public function setProgramacao($programacao){
        $this->programacao = $programacao;
        return $this;
    }

    public function getInicio(){
        return $this->inicio;
    }

    public function setInicio($inicio){
        if ($inicio) $this->inicio = new \DateTime($inicio);
        return $this;
    }

    public function getParcela(){
        return $this->parcela;
    }

    public function setParcela($parcela){
        $this->parcela = $parcela;
        return $this;
    }

    public function getNaogozo(){
        return $this->naogozo;
    }

    public function setNaogozo($naogozo){
        $this->naogozo = $naogozo;
        return $this;
    }

    public function getBoletim(){
        return $this->boletim;
    }

    public function setBoletim($boletim){
        $this->boletim = $boletim;
        return $this;
    }

    public function getQtddias(){
        return $this->qtddias;
    }

    public function setQtddias($qtddias){
        $this->qtddias = $qtddias;
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

