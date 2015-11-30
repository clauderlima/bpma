<?php

namespace Census\Controller;

use Zend\View\Model\ViewModel;
use Census\Service\Abono;


class RequerimentoController extends AbstractController
{
	public function indexAction() 
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		
		return (new ViewModel())
		->setVariable('id', $id);
	}
	
	public function abonoAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		
		$query = $this->getEm()->createQuery("SELECT p.codigo, p.postograduacao, p.nomeguerra 
				FROM Census\Entity\Policial p WHERE p.codigo = :codigo");
		$query->setParameter('codigo',$id);
		
		$dados = $query->getResult();
		
		$view = new ViewModel();
		$view->setVariable('dados', $dados);
		return $view;
		
	}
	
	public function requererAbonoAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		
		//Pega dados do Formulário de abono
		$inicio = $_POST['dataInicial'];
		$qtdDias = $_POST['quantidadeDias'];
		
		$abono = new \Census\Modulo\Abono($this->getServiceLocator()->get('servicemanager'));
		
		$abono->requer($id, $inicio, $qtdDias);
		
		$filename = array(
			'arquivo' => $abono->getArquivo()
		);
		
		$view = new ViewModel();
		$view->setTerminal(true);
		return $view;
		
	}
	
	public function testeAction()
	{
		 $view = new ViewModel();
    		$view->setTerminal(true);
    		return $view;
	}
	
}