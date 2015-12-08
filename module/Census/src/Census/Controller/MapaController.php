<?php
/**
 * namespace de localizacao do nosso controller
 */
namespace Census\Controller;

use Zend\View\Model\ViewModel;
 
class MapaController extends AbstractController
{
    public function indexAction()
    {
    	//$adapter = $this->getServiceLocator()->get('AdapterDb');
    	
    	/**
    	 * contar quantidade de elementos da nossa tabela
    	 */
    	$serviceContador = $this->getServiceLocator()->get('census-service-contador');
    	$efetivoGoa=$serviceContador->conta('GOA');
    	$efetivoCialeste=$serviceContador->conta('CiaLeste');
    	$efetivoCiasul=$serviceContador->conta('CiaSul');
    	$efetivoCiaoeste=$serviceContador->conta('CiaOeste');
    	$efetivoGptur=$serviceContador->conta('GPTur');
    	$efetivoTotal=$serviceContador->total();
    	$efetivoBtl=$serviceContador->conta('Btl');
    	$listaExpediente=$serviceContador->lista('Btl');
    	/* echo "<pre>";
    	print_r($listaExpediente);
    	exit; */
    	
    	$view = new ViewModel(array(
    		'efetivoBtl' => $efetivoBtl,
    		'efetivoGoa' => $efetivoGoa,
    		'efetivoTotal' => $efetivoTotal,
    		'efetivoGptur' => $efetivoGptur,
    		'efetivoCialeste' => $efetivoCialeste,
    		'efetivoCiaoeste' => $efetivoCiaoeste,
    		'efetivoCiasul' => $efetivoCiasul,
    		));
    	return $view;
    }
    
    public function listarAction()
    {
  
    	$postograduacao = $_GET['postgrad'];
    	$lotacao = $_GET['lotacao'];
    	
    	switch ($lotacao) 
    	{
    		case 'total':
    			$query = $this->getEm()->createQuery("SELECT p.codigo,p.matricula,p.lotacao,p.subunidade,p.telefonecelular,p.postograduacao,p.nomeguerra FROM Census\Entity\Policial p WHERE p.postograduacao = :postograduacao ORDER BY p.antiguidade");
    			$query->setParameter('postograduacao',$postograduacao);
    			break;
    		case 'semclas':
    			$query = $this->getEm()->createQuery("SELECT p.codigo,p.matricula,p.lotacao,p.subunidade,p.telefonecelular,p.postograduacao,p.nomeguerra FROM Census\Entity\Policial p WHERE p.lotacao='' ORDER BY p.antiguidade");
    			break;
    		default:
    			$query = $this->getEm()->createQuery("SELECT p.codigo,p.matricula,p.lotacao,p.subunidade,p.telefonecelular,p.postograduacao,p.nomeguerra FROM Census\Entity\Policial p WHERE p.postograduacao = :postograduacao AND p.subunidade = :subunidade ORDER BY p.antiguidade");
    			$query->setParameter('postograduacao',$postograduacao);
    			$query->setParameter('subunidade',$lotacao);
    			break;
    	}
    	
    	if ($postograduacao == 'todos') {
    		$query = $this->getEm()->createQuery("SELECT p.codigo,p.matricula,p.subunidade,p.lotacao,p.telefonecelular,p.postograduacao,p.nomeguerra FROM Census\Entity\Policial p WHERE p.subunidade = :subunidade ORDER BY p.antiguidade");
    		$query->setParameter('subunidade',$lotacao);
    	}
    	
    	$lista = $query->getResult();
    	
/*     	echo "<pre>";
    	print_r($query);
    	exit; */
    	
    	return (new ViewModel())
    	->setVariable('lista', $lista);
    }
    
    public function listarSubAction()
    {
    
    	$postograduacao = $_GET['postgrad'];
    	$lotacao = $_GET['lotacao'];
    	
    	//echo "<br>PostoGraduacao: $postograduacao<br>Lotacao: $lotacao<br><br>";
    	switch ($lotacao)
    	{
    		case 'total':
    			$query = $this->getEm()->createQuery("SELECT p.codigo,p.matricula,p.lotacao,p.subunidade,p.telefonecelular,p.postograduacao,p.nomeguerra FROM Census\Entity\Policial p WHERE p.postograduacao = :postograduacao ORDER BY p.antiguidade");
    			$query->setParameter('postograduacao',$postograduacao);
    			break;
    		case 'semclas':
    			$query = $this->getEm()->createQuery("SELECT p.codigo,p.matricula,p.lotacao,p.subunidade,p.telefonecelular,p.postograduacao,p.nomeguerra FROM Census\Entity\Policial p WHERE p.subunidade IS NULL ORDER BY p.antiguidade");
    			break;
    		default:
    			$query = $this->getEm()->createQuery("SELECT p.codigo,p.matricula,p.lotacao,p.subunidade,p.telefonecelular,p.postograduacao,p.nomeguerra FROM Census\Entity\Policial p WHERE p.postograduacao = :postograduacao AND p.lotacao = :lotacao ORDER BY p.antiguidade");
    			$query->setParameter('postograduacao',$postograduacao);
    			$query->setParameter('lotacao',$lotacao);
    			break;
    	}
    	 
    	if ($postograduacao == 'todos') {
    		$query = $this->getEm()->createQuery("SELECT p.codigo,p.matricula,p.subunidade,p.lotacao,p.telefonecelular,p.postograduacao,p.nomeguerra FROM Census\Entity\Policial p WHERE p.lotacao = :lotacao ORDER BY p.antiguidade");
    		$query->setParameter('lotacao',$lotacao);
    	}
    	 
    	$lista = $query->getResult();
    	 
    	/*  echo "<pre>";
    	 print_r($lista);
    	exit;  */
    	 
    	return (new ViewModel())
    	->setVariable('lista', $lista);
    }
    
    public function batalhaoAction() 
    {
    	$serviceContador = $this->getServiceLocator()->get('census-service-contador');
    	
    	$efetivoSAd = $serviceContador->contasub('SAd');
    	$efetivoNGP = $serviceContador->contasub('NGP');
    	$efetivoNCC = $serviceContador->contasub('NCC');
    	$efetivoSec = $serviceContador->contasub('Sec');
    	$efetivoNCS = $serviceContador->contasub('NCS');
    	$efetivoPrj = $serviceContador->contasub('NProj');
    	$efetivoAlm = $serviceContador->contasub('Almox');
    	$efetivoMan = $serviceContador->contasub('NMan');
    	$efetivoSOp = $serviceContador->contasub('SOp');
    	$efetivoInt = $serviceContador->contasub('SSInt');
    	$efetivoNEEC = $serviceContador->contasub('NEEC');
    	$efetivoNEAM = $serviceContador->contasub('NEAM');
    	$efetivoCAPA = $serviceContador->contasub('CeAPA');
    	$efetivoCAp = $serviceContador->contasub('CiaApoio');
    	$efetivoSvI = $serviceContador->contasub('ServInter');
    	$efetivoRM = $serviceContador->contasub('RM');
    	$efetivoTotal = $serviceContador->contasub('Total');
    	
    	
    	$efetivoExpediente = array();
    	
    	$query = $this->getEm()->createQueryBuilder()
    			->select('count(e)')
    			->from('Census\Entity\Policial', 'e');
    	    	
    	$efBtl = $query->where('e.subunidade = :arg1 AND e.servicoescala = :arg2')
    			->setParameter('arg1', 'Btl')
    			->setParameter('arg2', '1')
    			->getQuery()
    			->getResult();
    			
    	$efGOA = $query->where('e.subunidade = :arg1 AND e.servicoescala = :arg2')
    			->setParameter('arg1', 'GOA')
    			->setParameter('arg2', '1')
    			->getQuery()
    			->getResult();
    	
    	$efGPTur = $query->where('e.subunidade = :arg1 AND e.servicoescala = :arg2')
    			->setParameter('arg1', 'GPTur')
    			->setParameter('arg2', '1')
    			->getQuery()
    			->getResult();
    	
    	$efCiaSul = $query->where('e.subunidade = :arg1 AND e.servicoescala = :arg2')
    			->setParameter('arg1', 'CiaSul')
    			->setParameter('arg2', '1')
    			->getQuery()
    			->getResult();
    	
		$efCiaLeste = $query->where('e.subunidade = :arg1 AND e.servicoescala = :arg2')
    			->setParameter('arg1', 'CiaLeste')
    			->setParameter('arg2', '1')
    			->getQuery()
    			->getResult();
    			 
		$efCiaOeste = $query->where('e.subunidade = :arg1 AND e.servicoescala = :arg2')
    			->setParameter('arg1', 'CiaOeste')
    			->setParameter('arg2', '1')
    			->getQuery()
    			->getResult();

    	$efetivoExpediente = array(
    			'Btl' => $efBtl[0],
    			'GOA' => $efGOA[0], 
    			'GPTur' => $efGPTur[0],
    			'CiaSul' => $efCiaSul[0],
    			'CiaLeste' => $efCiaLeste[0],
    			'CiaOeste' => $efCiaOeste[0]
    	);
    			
     	//Cia de Apoio
    	$efCABtl = $query->where('e.subunidade = :arg1 AND e.lotacao = :arg2')
	    	->setParameter('arg1', 'Btl')
	    	->setParameter('arg2', 'CiaApoio')
	    	->getQuery()
	    	->getResult();
    	 
    	$efCAGOA = $query->where('e.subunidade = :arg1 AND e.lotacao = :arg2')
	    	->setParameter('arg1', 'GOA')
	    	->setParameter('arg2', 'CiaApoio')
	    	->getQuery()
	    	->getResult();
    	 
    	$efCAGPTur = $query->where('e.subunidade = :arg1 AND e.lotacao = :arg2')
	    	->setParameter('arg1', 'GPTur')
	    	->setParameter('arg2', 'CiaApoio')
	    	->getQuery()
	    	->getResult();
    	 
    	$efCACiaSul = $query->where('e.subunidade = :arg1 AND e.lotacao = :arg2')
	    	->setParameter('arg1', 'CiaSul')
	    	->setParameter('arg2', 'CiaApoio')
	    	->getQuery()
	    	->getResult();
    	 
    	$efCACiaLeste = $query->where('e.subunidade = :arg1 AND e.lotacao = :arg2')
	    	->setParameter('arg1', 'CiaLeste')
	    	->setParameter('arg2', 'CiaApoio')
	    	->getQuery()
	    	->getResult();
    	
    	$efCACiaOeste = $query->where('e.subunidade = :arg1 AND e.lotacao = :arg2')
    			->setParameter('arg1', 'CiaOeste')
    			->setParameter('arg2', 'CiaApoio')
    			->getQuery()
    			->getResult();
    	
    	$efetivoCA = array(
    			'CABtl' => $efCABtl[0],
    			'CAGOA' => $efCAGOA[0],
    			'CAGPTur' => $efCAGPTur[0],
    			'CACiaSul' => $efCACiaSul[0],
    			'CACiaLeste' => $efCACiaLeste[0],
    			'CACiaOeste' => $efCACiaOeste[0]
    	);
    	
    	//Serviço Interno
    	$efSIBtl = $query->where('e.subunidade = :arg1 AND e.lotacao = :arg2')
    	->setParameter('arg1', 'Btl')
    	->setParameter('arg2', 'ServInter')
    	->getQuery()
    	->getResult();
    	
    	$efSIGOA = $query->where('e.subunidade = :arg1 AND e.lotacao = :arg2')
    	->setParameter('arg1', 'GOA')
    	->setParameter('arg2', 'ServInter')
    	->getQuery()
    	->getResult();
    	
    	$efSIGPTur = $query->where('e.subunidade = :arg1 AND e.lotacao = :arg2')
    	->setParameter('arg1', 'GPTur')
    	->setParameter('arg2', 'ServInter')
    	->getQuery()
    	->getResult();
    	
    	$efSICiaSul = $query->where('e.subunidade = :arg1 AND e.lotacao = :arg2')
    	->setParameter('arg1', 'CiaSul')
    	->setParameter('arg2', 'ServInter')
    	->getQuery()
    	->getResult();
    	
    	$efSICiaLeste = $query->where('e.subunidade = :arg1 AND e.lotacao = :arg2')
    	->setParameter('arg1', 'CiaLeste')
    	->setParameter('arg2', 'ServInter')
    	->getQuery()
    	->getResult();
    	 
    	$efSICiaOeste = $query->where('e.subunidade = :arg1 AND e.lotacao = :arg2')
    	->setParameter('arg1', 'CiaOeste')
    	->setParameter('arg2', 'ServInter')
    	->getQuery()
    	->getResult();
    	 
    	$efetivoSI = array(
    			'SIBtl' => $efSIBtl[0],
    			'SIGOA' => $efSIGOA[0],
    			'SIGPTur' => $efSIGPTur[0],
    			'SICiaSul' => $efSICiaSul[0],
    			'SICiaLeste' => $efSICiaLeste[0],
    			'SICiaOeste' => $efSICiaOeste[0]
    	);
    	 
  
    	
    	$view = new ViewModel(array(
    			'efetivoSAd' => $efetivoSAd,
    			'efetivoNGP' => $efetivoNGP,
    			'efetivoNCC' => $efetivoNCC,
    			'efetivoSec' => $efetivoSec,
    			'efetivoNCS' => $efetivoNCS,
    			'efetivoPrj' => $efetivoPrj,
    			'efetivoAlm' => $efetivoAlm,
    			'efetivoMan' => $efetivoMan,
    			'efetivoSOp' => $efetivoSOp,
    			'efetivoInt' => $efetivoInt,
    			'efetivoNEEC' => $efetivoNEEC,
    			'efetivoNEAM' => $efetivoNEAM,
    			'efetivoCAPA' => $efetivoCAPA,
    			'efetivoCAp' => $efetivoCAp,
    			'efetivoSvI' => $efetivoSvI,
    			'efetivoRM' => $efetivoRM,
    			'efetivoTotal' => $efetivoTotal,
    			'efetivoExpediente' => $efetivoExpediente,
    			'efetivoCA' => $efetivoCA,
    			'efetivoSI' => $efetivoSI,
    	));
    	return $view;
    }
    
    public function goaAction()
    {
    	$serviceContador = $this->getServiceLocator()->get('census-service-contador');
    	 
    	$efetivoLac = $serviceContador->contasub('Lac');
    	$efetivoRPA = $serviceContador->contasub('RPA');
    	$efetivoGTA = $serviceContador->contasub('GTA');
    	$efetivoGOC = $serviceContador->contasub('GOC');
    	$efetivoExpGOA = $serviceContador->contasub('ExpGoa');
    	$efetivoRMGOA = $serviceContador->contasub('RMGOA');
    	$efetivoTotal = $serviceContador->contasub('Total');
    	
    	$view = new ViewModel(array(
    			'efetivoLac' => $efetivoLac,
    			'efetivoRPA' => $efetivoRPA,
    			'efetivoGTA' => $efetivoGTA,
    			'efetivoGOC' => $efetivoGOC,
    			'efetivoExpGOA' => $efetivoExpGOA,
    			'efetivoRMGOA' => $efetivoRMGOA,
    			'efetivoTotal' => $efetivoTotal,
    	));
    	return $view;
    }
}
