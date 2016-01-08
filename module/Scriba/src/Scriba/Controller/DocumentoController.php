<?php

namespace Scriba\Controller;

use Zend\View\Model\ViewModel;

class DocumentoController extends AbstractController
{
	public function indexAction()
	{
		$dados = $this->getEm('Scriba\Entity\Documento')->findAll();
		
		$em = $this->getEm();
		
		$dados = $em->createQueryBuilder()
			->select('e')
			->from('Scriba\Entity\Documento', 'e')
			->orderBy('e.recebimento', 'ASC')
			->getQuery()->getResult();
		
		$result = array();
		
		foreach ($dados as $key => $item)
		{
			$result[$key]['protocolo'] = str_pad($item->getProcodigo()->getNumero(), 3, "0", STR_PAD_LEFT);
			$result[$key]['codigo'] = $item->getCodigo();
			$result[$key]['tipo'] = $item->getTipo();
			$result[$key]['numero'] = $item->getNumero();
			$result[$key]['data'] = $item->getData()->format('d/m/Y');
			$result[$key]['assunto'] = $item->getAssunto();
			$result[$key]['origem'] = $item->getOrigem();
			$result[$key]['recebimento'] = $item->getRecebimento()->format('d/m/Y');
			
			$encaminhamento = $em->createQueryBuilder()
				->select('e')
				->from('Scriba\Entity\Encaminhamento', 'e')
				->where('e.doccodigo = :doccodigo')
				->setParameter('doccodigo', $item->getCodigo())
				->orderBy('e.codigo', 'DESC')
				->setMaxResults(1)
				->getQuery()->getResult();
				
			if ($encaminhamento)
			{
				$result[$key]['secao'] = $encaminhamento[0]->getSecao();
				$result[$key]['desde'] = $encaminhamento[0]->getData()->format('d/m/Y');
				$result[$key]['status'] = $encaminhamento[0]->getStatus();
			} else 
			{
				$result[$key]['secao'] = "Secretaria";
				$result[$key]['desde'] = $item->getRecebimento()->format('d/m/Y');
				$result[$key]['status'] = "";
			}
		}
		
		return new ViewModel(array(
			'dados' => $result,
		));
	}
	
	public function listarArquivadosAction()
	{
		$dados = $this->getEm('Scriba\Entity\Documento')->findAll();
	
		$em = $this->getEm();
	
		$dados = $em->createQueryBuilder()
			->select('e')
			->from('Scriba\Entity\Documento', 'e')
			->orderBy('e.recebimento', 'ASC')
			->getQuery()->getResult();
	
		foreach ($dados as $key => $item)
		{
			$result[$key]['protocolo'] = str_pad($item->getProcodigo()->getNumero(), 3, "0", STR_PAD_LEFT);
			$result[$key]['codigo'] = $item->getCodigo 	();
			$result[$key]['tipo'] = $item->getTipo();
			$result[$key]['numero'] = $item->getNumero();
			$result[$key]['data'] = $item->getData()->format('d/m/Y');
			$result[$key]['assunto'] = $item->getAssunto();
			$result[$key]['origem'] = $item->getOrigem();
			$result[$key]['recebimento'] = $item->getRecebimento()->format('d/m/Y');
				
			$encaminhamento = $em->createQueryBuilder()
			->select('e')
			->from('Scriba\Entity\Encaminhamento', 'e')
			->where('e.doccodigo = :doccodigo')
			->setParameter('doccodigo', $item->getCodigo())
			->orderBy('e.codigo', 'DESC')
			->setMaxResults(1)
			->getQuery()->getResult();
				
			if ($encaminhamento)
			{
				$result[$key]['secao'] = $encaminhamento[0]->getSecao();
				$result[$key]['desde'] = $encaminhamento[0]->getData()->format('d/m/Y');
				$result[$key]['status'] = $encaminhamento[0]->getStatus();
			} else
			{
				$result[$key]['secao'] = "Secretaria";
				$result[$key]['desde'] = $item->getRecebimento()->format('d/m/Y');
				$result[$key]['status'] = "Recebido";
			}
		}
	
		return new ViewModel(array(
				'dados' => $result,
		));
	}
	
	public function adicionarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
			
		// Instaciando services
		$service = $this->getServiceLocator()->get('scriba-service-documento');
			
		// Instaciando o Form
		$form = new \Scriba\Form\Documento();
			
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \Scriba\Filter\Documento());
	
			if ($form->isValid())
			{
				if ($service->insert($data, 'Scriba\Entity\Documento'))
				{
					$this->flashMessenger()->addSuccessMessage("Documento cadastrado com sucesso!");
					return $this->redirect()->toUrl('/documento');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar documento! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
			
		$view = new ViewModel(array(
				'form' => $form
		));
			
		$view->setTemplate('scriba/documento/form.phtml');
			
		return $view;
	}
	
	public function tramitarAction()
	{
		// Pega o id passado na url
		$id = (int) $this->params()->fromRoute('id', 0);
		
		// Definindo variaveis
		$request = $this->getRequest();
			
		// Instaciando services
		$service = $this->getServiceLocator()->get('scriba-service-encaminhamento');
		
		// Instaciando o Form
		$form = new \Scriba\Form\Encaminhamento();
		
		// Busca o repositorio da entidade a ser tramitada
		$dados = $this->getEm('Scriba\Entity\Documento')->find($id)->toArray();
		
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \Scriba\Filter\Encaminhamento());
		
			if ($form->isValid())
			{
				if ($service->inserir($data, 'Scriba\Entity\Encaminhamento', $dados['codigo']))
				{
					$this->flashMessenger()->addSuccessMessage("Documento encaminhado com sucesso!");
					return $this->redirect()->toUrl('/documento');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao encaminhar documento! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
		
		$view = new ViewModel(array(
				'dados' => $dados,
				'form' => $form,
		));
			
		$view->setTemplate('scriba/documento/form-encaminhar.phtml');
			
		return $view;
	}
	
	public function arquivarAction()
	{
		// Pega o id passado na url
		$id = (int) $this->params()->fromRoute('id', 0);
	
		// Definindo variaveis
		$request = $this->getRequest();
			
		// Instaciando services
		$service = $this->getServiceLocator()->get('scriba-service-encaminhamento');
	
		// Instaciando o Form
		$form = new \Scriba\Form\Encaminhamento();
	
		// Busca o repositorio da entidade a ser tramitada
		$dados = $this->getEm('Scriba\Entity\Documento')->find($id)->toArray();
	
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \Scriba\Filter\Encaminhamento());
	
			if ($form->isValid())
			{
				if ($service->arquivar($data, 'Scriba\Entity\Encaminhamento', $dados['codigo']))
				{
					$this->flashMessenger()->addSuccessMessage("Documento arquivado com sucesso!");
					return $this->redirect()->toUrl('/documento');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao arquivar documento! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
	
		$view = new ViewModel(array(
				'dados' => $dados,
				'form' => $form,
		));
			
		$view->setTemplate('scriba/documento/form-arquivar.phtml');
			
		return $view;
	}

	public function detalharAction()
	{
		// Pega o id passado na url
		$id = (int) $this->params()->fromRoute('id', 0);
	
		$em = $this->getEm();
		
		$dados = $em->createQueryBuilder()
			->select('e')
			->from('Scriba\Entity\Encaminhamento', 'e')
			->where('e.doccodigo = :doccodigo')
			->setParameter('doccodigo', $id)
			->orderBy('e.codigo', 'ASC')
			->getQuery()->getResult();
	
		$view = new ViewModel(array(
				'dados' => $dados,
		));
			
		return $view;
	}
	
	public function editarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
			
		// Instaciando services
		$service = $this->getServiceLocator()->get('scriba-service-documento');
			
		// Instaciando o Form
		$form = new \Scriba\Form\Documento();
		$documento = $this->getEm('Scriba\Entity\Documento')->find($id)->toArray();
	
		$form->setData($documento);
	
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
				
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Curso());
	
			if ($form->isValid())
			{
				if ($service->update($data, 'Scriba\Entity\Documento', $id))
				{
					$this->flashMessenger()->addSuccessMessage("Documento editado com sucesso!");
					return $this->redirect()->toUrl('/documento');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao editar documento! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
			
		$view = new ViewModel(array(
				'form' => $form,
		));
			
		$view->setTemplate('scriba/documento/form.phtml');
			
		return $view;
	}
}	