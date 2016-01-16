<?php
/**
 * namespace de localizacao do nosso controller
 */
namespace Census\Controller;
 
use Zend\View\Model\ViewModel;

//use Zend\Db\Adapter\Adapter as Adaptador,
//	Zend\Db\Sql\Sql;
 
class HomeController extends AbstractController
{
    public function indexAction()
    {
    	$dados = $this->getEm('Scriba\Entity\Documento')->findAll();
    	
    	$em = $this->getEm();
    	
    	$dados = $em->createQueryBuilder()
    	->select('e')
    	->from('Scriba\Entity\Documento', 'e')
    	->orderBy('e.recebimento', 'ASC')
    	->getQuery()->getResult();
    	
    	$result = array();
    	
    	foreach ($dados as $key => $item)
    	{
    		$result[$key]['protocolo'] = str_pad($item->getProcodigo()->getNumero(), 3, "0", STR_PAD_LEFT);
    		$result[$key]['codigo'] = $item->getCodigo();
    		$result[$key]['tipo'] = $item->getTipo();
    		$result[$key]['numero'] = $item->getNumero();
    		$result[$key]['data'] = $item->getData()->format('d/m/Y');
    		$result[$key]['assunto'] = $item->getAssunto();
    		$result[$key]['origem'] = $item->getOrigem();
    		$result[$key]['recebimento'] = $item->getRecebimento()->format('d/m/Y');
    			
    		$encaminhamento = $em->createQueryBuilder()
	    		->select('e')
	    		->from('Scriba\Entity\Encaminhamento', 'e')
	    		->where('e.doccodigo = :doccodigo')
	    		->setParameter('doccodigo', $item->getCodigo())
	    		->orderBy('e.codigo', 'DESC')
	    		->setMaxResults(1)
	    		->getQuery()->getResult();
    	
    		if ($encaminhamento)
    		{
    			$result[$key]['secao'] = $encaminhamento[0]->getSecao();
    			$result[$key]['desde'] = $encaminhamento[0]->getData()->format('d/m/Y');
    			$result[$key]['status'] = $encaminhamento[0]->getStatus();
	    		$result[$key]['polcodigo'] = $encaminhamento[0]->getPolcodigo()->getCodigo();
	    		$result[$key]['polcodigotramitador'] = $encaminhamento[0]->getPolcodigotramitador() ? $encaminhamento[0]->getPolcodigotramitador() : NULL;
    		} else
    		{
    			$result[$key]['secao'] = "Secretaria";
    			$result[$key]['desde'] = $item->getRecebimento()->format('d/m/Y');
    			$result[$key]['status'] = "";
    		}
    	}
    	
    	return new ViewModel(array(
    			'dados' => $result,
    			'errorMessages' => $this->flashMessenger()->getErrorMessages(),
    			'successMessages' => $this->flashMessenger()->getSuccessMessages(),
    			'flashMessages' => $this->flashMessenger()->getMessages(),
    	));
    }
    
    public function sobreAction()
    {
    	return new ViewModel(array(
    			'errorMessages' => $this->flashMessenger()->getErrorMessages(),
    			'successMessages' => $this->flashMessenger()->getSuccessMessages(),
    			'flashMessages' => $this->flashMessenger()->getMessages(),
    	));
    }
}
