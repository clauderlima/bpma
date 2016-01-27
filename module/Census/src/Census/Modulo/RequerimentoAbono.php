<?php

namespace Census\Modulo;

use ZendService\LiveDocx\MailMerge;

class RequerimentoAbono extends Requerimento
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
		
		// Dados do Requerimento de Abono
		$inicioAbono = new \DateTime($inicio);
		
		$fimAbono = new \DateTime($inicio);
		$fimAbono->add(new \DateInterval("P" . ($qtdDias - 1) . "D"));
		
		$this->inicio = $inicioAbono;
		
		$this->quantidadeDias = $qtdDias;
		
		$this->fim = $fimAbono;
		
		$this->buscaDados($id);
		
		// Abono Anteriores
		$em = $this->sm->get('Doctrine\ORM\EntityManager');
		$abonoanteriores = $em->createQueryBuilder()
			->select('a')
			->from('Census\Entity\RequerimentoAbono', 'a')
			->where('a.polcodigo = :polcodigo')
			->setParameter('polcodigo', $id)
			->orderBy('a.codigo', 'ASC')
			->getQuery()->getResult();
			
		if (!$abonoanteriores)
		{
			$this->gozosAnteriores = "O policial não gozou abono este ano.";
		} else
		{
			// Caso caia aqui pode ser:
			// abono já quererido, abono anterior parcial, abono anterior indeferido, ja gozou completo
		
			$diasgozados = 0;
			$diasrequeridos = 0;
			$diasautorizados = 0;
			$diaindeferidos = 0;
			$infogozados = array();
			$inforequeridos = array();
			$infoautorizados = array();
			$infoindeferidos = array();
				
			$hoje = new \DateTime('now');
				
			foreach ($abonoanteriores as $abono)
			{
				if ($abono->getDecisao() != 'Cancelado')
				{
					if ($abono->getInicioabono() < $hoje)
					{
						if ($abono->getDecisao() == 'Deferido')
						{
							$diasgozados += $abono->getQuantidadedias();
							$infogozados[] = array(
									'inicio' => $abono->getInicioabono()->format('d/m/Y'),
									'dias' => $abono->getQuantidadedias()
							);
						}
					} else 					
					{
						if ($abono->getDecisao() == 'Deferido')
						{
							$diasautorizados += $abono->getQuantidadedias();
							$infoautorizados[] = array(
									'inicio' => $abono->getInicioabono()->format('d/m/Y'),
									'dias' => $abono->getQuantidadedias()
							);
						} elseif ($abono->getDecisao() == 'Indeferido')
						{
							$diasindeferidos += $abono->getQuantidadedias();
							$infoindeferidos[] = array(
									'inicio' => $abono->getInicioabono()->format('d/m/Y'),
									'dias' => $abono->getQuantidadedias()
							);
								
						} else 
							{
								$diasrequeridos += $abono->getQuantidadedias();
								$inforequeridos[] = array(
										'inicio' => $abono->getInicioabono()->format('d/m/Y'),
										'dias' => $abono->getQuantidadedias()
								);
							}
						
						}	
					}
				}
				
			$texto = "O policial possui: ";
			if ($diasgozados)
			{
				$texto .= $diasgozados . " dia(s) gozado(s); ";
			}
			if ($diasautorizados)
			{
				$texto .= $diasautorizados . " dia(s) autorizado(s) para gozo; ";
			}
			if ($diasrequeridos)
			{
				$texto .= $diasrequeridos . " dia(s) requerido(s) aguardando decisão do comando; ";
			}
			if ($diasgozados > 0 || $diasautorizados > 0 || $diasrequeridos > 0) 
			{
				$this->gozosAnteriores = $texto;
			} else {
				$this->gozosAnteriores = "O policial não gozou abono este ano.";
			}
			
		}
		
		// Faltas Injustificadas
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
		
		// Gerando dados para incluir no banco
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
				'funcaochefe' => $this->funcaochefe,
				'comandante' => $this->comandante,
				'funcaocomandante' => $this->funcaocomandante,
				'decisao' => $this->decisao,
				'dataDecisao' => $this->datadecisao,
				'template' => $this->template,
				'polcodigo' => $id
		);
		
		$service = $this->sm->get('census-service-requerimentoabono');
		if ($service->insert($data, 'Census\Entity\RequerimentoAbono'))
			$this->flashMessenger()->addSuccessMessage("Requerimento de abono gerado com sucesso!");
	}

	function imprimir(array $data)
	{
		// Configuração para gerar datas em português
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	
		// Preparando os dados 
		$data['inicioabono'] = strftime('%d de %B de %Y', strtotime($data['inicioabono']->format('Y-m-d')));
		$data['fimabono'] = strftime('%d de %B de %Y', strtotime($data['fimabono']->format('Y-m-d')));
		$data['datasolicitacao'] = strftime('%d de %B de %Y', strtotime($data['datasolicitacao']->format('Y-m-d')));
		$data['datainclusao'] = $data['datainclusao']->format('d/m/Y');
		
		switch ($data['quantidadedias'])
		{
			case 1:
				$data['quantidadedias'] = "1 (um)";
				break;
			case 2:
				$data['quantidadedias'] = "2 (dois)";
				break;
			case 3:
				$data['quantidadedias'] = "3 (três)";
				break;
			case 4:
				$data['quantidadedias'] = "4 (quatro)";
				break;
			case 5:
				$data['quantidadedias'] = "5 (cinco)";
				break;
		}

		$mailMerge = new MailMerge();
	
		$mailMerge->setUsername('clauderlima')
		->setPassword('cclvcldf')
		->setService (MailMerge::SERVICE_FREE);  // for LiveDocx Premium, use MailMerge::SERVICE_PREMIUM
	
		if ($data['template'] == 'BTL')
		{
			$mailMerge->setLocalTemplate('\var\www\html\data\abono-btl.docx');
		} else 
		{
			$mailMerge->setLocalTemplate('\var\www\html\data\abono-cia.docx');
		}

		
		$mailMerge->assign('numero', $data['numero'])
				->assign('nomePolicial', $data['nomepolicial'])
				->assign('postoGraduacao', $data['postograduacao'])
				->assign('matricula',  $data['matricula'])
				->assign('matriculaSiape',  $data['matriculasiape'])
				->assign('identificacaoUnica',  $data['identificacaounica'])
				->assign('quantidadeDias', $data['quantidadedias'])
				->assign('inicioAbono', $data['inicioabono'])
				->assign('fimAbono', $data['fimabono'])
				->assign('dataAtual', $data['datasolicitacao'])
				->assign('dataInclusao', $data['datainclusao'])
				->assign('email', $data['email'])
				->assign('comportamento', $data['comportamento'])
				->assign('telefone', $data['telefone'])
				
				->assign('faltaInjustificada', $data['faltainjustificada'])
				->assign('gozosAnteriores', $data['gozosanteriores'])
				->assign('sargenteante', $data['sargenteante'])
				->assign('funcaoSargenteante', $data['funcaosargenteante'])
				->assign('chefeNgp', $data['chefengp'])
				->assign('funcaoChefeNgp', $data['funcaochefengp'])
				->assign('chefeSAd', $data['chefesad'])
				->assign('funcaoChefeSAd', $data['funcaochefesad'])
				
				->assign('lotacao', $data['lotacao'])
				->assign('comandante', $data['comandante'])
				->assign('funcaocomandante', $data['funcaocomandante'])
				->assign('funcaochefe', $data['funcaochefe'])
				->assign('chefeImediato', $data['chefeimediato']);
	
		$mailMerge->createDocument();
	
		$document = $mailMerge->retrieveDocument('pdf');
	
		if ($this->template == 'BTL')
		{
			$filename = '\var\requerimentos\abono\Abono-' . $this->numero . '-BTL-' . $this->matricula . '.pdf';
		} else 
		{
			$filename = '\var\requerimentos\abono\Abono-' . $this->numero . '-CIA-' . $this->matricula . '.pdf';
		}
		
		file_put_contents($filename, $document);
	
		unset($mailMerge);
	
		header("Content-Type: application/pdf");
		echo file_get_contents($filename);
	}
}