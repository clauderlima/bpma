<?php

namespace Census\Controller;

use Zend\View\Model\ViewModel;

class PerfilController extends AbstractController
{
	public function indexAction()
	{
		$dados = $this->getEm('Census\Entity\Perfil')->findAll();

		return new ViewModel(array(
			'dados' => $dados,
		));
	}

	public function adicionarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		 
		// Instaciando services
		$service = $this->getServiceLocator()->get('census-service-perfil');
		 
		// Instaciando o Form
		$form = new \Census\Form\Perfil($this->serviceLocator);
		 
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			
			
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Perfil());
			 
			if ($form->isValid())
			{
				if ($service->insert($data, 'Census\Entity\Perfil'))
				{
					$this->flashMessenger()->addSuccessMessage("Perfil cadastrado com sucesso!");
					return $this->redirect()->toUrl('/perfil');
				}
			} else 
			{
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar curso! <br>Verifique se os campos foram preenchidos corretamente.');
			}
					return $this->redirect()->toUrl('/perfil');
		}
		 
		$view = new ViewModel(array(
				'form' => $form,
		));
		 
		$view->setTemplate('census/perfil/form.phtml');
		 
		return $view;
	}
	
	public function editarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
			
		// Instaciando services
		$service = $this->getServiceLocator()->get('census-service-perfil');
			
		// Instaciando o Form
		$form = new \Census\Form\Perfil($this->serviceLocator);
		$perfil = $this->getEm('Census\Entity\Perfil')->find($id)->toArray();
		
		$form->setData($perfil);
		
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			
			$form->setData($data);
			$form->setInputFilter(new \Census\Filter\Perfil());
	
			if ($form->isValid())
			{
				if ($service->update($data, 'Census\Entity\Perfil', $id))
				{
					$this->flashMessenger()->addSuccessMessage("Perfil atualizado com sucesso!");
					return $this->redirect()->toUrl('/perfil');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar perfil! <br>Verifique se os campos foram preenchidos corretamente.');
			}
					return $this->redirect()->toUrl('/perfil');
		}
			
		$view = new ViewModel(array(
				'form' => $form,
		));
			
		$view->setTemplate('census/perfil/form.phtml');
			
		return $view;
	}

	public function deletarAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		
		$service = $this->getServiceLocator()->get('census-service-perfil');
		
		$dados = $this->getEm('Census\Entity\Perfil')->find($id);
		
		if ($dados)
		{
			if ($service->delete('Census\Entity\Perfil', $id))
				return $this->redirect()->toUrl('/perfil');
		}
	}
	
	public function permissoesAction()
	{
		// pegando parâmetros url
		$request = $this->getRequest();
		$id = $this->params('id');
		
		// services
		$serviceAcl = $this->getServiceLocator()->get('user-service-acl');
	
		// definindo variáveis
		$arrayPerfil = array();
		$arrayResourcesSelecionados = array();
		$arrayResourcesOutroPerfil = array();
		$arrayAclPerfil = array();
		$arrayPerfilClass = array();
	
		$perfil = $this->getEm('Census\Entity\Perfil')->find($id);
		$resources = $this->getEm('Census\Entity\Recurso')->findAll();
		$dadosAcl = $this->getEm('Census\Entity\Acl')->findAll();
	
		if (count($dadosAcl)) {
			foreach ($dadosAcl as $acl) {
				$arrayPerfil[$acl->getReccodigo()->getCodigo()] = $acl->getPercodigo()->getNome();
				$arrayAclPerfil[$acl->getReccodigo()->getCodigo()] = $acl->getCodigo();
	
				switch ($acl->getPercodigo()->getCodigo()) {
					case 1:
						$arrayPerfilClass[$acl->getPercodigo()->getNome()] = 'label-success';
						break;
					case 3:
						$arrayPerfilClass[$acl->getPercodigo()->getNome()] = 'label-info';
						break;
					case 4:
						$arrayPerfilClass[$acl->getPercodigo()->getNome()] = 'label-primary';
						break;
					case 5:
						$arrayPerfilClass[$acl->getPercodigo()->getNome()] = 'label-warning';
						break;
					case 6:
						$arrayPerfilClass[$acl->getPercodigo()->getNome()] = 'label-danger';
						break;
				}
	
				if ($acl->getPercodigo()->getCodigo() != $id) {
					$arrayResourcesOutroPerfil[] = $acl->getReccodigo()->getCodigo();
				} else {
					$arrayResourcesSelecionados[] = $acl->getReccodigo()->getCodigo();
				}
			}
		}
		
		if ($request->isPost()) {
			$data = $request->getPost()->toArray();
			
			if (!isset($data['reccodigo'])) $data['reccodigo'] = array();
			
			$arrayResourceCadastrar = array_diff($data['reccodigo'], $arrayResourcesSelecionados);
			$arrayResourceExcluir = array_diff($arrayResourcesSelecionados, $data['reccodigo']);
				
			if (count($arrayResourceCadastrar)) {
				foreach ($arrayResourceCadastrar as $idResource) {
					$dadaResourceCadastrar = array();
					$dadaResourceCadastrar['percodigo'] = $this->getEmRef('Census\Entity\Perfil', $id);
					$dadaResourceCadastrar['reccodigo'] = $this->getEmRef('Census\Entity\Recurso', $idResource);
					$dadaResourceCadastrar['permissao'] = 'allow';
					
					$serviceAcl->insert($dadaResourceCadastrar, 'Census\Entity\Acl');
				}
			}
			

				
			if (count($arrayResourceExcluir)) {
				foreach ($arrayResourceExcluir as $idResource) {
					$serviceAcl->delete('Census\Entity\Acl', $arrayAclPerfil[$idResource]);
				}
			}
				
			$this->flashMessenger()->addMessage(array('success' => 'As alterações das permissões foi um sucesso!'));
			$this->redirect()->toUrl('/perfil/permissoes/' . $id);
		}

		return new ViewModel(array(
				'perfil' => $perfil,
				'resources' => $resources,
				'arrayPerfil' => $arrayPerfil,
				'arrayPerfilClass' => $arrayPerfilClass,
				'arrayResourcesSelecionados' => $arrayResourcesSelecionados,
				'arrayResourcesOutroPerfil' => $arrayResourcesOutroPerfil
		));
	
	}
}