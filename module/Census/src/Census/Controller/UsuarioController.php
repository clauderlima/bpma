<?php

namespace Census\Controller;

use Zend\View\Model\ViewModel;
use Zend\Stdlib\Hydrator\ClassMethods;
class UsuarioController extends AbstractController
{
	public function indexAction()
	{
		$dados = $this->getEm('Census\Entity\Usuario')->findAll();

		return new ViewModel(array(
			'dados' => $dados,
		));
	}

	public function adicionarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
		 
		// Instaciando services
		$service = $this->getServiceLocator()->get('census-service-usuario');
		$dados = $this->getEm('Census\Entity\Policial')->find($id)->toArray();
		
		$usuario = $this->getEm('Census\Entity\Usuario')->findByPolcodigo($id);
		
		if ($usuario) return $this->redirect()->toUrl('/usuario/editar/' . $id);
		
		// Instaciando o Form
		$form = new \Census\Form\Usuario($this->serviceLocator);
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			
			$form->setData($data);
			
			$form->setInputFilter(new \Census\Filter\Usuario());
			
			if ($form->isValid())
			{
				if ($service->insert($data, 'Census\Entity\Usuario'))
				{
					$this->flashMessenger()->addSuccessMessage("Usuário cadastrado com sucesso!");
					return $this->redirect()->toUrl('/census/detalhes/' . $id);
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar curso! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
		 
		$view = new ViewModel(array(
				'form' => $form,
				'policial' => $dados
		));
		 
		$view->setTemplate('census/usuario/form.phtml');
		 
		return $view;
	}
	
	public function editarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
			
		// Instaciando services
		$service = $this->getServiceLocator()->get('census-service-usuario');
			
		// Instaciando o Form
		$form = new \Census\Form\Usuario($this->serviceLocator);
		$dados = $this->getEm('Census\Entity\Usuario')->findByPolcodigo($id);
		
		$hydrate = new ClassMethods();
		$dados = $hydrate->extract($dados[0]);
		
		$dataPolicial = $this->getEm('Census\Entity\Policial')->find($id)->toArray();
		
		$form->setData($dados);
		
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Usuario());
	
			if ($form->isValid())
			{
				if ($service->update($data, 'Census\Entity\Usuario', $dados['codigo']))
				{
					$this->flashMessenger()->addSuccessMessage("Usuário editado com sucesso!");
					return $this->redirect()->toUrl('/census/detalhes/' . $id);
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao editar usuário! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
			
		$view = new ViewModel(array(
				'form' => $form,
				'policial' => $dataPolicial
		));
			
		$view->setTemplate('census/usuario/form.phtml');
			
		return $view;
	}

	public function deletarAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		
		$serviceCurso = $this->getServiceLocator()->get('census-service-curso');
		
		$dadosCurso = $this->getEm('Census\Entity\Curso')->find($id);
		
		if ($dadosCurso)
		{
			if ($serviceCurso->delete('Census\Entity\Curso', $id))
				return $this->redirect()->toUrl('/curso');
		}
	}
	
	public function perfilAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
			
		// Instaciando services
		$service = $this->getServiceLocator()->get('census-service-usuario');
			
		// Instaciando o Form
		$form = new \Census\Form\Usuario($this->serviceLocator);
		$usuario = $this->getEm('Census\Entity\Usuario')->find($id)->toArray();
	
		
		$form->setData($usuario);

		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
				
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Usuario());
	
			if ($form->isValid())
			{
				if ($service->perfil($data, 'Census\Entity\Usuario', $id))
				{
					$this->flashMessenger()->addSuccessMessage("Perfil atualizado com sucesso!");
					return $this->redirect()->toUrl('/usuario');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar perfil! <br>Verifique se os campos foram preenchidos corretamente.');
			}

		}
			
		$view = new ViewModel(array(
				'form' => $form,
				'usuario' => $usuario,
		));
			
		$view->setTemplate('census/usuario/perfilform.phtml');
			
		return $view;
	}
}