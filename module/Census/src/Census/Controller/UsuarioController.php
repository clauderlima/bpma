<?php

namespace Census\Controller;

use Zend\View\Model\ViewModel;
class UsuarioController extends AbstractController
{
	public function indexAction()
	{
		$dataCurso = $this->getEm('Census\Entity\Curso')->findAll();

		return new ViewModel(array(
			'dados' => $dataCurso,
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
		 
		// Instaciando o Form
		$form = new \Census\Form\Usuario();
		 
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Formacao());
			 
			if ($form->isValid())
			{
				if ($serviceCurso->insert($data, 'Census\Entity\Curso'))
				{
					$this->flashMessenger()->addSuccessMessage("Curso cadastrado com sucesso!");
					return $this->redirect()->toUrl('/curso');
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
		$serviceCurso = $this->getServiceLocator()->get('census-service-curso');
			
		// Instaciando o Form
		$form = new \Census\Form\Curso();
		$curso = $this->getEm('Census\Entity\Curso')->find($id)->toArray();
		
		$dataPolicial = $this->getEm('Census\Entity\Policial')->find($curso['polcodigo']->getCodigo())->toArray();
		
		$form->setData($curso);
		
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Curso());
	
			if ($form->isValid())
			{
				if ($serviceCurso->update($data, 'Census\Entity\Curso', $id))
				{
					$this->flashMessenger()->addSuccessMessage("Curso cadastrado com sucesso!");
					return $this->redirect()->toUrl('/curso');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar curso! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
			
		$view = new ViewModel(array(
				'form' => $form,
				'policial' => $dataPolicial
		));
			
		$view->setTemplate('census/curso/form.phtml');
			
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
}