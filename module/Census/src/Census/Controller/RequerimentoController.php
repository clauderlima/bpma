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
		
		$query = $this->getEm()->createQuery("SELECT p.codigo, p.nomecompleto, p.postograduacao, p.matricula, 
				p.matriculasiape, p.dataadmissao, p.email, p.comportamento, p.telefonecelular, p.subunidade, p.nomeguerra 
				FROM Census\Entity\Policial p WHERE p.codigo = :codigo");
		$query->setParameter('codigo',$id);
		
		$dados = $query->getResult();
		
		return (new ViewModel())
		->setVariable('dados', $dados);
		
	}
	
	public function geraabonoAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		
		//Pega dados do Formulário de abono
		$dataInicial = $_POST['dataInicial'];
		$quantidadeDias = $_POST['quantidadeDias'];
		$chefeImediato = $_POST['chefeImediato'];
		
		/* echo "<h1>Resultado:</h1>";
		echo "<br>Id: $id<br>dataInicial: $dataInicial<br>quantidadeDias: $quantidadeDias<br>";
		exit; */
		$query = $this->getEm()->createQuery("SELECT p.codigo, p.nomecompleto, p.postograduacao, p.matricula,
				p.matriculasiape, p.dataadmissao, p.email, p.comportamento, p.telefonecelular, p.subunidade, p.nomeguerra
				FROM Census\Entity\Policial p WHERE p.codigo = :codigo");
		$query->setParameter('codigo',$id);
		
		$dados = $query->getResult();
		
		$abono = new Abono($id, $dataInicial, $quantidadeDias, $chefeImediato, $dados[0]);
		
		
	}
	
}