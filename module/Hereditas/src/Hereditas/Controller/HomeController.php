<?php
/**
 * namespace de localizacao do nosso controller
 */
namespace Hereditas\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

//use Zend\Db\Adapter\Adapter as Adaptador,
//	Zend\Db\Sql\Sql;
 
class HomeController extends AbstractActionController
{
    public function indexAction()
    {
    	$adapter = $this->getServiceLocator()->get('AdapterDb');
    	
    	/**
    	 * contar quantidade de elementos da nossa tabela
    	 */
    	//echo "Quantidade de Policiais Cadastrados no BPMA" . $adapter->query("SELECT * FROM `policial`")->execute()->count();
    	
    	/**
    	 * montar objeto sql e executar
    	 */
/*     	$sql        = new Sql($adapter); // use Zend\Db\Sql\Sql
    	$select     = $sql->select()->from('policial');
    	$statement  = $sql->prepareStatementForSqlObject($select);
    	$resultsSql = $statement->execute(); */
    	
    	/**
    	 * motar objeto resultset com objeto sql e mostrar resultado em array
    	 */
    /* 	$resultSet = new \Zend\Db\ResultSet\ResultSet; // nao necessita do use devido a sintaxe iniciando em \
    	$resultSet->initialize($resultsSql);
    	print_r($resultSet->toArray()); */
    }
    
    public function sobreAction()
    {
    	return new ViewModel();
    }
}
