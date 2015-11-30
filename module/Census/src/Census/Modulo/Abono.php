<?php

namespace Census\Modulo;

use ZendService\LiveDocx\MailMerge;

class Abono extends Requerimento
{	
	private $inicio;
	private $quantidadeDias;
	private $fim;
	private $faltaInjustificada;
	private $gozosAnteriores;
	
	
	public function requer($id, $inicio, $qtdDias)
	{
		// Configuração para gerar datas em português
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		
		$inicioAbono = new \DateTime($inicio);
		$this->inicio = strftime('%d de %B de %Y', strtotime($inicioAbono->format('Y-m-d')));
		$fimAbono = $inicioAbono->modify(($qtdDias - 1).' days');
		$this->fim = strftime('%d de %B de %Y', strtotime($fimAbono->format('Y-m-d')));
		
		switch ($qtdDias)
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
		$this->quantidadeDias = $qtdDias;
		
		$this->buscaDados($id);
		
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
			$mailMerge->setLocalTemplate('data\abono-btl.docx');
		} else 
		{
			$mailMerge->setLocalTemplate('data\abono-cia.docx');
		}
	
		$mailMerge->assign('nomePolicial', $this->nomePolicial)
				->assign('postoGraduacao', $this->postoGraduacao)
				->assign('matricula',  $this->matricula)
				->assign('matriculaSiape',  $this->matriculaSiape)
				->assign('identificacaoUnica',  $this->identificacaoUnica)
				->assign('quantidadeDias', $this->quantidadeDias)
				->assign('inicioAbono', $this->inicio)
				->assign('fimAbono', $this->fim)
				->assign('dataAtual', $this->dataAtual)
				->assign('dataInclusao', $this->dataInclusao)
				->assign('email', $this->email)
				->assign('comportamento', $this->comportamento)
				->assign('telefone', $this->telefone)
				
				->assign('faltaInjustificada', $this->faltaInjustificada)
				->assign('gozosAnteriores', $this->gozosAnteriores)
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