<?php

namespace Core\Collection;

class DadosForm
{
	public function getEstados()
	{
		$estados = array(
				"" =>"Selecione",
				"AC"=>"Acre",
				"AL"=>"Alagoas",
				"AM"=>"Amazonas",
				"AP"=>"Amapá",
				"BA"=>"Bahia",
				"CE"=>"Ceará",
				"DF"=>"Distrito Federal",
				"ES"=>"Espírito Santo",
				"GO"=>"Goiás",
				"MA"=>"Maranhão",
				"MT"=>"Mato Grosso",
				"MS"=>"Mato Grosso do Sul",
				"MG"=>"Minas Gerais",
				"PA"=>"Pará",
				"PB"=>"Paraíba",
				"PR"=>"Paraná",
				"PE"=>"Pernambuco",
				"PI"=>"Piauí",
				"RJ"=>"Rio de Janeiro",
				"RN"=>"Rio Grande do Norte",
				"RO"=>"Rondônia",
				"RS"=>"Rio Grande do Sul",
				"RR"=>"Roraima",
				"SC"=>"Santa Catarina",
				"SE"=>"Sergipe",
				"SP"=>"São Paulo",
				"TO"=>"Tocantins");
		
		return $estados;
	}
	
	public function getEstadosAbreviados()
	{
		$estados = array(
				"" =>"---",
				"AC"=>"AC",
				"AL"=>"AL",
				"AM"=>"AM",
				"AP"=>"AP",
				"BA"=>"BA",
				"CE"=>"CE",
				"DF"=>"DF",
				"ES"=>"ES",
				"GO"=>"GO",
				"MA"=>"MA",
				"MT"=>"MT",
				"MS"=>"MS",
				"MG"=>"MG",
				"PA"=>"PA",
				"PB"=>"PB",
				"PR"=>"PR",
				"PE"=>"PE",
				"PI"=>"PI",
				"RJ"=>"RJ",
				"RN"=>"RN",
				"RO"=>"RO",
				"RS"=>"RS",
				"RR"=>"RR",
				"SC"=>"SC",
				"SE"=>"SE",
				"SP"=>"SP",
				"TO"=>"TO");
	
		return $estados;
	}
	
	public function getEstadoCivil()
	{
		$estadocivil = array(
			'' => 'Selecione',
			'1' => 'Solteiro',
			'2' => 'Casado',
			'3' => 'Separado / Desquitado',
			'4' => 'Divorciado',
			'5' => 'Viuvo',
		);
		
		return $estadocivil;
	}
	
	public function getDocumentoCivil()
	{
		$documentocivil = array(
			'' => 'Selecione',
			'1' => 'Certidao de Nascimento',
			'2' => 'Certidão de Casamento',
			'3' => 'Decisão Judicial de Separação',
			'4' => 'Averbação de Divórcio',
			'5' => 'Atestado de Óbito do Cônjuge',
		);
		
		return $documentocivil;
	}
	
	public function getEtnia()
	{
		$etnia = array(
			'' => 'Selecione',
			'1' => 'Branco',
			'2' => 'Negro',
			'3' => 'Indígena',
			'4' => 'Pardo',
			'5' => 'Mulato',
			'6' => 'Caboclo',
			'7' => 'Cafuzo',
			'8' => 'Amarelo',
			'9' => 'Outras',
		);
		
		return $etnia;
	}
	
	public function getCutis()
	{
		$cutis = array(
			'' => 'Selecione',
			'1' => 'Muito Clara',
			'2' => 'Clara',
			'3' => 'Clara média',
			'4' => 'Escura média',
			'5' => 'Escura',
			'6' => 'Muito escura',
		);
	
		return $cutis;
	}
	
	public function getOlhos()
	{
		$olhos = array(
			'' => 'Selecione',
			'1' => 'Azuis',
			'2' => 'Castanhos',
			'3' => 'Cinzas',
			'4' => 'Verdes',
			'5' => 'Avelãs ou esverdeados',
			'6' => 'Âmbar ou mel',
			'7' => 'Negros',
			'8' => 'Vermelhos',
			'9' => 'Violetas',
		);
	
		return $olhos;
	}
	
	public function getCabelos()
	{
		$cabelos = array(
			'' => 'Selecione',
			'1' => 'Loiros',
			'2' => 'Ruivos',
			'3' => 'Castanhos',
			'4' => 'Pretos',
			'5' => 'Grisalhos',
			'6' => 'Brancos',
		);
	
		return $cabelos;
	}
	
	public function getTipoPassaporte()
	{
		$tipo = array(
			'' => 'Selecione',
			'1' => 'Comum',
			'2' => 'Oficial',
			'3' => 'Diplomático',
			'4' => 'Emergência',
		);
		
		return $tipo;
	}
	
}