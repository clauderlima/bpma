<?php

namespace Census\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Abono
 *
 * @ORM\Table(name="abono", indexes={@ORM\Index(name="fk_requerimentoAbono_policial1_idx", columns={"pol_Codigo"}), @ORM\Index(name="fk_requerimentoAbono_numeracao_requerimento1_idx", columns={"nab_Codigo"})})
 * @ORM\Entity
 */
class Abono
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
     * @var string
     *
     * @ORM\Column(name="rab_Numero", type="string", length=45, nullable=true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_NomePolicial", type="string", length=150, nullable=true)
     */
    private $nomepolicial;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_PostoGraduacao", type="string", length=25, nullable=true)
     */
    private $postograduacao;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_Matricula", type="string", length=25, nullable=true)
     */
    private $matricula;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_MatriculaSiape", type="string", length=25, nullable=true)
     */
    private $matriculasiape;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_IdentificacaoUnica", type="string", length=25, nullable=true)
     */
    private $identificacaounica;

    /**
     * @var integer
     *
     * @ORM\Column(name="rab_QuantidadeDias", type="integer", nullable=false)
     */
    private $quantidadedias;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rab_InicioAbono", type="datetime", nullable=true)
     */
    private $inicioabono;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rab_FimAbono", type="datetime", nullable=true)
     */
    private $fimabono;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rab_DataSolicitacao", type="datetime", nullable=true)
     */
    private $datasolicitacao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rab_DataInclusao", type="datetime", nullable=true)
     */
    private $datainclusao;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_Email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_Comportamento", type="string", length=25, nullable=true)
     */
    private $comportamento;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_Telefone", type="string", length=45, nullable=true)
     */
    private $telefone;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_FaltaInjustificada", type="string", length=250, nullable=true)
     */
    private $faltainjustificada;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_GozosAnteriores", type="string", length=250, nullable=true)
     */
    private $gozosanteriores;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_Sargenteante", type="string", length=150, nullable=true)
     */
    private $sargenteante;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_FuncaoSargenteante", type="string", length=45, nullable=true)
     */
    private $funcaosargenteante;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_ChefeNGP", type="string", length=150, nullable=true)
     */
    private $chefengp;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_FuncaoChefeNGP", type="string", length=45, nullable=true)
     */
    private $funcaochefengp;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_ChefeSad", type="string", length=150, nullable=true)
     */
    private $chefesad;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_FuncaoChefeSad", type="string", length=45, nullable=true)
     */
    private $funcaochefesad;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_Lotacao", type="string", length=80, nullable=true)
     */
    private $lotacao;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_ChefeImediato", type="string", length=150, nullable=true)
     */
    private $chefeimediato;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_FuncaoChefe", type="string", length=45, nullable=true)
     */
    private $funcaochefe;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_Comandante", type="string", length=150, nullable=true)
     */
    private $comandante;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_FuncaoComandante", type="string", length=45, nullable=true)
     */
    private $funcaocomandante;

    /**
     * @var string
     *
     * @ORM\Column(name="rab_Decisao", type="string", length=30, nullable=true)
     */
    private $decisao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rab_DataDecisao", type="datetime", nullable=true)
     */
    private $datadecisao;
    
    /**
     * @var string
     *
     * @ORM\Column(name="rab_Template", type="string", length=30, nullable=true)
     */
    private $template;

    /**
     * @var \NumeracaoRequerimento
     *
     * @ORM\ManyToOne(targetEntity="NumeracaoRequerimento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nre_Codigo", referencedColumnName="nre_Codigo")
     * })
     */
    private $nrecodigo;

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

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
        return $this;
    }

    public function getNomepolicial(){
        return $this->nomepolicial;
    }

    public function setNomepolicial($nomepolicial){
        $this->nomepolicial = $nomepolicial;
        return $this;
    }

    public function getPostograduacao(){
        return $this->postograduacao;
    }

    public function setPostograduacao($postograduacao){
        $this->postograduacao = $postograduacao;
        return $this;
    }

    public function getMatricula(){
        return $this->matricula;
    }

    public function setMatricula($matricula){
        $this->matricula = $matricula;
        return $this;
    }

    public function getMatriculasiape(){
        return $this->matriculasiape;
    }

    public function setMatriculasiape($matriculasiape){
        $this->matriculasiape = $matriculasiape;
        return $this;
    }

    public function getIdentificacaounica(){
        return $this->identificacaounica;
    }

    public function setIdentificacaounica($identificacaounica){
        $this->identificacaounica = $identificacaounica;
        return $this;
    }

    public function getQuantidadedias(){
        return $this->quantidadedias;
    }

    public function setQuantidadedias($quantidadedias){
        $this->quantidadedias = $quantidadedias;
        return $this;
    }

    public function getInicioabono(){
        return $this->inicioabono;
    }

    public function setInicioabono($inicioabono){
        $this->inicioabono = new \DateTime($inicioabono);
        return $this;
    }

    public function getFimabono(){
        return $this->fimabono;
    }

    public function setFimabono($fimabono){
        $this->fimabono = new \DateTime($fimabono);
        return $this;
    }

    public function getDatasolicitacao(){
        return $this->datasolicitacao;
    }

    public function setDatasolicitacao($datasolicitacao){
        $this->datasolicitacao = new \DateTime($datasolicitacao);
        return $this;
    }

    public function getDatainclusao(){
        return $this->datainclusao;
    }

    public function setDatainclusao($datainclusao){
        $this->datainclusao = new \DateTime($datainclusao);
        return $this;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
        return $this;
    }

    public function getComportamento(){
        return $this->comportamento;
    }

    public function setComportamento($comportamento){
        $this->comportamento = $comportamento;
        return $this;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
        return $this;
    }

    public function getFaltainjustificada(){
        return $this->faltainjustificada;
    }

    public function setFaltainjustificada($faltainjustificada){
        $this->faltainjustificada = $faltainjustificada;
        return $this;
    }

    public function getGozosanteriores(){
        return $this->gozosanteriores;
    }

    public function setGozosanteriores($gozosanteriores){
        $this->gozosanteriores = $gozosanteriores;
        return $this;
    }

    public function getSargenteante(){
        return $this->sargenteante;
    }

    public function setSargenteante($sargenteante){
        $this->sargenteante = $sargenteante;
        return $this;
    }

    public function getFuncaosargenteante(){
        return $this->funcaosargenteante;
    }

    public function setFuncaosargenteante($funcaosargenteante){
        $this->funcaosargenteante = $funcaosargenteante;
        return $this;
    }

    public function getChefengp(){
        return $this->chefengp;
    }

    public function setChefengp($chefengp){
        $this->chefengp = $chefengp;
        return $this;
    }

    public function getFuncaochefengp(){
        return $this->funcaochefengp;
    }

    public function setFuncaochefengp($funcaochefengp){
        $this->funcaochefengp = $funcaochefengp;
        return $this;
    }

    public function getChefesad(){
        return $this->chefesad;
    }

    public function setChefesad($chefesad){
        $this->chefesad = $chefesad;
        return $this;
    }

    public function getFuncaochefesad(){
        return $this->funcaochefesad;
    }

    public function setFuncaochefesad($funcaochefesad){
        $this->funcaochefesad = $funcaochefesad;
        return $this;
    }

    public function getLotacao(){
        return $this->lotacao;
    }

    public function setLotacao($lotacao){
        $this->lotacao = $lotacao;
        return $this;
    }

    public function getChefeimediato(){
        return $this->chefeimediato;
    }

    public function setChefeimediato($chefeimediato){
        $this->chefeimediato = $chefeimediato;
        return $this;
    }

    public function getFuncaochefe(){
        return $this->funcaochefe;
    }

    public function setFuncaochefe($funcaochefe){
        $this->funcaochefe = $funcaochefe;
        return $this;
    }

    public function getComandante(){
        return $this->comandante;
    }

    public function setComandante($comandante){
        $this->comandante = $comandante;
        return $this;
    }

    public function getFuncaocomandante(){
        return $this->funcaocomandante;
    }

    public function setFuncaocomandante($funcaocomandante){
        $this->funcaocomandante = $funcaocomandante;
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
        if ($datadecisao != "")
        {
        	$this->datadecisao = new \DateTime($datadecisao);
        }
    	
        return $this;
    }

    public function getNrecodigo(){
        return $this->nrecodigo;
    }

    public function setNrecodigo($nrecodigo){
        $this->nrecodigo = $nrecodigo;
        return $this;
    }

    public function getPolcodigo(){
        return $this->polcodigo;
    }

    public function setPolcodigo($polcodigo){
        $this->polcodigo = $polcodigo;
        return $this;
    }


    public function getTemplate(){
        return $this->template;
    }

    public function setTemplate($template){
        $this->template = $template;
        return $this;
    }

}

