<?php

namespace Census\Modulo;

use ZendService\LiveDocx\MailMerge;
use Census\Entity\Requerimentoabono;

class Reproferias extends Requerimento
{	
	private $anoExercicioFerias;
	private $feriasProgramacao;
	private $novaProgramacao;
	private $polferiasSubunidade;
	private $umDozeSubunidade;
	private $polferiasBatalhao;
	private $umDozeBatalhao;
	
	public function requer($id, $anoreferencia, $novomes)
	{
		// Configuração para gerar datas em português
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		
		$this->anoExercicioFerias = $anoreferencia;
		$this->novaProgramacao = $novomes;
		
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
		
		$this->feriasProgramacao = $feriasprogramacao['0']->getProgramacao();
		
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
				'nomepolicial' => $this->nomePolicial,
				'postograduacao' => $this->postoGraduacao,
				'matricula' => $this->matricula,
				'matriculasiape' => $this->matriculaSiape,
				'identificacaounica' => $this->identificacaoUnica,
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
		

		$service = $this->sm->get('census-service-ferias');
		$service->insert($data, 'Census\Entity\Ferias');
		
		//Verificar o conflito que esta dando com o controle de Férias e a Programação de Férias
		
	}

	function geraRequerimento()
	{
		// Configuração para gerar datas em português
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	
		$mailMerge = new MailMerge();
	
		$mailMerge->setUsername('clauderlima')
		->setPassword('cclvcldf')
		->setService (MailMerge::SERVICE_FREE);  // for LiveDocx Premium, use MailMerge::SERVICE_PREMIUM
	
		if ($this->tipoRequerimento == 'BTL')
		{
			$mailMerge->setLocalTemplate('data\repro-ferias-btl.docx');
		} else 
		{
			$mailMerge->setLocalTemplate('data\repro-ferias-cia.docx');
		}
	
		$mailMerge->assign('numero', $this->numero)
				->assign('nomePolicial', $this->nomePolicial)
				->assign('postoGraduacao', $this->postoGraduacao)
				->assign('matricula',  $this->matricula)
				->assign('matriculaSiape',  $this->matriculaSiape)
				->assign('identificacaoUnica',  $this->identificacaoUnica)
				->assign('anoExercicioFerias', $this->anoExercicioFerias)
				->assign('feriasProgramacao', $this->feriasProgramacao)
				->assign('novaProgramacao', $this->novaProgramacao)
				->assign('dataAtual', $this->dataAtual)
				->assign('dataInclusao', $this->dataInclusao)
				->assign('email', $this->email)
				->assign('comportamento', $this->comportamento)
				->assign('telefone', $this->telefone)
				
				->assign('polferiasSubunidade', $this->polferiasSubunidade)
				->assign('umDozeSubunidade', $this->umDozeSubunidade)
				->assign('polferiasBatalhao', $this->polferiasBatalhao)
				->assign('umDozeBatalhao', $this->umDozeBatalhao)
				->assign('sargenteante', $this->sargenteante)
				->assign('funcaoSargenteante', $this->funcaoSargenteante)
				->assign('chefeNgp', $this->chefeNgp)
				->assign('funcaoChefeNgp', $this->funcaoChefeNgp)
				->assign('chefeSAd', $this->chefeSAd)
				->assign('funcaoChefeSAd', $this->funcaoChefeSAd)
				
				->assign('lotacao', $this->lotacao)
				->assign('funcaochefe', $this->funcaochefe)
				->assign('chefeImediato', $this->chefeImediato);
	
		$mailMerge->createDocument();
	
		$document = $mailMerge->retrieveDocument('pdf');
	
		if ($this->tipoRequerimento == 'BTL')
		{
			$filename = 'c:\BPMA\requerimentos\abono\Abono-' . $this->numero . '-BTL-' . $this->matricula . '.pdf';
		} else 
		{
			$filename = 'c:\BPMA\requerimentos\abono\Abono-' . $this->numero . '-CIA-' . $this->matricula . '.pdf';
		}
		
		file_put_contents($filename, $document);
	
		unset($mailMerge);
		
		$this->arquivo = $filename;
	
		header("Content-Type: application/pdf");
		echo file_get_contents($filename);
	}
}