<?php

namespace Scriba\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Protocolo
 *
 * @ORM\Table(name="protocolo", indexes={@ORM\Index(name="fk_protocolo_policial1_idx", columns={"pol_Codigo"})})
 * @ORM\Entity
 */
class Protocolo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pro_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_Tipo", type="string", length=100, nullable=false)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_Numero", type="string", length=45, nullable=false)
     */
    private $numero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pro_Recebimento", type="datetime", nullable=false)
     */
    private $recebimento;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_Secao", type="string", length=100, nullable=true)
     */
    private $secao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pro_Encaminhamento", type="datetime", nullable=true)
     */
    private $encaminhamento;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_Acao", type="string", length=45, nullable=true)
     */
    private $acao;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_Assunto", type="string", length=250, nullable=true)
     */
    private $assunto;

    /**
     * @var \Policial
     *
     * @ORM\ManyToOne(targetEntity="Census\Entity\Policial")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pol_Codigo", referencedColumnName="pol_Codigo")
     * })
     */
    private $polcodigo;

    public function __construct(array $data)
    {
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

    public function getRecebimento(){
        return $this->recebimento;
    }

    public function setRecebimento($recebimento){
        $this->recebimento = new \DateTime($recebimento);
        return $this;
    }

    public function getSecao(){
        return $this->secao;
    }

    public function setSecao($secao){
        $this->secao = $secao;
        return $this;
    }

    public function getEncaminhamento(){
        return $this->encaminhamento;
    }

    public function setEncaminhamento($encaminhamento){
        $this->encaminhamento = new \DateTime($encaminhamento);
        return $this;
    }

    public function getAcao(){
        return $this->acao;
    }

    public function setAcao($acao){
        $this->acao = $acao;
        return $this;
    }

    public function getAssunto(){
        return $this->assunto;
    }

    public function setAssunto($assunto){
        $this->assunto = $assunto;
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

