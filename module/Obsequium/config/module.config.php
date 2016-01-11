<?php

namespace Obsequium;

return array(
	'controllers' => array(
		'invokables' => array(
			'EscalaController' => 'Obsequium\Controller\EscalaController',
		),
	),
	# definir e gerenciar rotas
	'router' => array(
		'routes' => array(
			'escala' => array(
				'type'      => 'Segment',
				'options'   => array(
					'route'    => '/escala[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'EscalaController',
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
			'obsequium-service-escala' => 'Obsequium\Service\Escala',
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
			'error/404'             => __DIR__ . '/../view/error/404.phtml',
			'error/index'           => __DIR__ . '/../view/error/index.phtml',
		),
		'template_path_stack' => array(
			__DIR__ . '/../view',
		),
	),
);