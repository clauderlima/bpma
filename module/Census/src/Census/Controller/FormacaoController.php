<?php

namespace Census\Controller;

use Zend\View\Model\ViewModel;
class FormacaoController extends AbstractController
{
	public function indexAction()
	{
		$dataFormacao = $this->getEm('Census\Entity\Formacao')->findAll();

		return new ViewModel(array(
			'dados' => $dataFormacao,
		));
	}

	public function adicionarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
		 
		// Instaciando services
		$serviceFormacao = $this->getServiceLocator()->get('census-service-formacao');
		$dataPolicial = $this->getEm('Census\Entity\Policial')->find($id)->toArray();
		 
		// Instaciando o Form
		$form = new \Census\Form\Formacao();
		 
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Formacao());
			 
			if ($form->isValid())
			{
				if ($serviceFormacao->insert($data, 'Census\Entity\Formacao'))
				{
					$this->flashMessenger()->addSuccessMessage("Arma cadastrada com sucesso!");
					return $this->redirect()->toUrl('/formacao');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar arma! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
		 
		$view = new ViewModel(array(
				'form' => $form,
				'policial' => $dataPolicial
		));
		 
		$view->setTemplate('census/formacao/form.phtml');
		 
		return $view;
	}
	
	public function editarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
			
		// Instaciando services
		$serviceFormacao = $this->getServiceLocator()->get('census-service-formacao');
			
		// Instaciando o Form
		$form = new \Census\Form\Formacao();
		$formacao = $this->getEm('Census\Entity\Formacao')->find($id)->toArray();
		
		$dataPolicial = $this->getEm('Census\Entity\Policial')->find($formacao['polcodigo']->getCodigo())->toArray();
		
		$form->setData($formacao);
		
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Formacao());
	
			if ($form->isValid())
			{
				if ($serviceFormacao->update($data, 'Census\Entity\Formacao', $id))
				{
					$this->flashMessenger()->addSuccessMessage("Formação cadastrada com sucesso!");
					return $this->redirect()->toUrl('/formacao');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar formação! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
			
		$view = new ViewModel(array(
				'form' => $form,
				'policial' => $dataPolicial
		));
			
		$view->setTemplate('census/formacao/form.phtml');
			
		return $view;
	}

	public function deletarAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		
		$serviceFormacao = $this->getServiceLocator()->get('census-service-formacao');
		
		$dadosFormacao = $this->getEm('Census\Entity\Formacao')->find($id);
		
		if ($dadosFormacao)
		{
			if ($serviceFormacao->delete('Census\Entity\Formacao', $id))
				return $this->redirect()->toUrl('/formacao');
		}
	}
}