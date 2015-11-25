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
    	$efetivoNEAN = $serviceContador->contasub('NEAN');
    	$efetivoCAPA = $serviceContador->contasub('CeAPA');
    	$efetivoCAp = $serviceContador->contasub('CiaApoio');
    	$efetivoSvI = $serviceContador->contasub('ServInter');
    	$efetivoRM = $serviceContador->contasub('RM');
    	$efetivoTotal = $serviceContador->contasub('Total');
    	
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
    			'efetivoNEAN' => $efetivoNEAN,
    			'efetivoCAPA' => $efetivoCAPA,
    			'efetivoCAp' => $efetivoCAp,
    			'efetivoSvI' => $efetivoSvI,
    			'efetivoRM' => $efetivoRM,
    			'efetivoTotal' => $efetivoTotal,
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
