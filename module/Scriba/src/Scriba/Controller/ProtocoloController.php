<?php

namespace Scriba\Controller;

use Zend\View\Model\ViewModel;

class ProtocoloController extends AbstractController
{
	public function indexAction()
	{
		$dataProtocolo = $this->getEm('Scriba\Entity\Protocolo')->findAll();

		return new ViewModel(array(
			'$dados' => $dataProtocolo,
		));
	}
	
	public function adicionarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
			
		// Instaciando services
		$service = $this->getServiceLocator()->get('scriba-service-protocolo');
			
		// Instaciando o Form
		$form = new \Scriba\Form\Protocolo();
			
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \Scriba\Filter\Protocolo());
	
			if ($form->isValid())
			{
				if ($service->insert($data, 'Scriba\Entity\Protocolo'))
				{
					$this->flashMessenger()->addSuccessMessage("Documento cadastrado com sucesso!");
					return $this->redirect()->toUrl('/protocolo');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar documento! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
			
		$view = new ViewModel(array(
				'form' => $form
		));
			
		$view->setTemplate('scriba/protocolo/form.phtml');
			
		return $view;
	}

}	