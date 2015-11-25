<?php

namespace Census\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Census\Model\Policial;

class PolicialFilter extends AbstractHelper
{
	protected $policial;
	
	public function __invoke(Policial $policial) 
	{
		$this->policial = $policial;
		return $this;
	}
	
	public function codigo()
	{
		$result = $this->policial->pol_Codigo;
		return $this->view->escapeHTML($result);
	}
	
	public function nomeCompleto()
	{
		$result = $this->policial->pol_NomeCompleto;
		return $this->view->escapeHTML($result);
	}
	
	// public $cpf;
	public function cpf()
	{
		$result = $this->policial->pol_CPF;
		return $this->view->escapeHTML($result);
	}
	
	// public $rg;
	public function rg()
	{
		$result = $this->policial->pol_RG;
		return $this->view->escapeHTML($result);
	}
	
	// public $orgaoExpedidor;
	public function orgaoExpedidor()
	{
		$result = $this->policial->pol_OrgaoExpedidor;
		return $this->view->escapeHTML($result);
	}
	
	// public $naturalidade;
	public function naturalidade()
	{
		$result = $this->policial->pol_Naturalidade;
		return $this->view->escapeHTML($result);
	}
	
	// public $naturalidadeUF;
	public function naturalidadeUF()
	{
		$result = $this->policial->pol_NaturalidadeUF;
		return $this->view->escapeHTML($result);
	}
	
	// public $dataNascimento;
	public function dataNascimento()
	{
		$result = $this->policial->pol_DataNascimento;
		$result = date('d/m/Y', strtotime($result));
		return $this->view->escapeHTML($result);
	}
	
	// public $nomePai;
	public function nomePai()
	{
		$result = $this->policial->pol_NomePai;
		return $this->view->escapeHTML($result);
	}
	
	// public $nomeMae;
	public function nomeMae()
	{
		$result = $this->policial->pol_NomeMae;
		return $this->view->escapeHTML($result);
	}
	
	// public $sexo
	public function sexo()
	{
		$result = $this->policial->pol_Sexo;
		if ($result == "M") {
			$result="Masculino";
		}
		else { 
			$result="Feminino";
		}
	
		return $this->view->escapeHTML($result);
	}
	
	// public $cnh;
	public function cnh()
	{
		$result = $this->policial->pol_CNHCategoria;
		return $this->view->escapeHTML($result);
	}
	
	// public $cnhCategoria;
	public function cnhCategoria()
	{
		$result = $this->policial->pol_CNHCategoria;
		return $this->view->escapeHTML($result);
	}
	
	// public $cnhValidade;
	public function cnhValidade()
	{
		$result = $this->policial->pol_CNHValidade;
		$result = date('d/m/Y', strtotime($result));
		return $this->view->escapeHTML($result);
	}
	
	// public $estadoCivil;
	public function estadoCivil()
	{
		$result = $this->policial->pol_EstadoCivil;
		switch ($result)
		{
			case 1:
				$result = 'Solteiro';
				break;
			case 2: 
				$result = 'Casado';
				break;
			case 3:
				$result = 'Separado/Desquitado';
				break;
			case 4: 
				$result = 'Divorciado';
				break;
			case 5:  
				$result = 'Viúvo';
				break;
		}

		return $this->view->escapeHTML($result);
	}
	
	// public $telefoneFixo;
	public function telefoneFixo()
	{
		$result = $this->policial->pol_TelefoneFixo;
		return $this->view->escapeHTML($result);
	}
	
	// public $telefoneCelular;
	public function telefoneCelular()
	{
		$result = $this->policial->pol_TelefoneCelular;
		//echo "<pre>"; echo print_r($this->policial); exit;
		return $this->view->escapeHTML($result);
	}
	
	// public $email;
	public function email()
	{
		$result = $this->policial->pol_Email;
		return $this->view->escapeHTML($result);
	}
	
	// public $matricula;
	public function matricula()
	{
		$result = $this->policial->pol_Matricula;
		return $this->view->escapeHTML($result);
	}
	
	// public $matriculaSIAPE;
	public function matriculaSIAPE()
	{
		$result = $this->policial->pol_MatriculaSIAPE;
		return $this->view->escapeHTML($result);
	}
	
	// public $dataAdmissao;
	public function dataAdmissao()
	{
		$result = $this->policial->pol_DataAdmissao;
		$result = date('d/m/Y', strtotime($result));
		return $this->view->escapeHTML($result);
	}
	
	// public $quadro;
	public function quadro()
	{
		$result = $this->policial->pol_Quadro;
		return $this->view->escapeHTML($result);
	}
	
	// public $nomeGuerra;
	public function nomeGuerra()
	{
		$result = $this->policial->pol_NomeGuerra;
		return $this->view->escapeHTML($result);
	}
	
	// public $tipoSangue;
	public function tipoSangue()
	{
		$result = $this->policial->pol_TipoSangue;
		return $this->view->escapeHTML($result);
	}
	
	// public $postoGraduacao;
	public function postoGraduacao()
	{
		$result = $this->policial->pol_PostoGraduacao;
		return $this->view->escapeHTML($result);
	}
	
	// public $doadorSangue;
	public function doadorSangue()
	{
		$result = $this->policial->pol_DoadorSangue;
		if ($result == "S") {
			$result="Sim";
		}
		else {
			$result="Não";
		}
		return $this->view->escapeHTML($result);
	}
	
	// public $funcionalTipo;
	public function funcionalTipo()
	{
		$result = $this->policial->pol_FuncionalTipo;
		return $this->view->escapeHTML($result);
	}
	
	// public $identidadeFuncionalValidade;
	public function identidadeFuncionalValidade()
	{
		$result = $this->policial->pol_IdentidadeFuncionalValidade;
		if ($this->funcionalTipo() == "I") 
			$result = "Indeterminada";
			else
			$result = date('d/m/Y', strtotime($result));
		return $this->view->escapeHTML($result);
	}
	
	// public $porteArmaSituacao;
	public function porteArmaSituacao()
	{
		$result = $this->policial->pol_PorteArmaSituacao;
		if ($result == "1") {
			$result="Regular";
		}
		else {
			$result="Suspenso";
		}
		return $this->view->escapeHTML($result);
	}
	
	// public $comportamento;
	public function comportamento()
	{
		$result = $this->policial->pol_Comportamento;
		return $this->view->escapeHTML($result);
	}
	
	// public $pisPASEP;
	public function pisPASEP()
	{
		$result = $this->policial->pol_PisPASEP;
		return $this->view->escapeHTML($result);
	}
	
	// public $subUnidade;
	public function subUnidade()
	{
		$result = $this->policial->pol_SubUnidade;
		switch ($result)
		{
			case 'Btl':
				$result = 'Batalhão';
				break;
			case 'GPTur':
				$result = 'Grupamento Turístico';
				break;
			case 'GOA':
				$result = 'Grupamento Operações Ambientais';
				break;
			case 'CiaSul':
				$result = 'Companhia Rural Sul';
				break;
			case 'CiaLeste':
				$result = 'Companhia Rural Leste';
				break;
			case 'CiaOeste':
				$result = 'Companhia Rural Oeste';
				break;
		}
		
		return $this->view->escapeHTML($result);
	}
	
	// public $servicoPosto;
	public function servicoPosto()
	{
		$result = $this->policial->pol_ServicoPosto;
		return $this->view->escapeHTML($result);
	}
	
	// public $servicoHorario;
	public function servicoHorario()
	{
		$result = $this->policial->pol_ServicoHorario;
		switch ($result)
		{
			case '6':
				$result = '06:00h';
				break;
			case '7':
				$result = '07:00h';
				break;
			case '8':
				$result = '08:00h';
				break;
			case '9':
				$result = '09:00h';
				break;
			case '10':
				$result = '10:00h';
				break;
			case '11':
				$result = '11:00h';
				break;
			case '12':
				$result = '12:00h';
				break;
			case '13':
				$result = '13:00h';
				break;
			case '14':
				$result = '14:00h';
				break;
			case '15':
				$result = '15:00h';
				break;
			case '16':
				$result = '16:00h';
				break;
			case '17':
				$result = '17:00h';
				break;
			case '18':
				$result = '18:00h';
				break;
			case '19':
				$result = '19:00h';
				break;
			case '20':
				$result = '20:00h';
				break;
			case '21':
				$result = '21:00h';
				break;
		}
		return $this->view->escapeHTML($result);
	}
	
	// public $servicoEscala;
	public function servicoEscala()
	{
		$result = $this->policial->pol_ServicoEscala;
		switch ($result)
		{
			case '1':
				$result = 'Expediente';
				break;
			case '2':
				$result = '12x36';
				break;
			case '3':
				$result = '12x60';
				break;
			case '4':
				$result = '24x72';
				break;
			case '5':
				$result = '6x18';
				break;
			case '6':
				$result = '8x40';
				break;
		}
		return $this->view->escapeHTML($result);
	}
	
	// public $lotacao;
	public function lotacao()
	{
		$result = $this->policial->pol_Lotacao;
		return $this->view->escapeHTML($result);
	}
	
	// public $servicoFuncao;
	public function servicoFuncao()
	{
		$result = $this->policial->pol_ServicoFuncao;
		return $this->view->escapeHTML($result);
	}
	
	// public $bienalValidade;
	public function bienalValidade()
	{
		$result = $this->policial->pol_BienalValidade;
		$result = date('d/m/Y', strtotime($result));
		return $this->view->escapeHTML($result);
	}
	
	// public $tafValidade;
	public function tafValidade()
	{
		$result = $this->policial->pol_TAFValidade;
		$result = date('d/m/Y', strtotime($result));
		return $this->view->escapeHTML($result);
	}
	
	// public $antiguidade;
	public function antiguidade()
	{
		$result = $this->policial->pol_Antiguidade;
		return $this->view->escapeHTML($result);
	}
	
	// public $foto;
	public function foto()
	{
		$result = $this->policial->pol_Foto;
		return $this->view->escapeHTML($result);
	}
	
	// public $fotoTipo;
	public function fotoTipo()
	{
		$result = $this->policial->pol_FotoTipo;
		return $this->view->escapeHTML($result);
	}
	
	// public $enderecoUF;
	public function enderecoUF()
	{
		$result = $this->policial->pol_EnderecoUF;
		return $this->view->escapeHTML($result);
	}
	
	// public $enderecoCidade;
	public function enderecoCidade()
	{
		$result = $this->policial->pol_EnderecoCidade;
		return $this->view->escapeHTML($result);
	}
	
	// public $enderecoBairro;
	public function enderecoBairro()
	{
		$result = $this->policial->pol_EnderecoBairro;
		return $this->view->escapeHTML($result);
	}
	
	// public $enderecoQuadra;
	public function enderecoQuadra()
	{
		$result = $this->policial->pol_EnderecoQuadra;
		return $this->view->escapeHTML($result);
	}
	
	// public $enderecoConjunto;
	public function enderecoConjunto()
	{
		$result = $this->policial->pol_EnderecoConjunto;
		return $this->view->escapeHTML($result);
	}
	
	// public $enderecoNumero;
	public function enderecoNumero()
	{
		$result = $this->policial->pol_EnderecoNumero;
		return $this->view->escapeHTML($result);
	}
	
	// public $enderecoCEP;
	public function enderecoCEP()
	{
		$result = $this->policial->pol_EnderecoCEP;
		return $this->view->escapeHTML($result);
	}
	
	// public $enderecoComplemento;
	public function enderecoComplemento()
	{
		$result = $this->policial->pol_EnderecoComplemento;
		return $this->view->escapeHTML($result);
	}
	
	// public $enderecoTipo;
	public function enderecoTipo()
	{
		$result = $this->policial->pol_EnderecoTipo;
		return $this->view->escapeHTML($result);
	}
	
	
	
}