<?php

namespace Obsequium\Controller;

use Census\Controller\AbstractController;
use Zend\View\Model\ViewModel;

class EscalaController extends AbstractController
{
	public function indexAction()
	{
		$dia = '2016-01-08';
		$escala = $this->getEm()->createQueryBuilder()
			->select('e')
			->from('Obsequium\Entity\Escala', 'e')
			->where('e.data = :data')
			->setParameter('data', $dia)
			->orderBy('e.codigo', 'DESC')
			->getQuery()->getResult();
		
		return new ViewModel(array(
			'dados' => $escala,
		));
	}
	
	public function gerarAction()
	{
		$dia = '2016-01-08';
		$escala = $this->getEm()->createQueryBuilder()
			->select('e')
			->from('Obsequium\Entity\Escala', 'e')
			->where('e.data = :data')
			->setParameter('data', $dia)
			->getQuery()->getResult();
		
		$service = $this->getServiceLocator()->get('obsequium-service-escala');
			
		
		// Caso não exista escala Inicia a escala com o mais moderno
		if (!$escala)
		{
			$moderno = $this->getEm()->createQueryBuilder()
				->select('p')
				->from('Census\Entity\Policial', 'p')
				->where('p.postograduacao = :postograduacao AND p.subunidade <> :subunidade')
				->setParameter('postograduacao', 'ST')
				->setParameter('subunidade', 'TRC')
				->orderBy('p.antiguidade', 'DESC')
				->setMaxResults(1)
				->getQuery()->getResult();
			
			$moderno = $moderno[0];
				
			$dados = array(
				'tipo' => "Serviço Ordinário",
				'qtd_folgas' => "0",
				'escalado' => "1",
				'data' => $dia,
				'apto' => "1",
				'posto' => "BPMA",
				'funcao' => "Fiscal de Dia",
				'uniforme' => "Orgânico",
				'polcodigo' => $moderno->getCodigo()
			);
			
			if ($service->insert($dados, '\Obsequium\Entity\Escala') )
			{
				$this->flashMessenger()->addSuccessMessage('Escala iniciada com sucesso!!!!!');
			} else 
			{
				$this->flashMessenger()->addErrorMessage('Erro ao iniciar a escala!');
			}
		
			// Aplica a folga aos demais que concorrem a escala
			$policiais = $this->getEm()->createQueryBuilder()
				->select('p')
				->from('Census\Entity\Policial', 'p')
				->where('p.postograduacao = :postograduacao AND p.subunidade <> :subunidade')
				->setParameter('postograduacao', 'ST')
				->setParameter('subunidade', 'TRC')
				->orderBy('p.antiguidade', 'DESC')
				->getQuery()->getResult();
			
			foreach ($policiais as $policial)
			{
				if (!($policial->getEscala()))
				{
					$dados = array(
						'tipo' => "Serviço Ordinário",
						'qtd_folgas' => "1",
						'escalado' => "0",
						'data' => $dia,
						'apto' => "1",
						'posto' => "BPMA",
						'funcao' => "Fiscal de Dia",
						'uniforme' => "Orgânico",
						'polcodigo' => $policial->getCodigo()
					);
				$service->insert($dados, '\Obsequium\Entity\Escala');
				}
			}
		}
		
		$dia = '2016-01-08';
		
		//Selecionar a maior folga
		$escala = $this->getEm()->createQueryBuilder()
			->select('e')
			->from('Obsequium\Entity\Escala', 'e')
			->where('e.data = :data')
			->setParameter('data', $dia)
			->orderBy('e.qtdfolgas', 'DESC')
			->setMaxResults(1)
			->getQuery()->getResult();
		
		$maiorfolga = $escala[0]->getQtdfolgas();
		
		//Pegar o policial mais moderno que possui o maior numero de folga
		$moderno = $this->getEm()->createQueryBuilder()
			->select('e', 'p')
			->from('Obsequium\Entity\Escala', 'e')
			->innerJoin('e.polcodigo', 'p')
			->where('e.qtdfolgas = :qtdfolgas AND e.data = :data')
			->setParameter('data', $dia)
			->setParameter('qtdfolgas', $maiorfolga)
			->orderBy('p.antiguidade', 'DESC')
			->setMaxResults(1)
			->getQuery()->getResult();
			
		$moderno = $moderno[0];
			
		$dia = '2016-01-09';
		
		$dados = array(
			'tipo' => "Serviço Ordinário",
			'qtd_folgas' => "0",
			'escalado' => "1",
			'data' => $dia,
			'apto' => "1",
			'posto' => "BPMA",
			'funcao' => "Fiscal de Dia",
			'uniforme' => "Orgânico",
			'polcodigo' => $moderno->getCodigo()
		);
		
		// Escala o mais moderno
		$service->insert($dados, '\Obsequium\Entity\Escala');
		
		// Aplica a folga nos demais
		$policiais = $this->getEm()->createQueryBuilder()
			->select('e', 'p')
			->from('Obsequium\Entity\Escala', 'e')
			->innerJoin('e.polcodigo', 'p')
			->where('e.escalado <> :escalado AND e.data = :data')
			->setParameter('data', $dia)
			->setParameter('escalado', '1')
			->orderBy('p.antiguidade', 'DESC')
			->setMaxResults(1)
			->getQuery()->getResult();
			
		foreach ($policiais as $policial)
		{
			echo "<br>" . $item->getPolcodigo()->getPostograduacao() . " " .$item->getPolcodigo()->getNomeguerra() . " - " . $item->getQtdfolgas();
		}
		exit;
		foreach ($policiais as $policial)
		{
			if (!($policial->getEscala()))
			{
				$dados = array(
						'tipo' => "Serviço Ordinário",
						'qtd_folgas' => "1",
						'escalado' => "0",
						'data' => $dia,
						'apto' => "1",
						'posto' => "BPMA",
						'funcao' => "Fiscal de Dia",
						'uniforme' => "Orgânico",
						'polcodigo' => $policial->getCodigo()
				);
				$service->insert($dados, '\Obsequium\Entity\Escala');
			}
		}
		
		
		
		foreach ($escala as $item)
		{
			echo "<br>" . $item->getPolcodigo()->getPostograduacao() . " " .$item->getPolcodigo()->getNomeguerra() . " - " . $item->getQtdfolgas(); 
		}
			
		exit;
			
		return new ViewModel(array(
				'dados' => $dados,
		));
		
		$form = new \User\Form\Usuario();
		$request = $this->getRequest();
		
		if ($request->isPost()) {
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \User\Filter\Usuario());
			if ($form->isValid()) {
				$authService = $this->getServiceLocator()->get('user-service-auth');
				if ($authService->authenticate($data) == 'logado')
				{
					$this->flashMessenger()->addSuccessMessage('Bem vindo ao SGP!');
					return $this->redirect()->toUrl('/');
				}
				
				$this->flashMessenger()->addErrorMessage('Usuário ou senha incorretos!');
				return $this->redirect()->toUrl('/user/login');;
			}
		}
		
		return new ViewModel(array(
			'form' => $form
		));
	}
	
	public function logoutAction()
	{
		$serviceAuth = $this->getServiceLocator()->get('user-service-auth');
		$serviceAuth->logout();
	
		return $this->redirect()->toRoute('home');
	}
}