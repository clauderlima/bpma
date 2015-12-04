<?php

namespace Census\Modulo;

use Zend\ServiceManager\ServiceLocatorInterface;

abstract class Requerimento
{
	protected  $sm;
	
	protected $numero;
	protected $codigo;
	protected $nomePolicial;
	protected $postoGraduacao;
	protected $matricula;
	protected $matriculaSiape;
	protected $identificacaoUnica;
	protected $dataAtual;
	protected $dataInclusao;
	protected $comportamento;
	protected $email;
	protected $telefone;
	
	protected $sargenteante;
	protected $funcaoSargenteante;
	protected $chefeNgp;
	protected $funcaoChefeNgp;
	protected $chefeSAd;
	protected $funcaoChefeSAd;
	protected $subunidade;
	protected $lotacao;
	protected $chefeImediato;
	protected $funcaochefe;
	protected $tipoRequerimento;
	protected $comandante;
	protected $funcaocomandante;
	protected $decisao;
	protected $datadecisao;
	protected $arquivo;
	
	public function __construct(ServiceLocatorInterface $sm)
	{
		$this->sm = $sm;
	}
	
	
	/**
	 * @param string $id
	 * @param string $tipo
	 */
	public function buscaDados($id)
	{
		// Configuração para gerar datas em português
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		
		$em = $this->sm->get('Doctrine\ORM\EntityManager');
		$policial = $em->getRepository('Census\Entity\Policial')->find($id);
		
		// Dados do Requerimento
		$this->codigo = $policial->getCodigo();
		$this->nomePolicial = $policial->getNomeCompleto();
		$this->postoGraduacao = $policial->getPostoGraduacao();
		$this->matricula = $policial->getMatricula();
		$this->matriculaSiape = substr($policial->getMatriculaSiape(),1,7);
		$this->identificacaoUnica = $policial->getMatriculaSiape();
		$dataHoje = new \DateTime();
		$this->dataAtual = strftime('%d de %B de %Y', strtotime($dataHoje->format('Y-m-d')));
		$this->dataInclusao = $policial->getDataAdmissao()->format('d/m/Y');
		
		$comportamento ="";
		switch ($policial->getComportamento())
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
		$this->email = $policial->getEmail();
		$this->telefone = $policial->getTelefoneCelular();
		
		// Buscar o chefe da Seção Administrativa
		$query = $em->createQuery("SELECT p.nomecompleto, p.postograduacao, p.quadro
				FROM Census\Entity\Policial p WHERE p.lotacao = :lotacao ORDER BY p.antiguidade")
				->setMaxResults(1);
		$query->setParameter('lotacao','SAd');
		$dados = $query->getResult();
		$chefeSAd = $dados[0]['nomecompleto'] . " - " . $dados[0]['postograduacao'] . " " . $dados[0]['quadro'];
		
		$this->chefeSAd = $chefeSAd;
		$this->funcaoChefeSAd = "Chefe da Seção Administrativa";
		
		// Buscar o sargenteante da Subunidade
		$query = $em->createQuery("SELECT p.nomecompleto, p.postograduacao, p.quadro
				FROM Census\Entity\Policial p WHERE p.subunidade = :subunidade AND p.servicofuncao = :funcao
				ORDER BY p.antiguidade")
				->setMaxResults(1)
				->setParameter('subunidade',$policial->getSubunidade())
				->setParameter('funcao','Sargenteante');
		$dados = $query->getResult();
		if ($dados)
		{
			$sargenteante = $dados[0]['nomecompleto'] . " - " . $dados[0]['postograduacao'] . " " . $dados[0]['quadro'];
		} else 
		{
			$sargenteante = "Informar no sistema o Sargenteante para " . $policial->getSubunidade();
		}
		
		$this->sargenteante = $sargenteante;
		$this->funcaoSargenteante = "Sargenteante";
		
		// Buscar o chefe do NGP
		$query = $em->createQuery("SELECT p.nomecompleto, p.postograduacao, p.quadro
				FROM Census\Entity\Policial p WHERE p.lotacao = :lotacao
				ORDER BY p.antiguidade")
				->setMaxResults(1)
				->setParameter('lotacao','NGP');
		
		$dados = $query->getResult();
		
		$chefeNgp = $dados[0]['nomecompleto'] . " - " . $dados[0]['postograduacao'] . " " . $dados[0]['quadro'];
		
		$this->chefeNgp = $chefeNgp;
		$this->funcaoChefeNgp = "Chefe do Núcleo de Gestão de Pessoal";
		
		// Buscar o chefe Imediato
		$query = $em->createQuery("SELECT p.nomecompleto, p.postograduacao, p.quadro
				FROM Census\Entity\Policial p WHERE p.subunidade = :subunidade
				ORDER BY p.antiguidade")
				->setMaxResults(1)
				->setParameter('subunidade',$policial->getSubunidade());
		
		$dados = $query->getResult();
		
		$chefeImediato = $dados[0]['nomecompleto'] . " - " . $dados[0]['postograduacao'] . " " . $dados[0]['quadro'];
		
		$this->subunidade = $policial->getSubunidade();
		
		switch ($policial->getSubunidade())
		{
			case 'Btl':
				$this->lotacao = "Seção Administrativa";
				$this->funcaochefe = "Chefe da Seção Administrativa";
				$this->chefeImediato = $this->chefeSAd;
				$this->tipoRequerimento = "BTL";
				break;
			case 'GOA':
				$this->lotacao = "Grupamento de Operações Ambientais";
				$this->funcaochefe = "Comandante do GOA";
				$this->chefeImediato = $chefeImediato;
				$this->tipoRequerimento = "CIA";
				break;
			case 'CiaSul':
				$this->lotacao = "Companhia Rural Sul";
				$this->funcaochefe = "Comandante da Companhia Rural Sul";
				$this->chefeImediato = $chefeImediato;
				$this->tipoRequerimento = "CIA";
				break;
			case 'CiaOeste':
				$this->lotacao = "Companhia Rural Oeste";
				$this->funcaochefe = "Comandante da Companhia Rural Oeste";
				$this->chefeImediato = $chefeImediato;
				$this->tipoRequerimento = "CIA";
				break;
			case 'CiaLeste':
				$this->lotacao = "Companhia Rural Leste";
				$this->funcaochefe = "Comandante da Companhia Rural Leste";
				$this->chefeImediato = $chefeImediato;
				$this->tipoRequerimento = "CIA";
				break;
			case 'GPTur':
				$this->lotacao = "Grupamento Policiamento Turístico";
				$this->funcaochefe = "Comandante do GPTur";
				$this->chefeImediato = $chefeImediato;
				$this->tipoRequerimento = "CIA";
				break;
		}
		
		
		if ($policial->getComportamento() == 'X')
		{ 
			$this->chefeNgp = $this->chefeSAd;
			$this->funcaoChefeNgp = $this->funcaoChefeSAd;
			
			// Buscar o Secretário
			$query = $em->createQuery("SELECT p.nomecompleto, p.postograduacao, p.quadro
				FROM Census\Entity\Policial p WHERE p.lotacao = :lotacao
				ORDER BY p.antiguidade")
				->setMaxResults(1)
				->setParameter('lotacao','Sec');
			
			$dados = $query->getResult();
			
			$secretario = $dados[0]['nomecompleto'] . " - " . $dados[0]['postograduacao'] . " " . $dados[0]['quadro'];
		
			$this->sargenteante = $secretario;
			$this->funcaoSargenteante = "Secretário";
			
			// Buscar o Secretário
			$query = $em->createQuery("SELECT p.nomecompleto, p.postograduacao, p.quadro
				FROM Census\Entity\Policial p WHERE p.servicofuncao = :funcao
				ORDER BY p.antiguidade")
				->setMaxResults(1)
				->setParameter('funcao','Sub Comandante');
								
			$dados = $query->getResult();
								
			$subComandante = $dados[0]['nomecompleto'] . " - " . $dados[0]['postograduacao'] . " " . $dados[0]['quadro'];
			
			$this->chefeSAd = $subComandante;
			$this->funcaoChefeSAd = "Sub Comandante do BPMA";
			$this->lotacao = "Sub Comando do BPMA";
			$this->comandante = "WILLIAM DELANO MARQUES DE ARAÚJO - TC QOPM";
			$this->funcaocomandante = "Comandante do BPMA";
			$this->tipoRequerimento = "BTL";
		}
	}
	
	public function getArquivo()
	{
		return $this->arquivo;
	}
}