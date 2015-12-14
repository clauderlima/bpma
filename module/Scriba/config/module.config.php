<?php

namespace Scriba;

return array(
	# definir e gerenciar controllers
	'controllers' => array(
		'invokables' => array(
			'ProtocoloController' => 'Scriba\Controller\ProtocoloController',
		),
	),
		
	# definir e gerenciar rotas
	'router' => array(
		'routes' => array(
			'scriba' => array(
				'type'      => 'Segment',
				'options'   => array(
					'route'    => '/scriba[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'IndexController',
						'action'     => 'index',
					),
				),
			),
			'protocolo' => array(
				'type'      => 'Segment',
				'options'   => array(
					'route'    => '/protocolo[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'ProtocoloController',
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
			'scriba-service-protocolo' => 'Scriba\Service\Protocolo',
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
			'layout/scriba'			=> __DIR__ . '/../view/layout/scriba.phtml',
			'hereditas/home/index'     => __DIR__ . '/../view/hereditas/home/index.phtml',
			'error/404'             => __DIR__ . '/../view/error/404.phtml',
			'error/index'           => __DIR__ . '/../view/error/index.phtml',
		),
		'template_path_stack' => array(
			__DIR__ . '/../view',
		),
	),
);