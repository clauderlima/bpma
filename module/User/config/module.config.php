<?php

namespace User;

use Zend\Crypt\Password\Bcrypt;

return array(
	'controllers' => array(
		'invokables' => array(
			'IndexController' => 'User\Controller\IndexController',
			'UserController' => 'User\Controller\UserController',
		),
	),
	# definir e gerenciar rotas
	'router' => array(
		'routes' => array(
			'user' => array(
				'type'      => 'Segment',
				'options'   => array(
					'route'    => '/user[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'UserController',
						'action'     => 'index',
					),
				),
			),
		),
	),
	'view_helpers' => array(
		'invokables' => array(
			'useridentity' => 'User\View\Helper\UserIdentity',
		)
	),
	# definir e gerenciar servicos
	'service_manager' => array(
		'factories' => array(
			#'translator' => 'ZendI18nTranslatorTranslatorServiceFactory',
		),
		'invokables' => array(
			'user-service-usuario' => 'User\Service\Usuario',
			'user-service-acl' => 'User\Service\Acl',
			'user-service-auth' => 'User\Service\Auth',
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
			'authentication' => array(
				'orm_default' => array(
					'object_manager' => 'Doctrine\ORM\EntityManager',
						'identity_class' => 'Census\Entity\Usuario',
						'identity_property' => 'login',
						'credential_property' => 'senha',
						'credential_callable' => function(\Census\Entity\Usuario $usuario, $senha) {
							if ($usuario->getStatus() != 'Ativo') {
								return false;
							}
				
							$bcrypt = new Bcrypt();
							$bcrypt->setCost('14');
				
							return $bcrypt->verify($senha, $usuario->getSenha());
					}
				)
			)
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