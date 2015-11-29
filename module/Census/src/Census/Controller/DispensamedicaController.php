<?php

namespace Census\Controller;

use Zend\View\Model\ViewModel;

class DispensamedicaController extends AbstractController
{
	public function indexAction()
	{
		$data = $this->getEm('Census\Entity\Dispensamedica')->findAll();

		return new ViewModel(array(
			'dados' => $data,
		));
	}

	public function cadastrarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
		 
		// Instaciando services
		$service = $this->getServiceLocator()->get('census-service-dispensamedica');
		$dataPolicial = $this->getEm('Census\Entity\Policial')->find($id)->toArray();
		 
		// Instaciando o Form
		$form = new \Census\Form\Dispensamedica();
		 
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Dispensamedica());
			 
			if ($form->isValid())
			{
				if ($service->insert($data, 'Census\Entity\Dispensamedica'))
				{
					$this->flashMessenger()->addSuccessMessage("Dispensa cadastrada com sucesso!");
					return $this->redirect()->toUrl('/dispensamedica');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar dispensa! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
		 
		$view = new ViewModel(array(
				'form' => $form,
				'policial' => $dataPolicial
		));
		 
		$view->setTemplate('census/dispensamedica/form.phtml');
		 
		return $view;
	}
	
	public function editarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
			
		// Instaciando services
		$service = $this->getServiceLocator()->get('census-service-dispensamedica');
			
		// Instaciando o Form
		$form = new \Census\Form\Dispensamedica();
		$dispensa = $this->getEm('Census\Entity\Dispensamedica')->find($id)->toArray();
		
		$dataPolicial = $this->getEm('Census\Entity\Policial')->find($dispensa['polcodigo']->getCodigo())->toArray();
		
		$form->setData($dispensa);
		
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Dispensamedica());
	
			if ($form->isValid())
			{
				if ($service->update($data, 'Census\Entity\Dispensamedica', $id))
				{
					$this->flashMessenger()->addSuccessMessage("Dispensa atualizada com sucesso!");
					return $this->redirect()->toUrl('/dispensamedica');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao atualizar dispensa! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
			
		$view = new ViewModel(array(
				'form' => $form,
				'policial' => $dataPolicial
		));
			
		$view->setTemplate('census/dispensamedica/form.phtml');
			
		return $view;
	}

	public function deletarAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		
		$service = $this->getServiceLocator()->get('census-service-dispensamedica');
		
		$dadosDispensamedica = $this->getEm('Census\Entity\Dispensamedica')->find($id);
		
		if ($dadosDispensamedica)
		{
			if ($service->delete('Census\Entity\Dispensamedica', $id))
				return $this->redirect()->toUrl('/dispensamedica');
		}
	}
}