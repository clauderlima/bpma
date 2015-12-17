<?php

namespace Census\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Date;
use Zend\Form\Element\Select;

class Policial extends Form
{
	public function __construct()
	{
		parent::__construct('formPolicial');
		
		
/* 		//pol_Codigo
		$codigo = new Text('codigo');
		$codigo->setLabel('')
		->setAttributes(array(
				'id' => 'codigo',
				'class' => 'form-control',
				'placeholder' => ''
		));
		$this->add($codigo); */
		
		//pol_NomeCompleto
		$nomecompleto = new Text('nomecompleto');
		$nomecompleto->setLabel('Nome Completo')
		->setAttributes(array(
				'id' => 'nomecompleto',
				'class' => 'form-control',
		));
		$this->add($nomecompleto);
		
		//pol_CPF
		$cpf = new Text('cpf');
		$cpf->setLabel('CPF')
		->setAttributes(array(
				'id' => 'cpf',
				'class' => 'form-control',
				'placeholder' => ''
		));
		$this->add($cpf);
		
		//pol_RG
		$rg = new Text('rg');
		$rg->setLabel('RG')
		->setAttributes(array(
				'id' => 'rg',
				'class' => 'form-control',
				'placeholder' => ''
		));
		$this->add($rg);
		
		//pol_OrgaoExpedidor
		$orgaoexpedidor = new Text('orgaoexpedidor');
		$orgaoexpedidor->setLabel('Org. Exp.')
		->setAttributes(array(
				'id' => 'orgaoexpedidor',
				'class' => 'form-control',
				'placeholder' => ''
		));
		$this->add($orgaoexpedidor);
		
		//pol_Naturalidade
		$naturalidade = new Text('naturalidade');
		$naturalidade->setLabel('Naturalidade')
		->setAttributes(array(
				'id' => 'naturalidade',
				'class' => 'form-control',
				'placeholder' => ''
		));
		$this->add($naturalidade);
		
		//pol_NaturalidadeUF
		$naturalidadeuf = new Select('naturalidadeuf');
		$naturalidadeuf->setLabel('UF')
			->setAttributes(array(
				'id' => 'naturalidadeuf',
				'class' => 'form-control',
				'placeholder' => ''
			))
			->setValueOptions(array(
					""	=> "Selecione ...", 
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
					"TO"=>"Tocantins"
			));
		$this->add($naturalidadeuf);
		
		//pol_DataNascimento
		$datanascimento = new \Zend\Form\Element\Date('datanascimento');
		$datanascimento->setLabel('Data de Nascimento')
		->setAttributes(array(
				'id' => 'datanascimento',
				'class' => 'form-control',
		));
		$this->add($datanascimento);
		
		//pol_NomePai
		$nomepai = new Text('nomepai');
		$nomepai->setLabel('Nome do Pai')
		->setAttributes(array(
				'id' => 'nomepai',
				'class' => 'form-control',
				'placeholder' => ''
		));
		$this->add($nomepai);
		
		//pol_NomeMae
		$nomemae = new Text('nomemae');
		$nomemae->setLabel('Nome da Mãe')
		->setAttributes(array(
				'id' => 'nomemae',
				'class' => 'form-control',
				'placeholder' => ''
		));
		$this->add($nomemae);
		
		//pol_Sexo
		$sexo = new Select('sexo');
		$sexo->setLabel('Sexo')
			->setAttributes(array(
				'id' => 'sexo',
				'class' => 'form-control'
			))
			->SetValueOptions(array(
				'M' => 'Masculino',
				'F' => 'Feminino'
			));
		$this->add($sexo);
		
		//pol_CNH
		$cnh = new Text('cnh');
		$cnh->setLabel('Nº CNH')
		->setAttributes(array(
				'id' => 'cnh',
				'class' => 'form-control',
				'placeholder' => ''
		));
		$this->add($cnh);
		
		//pol_CNHCategoria
		$cnhcategoria = new Select('cnhcategoria');
		$cnhcategoria->setLabel('Cat')
			->setAttributes(array(
				'id' => 'cnhcategoria',
				'class' => 'form-control',
				'placeholder' => ''
			))
			->setValueOptions(array(
				''		=> 'Selecione...',
				'A'		=> 'A',
				'B'		=> 'B',
				'C'		=> 'C',
				'D'		=> 'D',
				'E'		=> 'E',
				'AB'		=> 'AB',
				'AC'		=> 'AC',
				'AD'		=> 'AD',
				'AE'		=> 'AE',
			));
		$this->add($cnhcategoria);
		
		//pol_CNHValidade
		$cnhvalidade = new Date('cnhvalidade');
		$cnhvalidade->setLabel('Validade')
		->setAttributes(array(
				'id' => 'cnhvalidade',
				'class' => 'form-control',
		));
		$this->add($cnhvalidade);
		
		//pol_EstadoCivil		
		$estadocivil = new Select('estadocivil');
		$estadocivil->setLabel('Estado Civil')
			->setAttributes(array(
				'id' => 'estadocivil',
				'class' => 'form-control',
			))
			->setValueOptions(array(
				''	=> 'Selecione ...',
				'1' => 'Solteiro',
				'2' => 'Casado',
				'3' => 'Separado/Desquitado',
				'4' => 'Divorciado',
				'5' => 'Viúvo',
				'6' => 'União Estável',
			));
		$this->add($estadocivil);
		
		
		//pol_TelefoneFixo
		$telefonefixo = new Text('telefonefixo');
		$telefonefixo->setLabel('Telefone Fixo')
		->setAttributes(array(
				'id' => 'telefonefixo',
				'class' => 'form-control',
				'placeholder' => ''
		));
		$this->add($telefonefixo);
		
		//pol_TelefoneCelular
		$telefonecelular = new Text('telefonecelular');
		$telefonecelular->setLabel('Celular')
		->setAttributes(array(
				'id' => 'telefonecelular',
				'class' => 'form-control',
				'placeholder' => ''
		));
		$this->add($telefonecelular);
		
		//pol_Email
		$email = new Text('email');
		$email->setLabel('Email')
		->setAttributes(array(
				'id' => 'email',
				'class' => 'form-control',
				'placeholder' => ''
		));
		$this->add($email);
		
		//pol_EnderecoUF
		$enderecouf = new Select('enderecouf');
		$enderecouf->setLabel('UF')
			->setAttributes(array(
				'id' => 'enderecouf',
				'class' => 'form-control',
				'placeholder' => ''
			))
			->setValueOptions(array(
				""	=> "Selecione ...",
				"AC"=>"Acre",
				"AL"=>"Alagoas",
				"AM"=>"Amazonas",
				"AP"=>"Amapá",
				"BA"=>"Bahia",
				"CE"=>"Ceará",
				"DF"=>"DF",
				"ES"=>"Espírito Santo",
				"GO"=>"GO",
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
				"TO"=>"Tocantins"
			));
		$this->add($enderecouf);
		
		//pol_EnderecoCidade
		$enderecocidade = new Text('enderecocidade');
		$enderecocidade->setLabel('Cidade')
		->setAttributes(array(
				'id' => 'enderecocidade',
				'class' => 'form-control',
				'placeholder' => ''
		));
		$this->add($enderecocidade);
		
		//pol_EnderecoBairro
		$enderecobairro = new Text('enderecobairro');
		$enderecobairro->setLabel('Bairro')
		->setAttributes(array(
				'id' => 'enderecobairro',
				'class' => 'form-control',
				'placeholder' => ''
		));
		$this->add($enderecobairro);
		
		//pol_EnderecoQuadra
		$enderecoquadra = new Text('enderecoquadra');
		$enderecoquadra->setLabel('Quadra')
		->setAttributes(array(
				'id' => 'enderecoquadra',
				'class' => 'form-control',
				'placeholder' => ''
		));
		$this->add($enderecoquadra);
		
		//pol_EnderecoConjunto
		$enderecoconjunto = new Text('enderecoconjunto');
		$enderecoconjunto->setLabel('Conjunto')
		->setAttributes(array(
				'id' => 'enderecoconjunto',
				'class' => 'form-control',
				'placeholder' => ''
		));
		$this->add($enderecoconjunto);
		
		//pol_EnderecoNumero
		$endereconumero = new Text('endereconumero');
		$endereconumero->setLabel('Número')
		->setAttributes(array(
				'id' => 'endereconumero',
				'class' => 'form-control',
				'placeholder' => ''
		));
		$this->add($endereconumero);
		
		//pol_EnderecoCEP
		$enderecocep = new Text('enderecocep');
		$enderecocep->setLabel('CEP')
		->setAttributes(array(
				'id' => 'enderecocep',
				'class' => 'form-control',
				'placeholder' => ''
		));
		$this->add($enderecocep);
		
		//pol_EnderecoTipo
		$enderecotipo = new Select('enderecotipo');
		$enderecotipo->setLabel('Tipo')
			->setAttributes(array(
				'id' => 'enderecotipo',
				'class' => 'form-control',
			))
			->setValueOptions(array(
				''		=> 'Selecione...',
				'P'		=> 'Própria',
				'A'		=> 'Alugada',
				'C'		=> 'Cedida',
			));
		$this->add($enderecotipo);
		
		//pol_EnderecoComplemento
		$enderecocomplemento = new Text('enderecocomplemento');
		$enderecocomplemento->setLabel('Complemento')
		->setAttributes(array(
				'id' => 'enderecocomplemento',
				'class' => 'form-control',
		));
		$this->add($enderecocomplemento);
		
		//pol_Matricula
		$matricula = new Text('matricula');
		$matricula->setLabel('Matrícula')
		->setAttributes(array(
				'id' => 'matricula',
				'class' => 'form-control',
		));
		$this->add($matricula);
		
		//pol_MatriculaSIAPE
		$matriculasiape = new Text('matriculasiape');
		$matriculasiape->setLabel('Id Única')
		->setAttributes(array(
				'id' => 'matriculasiape',
				'class' => 'form-control',
		));
		$this->add($matriculasiape);
		
		//pol_Comportamento
		$comportamento = new Select('comportamento');
		$comportamento->setLabel('Comportamento')
			->setAttributes(array(
				'id' => 'comportamento',
				'class' => 'form-control',
			))
			->setValueOptions(array(
				''	=> 'Selecione...',
				'E'	=> 'Excepcional',
				'O'	=> 'Ótimo',
				'B'	=> 'Bom',
				'I'	=> 'Insuficiente',
				'M'	=> 'Mau',
				'X' => 'Não Possui'
			));
		$this->add($comportamento);
		
		//pol_DataAdmissao
		$dataadmissao = new Date('dataadmissao');
		$dataadmissao->setLabel('Data de Admissão')
		->setAttributes(array(
				'id' => 'dataadmissao',
				'class' => 'form-control',
		));
		$this->add($dataadmissao);
		
		//pol_Quadro
		$quadro = new Select('quadro');
		$quadro->setLabel('Quadro')
			->setAttributes(array(
				'id' => 'quadro',
				'class' => 'form-control',
			))
			->setValueOptions(array(
				'pracas' => array(
					'label' => 'Praças',
					'options' => array (
						''	=> 'Selecione ...',
						'QPPMC'	=> 'QPPMC',
						'QPPMEMA'	=> 'QPPMEMA',
						'QPPMEMM'	=> 'QPPMEMM',
						'QPPMEM'	=> 'QPPMEM',
						'QPPMEMC'	=> 'QPPMEMC',
						'QPPMEAS-S'	=> 'QPPMEAS-S',
						'QPPMEAS-V'	=> 'QPPMEAS-V',
						'QPPMEC'	=> 'QPPMEC',
					),
				),
				'oficiais' => array(
					'label'	=> 'Oficiais',
					'options' => array(
						'QOPM'	=> 'QOPM',
						'QOPMS'	=> 'QOPMS',
						'QOPMC'	=> 'QOPMC',
						'QOPMA'	=> 'QOPMA',
						'QOPME'	=> 'QOPME',
						'QOPMM'	=> 'QOPMM',
					),
				),
			));
		$this->add($quadro);
		
		//pol_NomeGuerra
		$nomeguerra = new Text('nomeguerra');
		$nomeguerra->setLabel('Nome de Guerra')
		->setAttributes(array(
				'id' => 'nomeguerra',
				'class' => 'form-control',
				'placeholder' => ''
		));
		$this->add($nomeguerra);
		
		//pol_PostoGraduacao
		$postograduacao = new Select('postograduacao');
		$postograduacao->setLabel('Posto/Graduação')
			->setAttributes(array(
				'id' => 'postograduacao',
				'class' => 'form-control',
				'placeholder' => ''
			))
			->setValueOptions(array(
				'pracas' => array(
					'label' => 'Praças',
					'options' => array (
						''	=> 'Selecione ...',
						'Sd 2ª Classe'	=> 'Soldado 2ª Classe',
						'Sd'	=> 'Soldado',
						'Cb'	=> 'Cabo',
						'3º Sgt'	=> '3º Sargento',
						'2º Sgt'	=> '2º Sargento',
						'1º Sgt'	=> '1º Sargento',
						'ST'	=> 'Sub Tenente',
						'Cad'	=> 'Cadete',
						'Asp'	=> 'Aspirante Oficial',
					),
				),
				'oficiais' => array(
					'label'	=> 'Oficiais',
					'options' => array(
						'2º Ten'	=> '2º Tenente',
						'1º Ten'	=> '1º Tenente',
						'Cap'	=> 'Capitão',
						'Maj'	=> 'Major',
						'TC'	=> 'Tenente Coronel',
						'Cel'	=> 'Coronel',
					),
				),
			));
		$this->add($postograduacao);
		
		//pol_TipoSangue
		$tiposangue = new Select('tiposangue');
		$tiposangue->setLabel('Tip. Sangue')
			->setAttributes(array(
				'id' => 'tiposangue',
				'class' => 'form-control',
			))
			->setValueOptions(array(
				'A+'	=> "A+",
				'A-'	=> "A-",
				'B+'	=> "B+",
				'B-'	=> "B-",
				'AB+'	=> "AB+",
				'AB-'	=> "AB-",
				'O+'	=> "O+",
				'O-'	=> "O-",
			));
		$this->add($tiposangue);
		
		//pol_DoadorSangue
		$doadorsangue = new Select('doadorsangue');
		$doadorsangue->setLabel('Doador?')
			->setAttributes(array(
				'id' => 'doadorsangue',
				'class' => 'form-control',
			))
			->setValueOptions(array(
				'S'	=> "Sim",
				'N'	=> "Não",
			));
		$this->add($doadorsangue);
		
		//pol_FuncionalTipo
		$funcionaltipo = new Select('funcionaltipo');
		$funcionaltipo->setLabel('Func. Tipo')
			->setAttributes(array(
				'id' => 'funcionaltipo',
				'class' => 'form-control',
			))
			->setValueOptions(array(
				'' => 'Selecione...',
				'N'	=> "Normal",
				'I'	=> "Indeterminada",
			));
		$this->add($funcionaltipo);
		
		//pol_IdentidadeFuncionalValidade
		$identidadefuncionalvalidade = new Date('identidadefuncionalvalidade');
		$identidadefuncionalvalidade->setLabel('Validade')
		->setAttributes(array(
				'id' => 'identidadefuncionalvalidade',
				'class' => 'form-control',
				'readonly' => '',
		));
		$this->add($identidadefuncionalvalidade);
		
		//pol_PorteArmaSituacao
		$portearmasituacao = new Select('portearmasituacao');
		$portearmasituacao->setLabel('Porte Arma')
			->setAttributes(array(
				'id' => 'portearmasituacao',
				'class' => 'form-control',
			))
			->setValueOptions(array(
				'' => 'Selecione...',
				'1'	=> "Regular",
				'2'	=> "Suspenso",
			));
		$this->add($portearmasituacao);
		
		//pol_PISPASEP
		$pispasep = new Text('pispasep');
		$pispasep->setLabel('PASEP')
		->setAttributes(array(
				'id' => 'pispasep',
				'class' => 'form-control',
				'placeholder' => ''
		));
		$this->add($pispasep);
		
		//pol_SubUnidade
		$subunidade = new Select('subunidade');
		$subunidade->setLabel('Sub Unidade')
		->setAttributes(array(
				'id' => 'subunidade',
				'class' => 'form-control',
		))
		->setValueOptions(array(
				'' => 'Selecione...',
				'Btl' => 'Batalhão',
				'GPTur' => 'Grupamento Turístico',
				'CiaLeste' => 'Cia Rural Leste',
				'CiaOeste' => 'Cia Rural Oeste',
				'CiaSul' => 'Cia Rural Sul',
				'GOA' => 'Grupamento de Operações Ambientais',
				'TRC' => 'Transferido / Reserva / Curso'
		));
		$this->add($subunidade);
		
		//pol_Lotacao
		$lotacao = new Select('lotacao');
		$lotacao->setLabel('Lotação')
		->setAttributes(array(
				'id' => 'lotacao',
				'class' => 'form-control',
		))
		->setValueOptions(array(
				'' => 'Selecione...',
				'Cmd' => 'Comando',
				'SAd' => 'Seção Administrativa',
				'NGP' => 'Núcleo de Gestão de Pessoal',
				'NCC' => 'Núcleo de Controle e Correição',
				'Sec' => 'Secretaria',
				'NCS' => 'Núcleo de Comunicação Social',
				'NProj' => 'Núcleo de Projetos',
				'Almox' => 'Almoxarifado',
				'NMan' => 'Núcleo de Manutenção',
				'SOp' => 'Seção Operacional',
				'SSInt' => 'SubSeção de Inteligência',
				'NEEC' => 'NEEC',
				'NEAM' => 'NEAM',
				'CeAPA' => 'Centro de Acolhimento Provisório de Animais',
				'CiaApoio' => 'Companhia de Apoio',
				'ServInter' => 'Serviço Interno',
				'Lac' => 'Lacustre',
				'RPA' => 'Rádio Patrulhamento Ambiental',
				'GOC' => 'Grupo de Operações do Cerrado',
				'GTA' => 'Grupo Tático Ambiental',
				'RPR' => 'Rádio Patrulhamento',
				'Exp' => 'Expediente SubUnidade',
				'RM' => 'Restrição Médica',
				'DM' => 'Dispensa Médica',
		));
		$this->add($lotacao);
		
		//pol_ServicoPosto
		$servicoposto = new Text('servicoposto');
		$servicoposto->setLabel('Posto')
		->setAttributes(array(
				'id' => 'servicoposto',
				'class' => 'form-control',
		));
		$this->add($servicoposto);
		
		//pol_ServicoFuncao
		$servicofuncao = new Text('servicofuncao');
		$servicofuncao->setLabel('Função')
		->setAttributes(array(
				'id' => 'servicofuncao',
				'class' => 'form-control',
		));
		$this->add($servicofuncao);
		
		//pol_ServicoEscala
		$servicoescala = new Select('servicoescala');
		$servicoescala->setLabel('Escala')
			->setAttributes(array(
				'id' => 'servicoescala',
				'class' => 'form-control',
			))
			->setValueOptions(array(
				'' => 'Selecione...',
				'1' => 'Expediente',
				'2' => '12x36',
				'3' => '12x60',
				'4' => '24x72',
				'5' => '6x18',
				'6' => '8x40',
			));
		$this->add($servicoescala);
		
		//pol_ServicoHorario
		$servicohorario = new Select('servicohorario');
		$servicohorario->setLabel('Horário')
			->setAttributes(array(
				'id' => 'servicohorario',
				'class' => 'form-control',
			))
			->setValueOptions(array(
				'' => 'Selecione...',
				'6' => '06:00h',
				'7' => '07:00h',
				'8' => '08:00h',
				'9' => '09:00h',
				'10' => '10:00h',
				'11' => '11:00h',
				'12' => '12:00h',
				'13' => '13:00h',
				'14' => '14:00h',
				'15' => '15:00h',
				'16' => '16:00h',
				'17' => '17:00h',
				'18' => '18:00h',
				'19' => '19:00h',
				'20' => '20:00h',
				'21' => '21:00h',
			));
		$this->add($servicohorario);
		
		//pol_BienalValidade
		$bienalvalidade = new Date('bienalvalidade');
		$bienalvalidade->setLabel('Bienal')
		->setAttributes(array(
				'id' => 'bienalvalidade',
				'class' => 'form-control',
		));
		$this->add($bienalvalidade);
		
		//pol_TAFValidade
		$tafvalidade = new Date('tafvalidade');
		$tafvalidade->setLabel('TAF')
		->setAttributes(array(
				'id' => 'tafvalidade',
				'class' => 'form-control',
		));
		$this->add($tafvalidade);
		
		//pol_Antiguidade
		$antiguidade = new Text('antiguidade');
		$antiguidade->setLabel('Antiguidade')
		->setAttributes(array(
				'id' => 'antiguidade',
				'class' => 'form-control',
				'placeholder' => ''
		));
		$this->add($antiguidade);
		
		//pol_Foto
		$foto = new Text('foto');
		$foto->setLabel('')
		->setAttributes(array(
				'id' => 'foto',
				'class' => 'form-control',
				'placeholder' => ''
		));
		$this->add($foto);
		
		//pol_FotoTipo
		$fototipo = new Text('fototipo');
		$fototipo->setLabel('')
			->setAttributes(array(
				'id' => 'fototipo',
				'class' => 'form-control',
				'placeholder' => ''
			));
		$this->add($fototipo);
		
		//pol_AtualizacaoCadastro
		$atualizacaocadastro = new Select('atualizacaocadastro');
		$atualizacaocadastro->setLabel('Atualizado?')
		->setAttributes(array(
				'id' => 'atualizacaocadastro',
				'class' => 'form-control'
		))
		->SetValueOptions(array(
				'' => 'Selecione',
				'Atualizado' => 'Atualizado',
				'Pendente' => 'Pendente'
		));
		$this->add($atualizacaocadastro);
		
		//submit
		$submit = new Submit('submit');
		$submit->setAttributes(array(
				'id' => 'submit',
				'value' => 'Enviar',
				'type' => 'button',
				'class' => 'btn btn-default'
		));
		$this->add($submit);
		
		
	}
}