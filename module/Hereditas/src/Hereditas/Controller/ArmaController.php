<?php

namespace Hereditas\Controller;

use Zend\View\Model\ViewModel;
class ArmaController extends AbstractController
{
	public function indexAction()
	{
		$dataArma = $this->getEm('Hereditas\Entity\Arma')->findAll();

		
		$query = $this->getEm()->createQueryBuilder()
		 ->select('a')
		 ->from('\Hereditas\Entity\Arma','a')
		 //->Join('f.polcodigo','p')
		 //->where('f.anoreferencia = 2015 AND p.subunidade = :subunidade AND f.programacao = :programacao')
		 //->setParameter('subunidade', 'GOA')
		 //->setParameter('programacao', 'JAN')
		 //->orderBy('p.antiguidade', 'ASC')
		 ->getQuery();
		  
		 
		 //Logica da ARma sem CTgrafi
/* 		 $armasSemCtgrafi = $query->getResult();
		
		 foreach ($armasSemCtgrafi as $item)
		 {
		 	if ($item->getCtgrafi() == '')
		 	{
		 		echo $item->getCodigo(). " - " . $item->getTombamento() . "<br>";
		 	}
		 } */

		
		
		return new ViewModel(array(
			'armas' => $dataArma,
		));
	}

	public function adicionarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		 
		// Instaciando services
		$serviceArma = $this->getServiceLocator()->get('hereditas-service-arma');
		 
		// Instaciando o Form
		$form = new \Hereditas\Form\Arma();
		 
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \Hereditas\Filter\Arma());
			 
			if ($form->isValid())
			{
				if ($serviceArma->insert($data, 'Hereditas\Entity\Arma'))
				{
					$this->flashMessenger()->addSuccessMessage("Arma cadastrada com sucesso!");
					return $this->redirect()->toUrl('/arma');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar arma! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
		 
		$view = new ViewModel(array(
				'form' => $form
		));
		 
		$view->setTemplate('hereditas/arma/form.phtml');
		 
		return $view;
	}
	
	public function editarAction()
	{
		// Definindo variaveis
		$request = $this->getRequest();
		$id = (int) $this->params()->fromRoute('id', 0);
			
		// Instaciando services
		$serviceArma = $this->getServiceLocator()->get('hereditas-service-arma');
			
		// Instaciando o Form
		$form = new \Hereditas\Form\Arma();
		$arma = $this->getEm('Hereditas\Entity\Arma')->find($id)->toArray();
		
		$form->setData($arma);
			
		if ($request->isPost())
		{
			// setando o input filter no orm
			$data = $request->getPost()->toArray();
			$form->setData($data);
			$form->setInputFilter(new \Hereditas\Filter\Arma());
	
			if ($form->isValid())
			{
				if ($serviceArma->update($data, 'Hereditas\Entity\Arma',$id))
				{
					$this->flashMessenger()->addSuccessMessage("Arma cadastrada com sucesso!");
					return $this->redirect()->toUrl('/arma');
				}
			} else {
				$this->flashMessenger()->addErrorMessage('Erro ao cadastrar arma! <br>Verifique se os campos foram preenchidos corretamente.');
			}
		}
			
		$view = new ViewModel(array(
				'form' => $form
		));
			
		$view->setTemplate('hereditas/arma/form.phtml');
			
		return $view;
	}

	public function deleteAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		
		$serviceArma = $this->getServiceLocator()->get('hereditas-service-arma');
		
		$dadosArma = $this->getEm('Hereditas\Entity\Arma')->find($id);
		
		if ($dadosArma)
		{
			if ($serviceArma->delete('Hereditas\Entity\Arma', $id))
				return $this->redirect()->toUrl('/arma');
		}
	}
}