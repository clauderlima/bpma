<?php

namespace Hereditas;

return array(
	# definir e gerenciar controllers
	'controllers' => array(
		'invokables' => array(
			'ArmaController' => 'Hereditas\Controller\ArmaController',
			'PatrimonioController' => 'Hereditas\Controller\PatrimonioController',
		),
	),
		
	# definir e gerenciar rotas
	'router' => array(
		'routes' => array(
			'hereditas' => array(
				'type'      => 'Segment',
				'options'   => array(
					'route'    => '/hereditas[/:action][/:id]',
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
			'patrimonio' => array(
				'type'      => 'Segment',
				'options'   => array(
					'route'    => '/patrimonio[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'PatrimonioController',
						'action'     => 'index',
					),
				),
			),
			'arma' => array(
				'type'      => 'Segment',
				'options'   => array(
					'route'    => '/arma[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'ArmaController',
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
			'hereditas-service-arma' => 'Hereditas\Service\Arma',
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
			'layout/hereditas'			=> __DIR__ . '/../view/layout/hereditas.phtml',
			'hereditas/home/index'     => __DIR__ . '/../view/hereditas/home/index.phtml',
			'error/404'             => __DIR__ . '/../view/error/404.phtml',
			'error/index'           => __DIR__ . '/../view/error/index.phtml',
		),
		'template_path_stack' => array(
			__DIR__ . '/../view',
		),
	),
);