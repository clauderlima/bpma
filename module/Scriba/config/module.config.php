<?php

namespace Scriba;

return array(
	# definir e gerenciar controllers
	'controllers' => array(
		'invokables' => array(
			'DocumentoController' => 'Scriba\Controller\DocumentoController',
		),
	),
		
	# definir e gerenciar rotas
	'router' => array(
		'routes' => array(
			'documento' => array(
				'type'      => 'Segment',
				'options'   => array(
					'route'    => '/documento[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'DocumentoController',
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
			'scriba-service-documento' => 'Scriba\Service\Documento',
			'scriba-service-encaminhamento' => 'Scriba\Service\Encaminhamento',
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