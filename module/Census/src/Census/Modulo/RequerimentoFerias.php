<?php

namespace Census\Modulo;

use ZendService\LiveDocx\MailMerge;

class RequerimentoFerias extends Requerimento
{	
	private $anoExercicioFerias;
	private $feriasProgramacao;
	private $novaProgramacao;
	private $polferiasSubunidade;
	private $umDozeSubunidade;
	private $polferiasBatalhao;
	private $umDozeBatalhao;
	private $qtdFeriasNaoGozadas;
	private $primeiraParcelaInicio;
	private $primeiraParcelaQtdDias;
	private $segundaParcelaInicio;
	private $segundaParcelaQtdDias;
	private $terceiraParcelaInicio;
	private $terceiraParcelaQtdDias;
	private $momentoOportuno;
	private $naoGozo;
	
	public function requerreproferias($id, $anoreferencia, $novomes)
	{
		// Configuração para gerar datas em português
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		
		$this->anoExercicioFerias = $anoreferencia;
		$this->novaProgramacao = $novomes;
		$this->tipo = "Reprogramação de Férias";
		
		$this->buscaDados($id);
		
		// Instanciando o Entity Manager
		$em = $this->sm->get('Doctrine\ORM\EntityManager');
		
		// feriasProgramacao
		$feriasprogramacao = $em->createQueryBuilder()
			->select('f')
			->from('Census\Entity\Ferias', 'f')
			->where('f.polcodigo = :polcodigo AND f.anoreferencia = :anoref')
			->setParameter('polcodigo', $id)
			->setParameter('anoref', $this->anoExercicioFerias)
			->orderBy('f.codigo', 'ASC')
			->getQuery()->getResult();
			
		if ($feriasprogramacao) 
		{
			$this->feriasProgramacao = $feriasprogramacao['0']->getProgramacao();
		} else 
		{
			$this->feriasProgramacao = "NULO";
		}
		// Calculo de efetivo
		
		$efetivobatalhao = $em->createQueryBuilder()
			->select('count(p)')
			->from('Census\Entity\Policial', 'p')
			->where('p.subunidade <> :trc')
			->setParameter('trc', 'TRC')
			->getQuery()->getResult();
		
		$this->umDozeBatalhao = ceil($efetivobatalhao[0][1]/12);
		
		$efetivoSubunidade = $em->createQueryBuilder()
			->select('count(s)')
			->from('Census\Entity\Policial', 's')
			->where('s.subunidade = :subunidade')
			->setParameter('subunidade', $this->subunidade)
			->getQuery()->getResult();
		
		$this->umDozeSubunidade = ceil($efetivoSubunidade[0][1]/12);
		
		$polferBatalhao = $em->createQueryBuilder()
			->select('count(f)')
			->from('Census\Entity\Ferias', 'f')
			->where('f.programacao = :mes')
			->setParameter('mes', $this->novaProgramacao)
			->getQuery()->getResult();
		
		$this->polferiasBatalhao = $polferBatalhao[0][1];
		
		$polferSubunidade = $em->createQueryBuilder()
			->select('count(f)')
			->from('Census\Entity\Ferias', 'f')
			->innerJoin('f.polcodigo', 'p')
			->where('p.subunidade = :subunidade AND f.programacao = :novomes')
			->setParameter('subunidade', $this->subunidade)
			->setParameter('novomes', $this->novaProgramacao)
			->getQuery()->getResult();

		$this->polferiasSubunidade = $polferSubunidade[0][1];
		
		// Gerando dados para incluir no banco
		$data = array(
				'tipo' => $this->tipo,
				'nomepolicial' => $this->nomePolicial,
				'postograduacao' => $this->postoGraduacao,
				'matricula' => $this->matricula,
				'matriculasiape' => $this->matriculaSiape,
				'identificacaounica' => $this->identificacaoUnica,
				'anoreferencia' => $this->anoExercicioFerias,
				'feriasprogramacao' => $this->feriasProgramacao,
				'novaprogramacao' => $this->novaProgramacao,
				'datasolicitacao' => $this->dataAtual,
				'datainclusao' => $this->dataInclusao,
				'email' => $this->email,
				'comportamento' => $this->comportamento,
				'telefone' => $this->telefone,
				'polferiassubunidade' => $this->polferiasSubunidade,
				'umdozesubunidade' => $this->umDozeSubunidade,
				'polferiasbatalhao' => $this->polferiasBatalhao,
				'umdozebatalhao' => $this->umDozeBatalhao,
				'sargenteante' => $this->sargenteante,
				'funcaosargenteante' => $this->funcaoSargenteante,
				'chefengp' => $this->chefeNgp,
				'funcaochefengp' => $this->funcaoChefeNgp,
				'chefesad' => $this->chefeSAd,
				'funcaochefeSad' => $this->funcaoChefeSAd,
				'lotacao' => $this->lotacao,
				'chefeimediato' => $this->chefeImediato,
				'funcaochefe' => $this->funcaochefe,
				'comandante' => $this->comandante,
				'funcaocomandante' => $this->funcaocomandante,
				'decisao' => $this->decisao,
				'dataDecisao' => $this->datadecisao,
				'template' => $this->template,
				'polcodigo' => $id
		);
		
		$service = $this->sm->get('census-service-requerimentoferias');
		$service->insert($data, 'Census\Entity\RequerimentoFerias');
		
		//Verificar o conflito que esta dando com o controle de Férias e a Programação de Férias
		
	}

function imprimir(array $data)
	{
		// Configuração para gerar datas em português
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	
		// Preparando os dados 
		$data['datasolicitacao'] = strftime('%d de %B de %Y', strtotime($data['datasolicitacao']->format('Y-m-d')));
		$data['datainclusao'] = $data['datainclusao']->format('d/m/Y');
		
		switch ($data['feriasprogramacao']) {
			case 'JAN':
				$data['feriasprogramacao'] = "Janeiro";
				break;
			case 'FEV':
				$data['feriasprogramacao'] = "Fevereiro";
				break;
			case 'MAR':
				$data['feriasprogramacao'] = "Março";
				break;
			case 'ABR':
				$data['feriasprogramacao'] = "Abril";
				break;
			case 'MAI':
				$data['feriasprogramacao'] = "Maio";
				break;
			case 'JUN':
				$data['feriasprogramacao'] = "Junho";
				break;
			case 'JUL':
				$data['feriasprogramacao'] = "Julho";
				break;
			case 'AGO':
				$data['feriasprogramacao'] = "Agosto";
				break;
			case 'SET':
				$data['feriasprogramacao'] = "Setembro";
				break;
			case 'OUT':
				$data['feriasprogramacao'] = "Outubro";
				break;
			case 'NOV':
				$data['feriasprogramacao'] = "Novembro";
				break;
			case 'DEZ':
				$data['feriasprogramacao'] = "Dezembro";
				break;
		}
		
		switch ($data['novaprogramacao']) {
			case 'JAN':
				$data['novaprogramacao'] = "Janeiro";
				break;
			case 'FEV':
				$data['novaprogramacao'] = "Fevereiro";
				break;
			case 'MAR':
				$data['novaprogramacao'] = "Março";
				break;
			case 'ABR':
				$data['novaprogramacao'] = "Abril";
				break;
			case 'MAI':
				$data['novaprogramacao'] = "Maio";
				break;
			case 'JUN':
				$data['novaprogramacao'] = "Junho";
				break;
			case 'JUL':
				$data['novaprogramacao'] = "Julho";
				break;
			case 'AGO':
				$data['novaprogramacao'] = "Agosto";
				break;
			case 'SET':
				$data['novaprogramacao'] = "Setembro";
				break;
			case 'OUT':
				$data['novaprogramacao'] = "Outubro";
				break;
			case 'NOV':
				$data['novaprogramacao'] = "Novembro";
				break;
			case 'DEZ':
				$data['novaprogramacao'] = "Dezembro";
				break;
		}
		
		$mailMerge = new MailMerge();
	
		$mailMerge->setUsername('clauderlima')
		->setPassword('cclvcldf')
		->setService (MailMerge::SERVICE_FREE);  // for LiveDocx Premium, use MailMerge::SERVICE_PREMIUM
	
		if ($data['template'] == 'BTL')
		{
			$mailMerge->setLocalTemplate('data\reproferias-btl.docx');
		} else 
		{
			$mailMerge->setLocalTemplate('data\reproferias-cia.docx');
		}
	
		$mailMerge->assign('numero', $data['numero'])
				->assign('nomePolicial', $data['nomepolicial'])
				->assign('postoGraduacao', $data['postograduacao'])
				->assign('matricula',  $data['matricula'])
				->assign('matriculaSiape',  $data['matriculasiape'])
				->assign('identificacaoUnica',  $data['identificacaounica'])
				->assign('anoExercicioFerias', $data['anoreferencia'])
				->assign('feriasProgramacao', $data['feriasprogramacao'])
				->assign('novaProgramacao', $data['novaprogramacao'])
				->assign('dataAtual', $data['datasolicitacao'])
				->assign('dataInclusao', $data['datainclusao'])
				->assign('email', $data['email'])
				->assign('comportamento', $data['comportamento'])
				->assign('telefone', $data['telefone'])
				
				->assign('polferiasSubunidade', $data['polferiassubunidade'])
				->assign('umDozeSubunidade', $data['umdozesubunidade'])
				->assign('polferiasBatalhao', $data['polferiasbatalhao'])
				->assign('umDozeBatalhao', $data['umdozebatalhao'])
				->assign('sargenteante', $data['sargenteante'])
				->assign('funcaoSargenteante', $data['funcaosargenteante'])
				->assign('chefeNgp', $data['chefengp'])
				->assign('funcaoChefeNgp', $data['funcaochefengp'])
				->assign('chefeSAd', $data['chefesad'])
				->assign('funcaoChefeSAd', $data['funcaochefesad'])

				->assign('comandante', $data['comandante'])
				->assign('funcaocomandante', $data['funcaocomandante'])
				->assign('lotacao', $data['lotacao'])
				->assign('funcaochefe', $data['funcaochefe'])
				->assign('chefeImediato', $data['chefeimediato']);
	
		$mailMerge->createDocument();
	
		$document = $mailMerge->retrieveDocument('pdf');
	
		if ($this->template == 'BTL')
		{
			$filename = 'c:\BPMA\requerimentos\abono\Abono-' . $this->numero . '-BTL-' . $this->matricula . '.pdf';
		} else 
		{
			$filename = 'c:\BPMA\requerimentos\abono\Abono-' . $this->numero . '-CIA-' . $this->matricula . '.pdf';
		}
		
		file_put_contents($filename, $document);
	
		unset($mailMerge);
	
		header("Content-Type: application/pdf");
		echo file_get_contents($filename);
	}
	
	public function requernaogozo($id, $anoreferencia)
	{
		// Configuração para gerar datas em português
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	
		$this->anoExercicioFerias = $anoreferencia;
		$this->tipo = "Não Gozo de Férias";
	
		$this->buscaDados($id);
	
		// Instanciando o Entity Manager
		$em = $this->sm->get('Doctrine\ORM\EntityManager');
	
		// feriasProgramacao
		$feriasprogramacao = $em->createQueryBuilder()
		->select('f')
		->from('Census\Entity\Ferias', 'f')
		->where('f.polcodigo = :polcodigo AND f.anoreferencia = :anoref')
		->setParameter('polcodigo', $id)
		->setParameter('anoref', $this->anoExercicioFerias)
		->orderBy('f.codigo', 'ASC')
		->getQuery()->getResult();
			
		if ($feriasprogramacao)
		{
			$this->feriasProgramacao = $feriasprogramacao['0']->getProgramacao();
		} else
		{
			$this->feriasProgramacao = "NULO";
		}
		// Calculo de efetivo
	
		$efetivobatalhao = $em->createQueryBuilder()
		->select('count(p)')
		->from('Census\Entity\Policial', 'p')
		->where('p.subunidade <> :trc')
		->setParameter('trc', 'TRC')
		->getQuery()->getResult();
	
		$this->umDozeBatalhao = ceil($efetivobatalhao[0][1]/12);
	
		$efetivoSubunidade = $em->createQueryBuilder()
		->select('count(s)')
		->from('Census\Entity\Policial', 's')
		->where('s.subunidade = :subunidade')
		->setParameter('subunidade', $this->subunidade)
		->getQuery()->getResult();
	
		$this->umDozeSubunidade = ceil($efetivoSubunidade[0][1]/12);
	
		$polferBatalhao = $em->createQueryBuilder()
		->select('count(f)')
		->from('Census\Entity\Ferias', 'f')
		->where('f.programacao = :mes')
		->setParameter('mes', $this->novaProgramacao)
		->getQuery()->getResult();
	
		$this->polferiasBatalhao = $polferBatalhao[0][1];
	
		$polferSubunidade = $em->createQueryBuilder()
		->select('count(f)')
		->from('Census\Entity\Ferias', 'f')
		->innerJoin('f.polcodigo', 'p')
		->where('p.subunidade = :subunidade AND f.programacao = :novomes')
		->setParameter('subunidade', $this->subunidade)
		->setParameter('novomes', $this->novaProgramacao)
		->getQuery()->getResult();
	
		$this->polferiasSubunidade = $polferSubunidade[0][1];
		
		// Pesquisar férias não gozadas
	
		// Gerando dados para incluir no banco
		$data = array(
				'tipo' => $this->tipo,
				'nomepolicial' => $this->nomePolicial,
				'postograduacao' => $this->postoGraduacao,
				'matricula' => $this->matricula,
				'matriculasiape' => $this->matriculaSiape,
				'identificacaounica' => $this->identificacaoUnica,
				'anoreferencia' => $this->anoExercicioFerias,
				'feriasprogramacao' => $this->feriasProgramacao,
				'novaprogramacao' => $this->novaProgramacao,
				'datasolicitacao' => $this->dataAtual,
				'datainclusao' => $this->dataInclusao,
				'email' => $this->email,
				'comportamento' => $this->comportamento,
				'telefone' => $this->telefone,
				'polferiassubunidade' => $this->polferiasSubunidade,
				'umdozesubunidade' => $this->umDozeSubunidade,
				'polferiasbatalhao' => $this->polferiasBatalhao,
				'umdozebatalhao' => $this->umDozeBatalhao,
				'qtdFeriasNaoGozadas' => $this->qtdFeriasNaoGozadas,
				'sargenteante' => $this->sargenteante,
				'funcaosargenteante' => $this->funcaoSargenteante,
				'chefengp' => $this->chefeNgp,
				'funcaochefengp' => $this->funcaoChefeNgp,
				'chefesad' => $this->chefeSAd,
				'funcaochefeSad' => $this->funcaoChefeSAd,
				'lotacao' => $this->lotacao,
				'chefeimediato' => $this->chefeImediato,
				'funcaochefe' => $this->funcaochefe,
				'comandante' => $this->comandante,
				'funcaocomandante' => $this->funcaocomandante,
				'decisao' => $this->decisao,
				'dataDecisao' => $this->datadecisao,
				'template' => $this->template,
				'polcodigo' => $id
		);
	
		
		$service = $this->sm->get('census-service-requerimentoferias');
		$service->insert($data, 'Census\Entity\RequerimentoFerias');
	
		//Verificar o conflito que esta dando com o controle de Férias e a Programação de Férias
	
	}
	
	function imprimirnaogozo(array $data)
	{
		// Configuração para gerar datas em português
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	
		// Preparando os dados
		$data['datasolicitacao'] = strftime('%d de %B de %Y', strtotime($data['datasolicitacao']->format('Y-m-d')));
		$data['datainclusao'] = $data['datainclusao']->format('d/m/Y');
	
		switch ($data['feriasprogramacao']) {
			case 'JAN':
				$data['feriasprogramacao'] = "Janeiro";
				break;
			case 'FEV':
				$data['feriasprogramacao'] = "Fevereiro";
				break;
			case 'MAR':
				$data['feriasprogramacao'] = "Março";
				break;
			case 'ABR':
				$data['feriasprogramacao'] = "Abril";
				break;
			case 'MAI':
				$data['feriasprogramacao'] = "Maio";
				break;
			case 'JUN':
				$data['feriasprogramacao'] = "Junho";
				break;
			case 'JUL':
				$data['feriasprogramacao'] = "Julho";
				break;
			case 'AGO':
				$data['feriasprogramacao'] = "Agosto";
				break;
			case 'SET':
				$data['feriasprogramacao'] = "Setembro";
				break;
			case 'OUT':
				$data['feriasprogramacao'] = "Outubro";
				break;
			case 'NOV':
				$data['feriasprogramacao'] = "Novembro";
				break;
			case 'DEZ':
				$data['feriasprogramacao'] = "Dezembro";
				break;
		}
	
	
		$mailMerge = new MailMerge();
	
		$mailMerge->setUsername('clauderlima')
		->setPassword('cclvcldf')
		->setService (MailMerge::SERVICE_FREE);  // for LiveDocx Premium, use MailMerge::SERVICE_PREMIUM
	
		if ($data['template'] == 'BTL')
		{
			$mailMerge->setLocalTemplate('data\naogozoferias-btl.docx');
		} else
		{
			$mailMerge->setLocalTemplate('data\naogozoferias-cia.docx');
		}
	
		$mailMerge->assign('numero', $data['numero'])
		->assign('nomePolicial', $data['nomepolicial'])
		->assign('postoGraduacao', $data['postograduacao'])
		->assign('matricula',  $data['matricula'])
		->assign('matriculaSiape',  $data['matriculasiape'])
		->assign('identificacaoUnica',  $data['identificacaounica'])
		->assign('anoExercicioFerias', $data['anoreferencia'])
		->assign('feriasProgramacao', $data['feriasprogramacao'])
		->assign('novaProgramacao', $data['novaprogramacao'])
		->assign('dataAtual', $data['datasolicitacao'])
		->assign('dataInclusao', $data['datainclusao'])
		->assign('email', $data['email'])
		->assign('comportamento', $data['comportamento'])
		->assign('telefone', $data['telefone'])
	
		->assign('polferiasSubunidade', $data['polferiassubunidade'])
		->assign('umDozeSubunidade', $data['umdozesubunidade'])
		->assign('polferiasBatalhao', $data['polferiasbatalhao'])
		->assign('umDozeBatalhao', $data['umdozebatalhao'])
		->assign('sargenteante', $data['sargenteante'])
		->assign('funcaoSargenteante', $data['funcaosargenteante'])
		->assign('chefeNgp', $data['chefengp'])
		->assign('funcaoChefeNgp', $data['funcaochefengp'])
		->assign('chefeSAd', $data['chefesad'])
		->assign('funcaoChefeSAd', $data['funcaochefesad'])
	
		->assign('comandante', $data['comandante'])
		->assign('funcaocomandante', $data['funcaocomandante'])
		->assign('lotacao', $data['lotacao'])
		->assign('funcaochefe', $data['funcaochefe'])
		->assign('chefeImediato', $data['chefeimediato']);
	
		$mailMerge->createDocument();
	
		$document = $mailMerge->retrieveDocument('pdf');
	
		if ($this->template == 'BTL')
		{
			$filename = 'c:\BPMA\requerimentos\abono\Abono-' . $this->numero . '-BTL-' . $this->matricula . '.pdf';
		} else
		{
			$filename = 'c:\BPMA\requerimentos\abono\Abono-' . $this->numero . '-CIA-' . $this->matricula . '.pdf';
		}
	
		file_put_contents($filename, $document);
	
		unset($mailMerge);
	
		header("Content-Type: application/pdf");
		echo file_get_contents($filename);
	}
	
	function imprimirreproferias(array $data)
	{
		// Configuração para gerar datas em português
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	
		// Preparando os dados
		$data['datasolicitacao'] = strftime('%d de %B de %Y', strtotime($data['datasolicitacao']->format('Y-m-d')));
		$data['datainclusao'] = $data['datainclusao']->format('d/m/Y');
	
		switch ($data['feriasprogramacao']) {
			case 'JAN':
				$data['feriasprogramacao'] = "Janeiro";
				break;
			case 'FEV':
				$data['feriasprogramacao'] = "Fevereiro";
				break;
			case 'MAR':
				$data['feriasprogramacao'] = "Março";
				break;
			case 'ABR':
				$data['feriasprogramacao'] = "Abril";
				break;
			case 'MAI':
				$data['feriasprogramacao'] = "Maio";
				break;
			case 'JUN':
				$data['feriasprogramacao'] = "Junho";
				break;
			case 'JUL':
				$data['feriasprogramacao'] = "Julho";
				break;
			case 'AGO':
				$data['feriasprogramacao'] = "Agosto";
				break;
			case 'SET':
				$data['feriasprogramacao'] = "Setembro";
				break;
			case 'OUT':
				$data['feriasprogramacao'] = "Outubro";
				break;
			case 'NOV':
				$data['feriasprogramacao'] = "Novembro";
				break;
			case 'DEZ':
				$data['feriasprogramacao'] = "Dezembro";
				break;
		}
	
		switch ($data['novaprogramacao']) {
			case 'JAN':
				$data['novaprogramacao'] = "Janeiro";
				break;
			case 'FEV':
				$data['novaprogramacao'] = "Fevereiro";
				break;
			case 'MAR':
				$data['novaprogramacao'] = "Março";
				break;
			case 'ABR':
				$data['novaprogramacao'] = "Abril";
				break;
			case 'MAI':
				$data['novaprogramacao'] = "Maio";
				break;
			case 'JUN':
				$data['novaprogramacao'] = "Junho";
				break;
			case 'JUL':
				$data['novaprogramacao'] = "Julho";
				break;
			case 'AGO':
				$data['novaprogramacao'] = "Agosto";
				break;
			case 'SET':
				$data['novaprogramacao'] = "Setembro";
				break;
			case 'OUT':
				$data['novaprogramacao'] = "Outubro";
				break;
			case 'NOV':
				$data['novaprogramacao'] = "Novembro";
				break;
			case 'DEZ':
				$data['novaprogramacao'] = "Dezembro";
				break;
		}
	
		$mailMerge = new MailMerge();
	
		$mailMerge->setUsername('clauderlima')
		->setPassword('cclvcldf')
		->setService (MailMerge::SERVICE_FREE);  // for LiveDocx Premium, use MailMerge::SERVICE_PREMIUM
	
		if ($data['template'] == 'BTL')
		{
			$mailMerge->setLocalTemplate('data\reproferias-btl.docx');
		} else
		{
			$mailMerge->setLocalTemplate('data\reproferias-cia.docx');
		}
	
		$mailMerge->assign('numero', $data['numero'])
		->assign('nomePolicial', $data['nomepolicial'])
		->assign('postoGraduacao', $data['postograduacao'])
		->assign('matricula',  $data['matricula'])
		->assign('matriculaSiape',  $data['matriculasiape'])
		->assign('identificacaoUnica',  $data['identificacaounica'])
		
		->assign('anoExercicioFerias', $data['anoreferencia'])
		->assign('feriasProgramacao', $data['feriasprogramacao'])
		->assign('novaProgramacao', $data['novaprogramacao'])
		->assign('dataAtual', $data['datasolicitacao'])
		->assign('dataInclusao', $data['datainclusao'])
		->assign('email', $data['email'])
		->assign('comportamento', $data['comportamento'])
		->assign('telefone', $data['telefone'])
	
		->assign('polferiasSubunidade', $data['polferiassubunidade'])
		->assign('umDozeSubunidade', $data['umdozesubunidade'])
		->assign('polferiasBatalhao', $data['polferiasbatalhao'])
		->assign('umDozeBatalhao', $data['umdozebatalhao'])
		->assign('sargenteante', $data['sargenteante'])
		->assign('funcaoSargenteante', $data['funcaosargenteante'])
		->assign('chefeNgp', $data['chefengp'])
		->assign('funcaoChefeNgp', $data['funcaochefengp'])
		->assign('chefeSAd', $data['chefesad'])
		->assign('funcaoChefeSAd', $data['funcaochefesad'])
	
		->assign('comandante', $data['comandante'])
		->assign('funcaocomandante', $data['funcaocomandante'])
		->assign('lotacao', $data['lotacao'])
		->assign('funcaochefe', $data['funcaochefe'])
		->assign('chefeImediato', $data['chefeimediato']);
	
		$mailMerge->createDocument();
	
		$document = $mailMerge->retrieveDocument('pdf');
	
		if ($this->template == 'BTL')
		{
			$filename = 'c:\BPMA\requerimentos\abono\ReproFerias-' . $this->numero . '-BTL-' . $this->matricula . '.pdf';
		} else
		{
			$filename = 'c:\BPMA\requerimentos\abono\ReproFerias-' . $this->numero . '-CIA-' . $this->matricula . '.pdf';
		}
	
		file_put_contents($filename, $document);
	
		unset($mailMerge);
	
		header("Content-Type: application/pdf");
		echo file_get_contents($filename);
	}
	
	public function requerparcelamentoferias($id, array $dadosform)
	{
		// Configuração para gerar datas em português
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		
		$this->anoExercicioFerias = $dadosform['anoreferencia'];
		$this->tipo = "Parcelamento de Férias";
	
		$this->primeiraParcelaInicio = $dadosform['inicio1'];
		$this->primeiraParcelaQtdDias = $dadosform['qtddias1'];
		$this->segundaParcelaInicio = $dadosform['inicio2'];
		$this->segundaParcelaQtdDias = $dadosform['qtddias2'];
		$this->terceiraParcelaInicio = $dadosform['inicio3'];
		$this->terceiraParcelaQtdDias = $dadosform['qtddias3'];
		$totaldias = $dadosform['qtddias1']+$dadosform['qtddias2']+$dadosform['qtddias3'];
		
		if ($totaldias < 30)
		{
			if ($dadosform['restante'] == 'naogozo') 
			{
				$this->naoGozo = 30 - $totaldias;
			} else 
			{
				$this->momentoOportuno = 30 - $totaldias;
			}
		}
		
		$this->buscaDados($id);
	
		// Instanciando o Entity Manager
		$em = $this->sm->get('Doctrine\ORM\EntityManager');
	
		// feriasProgramacao
		$feriasprogramacao = $em->createQueryBuilder()
		->select('f')
		->from('Census\Entity\Ferias', 'f')
		->where('f.polcodigo = :polcodigo AND f.anoreferencia = :anoref')
		->setParameter('polcodigo', $id)
		->setParameter('anoref', $this->anoExercicioFerias)
		->orderBy('f.codigo', 'ASC')
		->getQuery()->getResult();
			
		if ($feriasprogramacao)
		{
			$this->feriasProgramacao = $feriasprogramacao['0']->getProgramacao();
		} else
		{
			$this->feriasProgramacao = "NULO";
		}
		// Calculo de efetivo
	
		$efetivobatalhao = $em->createQueryBuilder()
		->select('count(p)')
		->from('Census\Entity\Policial', 'p')
		->where('p.subunidade <> :trc')
		->setParameter('trc', 'TRC')
		->getQuery()->getResult();
	
		$this->umDozeBatalhao = ceil($efetivobatalhao[0][1]/12);
	
		$efetivoSubunidade = $em->createQueryBuilder()
		->select('count(s)')
		->from('Census\Entity\Policial', 's')
		->where('s.subunidade = :subunidade')
		->setParameter('subunidade', $this->subunidade)
		->getQuery()->getResult();
	
		$this->umDozeSubunidade = ceil($efetivoSubunidade[0][1]/12);
	
		$polferBatalhao = $em->createQueryBuilder()
		->select('count(f)')
		->from('Census\Entity\Ferias', 'f')
		->where('f.programacao = :mes')
		->setParameter('mes', $this->novaProgramacao)
		->getQuery()->getResult();
	
		$this->polferiasBatalhao = $polferBatalhao[0][1];
	
		$polferSubunidade = $em->createQueryBuilder()
		->select('count(f)')
		->from('Census\Entity\Ferias', 'f')
		->innerJoin('f.polcodigo', 'p')
		->where('p.subunidade = :subunidade AND f.programacao = :novomes')
		->setParameter('subunidade', $this->subunidade)
		->setParameter('novomes', $this->novaProgramacao)
		->getQuery()->getResult();
	
		$this->polferiasSubunidade = $polferSubunidade[0][1];
	
		// Pesquisar férias não gozadas
	
		// Gerando dados para incluir no banco
		$data = array(
				'tipo' => $this->tipo,
				'nomepolicial' => $this->nomePolicial,
				'postograduacao' => $this->postoGraduacao,
				'matricula' => $this->matricula,
				'matriculasiape' => $this->matriculaSiape,
				'identificacaounica' => $this->identificacaoUnica,
				'anoreferencia' => $this->anoExercicioFerias,
				'feriasprogramacao' => $this->feriasProgramacao,
				
				'primeiraParcelaInicio' => $this->primeiraParcelaInicio,
				'primeiraParcelaQtdDias' => $this->primeiraParcelaQtdDias,
				'segundaParcelaInicio' => $this->segundaParcelaInicio,
				'segundaParcelaQtdDias' => $this->segundaParcelaQtdDias,
				'terceiraParcelaInicio' => $this->terceiraParcelaInicio,
				'terceiraParcelaQtdDias' => $this->terceiraParcelaQtdDias,
				'naoGozo' => $this->naoGozo,
				'momentoOportuno' => $this->momentoOportuno,
				
				'datasolicitacao' => $this->dataAtual,
				'datainclusao' => $this->dataInclusao,
				'email' => $this->email,
				'comportamento' => $this->comportamento,
				'telefone' => $this->telefone,
				'polferiassubunidade' => $this->polferiasSubunidade,
				'umdozesubunidade' => $this->umDozeSubunidade,
				'polferiasbatalhao' => $this->polferiasBatalhao,
				'umdozebatalhao' => $this->umDozeBatalhao,
				'qtdFeriasNaoGozadas' => $this->qtdFeriasNaoGozadas,
				'sargenteante' => $this->sargenteante,
				'funcaosargenteante' => $this->funcaoSargenteante,
				'chefengp' => $this->chefeNgp,
				'funcaochefengp' => $this->funcaoChefeNgp,
				'chefesad' => $this->chefeSAd,
				'funcaochefeSad' => $this->funcaoChefeSAd,
				'lotacao' => $this->lotacao,
				'chefeimediato' => $this->chefeImediato,
				'funcaochefe' => $this->funcaochefe,
				'comandante' => $this->comandante,
				'funcaocomandante' => $this->funcaocomandante,
				'decisao' => $this->decisao,
				'dataDecisao' => $this->datadecisao,
				'template' => $this->template,
				'polcodigo' => $id
		);
	
		$service = $this->sm->get('census-service-requerimentoferias');
		$service->insert($data, 'Census\Entity\RequerimentoFerias');
	
		//Verificar o conflito que esta dando com o controle de Férias e a Programação de Férias
	
	}
}