<?php

namespace Scriba\Controller;

use Zend\View\Model\ViewModel;

class DocumentoController extends AbstractController
{
	public function indexAction()
	{
		$dados = $this->getEm('Scriba\Entity\Documento')->findAll();
		
		return new ViewModel(array(
			'dados' => $dados,
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
				if ($service->insert($data, 'Scriba\Entity\Encaminhamento', $dados['codigo']))
				{
					$this->flashMessenger()->addSuccessMessage("Documento encaminhado com sucesso!");
					return $this->redirect()->toUrl('/documento');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar documento! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
		
		$view = new ViewModel(array(
				'dados' => $dados,
				'form' => $form,
		));
			
		$view->setTemplate('scriba/documento/form-encaminhar.phtml');
			
		return $view;
	}

}	