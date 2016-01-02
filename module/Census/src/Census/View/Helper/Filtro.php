<?php

namespace Census\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Filtro extends AbstractHelper
{
	// public $sexo
	public function sexo($campo)
	{
		if ($campo == "M") {
			$result="Masculino";
		}
		else { 
			$result="Feminino";
		}
	
		return $this->view->escapeHTML($result);
	}
	
	// public $estadoCivil;
	public function estadoCivil($campo)
	{
		switch ($campo)
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
	
	// public $doadorSangue;
	public function doadorSangue()
	{
		if ($campo == "S") {
			$result="Sim";
		}
		else {
			$result="Não";
		}
		return $this->view->escapeHTML($result);
	}
	
	// public $identidadeFuncionalValidade;
	public function identidadeFuncionalValidade($campo)
	{
		if ($campo == "I") 
			$result = "Indeterminada";
			else
			$result = date('d/m/Y', strtotime($result));
		return $this->view->escapeHTML($result);
	}
	
	// public $porteArmaSituacao;
	public function porteArmaSituacao($campo)
	{
		if ($campo == "1") {
			$result="Regular";
		}
		else {
			$result="Suspenso";
		}
		return $this->view->escapeHTML($result);
	}
	
	// public $subUnidade;
	public function subUnidade($campo)
	{
		switch ($campo)
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
	
	// public $servicoHorario;
	public function servicoHorario($campo)
	{
		switch ($campo)
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
	public function servicoEscala($campo)
	{
		switch ($campo)
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
	public function lotacao($campo)
	{
		switch ($campo) {
			case 'Cmd':
				$result = "Comando";
			break;
			case 'SAd': 
				$result = "Seção Administrativa";
			break;
			case 'NGP': 
				$result = "Núcleo de Gestão de Pessoal";
			break;
			case 'NCC': 
				$result = "Núcleo de Controle e Correição";
			break;
			case 'Sec': 
				$result = "Secretaria";
			break;
			case 'NCS': 
				$result = "Núcleo de Comunicação Social";
			break;
			case 'NProj': 
				$result = "Núcleo de Projetos";
			break;
			case 'Almox': 
				$result = "Almoxarifado";
			break;
			case 'NMan': 
				$result = "Núcleo de Manutenção";
			break;
			case 'SOp': 
				$result = "Seção Operacional";
			break;
			case 'SSInt': 
				$result = "SubSeção de Inteligência";
			break;
			case 'NEEC': 
				$result = "NEEC";
			break;
			case 'NEAM': 
				$result = "NEAM";
			break;
			case 'CeAPA': 
				$result = "Centro de Acolhimento Provisório de Animais";
			break;
			case 'CiaApoio': 
				$result = "Companhia de Apoio";
			break;
			case 'ServInter': 
				$result = "Serviço Interno";
			break;
			case 'Lac': 
				$result = "Lacustre";
			break;
			case 'RPA': 
				$result = "Rádio Patrulhamento Ambiental";
			break;
			case 'GOC': 
				$result = "Grupo de Operações do Cerrado";
			break;
			case 'GTA': 
				$result = "Grupo Tático Ambiental";
			break;
			case 'RPR': 
				$result = "Rádio Patrulhamento";
			break;
			case 'Exp': 
				$result = "Expediente SubUnidade";
			break;
			case 'RM': 
				$result = "Restrição Médica";
			break;
			case 'DM': 
				$result = "Dispensa Médica";
			break;
			
		}
		return $this->view->escapeHTML($result);
	}
}