<?php

namespace Census\Model;
 
use Zend\InputFilter\InputFilterAwareInterface,
	Zend\InputFilter\InputFilter,
	Zend\InputFilter\InputFilterInterface;

class Policial implements InputFilterAwareInterface
{
	public $pol_Codigo;
	public $pol_NomeCompleto;
	public $pol_CPF;
	public $pol_RG;
	public $pol_OrgaoExpedidor;
	public $pol_Naturalidade;
	public $pol_NaturalidadeUF;
	public $pol_DataNascimento;
	public $pol_NomePai;
	public $pol_NomeMae;
	public $pol_Sexo;
	public $pol_CNH;
	public $pol_CNHCategoria;
	public $pol_CNHValidade;
	public $pol_EstadoCivil;
	public $pol_TelefoneFixo;
	public $pol_TelefoneCelular;
	public $pol_Email;
	public $pol_Matricula;
	public $pol_MatriculaSIAPE;
	public $pol_DataAdmissao;
	public $pol_Quadro;
	public $pol_NomeGuerra; 
	public $pol_TipoSangue;
	public $pol_PostoGraduacao;
	public $pol_DoadorSangue;
	public $pol_FuncionalTipo;
	public $pol_IdentidadeFuncionalValidade;
	public $pol_PorteArmaSituacao;
	public $pol_Comportamento;
	public $pol_PISPASEP;
	public $pol_SubUnidade;
	public $pol_ServicoPosto;
	public $pol_ServicoHorario;
	public $pol_ServicoEscala;
	public $pol_Lotacao;
	public $pol_ServicoFuncao;
	public $pol_BienalValidade;
	public $pol_TAFValidade;
	public $pol_Antiguidade;
	public $pol_Foto;
	public $pol_FotoTipo;
	public $pol_EnderecoUF;
	public $pol_EnderecoCidade;
	public $pol_EnderecoBairro;
	public $pol_EnderecoQuadra;
	public $pol_EnderecoConjunto;
	public $pol_EnderecoNumero;
	public $pol_EnderecoCEP;
	public $pol_EnderecoComplemento;
	public $pol_EnderecoTipo;
	
	protected $inputFilter;
	
	
	public function exchangeArray($data)
	{
		$this->pol_Codigo						= (!empty($data['pol_Codigo'])) ? $data['pol_Codigo'] : null;
		$this->pol_NomeCompleto					= (!empty($data['pol_NomeCompleto'])) ? $data['pol_NomeCompleto'] : null;
		$this->pol_CPF							= (!empty($data['pol_CPF'])) ? $data['pol_CPF'] : null;
		$this->pol_RG							= (!empty($data['pol_RG'])) ? $data['pol_RG'] : null;
		$this->pol_OrgaoExpedidor				= (!empty($data['pol_OrgaoExpedidor'])) ? $data['pol_OrgaoExpedidor'] : null;
		$this->pol_Naturalidade					= (!empty($data['pol_Naturalidade'])) ? $data['pol_Naturalidade'] : null;
		$this->pol_NaturalidadeUF				= (!empty($data['pol_NaturalidadeUF'])) ? $data['pol_NaturalidadeUF'] : null;
		$this->pol_DataNascimento				= (!empty($data['pol_DataNascimento'])) ? $data['pol_DataNascimento'] : null;
		$this->pol_NomePai						= (!empty($data['pol_NomePai'])) ? $data['pol_NomePai'] : null;
		$this->pol_NomeMae						= (!empty($data['pol_NomeMae'])) ? $data['pol_NomeMae'] : null;
		$this->pol_Sexo							= (!empty($data['pol_Sexo'])) ? $data['pol_Sexo'] : null;
		$this->pol_CNH							= (!empty($data['pol_CNH'])) ? $data['pol_CNH'] : null;
		$this->pol_CNHCategoria					= (!empty($data['pol_CNHCategoria'])) ? $data['pol_CNHCategoria'] : null;
		$this->pol_CNHValidade					= (!empty($data['pol_CNHValidade'])) ? $data['pol_CNHValidade'] : null;
		$this->pol_EstadoCivil					= (!empty($data['pol_EstadoCivil'])) ? $data['pol_EstadoCivil'] : null;
		$this->pol_TelefoneFixo					= (!empty($data['pol_TelefoneFixo'])) ? $data['pol_TelefoneFixo'] : null;
		$this->pol_TelefoneCelular				= (!empty($data['pol_TelefoneCelular'])) ? $data['pol_TelefoneCelular'] : null;
		$this->pol_Email						= (!empty($data['pol_Email'])) ? $data['pol_Email'] : null;
		$this->pol_Matricula					= (!empty($data['pol_Matricula'])) ? $data['pol_Matricula'] : null;
		$this->pol_MatriculaSIAPE				= (!empty($data['pol_MatriculaSIAPE'])) ? $data['pol_MatriculaSIAPE'] : null;
		$this->pol_DataAdmissao					= (!empty($data['pol_DataAdmissao'])) ? $data['pol_DataAdmissao'] : null;
		$this->pol_Quadro						= (!empty($data['pol_Quadro'])) ? $data['pol_Quadro'] : null;
		$this->pol_NomeGuerra					= (!empty($data['pol_NomeGuerra'])) ? $data['pol_NomeGuerra'] : null;
		$this->pol_TipoSangue					= (!empty($data['pol_TipoSangue'])) ? $data['pol_TipoSangue'] : null;
		$this->pol_PostoGraduacao				= (!empty($data['pol_PostoGraduacao'])) ? $data['pol_PostoGraduacao'] : null;
		$this->pol_DoadorSangue					= (!empty($data['pol_DoadorSangue'])) ? $data['pol_DoadorSangue'] : null;
		$this->pol_FuncionalTipo				= (!empty($data['pol_FuncionalTipo'])) ? $data['pol_FuncionalTipo'] : null;
		$this->pol_IdentidadeFuncionalValidade	= (!empty($data['pol_IdentidadeFuncionalValidade'])) ? $data['pol_IdentidadeFuncionalValidade'] : null;
		$this->pol_PorteArmaSituacao			= (!empty($data['pol_PorteArmaSituacao'])) ? $data['pol_PorteArmaSituacao'] : null;
		$this->pol_Comportamento				= (!empty($data['pol_Comportamento'])) ? $data['pol_Comportamento'] : null;
		$this->pol_PISPASEP						= (!empty($data['pol_PISPASEP'])) ? $data['pol_PISPASEP'] : null;
		$this->pol_SubUnidade					= (!empty($data['pol_SubUnidade'])) ? $data['pol_SubUnidade'] : null;
		$this->pol_ServicoPosto					= (!empty($data['pol_ServicoPosto'])) ? $data['pol_ServicoPosto'] : null;
		$this->pol_ServicoHorario				= (!empty($data['pol_ServicoHorario'])) ? $data['pol_ServicoHorario'] : null;
		$this->pol_ServicoEscala				= (!empty($data['pol_ServicoEscala'])) ? $data['pol_ServicoEscala'] : null;
		$this->pol_Lotacao						= (!empty($data['pol_Lotacao'])) ? $data['pol_Lotacao'] : null;
		$this->pol_ServicoFuncao				= (!empty($data['pol_ServicoFuncao'])) ? $data['pol_ServicoFuncao'] : null;
		$this->pol_BienalValidade				= (!empty($data['pol_BienalValidade'])) ? $data['pol_BienalValidade'] : null;
		$this->pol_TAFValidade					= (!empty($data['pol_TAFValidade'])) ? $data['pol_TAFValidade'] : null;
		$this->pol_Antiguidade					= (!empty($data['pol_Antiguidade'])) ? $data['pol_Antiguidade'] : null;
		$this->pol_Foto							= (!empty($data['pol_Foto'])) ? $data['pol_Foto'] : null;
		$this->pol_FotoTipo						= (!empty($data['pol_FotoTipo'])) ? $data['pol_FotoTipo'] : null;
		$this->pol_EnderecoUF					= (!empty($data['pol_EnderecoUF'])) ? $data['pol_EnderecoUF'] : null;
		$this->pol_EnderecoCidade				= (!empty($data['pol_EnderecoCidade'])) ? $data['pol_EnderecoCidade'] : null;
		$this->pol_EnderecoBairro				= (!empty($data['pol_EnderecoBairro'])) ? $data['pol_EnderecoBairro'] : null;
		$this->pol_EnderecoQuadra				= (!empty($data['pol_EnderecoQuadra'])) ? $data['pol_EnderecoQuadra'] : null;
		$this->pol_EnderecoConjunto				= (!empty($data['pol_EnderecoConjunto'])) ? $data['pol_EnderecoConjunto'] : null;
		$this->pol_EnderecoNumero				= (!empty($data['pol_EnderecoNumero'])) ? $data['pol_EnderecoNumero'] : null;
		$this->pol_EnderecoCEP					= (!empty($data['pol_EnderecoCEP'])) ? $data['pol_EnderecoCEP'] : null;
		$this->pol_EnderecoComplemento			= (!empty($data['pol_EnderecoComplemento'])) ? $data['pol_EnderecoComplemento'] : null;
		$this->pol_EnderecoTipo					= (!empty($data['pol_EnderecoTipo'])) ? $data['pol_EnderecoTipo'] : null;
    }
    
    
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
    	throw new \Exception('Não utilizado.');
    }
    
    
    
    public function getInputFilter()
    {
    	if (!$this->inputFilter) {
    		$inputFilter = new InputFilter();
    
    		// pol_Codigo
    		$inputFilter->add(array(
    				'name' => 'pol_Codigo',
    				'required' => true,
    				'filters' => array(
    						array('name' => 'Int'),
    				),
    		));
    
    		// uni_Codigo
    		$inputFilter->add(array(
    				'name' => 'pol_NomeCompleto',
    				'required' => true,
    				'filters' => array(
    						array('name' => 'Int'),
    				),
    		));
    
    		// pol_SituacaoFuncional
    
    
    		// pol_Matricula
    
    
    		// pol_MatriculaSIAPE
    
    
    		// pol_DataAdmissao
    
    
    		// pol_Quadro
    
    
    		// pol_NomeGuerra
    
    
    		// pol_TipoSangue
    
    
    		// pol_DoadorSangue
    
    
    		// pol_RestricaoEscala
    
    
    		// pol_IdentidadeFuncional
    
    
    		// pol_ValidadeIdentidadeFuncional
    
    
    		// pol_SituacaoPorteArma
    
    
    		// pol_PISPASEP
    
    
    
    
    		$this->inputFilter = $inputFilter;
    	}
    	return $this->inputFilter;
    }
}