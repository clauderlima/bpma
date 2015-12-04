<?php

namespace Census\Modulo;

use ZendService\LiveDocx\MailMerge;
use Census\Entity\Requerimentoabono;

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
		
		$em = $this->sm->get('Doctrine\ORM\EntityManager');
		$abonoanteriores = $em->createQueryBuilder()
			->select('a')
			->from('Census\Entity\Requerimentoabono', 'a')
			->where('a.polcodigo = :polcodigo')
			->setParameter('polcodigo', $id)
			->orderBy('a.codigo', 'ASC')
			->getQuery()->getResult();
		
		if (!$abonoanteriores)
		{
			$this->gozosAnteriores = "O policial não gozou abono neste ano.";
		} else 
		{
			// Caso caia aqui pode ser:
			// abono já quererido, abono anterior parcial, abono anterior indeferido, ja gozou completo
	
			$diasgozados = 0;
			$diasrequeridos = 0;
			$diasautorizados = 0;
			$infogozados = array();
			$inforequeridos = array();
			$infoautorizados = array();
			
			$hoje = new \DateTime('now');
			
			foreach ($abonoanteriores as $abono)
			{
				if ($abono->getInicio() < $hoje)
				{
					if ($abono->getDecisao() == 'Deferido')
					{
						$diasgozados += $abono->getQuantidadedias();
						$infogozados[] = array(
							'inicio' => $abono->getInicio()->format('d/m/Y'),
							'dias' => $abono->getQuantidadedias()
						);
					}
				} else 
				{
					if ($abono->getDecisao() == 'Deferido')
					{
						$diasautorizados += $abono->getQuantidadedias();
						$infoautorizados[] = array(
								'inicio' => $abono->getInicio()->format('d/m/Y'),
								'dias' => $abono->getQuantidadedias()
						);
					} else 
					{
						$diasrequeridos += $abono->getQuantidadedias();
						$inforequeridos[] = array(
								'inicio' => $abono->getInicio()->format('d/m/Y'),
								'dias' => $abono->getQuantidadedias()
						);
					}
				}
			}
			
			$texto = "O policial possui: ";
			if ($diasgozados)
			{
				$texto .= $diasgozados . " dias gozados; ";
			}
			if ($diasautorizados)
			{
				$texto .= $diasautorizados . " dias autorizados para gozo; ";
			}
			if ($diasrequeridos)
			{
				$texto .= $diasrequeridos . " dias requeridos aguardando decisão do comando; ";
			}
			
			$this->gozosAnteriores = $texto;
		}
		
		$faltaInjustificada = $em->createQueryBuilder()
			->select('a')
			->from('Census\Entity\Alteracao', 'a')
			->where('a.polcodigo = :polcodigo AND a.faltaservico = 1')
			->setParameter('polcodigo', $id)
			->setMaxResults(1)
			->getQuery()->getResult();
		
		if (!$faltaInjustificada)
		{
			$this->faltaInjustificada = "O policial não cometeu falta injustificada no ano passado.";
		} else
		{
			// Caso caia aqui pode ser:
			// abono já quererido, abono anterior parcial, abono anterior indeferido, ja gozou completo
			$this->faltaInjustificada = "O policial cometeu falta injustificada no dia " . $faltaInjustificada[0]->getDatafato()->format('d/m/Y') . ", publicado no ".$faltaInjustificada[0]->getBoletim();
		}
		
		//Gravar os dados
		$hoje = new \DateTime();
		$data = array(
			'nomepolicial' => $this->nomePolicial, 
			'postograduacao' => $this->postoGraduacao, 
			'matricula' => $this->matricula, 
			'matriculasiape' => $this->matriculaSiape, 
			'identificacaounica' => $this->identificacaoUnica, 
			'quantidadedias' => $this->quantidadeDias, 
			'inicioabono' => $this->inicio, 
			'fimabono' => $this->fim, 
			'datasolicitacao' => $this->dataAtual, 
			'datainclusao' => $this->dataInclusao, 
			'email' => $this->email, 
			'comportamento' => $this->comportamento, 
			'telefone' => $this->telefone, 
			'faltainjustificada' => $this->faltaInjustificada, 
			'gozosanteriores' => $this->gozosAnteriores, 
			'sargenteante' => $this->sargenteante, 
			'funcaosargenteante' => $this->funcaoSargenteante, 
			'chefengp' => $this->chefeNgp, 
			'funcaochefengp' => $this->funcaoChefeNgp, 
			'chefesad' => $this->chefeSAd, 
			'funcaochefeSad' => $this->funcaoChefeSAd, 
			'lotacao' => $this->lotacao, 
			'chefeimediato' => $this->chefeImediato, 
			'fucaochefe' => $this->funcaochefe,
			'comandante' => $this->comandante, 
			'funcaocomandante' => $this->funcaocomandante, 
			'decisao' => $this->decisao, 
			'dataDecisao' => $this->datadecisao,
			'polcodigo' => $id
		);
		
		$service = $this->sm->get('census-service-requerimentoabono');
		$dataabono = $service->insert($data, 'Census\Entity\Requerimentoabono');
		
		//Gerar o requerimento
		//$this->geraRequerimento();
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
	
		$mailMerge->assign('numero', $this->numero)
				->assign('nomePolicial', $this->nomePolicial)
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