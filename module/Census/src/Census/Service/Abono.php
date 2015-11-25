<?php 

namespace Census\Service;

use ZendService\LiveDocx\MailMerge;

class Abono extends AbstractService
{
	private $codigo;
	private $nomePolicial;
	private $postoGraduacao;
	private $matricula;
	private $matriculaSiape;
	private $identificacaoUnica;
	private $quantidadeDias;
	private $inicioAbono;
	private $fimAbono;
	private $dataAtual;
	private $dataInclusao;
	private $email;
	private $comportamento;
	private $telefone;
	private $faltaInjustificada;
	private $gozosAnteriores;
	private $sargenteante;
	private $chefeNgp;
	private $subUnidade;
	private $chefeImediato;
	private $funcaoChefe;
	
	function __construct($id,$data,$quantidadeDias,$chefeImediato, array $dados)
	{
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		
		$inicioAbono = new \DateTime($data);
		$dataInicio = strftime('%d de %B de %Y', strtotime($inicioAbono->format('Y-m-d')));
		$fimAbono = $inicioAbono->modify(($quantidadeDias - 1).' days');
		$dataFim = strftime('%d de %B de %Y', strtotime($fimAbono->format('Y-m-d')));
		$dataHoje = new \DateTime();
		$dataAtual = strftime('%d de %B de %Y', strtotime($dataHoje->format('Y-m-d')));
		$dataAdmissao =  $dados['dataadmissao']->format('d-m-Y');
		
		$this->codigo = $id;
		$this->nomePolicial = $dados['nomecompleto'];
		$this->postoGraduacao = $dados['postograduacao'];
		$this->matricula = $dados['matricula'];
		$this->matriculaSiape = substr($dados['matriculasiape'],1,7);
		$this->identificacaoUnica = $dados['matriculasiape'];
		switch ($quantidadeDias)
		{
			case 1:
				$quantidadeDias = "(1) um";
				break;
			case 2:
				$quantidadeDias = "(2) dois";
				break;
			case 3:
				$quantidadeDias = "(3) três";
				break;
			case 4:
				$quantidadeDias = "(4) quatro";
				break;
			case 5:
				$quantidadeDias = "(5) cinco";
				break;
		}
		$this->quantidadeDias = $quantidadeDias;
		
		$this->inicioAbono = $dataInicio;
		$this->fimAbono = $dataFim;
		$this->dataAtual = $dataAtual;
		$this->dataInclusao = $dataAdmissao;
		$this->email = $dados['email'];
		$comportamento ="";
		
		switch ($dados['comportamento'])
		{
			case 'E':
				$comportamento = "Excepcional";
				break;
			case 'O':
				$comportamento = "Ótimo";
				break;
			case 'B':
				$comportamento = "Bom";
				break;
			case 'I':
				$comportamento = "Insuficiente";
				break;
			case 'M':
				$comportamento = "Mau";
				break;
			case 'X':
				$comportamento = "Não Possui";
				break;
		}
		$this->comportamento = $comportamento;
		$this->telefone = $dados['telefonecelular'];
		$this->faltaInjustificada = "Não cometeu falta injustificada no ano de 2015";
		$this->gozosAnteriores = "Não gozou abono anteriormente";
		$this->sargenteante = "Ildemar Oliveira Guimarães - 1º Sgt QPPMC";
		$this->chefeNgp = "Ildemar Oliveira Guimarães - 1º Sgt QPPMC";
		
		switch ($dados['subunidade'])
		{
			case 'Btl':
				$this->subUnidade = "Seção Administrativa";
				$this->funcaoChefe = "Chefe da Seção Administrativa";
				break;
			case 'GOA':
				$this->subUnidade = "Grupamento de Operações Ambientais";
				$this->funcaoChefe = "Comandante do GOA";
				break;
			case 'CiaSul':
				$this->subUnidade = "Companhia Rural Sul";
				$this->funcaoChefe = "Comandante da Companhia Rural Sul";
				break;
			case 'CiaOeste':
				$this->subUnidade = "Companhia Rural Oeste";
				$this->funcaoChefe = "Comandante da Companhia Rural Oeste";
				break;
			case 'CiaLeste':
				$this->subUnidade = "Companhia Rural Leste";
				$this->funcaoChefe = "Comandante da Companhia Rural Leste";
				break;
			case 'GPTur':
				$this->subUnidade = "Grupamento Policiamento Turístico";
				$this->funcaoChefe = "Comandante do GPTur";
				break;
		}
		
		$this->chefeImediato = $chefeImediato;
		
		
  		/* echo "<pre>";
		print_r($this);
		echo "</pre>"; */
		
		$this->geraRequerimento();
	}
	
	function buscaDados()
	{
		$query = $this->getEm()->createQuery("SELECT p.codigo,p.matricula,p.matriculasiape,p.dataadmissao,p.email,p.comportamento,
				p.telefonecelular, p.lotacao,p.postograduacao,p.nomeguerra FROM Census\Entity\Policial p WHERE p.codigo = :codigo");
		
		$query->setParameter('codigo',$id);
		
		$dados = $query->getResult();
		
	}
		
	function geraRequerimento()
	{
		//$locale    = Locale::getDefault();
		$timestamp = time();

		$mailMerge = new MailMerge();

		$mailMerge->setUsername('clauderlima')
			->setPassword('cclvcldf')
			->setService (MailMerge::SERVICE_FREE);  // for LiveDocx Premium, use MailMerge::SERVICE_PREMIUM
		
		$mailMerge->setLocalTemplate('data\abono.docx');
		
		
		$mailMerge->assign('nomePolicial', $this->nomePolicial)
		->assign('postoGraduacao', $this->postoGraduacao)
		->assign('matricula',  $this->matricula)
		->assign('matriculaSiape',  $this->matriculaSiape)
		->assign('identificacaoUnica',  $this->identificacaoUnica)
		->assign('quantidadeDias', $this->quantidadeDias)
		->assign('inicioAbono', $this->inicioAbono)
		->assign('fimAbono', $this->fimAbono)
		->assign('dataAtual', $this->dataAtual)
		->assign('dataInclusao', $this->dataInclusao)
		->assign('email', $this->email)
		->assign('comportamento', $this->comportamento)
		->assign('telefone', $this->telefone)
		->assign('faltaInjustificada', $this->faltaInjustificada)
		->assign('gozosAnteriores', $this->gozosAnteriores)
		->assign('sargenteante', $this->sargenteante)
		->assign('chefeNGp', $this->chefeNgp)
		->assign('lotacao', $this->subUnidade)
		->assign('funcaochefe', $this->funcaoChefe)
		->assign('chefeImediato', $this->chefeImediato);
		
		$mailMerge->createDocument();
		
		$document = $mailMerge->retrieveDocument('pdf');
		
		$filename = 'requerimentos\abono\Abono-' . $this->matricula . '.pdf';
		
		file_put_contents($filename, $document);
		
		unset($mailMerge);
		
		header("Content-Type: application/pdf");
		echo file_get_contents("$filename");
		
	}
	
	function alteraData($data)
	{
		$dia = date('d', strtotime($data));
		$mes = date('F', strtotime($data));
		$ano = date('Y', strtotime($data));
		
		$data = "$dia de $mes de $ano";
		
		return $data;
	}
}