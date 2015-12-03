<?php

namespace Census;

return array(
	# definir e gerenciar controllers
	'controllers' => array(
		'invokables' => array(
			'HomeController' => 'Census\Controller\HomeController',
			'PolicialController' => 'Census\Controller\PolicialController',
			'MapaController' => 'Census\Controller\MapaController',
			'RequerimentoController' => 'Census\Controller\RequerimentoController',
			'FeriasController' => 'Census\Controller\FeriasController',
			'CtgrafiController' => 'Census\Controller\CtgrafiController',
			'FormacaoController' => 'Census\Controller\FormacaoController',
			'CursoController' => 'Census\Controller\CursoController',
			'RestricaoController' => 'Census\Controller\RestricaoController',
			'DispensamedicaController' => 'Census\Controller\DispensamedicaController',
			'AlteracaoController' => 'Census\Controller\AlteracaoController',
		),
	),
		
	# definir e gerenciar rotas
	'router' => array(
		'routes' => array(
			'home' => array(
				'type'      => 'Literal',
				'options'   => array(
					'route'    => '/',
					'defaults' => array(
						'controller' => 'HomeController',
						'action'     => 'index',
					),
				),
			),
			# literal para action sobre home
			'sobre' => array(
				'type'      => 'Literal',
				'options'   => array(
					'route'    => '/sobre',
					'defaults' => array(
						'controller' => 'HomeController',
						'action'     => 'sobre',
					),
				),
			),
			'census' => array(
				'type'      => 'Segment',
				'options'   => array(
					'route'    => '/census[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'PolicialController',
						'action'     => 'index',
					),
				),
			),
			'mapa' => array(
				'type'      => 'Segment',
				'options'   => array(
					'route'    => '/mapa[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'MapaController',
						'action'     => 'index',
					),
				),
			),
			'formacao' => array(
				'type'      => 'Segment',
				'options'   => array(
					'route'    => '/formacao[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'FormacaoController',
						'action'     => 'index',
					),
				),
			),
			'curso' => array(
				'type'      => 'Segment',
				'options'   => array(
					'route'    => '/curso[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+', 
					),
					'defaults' => array(
						'controller' => 'CursoController',
						'action'     => 'index',
					),
				),
			),
			'restricao' => array(
				'type'      => 'Segment',
				'options'   => array(
					'route'    => '/restricao[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'RestricaoController',
						'action'     => 'index',
					),
				),
			),
			'dispensamedica' => array(
				'type'      => 'Segment',
				'options'   => array(
					'route'    => '/dispensamedica[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'DispensamedicaController',
						'action'     => 'index',
					),
				),
			),
			'ctgrafi' => array(
				'type'      => 'Segment',
				'options'   => array(
					'route'    => '/ctgrafi[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'CtgrafiController',
						'action'     => 'index',
					),
				),
			),
			'ferias' => array(
				'type'      => 'Segment',
				'options'   => array(
					'route'    => '/ferias[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'FeriasController',
						'action'     => 'index',
					),
				),
			),
			'alteracao' => array(
				'type'      => 'Segment',
				'options'   => array(
					'route'    => '/alteracao[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'AlteracaoController',
						'action'     => 'index',
					),
				),
			),
			'requerimento' => array(
				'type'      => 'Segment',
				'options'   => array(
					'route'    => '/requerimento[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'RequerimentoController',
						'action'     => 'index',
					),
				),
			),
		),
	),
		
	# definir e gerenciar servicos
	'service_manager' => array(
		'factories' => array(
			#'translator' => 'ZendI18nTranslatorTranslatorServiceFactory',
		),
		'invokables' => array(
			'census-service-policial' => 'Census\Service\Policial',
			'census-service-afastamento' => 'Census\Service\Afastamento',
			'census-service-ferias' => 'Census\Service\Ferias',
			'census-service-contador' => 'Census\Service\Contador',
			'census-service-abono' => 'Census\Service\Abono',
			'census-service-arma' => 'Census\Service\Arma',
			'census-service-ctgrafi' => 'Census\Service\Ctgrafi',
			'census-service-formacao' => 'Census\Service\Formacao',
			'census-service-curso' => 'Census\Service\Curso',
			'census-service-restricao' => 'Census\Service\Restricao',
			'census-service-restricaomedica' => 'Census\Service\Restricaomedica',
			'census-service-dispensamedica' => 'Census\Service\Dispensamedica',
			'census-service-alteracao' => 'Census\Service\Alteracao',
			'census-service-requerimentoabono' => 'Census\Service\Requerimentoabono',
		)
	),
		'doctrine' => array(
				'driver' => array(
						__NAMESPACE__ . '_driver' => array(
								'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
								'cache' => 'array',
								'paths'	=> array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
						),
						'orm_default' => array(
								'drivers' => array(
										__NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
								),
						),
				),
		),
	# definir e gerenciar layouts, erros, exceptions, doctype base
	'view_manager' => array(
		'display_not_found_reason'  => true,
		'display_exceptions'        => true,
		'doctype'                   => 'HTML5',
		'not_found_template'        => 'error/404',
		'exception_template'        => 'error/index',
		'template_map'              => array(
			'layout/layout'         => __DIR__ . '/../view/layout/layout.phtml',
			'layout/census'			=> __DIR__ . '/../view/layout/census.phtml',
			'census/home/index'     => __DIR__ . '/../view/census/home/index.phtml',
			'error/404'             => __DIR__ . '/../view/error/404.phtml',
			'error/index'           => __DIR__ . '/../view/error/index.phtml',
		),
		'template_path_stack' => array(
			__DIR__ . '/../view',
		),
	),
);