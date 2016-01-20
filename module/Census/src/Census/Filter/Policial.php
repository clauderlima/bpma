<?php

namespace Census\Filter;

use Zend\InputFilter\InputFilter;
use Zend\Filter\Digits;

class Policial extends InputFilter
{
	public function __construct() 
	{
		$this->add(array(
			'name'		=> 'nomecompleto',
			'required'	=> true,
			'filters'	=> array(
						
			),
			'validators' => array(
				array(
					'name' => 'Zend\Validator\NotEmpty',
					'options' => array(
						'messages' => array(
							\Zend\Validator\NotEmpty::IS_EMPTY => 'Campo obrigatório.'
						)
					)
				)
			)
		));
		
		$this->add(array(
			'name'		=> 'cpf',
			'required'	=> false,
			'filters'	=> array(
				array('name' => 'Zend\Filter\StripTags'),
				array('name' => 'Zend\Filter\StringTrim'),
				array('name' => 'Zend\Filter\Digits')
			),
			'validators' => array(
				array(
					'name' => 'Zend\Validator\NotEmpty',
					'options' => array(
						'messages' => array(
							\Zend\Validator\NotEmpty::IS_EMPTY => 'Campo obrigatório.'
						)
					)
				)
			)
		));
		
		$this->add(array(
		    'name'		=> 'rg',
		    'required'	=> false,
		    'filters'	=> array(
		        array('name' => '\Zend\Filter\Digits')
		    ),
		    'validators' => array(
		        array(
		            'name' => 'Zend\Validator\NotEmpty',
		            'options' => array(
		                'messages' => array(
		                    \Zend\Validator\NotEmpty::IS_EMPTY => 'Campo obrigatório.'
		                )
		            )
		        )
		    )
		));
		
		$this->add(array(
			'name'		=> 'orgaoexpedidor',
			'required'	=> false,
			'filters'	=> array(
				array('name' => 'Zend\Filter\StringToUpper')
			),
			'validators' => array(
				array(
					'name' => 'Zend\Validator\NotEmpty',
					'options' => array(
						'messages' => array(
							\Zend\Validator\NotEmpty::IS_EMPTY => 'Campo obrigatório.'
						)
					)
				)
			)
		));
		
		$this->add(array(
				'name'		=> 'naturalidade',
				'required'	=> false,
				'filters'	=> array(
		
				),
		));
		
		$this->add(array(
				'name'		=> 'naturalidadeuf',
				'required'	=> false,
				'filters'	=> array(
		
				),
		));
		
		$this->add(array(
			'name'		=> 'datanascimento',
			'required'	=> false,
			'filters'	=> array(
					
			),
			'validators' => array(
				array(
					'name' => 'Zend\Validator\NotEmpty',
					'options' => array(
						'messages' => array(
							\Zend\Validator\NotEmpty::IS_EMPTY => 'Campo obrigatório.'
						)
					)
				)
			)
		));
		
		$this->add(array(
				'name'		=> 'sexo',
				'required'	=> true,
				'filters'	=> array(
		
				),
		));
		
		$this->add(array(
				'name'		=> 'estadocivil',
				'required'	=> false,
				'filters'	=> array(
		
				),
		));
		
		$this->add(array(
				'name'		=> 'cnh',
				'required'	=> false,
				'filters'	=> array(
		
				),
		));
		
		$this->add(array(
				'name'		=> 'cnhcategoria',
				'required'	=> false,
				'filters'	=> array(
						array('name' => 'Digits')
				),
		));
		
		$this->add(array(
			'name'		=> 'cnhvalidade',
			'required'	=> false,
			'filters'	=> array(
						
			),
		));
		
		$this->add(array(
				'name'		=> 'nomepai',
				'required'	=> false,
				'filters'	=> array(
		
				),
		));
		
		$this->add(array(
				'name'		=> 'nomemae',
				'required'	=> false,
				'filters'	=> array(
		
				),
		));
		$this->add(array(
				'name'		=> 'lotacao',
				'required'	=> false,
				'filters'	=> array(
		
				),
		));
		
		
		$this->add(array(
			'name'		=> 'enderecouf',
			'required'	=> false,
			'filters'	=> array(
						
			),
			'validators' => array(
				array(
					'name' => 'Zend\Validator\NotEmpty',
					'options' => array(
						'messages' => array(
							\Zend\Validator\NotEmpty::IS_EMPTY => 'Campo obrigatório.'
						)
					)
				)
			)
		));
		
		$this->add(array(
				'name'		=> 'telefonefixo',
				'required'	=> false,
				'filters'	=> array(
		
				),
		));
		
		$this->add(array(
				'name'		=> 'telefonecelular',
				'required'	=> false,
				'filters'	=> array(
				
				),
				'validators' => array(
						array(
								'name' => 'Zend\Validator\NotEmpty',
								'options' => array(
										'messages' => array(
												\Zend\Validator\NotEmpty::IS_EMPTY => 'Campo obrigatório.'
										)
								)
						)
				)
		));
		
		$this->add(array(
				'name'		=> 'email',
				'required'	=> false,
				'filters'	=> array(
		
				),
				'validators' => array(
						array(
								'name' => 'Zend\Validator\NotEmpty',
								'options' => array(
										'messages' => array(
												\Zend\Validator\NotEmpty::IS_EMPTY => 'Campo obrigatório.'
										)
								)
						)
				)
		));
		
		$this->add(array(
				'name'		=> 'enderecotipo',
				'required'	=> false,
				'filters'	=> array(
						
				),
		));
		
		$this->add(array(
				'name'		=> 'postograduacao',
				'required'	=> true,
				'filters'	=> array(
		
				),
				'validators' => array(
						array(
								'name' => 'Zend\Validator\NotEmpty',
								'options' => array(
										'messages' => array(
												\Zend\Validator\NotEmpty::IS_EMPTY => 'Campo obrigatório.'
										)
								)
						)
				)
		));
		
		$this->add(array(
				'name'		=> 'nomeguerra',
				'required'	=> true,
				'filters'	=> array(
		
				),
				'validators' => array(
						array(
								'name' => 'Zend\Validator\NotEmpty',
								'options' => array(
										'messages' => array(
												\Zend\Validator\NotEmpty::IS_EMPTY => 'Campo obrigatório.'
										)
								)
						)
				)
		));
		
		$this->add(array(
				'name'		=> 'matricula',
				'required'	=> true,
				'filters'	=> array(
							
				),
				'validators' => array(
						array(
								'name' => 'Zend\Validator\NotEmpty',
								'options' => array(
										'messages' => array(
												\Zend\Validator\NotEmpty::IS_EMPTY => 'Campo obrigatório.'
										)
								)
						)
				)
		));
		
		$this->add(array(
				'name'		=> 'matriculasiape',
				'required'	=> false,
				'filters'	=> array(
							
				),
				'validators' => array(
						array(
								'name' => 'Zend\Validator\NotEmpty',
								'options' => array(
										'messages' => array(
												\Zend\Validator\NotEmpty::IS_EMPTY => 'Campo obrigatório.'
										)
								)
						)
				)
		));
		
		$this->add(array(
				'name'		=> 'comportamento',
				'required'	=> false,
				'filters'	=> array(
		
				),
				'validators' => array(
						array(
								'name' => 'Zend\Validator\NotEmpty',
								'options' => array(
										'messages' => array(
												\Zend\Validator\NotEmpty::IS_EMPTY => 'Campo obrigatório.'
										)
								)
						)
				)
		));
		
		$this->add(array(
				'name'		=> 'dataadmissao',
				'required'	=> false,
				'filters'	=> array(
		
				),
				'validators' => array(
						array(
								'name' => 'Zend\Validator\NotEmpty',
								'options' => array(
										'messages' => array(
												\Zend\Validator\NotEmpty::IS_EMPTY => 'Campo obrigatório.'
										)
								)
						)
				)
		));
		
		$this->add(array(
				'name'		=> 'quadro',
				'required'	=> true,
				'filters'	=> array(
		
				),
				'validators' => array(
						array(
								'name' => 'Zend\Validator\NotEmpty',
								'options' => array(
										'messages' => array(
												\Zend\Validator\NotEmpty::IS_EMPTY => 'Campo obrigatório.'
										)
								)
						)
				)
		));
		
		$this->add(array(
				'name'		=> 'funcionaltipo',
				'required'	=> false,
				'filters'	=> array(
						
				),
		));
		
		$this->add(array(
				'name'		=> 'identidadefuncionalvalidade',
				'required'	=> false,
				'filters'	=> array(
				
				),
				'validators' => array(
						array(
								'name' => 'Zend\Validator\NotEmpty',
								'options' => array(
										'messages' => array(
												\Zend\Validator\NotEmpty::IS_EMPTY => 'Campo obrigatório.'
										)
								)
						)
				)
		));;
		
		$this->add(array(
				'name'		=> 'bienalvalidade',
				'required'	=> false,
				'filters'	=> array(
						
				),
		));
		
		$this->add(array(
				'name'		=> 'tafvalidade',
				'required'	=> false,
				'filters'	=> array(
				
				),
		));
		
		$this->add(array(
				'name'		=> 'servicoescala',
				'required'	=> false,
				'filters'	=> array(
		
				),
		));
		
		$this->add(array(
				'name'		=> 'servicohorario',
				'required'	=> false,
				'filters'	=> array(
		
				),
		));
		
		$this->add(array(
				'name'		=> 'portearmasituacao',
				'required'	=> false,
				'filters'	=> array(
		
				),
		));
	}
	
}