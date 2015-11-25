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

    public function getcodigo(){
        return $this->codigo;
    }

    public function setcodigo($codigo){
        $this->codigo = $codigo;
        return $this;
    }

    public function getopcao1(){
        return $this->opcao1;
    }

    public function setopcao1($opcao1){
        $this->opcao1 = $opcao1;
        return $this;
    }

    public function getopcao2(){
        return $this->opcao2;
    }

    public function setopcao2($opcao2){
        $this->opcao2 = $opcao2;
        return $this;
    }

    public function getopcao3(){
        return $this->opcao3;
    }

    public function setopcao3($opcao3){
        $this->opcao3 = $opcao3;
        return $this;
    }

    public function getanoreferencia(){
        return $this->anoreferencia;
    }

    public function setanoreferencia($anoreferencia){
        $this->anoreferencia = $anoreferencia;
        return $this;
    }

    public function getprogramacao(){
        return $this->programacao;
    }

    public function setprogramacao($programacao){
        $this->programacao = $programacao;
        return $this;
    }

    public function getpolcodigo(){
        return $this->polcodigo;
    }

    public function setpolcodigo($polcodigo){
        $this->polcodigo = $polcodigo;
        return $this;
    }

}

