<?php

namespace User;

use Census\Model\Policial,
	Census\Model\PolicialTable;
use Zend\Db\ResultSet\ResultSet,
	Zend\Db\TableGateway\TableGateway;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getViewHelperConfig()
    {
    	return array(
    		# registrar View Helper com injecao de dependecia
    		'factories' => array(
    		),
    		'invokables' => array(
    			'filter' => 'Census\View\Helper\PolicialFilter'
    		)
    	);
    }
    
    /**
     * Register Services
     */
    public function getServiceConfig()
    {
    	return array(
    		'factories' => array(
    			'PolicialTableGateway' => function ($sm) {
    			// obter adapter db atraves do service manager
    			$adapter = $sm->get('AdapterDb');
    
    			// configurar ResultSet com nosso model Contato
    			$resultSetPrototype = new ResultSet();
    			$resultSetPrototype->setArrayObjectPrototype(new Policial());
    			//echo "<pre>"; echo print_r($resultSetPrototype); exit;
    			// return TableGateway configurado para nosso model Contato
    			return new TableGateway('policial', $adapter, null, $resultSetPrototype);
    		
    			},
    		'ModelPolicial' => function ($sm) {
    			// return instacia Model PolicialTable
    			return new PolicialTable($sm->get('PolicialTableGateway'));
    			}
    		),
    	);
    }
}
