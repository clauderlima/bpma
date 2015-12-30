<?php

namespace Census\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Policial
 *
 * @ORM\Table(name="policial", uniqueConstraints={@ORM\UniqueConstraint(name="pol_CPF_UNIQUE", columns={"pol_CPF"}), @ORM\UniqueConstraint(name="pol_CNH_UNIQUE", columns={"pol_CNH"}), @ORM\UniqueConstraint(name="pol_TelefoneCelular_UNIQUE", columns={"pol_TelefoneCelular"}), @ORM\UniqueConstraint(name="pol_Email_UNIQUE", columns={"pol_Email"}), @ORM\UniqueConstraint(name="pol_Matricula_UNIQUE", columns={"pol_Matricula"}), @ORM\UniqueConstraint(name="pol_MatriculaSIAPE_UNIQUE", columns={"pol_MatriculaSIAPE"})})
 * @ORM\Entity
 */
class Policial
{   
    /**
     * @var integer
     *
     * @ORM\Column(name="pol_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_NomeCompleto", type="string", length=120, nullable=true)
     */
    private $nomecompleto;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_CPF", type="string", length=11, nullable=true)
     */
    private $cpf;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_RG", type="string", length=11, nullable=true)
     */
    private $rg;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_OrgaoExpedidor", type="string", length=15, nullable=true)
     */
    private $orgaoexpedidor;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_Naturalidade", type="string", length=50, nullable=true)
     */
    private $naturalidade;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_NaturalidadeUF", type="string", length=2, nullable=true)
     */
    private $naturalidadeuf;

    /**
     * @var \Date
     *
     * @ORM\Column(name="pol_DataNascimento", type="date", nullable=true)
     */
    private $datanascimento;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_NomePai", type="string", length=50, nullable=true)
     */
    private $nomepai;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_NomeMae", type="string", length=50, nullable=true)
     */
    private $nomemae;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_Sexo", type="string", length=1, nullable=true)
     */
    private $sexo;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_CNH", type="string", length=15, nullable=true)
     */
    private $cnh;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_CNHCategoria", type="string", length=3, nullable=true)
     */
    private $cnhcategoria;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pol_CNHValidade", type="date", nullable=true)
     */
    private $cnhvalidade;

    /**
     * @var integer
     *
     * @ORM\Column(name="pol_EstadoCivil", type="integer", nullable=true)
     */
    private $estadocivil;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_TelefoneFixo", type="string", length=11, nullable=true)
     */
    private $telefonefixo;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_TelefoneCelular", type="string", length=11, nullable=true)
     */
    private $telefonecelular;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_Email", type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_Matricula", type="string", length=11, nullable=true)
     */
    private $matricula;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_MatriculaSIAPE", type="string", length=14, nullable=true)
     */
    private $matriculasiape;
    
    /**
     * @var string
     *
     * @ORM\Column(name="pol_Comportamento", type="string", nullable=true)
     */
    private $comportamento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pol_DataAdmissao", type="date", nullable=true)
     */
    private $dataadmissao;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_Quadro", type="string", nullable=true)
     */
    private $quadro;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_NomeGuerra", type="string", length=45, nullable=true)
     */
    private $nomeguerra;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_PostoGraduacao", type="string", length=15, nullable=true)
     */
    private $postograduacao;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_TipoSangue", type="string", length=3, nullable=true)
     */
    private $tiposangue;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_DoadorSangue", type="string", length=1, nullable=true)
     */
    private $doadorsangue;
    
    /**
     * @var string
     *
     * @ORM\Column(name="pol_FuncionalTipo", type="string", length=1, nullable=true)
     */
    private $funcionaltipo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pol_IdentidadeFuncionalValidade", type="date", nullable=true)
     */
    private $identidadefuncionalvalidade;

    /**
     * @var integer
     *
     * @ORM\Column(name="pol_PorteArmaSituacao", type="integer", nullable=true)
     */
    private $portearmasituacao;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_PISPASEP", type="string", length=12, nullable=true)
     */
    private $pispasep;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_SubUnidade", type="string", length=45, nullable=true)
     */
    private $subunidade;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_ServicoPosto", type="string", length=45, nullable=true)
     */
    private $servicoposto;
    
    /**
     * @var string
     *
     * @ORM\Column(name="pol_ServicoFuncao", type="string", length=45, nullable=true)
     */
    private $servicofuncao;
    
    /**
     * @var string
     *
     * @ORM\Column(name="pol_Lotacao", type="string", length=45, nullable=true)
     */
    private $lotacao;
    
    /**
     * @var string
     *
     * @ORM\Column(name="pol_ServicoHorario", type="string", nullable=true)
     */
    private $servicohorario;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_ServicoEscala", type="string", nullable=true)
     */
    private $servicoescala;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pol_BienalValidade", type="date", nullable=true)
     */
    private $bienalvalidade;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pol_TAFValidade", type="date", nullable=true)
     */
    private $tafvalidade;

    /**
     * @var integer
     *
     * @ORM\Column(name="pol_Antiguidade", type="integer", nullable=true)
     */
    private $antiguidade;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_Foto", type="blob", length=65535, nullable=true)
     */
    private $foto;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_FotoTipo", type="string", length=45, nullable=true)
     */
    private $fototipo;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_EnderecoUF", type="string", length=2, nullable=true)
     */
    private $enderecouf;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_EnderecoCidade", type="string", length=50, nullable=true)
     */
    private $enderecocidade;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_EnderecoBairro", type="string", length=50, nullable=true)
     */
    private $enderecobairro;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_EnderecoQuadra", type="string", length=45, nullable=true)
     */
    private $enderecoquadra;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_EnderecoConjunto", type="string", length=45, nullable=true)
     */
    private $enderecoconjunto;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_EnderecoNumero", type="string", length=15, nullable=true)
     */
    private $endereconumero;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_EnderecoCEP", type="string", length=8, nullable=true)
     */
    private $enderecocep;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_EnderecoComplemento", type="string", length=60, nullable=true)
     */
    private $enderecocomplemento;

    /**
     * @var string
     *
     * @ORM\Column(name="pol_EnderecoTipo", type="string", length=15, nullable=true)
     */
    private $enderecotipo;

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

    public function getNomecompleto(){
        return $this->nomecompleto;
    }

    public function setNomecompleto($nomecompleto){
        $this->nomecompleto = $nomecompleto;
        return $this;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
        return $this;
    }

    public function getRg(){
        return $this->rg;
    }

    public function setRg($rg){
        $this->rg = $rg;
        return $this;
    }

    public function getOrgaoexpedidor(){
        return $this->orgaoexpedidor;
    }

    public function setOrgaoexpedidor($orgaoexpedidor){
        $this->orgaoexpedidor = $orgaoexpedidor;
        return $this;
    }

    public function getnaturalidade(){
        return $this->naturalidade;
    }

    public function setnaturalidade($naturalidade){
        $this->naturalidade = $naturalidade;
        return $this;
    }

    public function getnaturalidadeuf(){
        return $this->naturalidadeuf;
    }

    public function setNaturalidadeuf($naturalidadeuf){
        $this->naturalidadeuf = $naturalidadeuf;
        return $this;
    }

    public function getDatanascimento(){
        return $this->datanascimento;
    }

    public function setDatanascimento($datanascimento){
        if ($datanascimento) $this->datanascimento = new \DateTime($datanascimento);
        return $this;
    }

    public function getNomepai(){
        return $this->nomepai;
    }

    public function setNomepai($nomepai){
        $this->nomepai = $nomepai;
        return $this;
    }

    public function getNomemae(){
        return $this->nomemae;
    }

    public function setNomemae($nomemae){
        $this->nomemae = $nomemae;
        return $this;
    }

    public function getSexo(){
        return $this->sexo;
    }

    public function setSexo($sexo){
        $this->sexo = $sexo;
        return $this;
    }

    public function getCnh(){
        return $this->cnh;
    }

    public function setCnh($cnh){
        $this->cnh = $cnh;
        return $this;
    }

    public function getCnhcategoria(){
        return $this->cnhcategoria;
    }

    public function setCnhcategoria($cnhcategoria){
        $this->cnhcategoria = $cnhcategoria;
        return $this;
    }

    public function getCnhvalidade(){
        return $this->cnhvalidade;
    }

    public function setCnhvalidade($cnhvalidade){
        if ($cnhvalidade) $this->cnhvalidade = new \DateTime($cnhvalidade);
        return $this;
    }

    public function getEstadocivil(){
        return $this->estadocivil;
    }

    public function setEstadocivil($estadocivil){
        $this->estadocivil = $estadocivil;
        return $this;
    }

    public function getTelefonefixo(){
        return $this->telefonefixo;
    }

    public function setTelefonefixo($telefonefixo){
        $this->telefonefixo = $telefonefixo;
        return $this;
    }

    public function getTelefonecelular(){
        return $this->telefonecelular;
    }

    public function setTelefonecelular($telefonecelular){
        $this->telefonecelular = $telefonecelular;
        return $this;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
        return $this;
    }

    public function getMatricula(){
        return $this->mask(preg_replace('/[^0-9]/', '', $this->matricula), '###.###-#');
    }

    public function setMatricula($matricula){
        $this->matricula = preg_replace('/[^0-9]/', '', $matricula);
        return $this;
    }

    public function getMatriculasiape(){
        return $this->matriculasiape;
    }

    public function setMatriculasiape($matriculasiape){
        $this->matriculasiape = $matriculasiape;
        return $this;
    }
    
    public function getDataadmissao(){
        return $this->dataadmissao;
    }

    public function setDataadmissao($dataadmissao){
        if ($dataadmissao) $this->dataadmissao = new \DateTime($dataadmissao);
        return $this;
    }

    public function getQuadro(){
        return $this->quadro;
    }

    public function setQuadro($quadro){
        $this->quadro = $quadro;
        return $this;
    }

    public function getNomeguerra(){
        return $this->nomeguerra;
    }

    public function setNomeguerra($nomeguerra){
        $this->nomeguerra = $nomeguerra;
        return $this;
    }

    public function getPostograduacao(){
        return $this->postograduacao;
    }

    public function setPostograduacao($postograduacao){
        $this->postograduacao = $postograduacao;
        return $this;
    }

    public function getTiposangue(){
        return $this->tiposangue;
    }

    public function setTiposangue($tiposangue){
        $this->tiposangue = $tiposangue;
        return $this;
    }

    public function getDoadorsangue(){
        return $this->doadorsangue;
    }

    public function setDoadorsangue($doadorsangue){
        $this->doadorsangue = $doadorsangue;
        return $this;
    }
    
    public function getfuncionaltipo(){
    	return $this->funcionaltipo;
    }
    
    public function setfuncionaltipo($funcionaltipo){
    	$this->funcionaltipo = $funcionaltipo;
    	return $this;
    }

    public function getIdentidadefuncionalvalidade(){
        return $this->identidadefuncionalvalidade;
    }

    public function setIdentidadefuncionalvalidade($identidadefuncionalvalidade){
        if ($identidadefuncionalvalidade) $this->identidadefuncionalvalidade = new \DateTime($identidadefuncionalvalidade);
        return $this;
    }

    public function getPortearmasituacao(){
        return $this->portearmasituacao;
    }

    public function setPortearmasituacao($portearmasituacao){
        $this->portearmasituacao = $portearmasituacao;
        return $this;
    }

    public function getPispasep(){
        return $this->pispasep;
    }

    public function setPispasep($pispasep){
        $this->pispasep = $pispasep;
        return $this;
    }
    
    public function getcomportamento(){
    	return $this->comportamento;
    }
    
    public function setComportamento($comportamento){
    	$this->comportamento = $comportamento;
    	return $this;
    }

    public function getSubunidade(){
        return $this->subunidade;
    }

    public function setSubunidade($subunidade){
        $this->subunidade = $subunidade;
        return $this;
    }

    public function getServicoposto(){
        return $this->servicoposto;
    }

    public function setServicoposto($servicoposto){
        $this->servicoposto = $servicoposto;
        return $this;
    }
    
    public function getServicofuncao(){
    	return $this->servicofuncao;
    }
    
    public function setServicofuncao($servicofuncao){
    	$this->servicofuncao = $servicofuncao;
    	return $this;
    }
    
    public function getLotacao(){
    	return $this->lotacao;
    }
    
    public function setLotacao($lotacao){
    	$this->lotacao = $lotacao;
    	return $this;
    }
    
    public function getServicohorario(){
    	return $this->servicohorario;
    }
    
    public function setServicohorario($servicohorario){
    	$this->servicohorario = $servicohorario;
    	return $this;
    }

    public function getServicoescala(){
        return $this->servicoescala;
    }

    public function setServicoescala($servicoescala){
        $this->servicoescala = $servicoescala;
        return $this;
    }

    public function getBienalvalidade(){
        return $this->bienalvalidade;
    }

    public function setBienalvalidade($bienalvalidade){
        if ($bienalvalidade) $this->bienalvalidade = new \DateTime($bienalvalidade);
        return $this;
    }

    public function getTafvalidade(){
        return $this->tafvalidade;
    }

    public function setTafvalidade($tafvalidade){
        
    	if ($tafvalidade) $this->tafvalidade = new \DateTime($tafvalidade);
    	
        return $this;
    }

    public function getAntiguidade(){
    	$antPostGrad = $this->getPostograduacao();
    	switch ($antPostGrad){
    		case 'Cel':
    			$antiguidade = $antPostGrad;
    			break;
    		case 'TC':
    			$antiguidade = $antPostGrad-500;
    			break;
    		case 'Maj':
    			$antiguidade = $antPostGrad-1000;
    			break;
    		case 'Cap':
    			$antiguidade = $antPostGrad-2000;
    			break;
    		case '1º Ten':
    			$antiguidade = $antPostGrad-3000;
    			break;
    		case '2º Ten':
    			$antiguidade = $antPostGrad-4000;
    			break;
    		case 'Asp':
    			$antiguidade = $antPostGrad-5000;
    			break;
    		case 'Cad':
    			$antiguidade = $antPostGrad-6000;
    			break;
    		case 'ST':
    			$antiguidade = $antPostGrad-10000;
    			break;
    		case '1º Sgt':
    			$antiguidade = $antPostGrad-20000;
    			break;
    		case '2º Sgt':
    			$antiguidade = $antPostGrad-30000;
    			break;
    		case '3º Sgt':
    			$antiguidade = $antPostGrad-50000;
    			break;
    		case 'Cb':
    			$antiguidade = $antPostGrad-70000;
    			break;
    		case 'Sd':
    			$antiguidade = $antPostGrad-100000;
    			break;
    		case 'Sd 2º Classe':
    			$antiguidade = $antPostGrad-150000;
    			break;
    	}
 
        return ($this->antiguidade+$antiguidade);
    }

    public function setAntiguidade($antiguidade){
        $postoGraduacao = $this->getPostograduacao();
        
        switch ($postoGraduacao){
        	case 'Cel':
        		$antPostGrad = $antiguidade;
        		break;
        	case 'TC':
        		$antPostGrad = $antiguidade+500;
        		break;
        	case 'Maj':
        		$antPostGrad = $antiguidade+1000;
        		break;
        	case 'Cap':
        		$antPostGrad = $antiguidade+2000;
        		break;
       		case '1º Ten':
       			$antPostGrad = $antiguidade+3000;
       			break;
       		case '2º Ten':
       			$antPostGrad = $antiguidade+4000;
       			break;
       		case 'Asp':
       			$antPostGrad = $antiguidade+5000;
       			break;
       		case 'Cad':
       			$antPostGrad = $antiguidade+6000;
       			break;
     		case 'ST':
      			$antPostGrad = $antiguidade+10000;
      			break;
      		case '1º Sgt':
      			$antPostGrad = $antiguidade+20000;
       			break;
       		case '2º Sgt':
       			$antPostGrad = $antiguidade+30000;
       			break;
       		case '3º Sgt':
       			$antPostGrad = $antiguidade+50000;
       			break;
       		case 'Cb':
       			$antPostGrad = $antiguidade+70000;
       			break;
       		case 'Sd':
       			$antPostGrad = $antiguidade+100000;
       			break;
       		case 'Sd 2º Classe':
       			$antPostGrad = $antiguidade+150000;
       			break;
        }
        	
    	$this->antiguidade = $antPostGrad;
        
        return $this;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function setFoto($foto){
        $this->foto = $foto;
        return $this;
    }

    public function getFototipo(){
        return $this->fototipo;
    }

    public function setFototipo($fototipo){
        $this->fototipo = $fototipo;
        return $this;
    }

    public function getEnderecouf(){
        return $this->enderecouf;
    }

    public function setEnderecouf($enderecouf){
        $this->enderecouf = $enderecouf;
        return $this;
    }

    public function getEnderecocidade(){
        return $this->enderecocidade;
    }

    public function setEnderecocidade($enderecocidade){
        $this->enderecocidade = $enderecocidade;
        return $this;
    }

    public function getEnderecobairro(){
        return $this->enderecobairro;
    }

    public function setEnderecobairro($enderecobairro){
        $this->enderecobairro = $enderecobairro;
        return $this;
    }

    public function getEnderecoquadra(){
        return $this->enderecoquadra;
    }

    public function setEnderecoquadra($enderecoquadra){
        $this->enderecoquadra = $enderecoquadra;
        return $this;
    }

    public function getEnderecoconjunto(){
        return $this->enderecoconjunto;
    }

    public function setEnderecoconjunto($enderecoconjunto){
        $this->enderecoconjunto = $enderecoconjunto;
        return $this;
    }

    public function getEndereconumero(){
        return $this->endereconumero;
    }

    public function setEndereconumero($endereconumero){
        $this->endereconumero = $endereconumero;
        return $this;
    }

    public function getEnderecocep(){
        return $this->enderecocep;
    }

    public function setEnderecocep($enderecocep){
        $this->enderecocep = $enderecocep;
        return $this;
    }

    public function getEnderecocomplemento(){
        return $this->enderecocomplemento;
    }

    public function setEnderecocomplemento($enderecocomplemento){
        $this->enderecocomplemento = $enderecocomplemento;
        return $this;
    }

    public function getEnderecotipo(){
        return $this->enderecotipo;
    }

    public function setEnderecotipo($enderecotipo){
        $this->enderecotipo = $enderecotipo;
        return $this;
    }

    private function mask($val, $mask)
	{
 		$maskared = '';
 		$k = 0;
 		$val = strrev($val);
 		
 		for($i=strlen($mask)-1; $i > 0; $i--)
 		{
 			if($mask[$i] == '#')
 			{
 				if(isset($val[$k]))
 					$maskared .= $val[$k++];
 			}
 			else
 			{
 				if(isset($mask[$i]))
 					$maskared .= $mask[$i];
 			}
 		}
 		return strrev($maskared);
	}
    
}

