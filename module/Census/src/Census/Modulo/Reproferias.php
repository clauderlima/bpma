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
			->select('f')
			->from('Census\Entity\Ferias', 'f')
			->innerJoin('f', 'Census\Entity\Policial', 'p', 'f.polcodigo = p.codigo')
			->getQuery()->getResult();
		///Continuar desse INNER xxxx
		echo "<pre>";
		print_r($polferSubunidade);
		exit;
			
		$this->polferiasSubunidade = $polferSubunidade[0][1];
		
		
		echo "<pre>";
		print_r($this);
		exit;
		
		//Gravar os dados
		$hoje = new \DateTime();
		$data = array(
			'inicio' => $inicio,
			'quantidadedias' => $qtdDias,
			'datasolicitacao' => $hoje->format('Y-m-d'),
			'decisao' => '',
			'datadecisao' => '',
			'polcodigo' => $id
		);
		
		$service = $this->sm->get('census-service-requerimentoabono');
		$dataabono = $service->insert($data, 'Census\Entity\Requerimentoabono');
		
		$this->numero = str_pad($dataabono->getCodigo(), 4, "0", STR_PAD_LEFT);
		
		//Gerar o requerimento
		$this->geraRequerimento();
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