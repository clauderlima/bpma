<?php

namespace Census\Controller;

use Zend\View\Model\ViewModel;

class RestricaoController extends AbstractController
{
	public function indexAction()
	{
		//$dataRestricao = $this->getEm('Census\Entity\Restricaomedica')->findAll();
		$dataRestricao = $this->getEm()->createQueryBuilder()
				->select('r')
				->from('Census\Entity\Restricaomedica', 'r')
				->orderBy('r.fim', 'ASC')
				->getQuery()->getResult();
		
		return new ViewModel(array(
			'dados' => $dataRestricao,
		));
	}

	public function adicionarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
		
		// Instaciando services
		$serviceRestricaotipo = $this->getServiceLocator()->get('census-service-restricao');
		
		// Instaciando o Form
		$form = new \Census\Form\RestricaoTipo();
		
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Restricaotipo());
		
			if ($form->isValid())
			{
				if ($serviceRestricaotipo->insert($data, 'Census\Entity\Restricaotipo'))
				{
					$this->flashMessenger()->addSuccessMessage("CTGRAFI cadastrado com sucesso!");
					return $this->redirect()->toUrl('/restricao');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar arma! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
		 
		$view = new ViewModel(array(
				'form' => $form,
		));
		 
		$view->setTemplate('census/restricao/form.phtml');
		 
		return $view;
	}
	
	public function editarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
			
		// Instaciando services
		$serviceRestricaotipo = $this->getServiceLocator()->get('census-service-restricao');
			
		// Instaciando o Form
		$form = new \Census\Form\RestricaoTipo();
		$restricaotipo = $this->getEm('Census\Entity\RestricaoTipo')->find($id)->toArray();
		
		$form->setData($restricaotipo);
			
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Restricaotipo());
	
			if ($form->isValid())
			{
				if ($serviceRestricaotipo->update($data, 'Census\Entity\Restricaotipo',$id))
				{
					$this->flashMessenger()->addSuccessMessage("CTGRAFI alterado com sucesso!");
					return $this->redirect()->toUrl('/restricao');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao alterar CTGRAFI! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
			
		$view = new ViewModel(array(
				'form' => $form,
		));
			
		$view->setTemplate('census/restricao/form.phtml');
			
		return $view;
	}
	
	public function cadastrarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
	
		// Buscando as restrições do policial
		$restricoes = $this->getEm()->createQueryBuilder()
			->select('r')
			->from('Census\Entity\Restricaomedica', 'r')
			->where('r.polcodigo = :polcodigo')
			->setParameter('polcodigo', $id)
			->orderBy('r.fim', 'ASC')
			->getQuery()->getResult();
		
		
		// Instaciando services
		$serviceRestricaomedica = $this->getServiceLocator()->get('census-service-restricaomedica');
		$dataPolicial = $this->getEm('Census\Entity\Policial')->find($id)->toArray();
	
		// Instaciando o Form
		$form = new \Census\Form\Restricaomedica($this->getServiceLocator()->get('servicemanager'));
	
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Restricaomedica());
	
			if ($form->isValid())
			{
				if ($serviceRestricaomedica->insert($data, 'Census\Entity\Restricaomedica'))
				{
					$this->flashMessenger()->addSuccessMessage("CTGRAFI cadastrado com sucesso!");
					return $this->redirect()->toUrl('/restricao/cadastrar/' . $id);
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar arma! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
			
		$view = new ViewModel(array(
				'form' => $form,
				'policial' => $dataPolicial,
				'restricoes' => $restricoes
		));
			
		$view->setTemplate('census/restricao/form-rm.phtml');
			
		return $view;
	}
	
	public function alterarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
		
		// Instaciando services
		$serviceRestricaomedica = $this->getServiceLocator()->get('census-service-restricaomedica');
		
	
		// Instaciando o Form
		$form = new \Census\Form\Restricaomedica($this->getServiceLocator()->get('servicemanager'));
		$restricaomedica = $this->getEm('Census\Entity\Restricaomedica')->find($id)->toArray();
		
		$idpolicial = $restricaomedica['polcodigo'];
		
		$dataPolicial = $this->getEm('Census\Entity\Policial')->find($idpolicial)->toArray();
		
		$form->setData($restricaomedica);
	
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Restricaomedica());
	
			if ($form->isValid())
			{
				if ($serviceRestricaomedica->update($data, 'Census\Entity\Restricaomedica', $id))
				{
					$this->flashMessenger()->addSuccessMessage("CTGRAFI cadastrado com sucesso!");
					return $this->redirect()->toUrl('/restricao');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar arma! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
			
		$view = new ViewModel(array(
				'form' => $form,
				'policial' => $dataPolicial
		));
			
		$view->setTemplate('census/restricao/form-rm.phtml');
			
		return $view;
	}
	
	public function deletarAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
	
		$serviceRestricaomedica = $this->getServiceLocator()->get('census-service-restricaomedica');
	
		$dadosRestricaomedica = $this->getEm('Census\Entity\Restricaomedica')->find($id);
	
		if ($dadosRestricaomedica)
		{
			if ($serviceRestricaomedica->delete('Census\Entity\Restricaomedica', $id))
				return $this->redirect()->toUrl('/restricao');
		}
	}

}