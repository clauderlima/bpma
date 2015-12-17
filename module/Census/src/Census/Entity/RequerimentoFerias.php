<?php

namespace Census\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * RequerimentoFerias
 *
 * @ORM\Table(name="requerimento_ferias", indexes={@ORM\Index(name="fk_requerimento_ferias_numeracao_requerimento1_idx", columns={"nre_Codigo"}), @ORM\Index(name="fk_requerimento_ferias_policial1_idx", columns={"pol_Codigo"})})
 * @ORM\Entity
 */
class RequerimentoFerias
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rfe_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_Numero", type="string", length=45, nullable=true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_Tipo", type="string", length=45, nullable=true)
     */
    private $tipo;
    
    /**
     * @var string
     *
     * @ORM\Column(name="rfe_NomePolicial", type="string", length=150, nullable=true)
     */
    private $nomepolicial;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_PostoGraduacao", type="string", length=25, nullable=true)
     */
    private $postograduacao;
    
    /**
     * @var string
     *
     * @ORM\Column(name="rfe_Matricula", type="string", length=25, nullable=true)
     */
    private $matricula;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_MatriculaSiape", type="string", length=25, nullable=true)
     */
    private $matriculasiape;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_IdentificacaoUnica", type="string", length=25, nullable=true)
     */
    private $identificacaounica;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_AnoReferencia", type="string", length=4, nullable=true)
     */
    private $anoreferencia;
    
    /**
     * @var string
     *
     * @ORM\Column(name="rfe_FeriasProgramacao", type="string", length=45, nullable=true)
     */
    private $feriasprogramacao;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_NovaProgramacao", type="string", length=45, nullable=true)
     */
    private $novaprogramacao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rfe_DataSolicitacao", type="datetime", nullable=true)
     */
    private $datasolicitacao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rfe_DataInclusao", type="datetime", nullable=true)
     */
    private $datainclusao;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_Email", type="string", length=150, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_Comportamento", type="string", length=45, nullable=true)
     */
    private $comportamento;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_Telefone", type="string", length=45, nullable=true)
     */
    private $telefone;

    /**
     * @var integer
     *
     * @ORM\Column(name="rfe_PolFeriasBatalhao", type="integer", nullable=true)
     */
    private $polferiasbatalhao;

    /**
     * @var integer
     *
     * @ORM\Column(name="rfe_UmDozeBatalhao", type="integer", nullable=true)
     */
    private $umdozebatalhao;

    /**
     * @var integer
     *
     * @ORM\Column(name="rfe_PolFeriasSubUnidade", type="integer", nullable=true)
     */
    private $polferiassubunidade;

    /**
     * @var integer
     *
     * @ORM\Column(name="rfe_UmDozeSubUnidade", type="integer", nullable=true)
     */
    private $umdozesubunidade;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_Sargenteante", type="string", length=150, nullable=true)
     */
    private $sargenteante;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_FuncaoSargenteante", type="string", length=45, nullable=true)
     */
    private $funcaosargenteante;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_ChefeNGP", type="string", length=150, nullable=true)
     */
    private $chefengp;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_FuncaoChefeNGP", type="string", length=45, nullable=true)
     */
    private $funcaochefengp;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_ChefeSAd", type="string", length=150, nullable=true)
     */
    private $chefesad;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_FuncaoChefeSAd", type="string", length=45, nullable=true)
     */
    private $funcaochefesad;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_Lotacao", type="string", length=60, nullable=true)
     */
    private $lotacao;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_ChefeImediato", type="string", length=150, nullable=true)
     */
    private $chefeimediato;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_FuncaoChefe", type="string", length=45, nullable=true)
     */
    private $funcaochefe;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_Comandante", type="string", length=150, nullable=true)
     */
    private $comandante;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_FuncaoComandante", type="string", length=45, nullable=true)
     */
    private $funcaocomandante;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_Decisao", type="string", length=45, nullable=true)
     */
    private $decisao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rfe_DataDecisao", type="datetime", nullable=true)
     */
    private $datadecisao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rfe_PrimeiraParcelaInicio", type="datetime", nullable=true)
     */
    private $primeiraparcelainicio;

    /**
     * @var integer
     *
     * @ORM\Column(name="rfe_PrimeiraParcelaQtdDias", type="integer", nullable=true)
     */
    private $primeiraparcelaqtddias;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rfe_SegundaParcelaInicio", type="datetime", nullable=true)
     */
    private $segundaparcelainicio;

    /**
     * @var integer
     *
     * @ORM\Column(name="rfe_SegundaParcelaQtdDias", type="integer", nullable=true)
     */
    private $segundaparcelaqtddias;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rfe_TerceiraParcelaInicio", type="datetime", nullable=true)
     */
    private $terceiraparcelainicio;

    /**
     * @var integer
     *
     * @ORM\Column(name="rfe_TerceiraParcelaQtdDias", type="integer", nullable=true)
     */
    private $terceiraparcelaqtddias;

    /**
     * @var string
     *
     * @ORM\Column(name="rfe_Template", type="string", length=30, nullable=true)
     */
    private $template;
    
    /**
     * @var string
     *
     * @ORM\Column(name="rfe_NaoGozo", type="string", length=45, nullable=true)
     */
    private $naogozo;
    
    /**
     * @var string
     *
     * @ORM\Column(name="rfe_MomentoOportuno", type="string", length=45, nullable=true)
     */
    private $momentooportuno;
    
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

    public function getFeriasprogramacao(){
        return $this->feriasprogramacao;
    }

    public function setFeriasprogramacao($feriasprogramacao){
        $this->feriasprogramacao = $feriasprogramacao;
        return $this;
    }

    public function getNovaprogramacao(){
        return $this->novaprogramacao;
    }

    public function setNovaprogramacao($novaprogramacao){
        $this->novaprogramacao = $novaprogramacao;
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

    public function getPolferiasbatalhao(){
        return $this->polferiasbatalhao;
    }

    public function setPolferiasbatalhao($polferiasbatalhao){
        $this->polferiasbatalhao = $polferiasbatalhao;
        return $this;
    }

    public function getUmdozebatalhao(){
        return $this->umdozebatalhao;
    }

    public function setUmdozebatalhao($umdozebatalhao){
        $this->umdozebatalhao = $umdozebatalhao;
        return $this;
    }

    public function getPolferiassubunidade(){
        return $this->polferiassubunidade;
    }

    public function setPolferiassubunidade($polferiassubunidade){
        $this->polferiassubunidade = $polferiassubunidade;
        return $this;
    }

    public function getUmdozesubunidade(){
        return $this->umdozesubunidade;
    }

    public function setUmdozesubunidade($umdozesubunidade){
        $this->umdozesubunidade = $umdozesubunidade;
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
        if ($datadecisao) 
        {
        	$this->datadecisao = new \DateTime($datadecisao);
        } 
        return $this;
    }

    public function getPrimeiraparcelainicio(){
        return $this->primeiraparcelainicio;
    }

    public function setPrimeiraparcelainicio($primeiraparcelainicio){
        $this->primeiraparcelainicio = new \DateTime($primeiraparcelainicio);
        return $this;
    }

    public function getPrimeiraparcelaqtddias(){
        return $this->primeiraparcelaqtddias;
    }

    public function setPrimeiraparcelaqtddias($primeiraparcelaqtddias){
        $this->primeiraparcelaqtddias = $primeiraparcelaqtddias;
        return $this;
    }

    public function getSegundaparcelainicio(){
        return $this->segundaparcelainicio;
    }

    public function setSegundaparcelainicio($segundaparcelainicio){
        $this->segundaparcelainicio = new \DateTime($segundaparcelainicio);
        return $this;
    }

    public function getSegundaparcelaqtddias(){
        return $this->segundaparcelaqtddias;
    }

    public function setSegundaparcelaqtddias($segundaparcelaqtddias){
        $this->segundaparcelaqtddias = $segundaparcelaqtddias;
        return $this;
    }

    public function getTerceiraparcelainicio(){
        return $this->terceiraparcelainicio;
    }

    public function setTerceiraparcelainicio($terceiraparcelainicio){
        $this->terceiraparcelainicio = new \DateTime($terceiraparcelainicio);
        return $this;
    }

    public function getTerceiraparcelaqtddias(){
        return $this->terceiraparcelaqtddias;
    }

    public function setTerceiraparcelaqtddias($terceiraparcelaqtddias){
        $this->terceiraparcelaqtddias = $terceiraparcelaqtddias;
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


    public function getAnoreferencia(){
        return $this->anoreferencia;
    }

    public function setAnoreferencia($anoreferencia){
        $this->anoreferencia = $anoreferencia;
        return $this;
    }


    public function getTemplate(){
        return $this->template;
    }

    public function setTemplate($template){
        $this->template = $template;
        return $this;
    }


    public function getPostograduacao(){
        return $this->postograduacao;
    }

    public function setPostograduacao($postograduacao){
        $this->postograduacao = $postograduacao;
        return $this;
    }


    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
        return $this;
    }


    public function getNaogozo(){
        return $this->naogozo;
    }

    public function setNaogozo($naogozo){
        $this->naogozo = $naogozo;
        return $this;
    }

    public function getMomentooportuno(){
        return $this->momentooportuno;
    }

    public function setMomentooportuno($momentooportuno){
        $this->momentooportuno = $momentooportuno;
        return $this;
    }

}

