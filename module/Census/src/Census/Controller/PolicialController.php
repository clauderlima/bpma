<?php
 
namespace Census\Controller;
 
use Zend\View\Model\ViewModel;
use Census\Entity\Policial;
 
class PolicialController extends AbstractController
{
	protected $policialTable;
	
    // GET /policial
    public function indexAction()
    {
    	// colocar parametros da url em um array
    	$paramsUrl = [
    			'pagina_atual'  => $this->params()->fromQuery('pagina', 1),
    			'itens_pagina'  => $this->params()->fromQuery('itens_pagina', 100),
    			'coluna_nome'   => $this->params()->fromQuery('coluna_nome', 'pol_Antiguidade'),
    			'coluna_sort'   => $this->params()->fromQuery('coluna_sort', 'ASC'),
    			'search'        => $this->params()->fromQuery('search', null),
    	];
    	 
    	// configuar método de paginação
    	$paginacao = $this->getPolicialTable()->fetchPaginator(
    			/* $pagina */           $paramsUrl['pagina_atual'],
    			/* $itensPagina */      $paramsUrl['itens_pagina'],
    			/* $ordem */            "{$paramsUrl['coluna_nome']} {$paramsUrl['coluna_sort']}",
    			/* $search */           $paramsUrl['search'],
    			/* $itensPaginacao */   5
    	);
    	 
    	// retonar paginação mais os params de url para view
    	return new ViewModel(['relacao' => $paginacao] + $paramsUrl);
    	//$viewModel->setTemplate('layout/census');
    	//return $viewModel;
    }
 
    // GET /policial/novo
    public function novoAction()
    {
    	
    	$query = $this->getEm()->createQuery("SELECT p.postograduacao,p.nomeguerra FROM Census\Entity\Policial p WHERE p.postograduacao = :postograduacao");
    	$query->setParameter('postograduacao','ST');
    	$result = $query->getResult();
    	
    	echo "<pre>";
    	print_r($result);
    	exit;
    }
 
    // POST /policial/adicionar
    public function adicionarAction()
    {
    	// Definindo variaveis
    	$request = $this->getRequest();
    	
    	// Instaciando services
    	$servicePolicial = $this->getServiceLocator()->get('census-service-policial');
    	
    	// Instaciando o Form
    	$form = new \Census\Form\Policial();
    	
    	if ($request->isPost())
    	{
    		// setando o input filter no orm
    		$data = $request->getPost()->toArray();
    		$form->setData($data);
    		$form->setInputFilter(new \Census\Filter\Policial());
    			
    		/* 		echo "<pre>";
    		 print_r($form);
    		 exit;
    		 */
    			
    		if ($form->isValid())
    		{
    			
    			if ($servicePolicial->insert($data, 'Census\Entity\Policial'))
    			{
    				$this->flashMessenger()->addSuccessMessage("Policial criado com sucesso!");
    				return $this->redirect()->toUrl('/census');
    			}
    		} else {
    			$this->flashMessenger()->addErrorMessage('Erro ao criar contato! <br>Verifique se os campos foram preenchidos corretamente.');
    		}
    	}
    	
    	$view = new ViewModel(array(
    			'form' => $form
    	));
    	
    	$view->setTemplate('census/policial/formPolicial.phtml');
    	
    	return $view;
    }
 
    
    // GET /policial/detalhes/id
    public function detalhesAction()
    {
    	// filtra id passsado pela url
    	$id = (int) $this->params()->fromRoute('id', 0);
    	 
    	// se id = 0 ou não informado redirecione para contatos
    	if (!$id) {
    		// adicionar mensagem
    		$this->flashMessenger()->addMessage("Policial não encontrado");
    		 
    		// redirecionar para action index
    		return $this->redirect()->toRoute('census');
    	}
    	 
    	try {
    		// aqui vai a lógica para pegar os dados referente ao contato
    		// 1 - solicitar serviço para pegar o model responsável pelo find
    		// 2 - solicitar form com dados desse contato encontrado
    		// formulário com dados preenchidos
    		 
    		// lógica cache objeto contatos
    		//$nome_cache_pessoa_id = "nome_cache_pessoa_{$id}";
    		//if (!$this->cache()->hasItem($nome_cache_pessoa_id)) {
    		$policial = $this->getPolicialTable()->find($id);
    		 
    		//echo "PessoalControler.detalhesAction: " . var_dump($endereco);
    	
    		//	$this->cache()->setItem($nome_cache_pessoa_id, $pessoa);
    		//} else {
    		//	$pessoa = $this->cache()->getItem($nome_cache_pessoa_id);
    		//}
    		 
    	} catch (Exception $exc) {
    		// adicionar mensagem
    		$this->flashMessenger()->addErrorMessage($exc->getMessage());
    		 
    		// redirecionar para action index
    		return $this->redirect()->toRoute('census');
    	}
    	
    	
    	$em = $this->getEm();
    	
    	// Dados Formação
    	$formacaocivil = $em->createQueryBuilder()
	    	->select('f')
	    	->from('Census\Entity\Formacao', 'f')
	    	->where('f.polcodigo = :polcodigo')
	    	->setParameter('polcodigo', $id)
	    	->orderBy('f.conclusao', 'ASC')
	    	->getQuery()->getResult();
    	$formacaomilitar = $em->createQueryBuilder()
	    	->select('c')
	    	->from('Census\Entity\Curso', 'c')
	    	->where('c.polcodigo = :polcodigo')
	    	->setParameter('polcodigo', $id)
	    	->orderBy('c.dataconclusao', 'ASC')
	    	->getQuery()->getResult();
    	
    	// Dados Alterações
    	$alteracoes = $em->createQueryBuilder()
	    	->select('a')
	    	->from('Census\Entity\Alteracao', 'a')
	    	->where('a.polcodigo = :polcodigo')
	    	->setParameter('polcodigo', $id)
	    	->orderBy('a.codigo', 'ASC')
	    	->getQuery()->getResult();
    	// Dados Requerimentos
    	$requerimentos = $em->createQueryBuilder()
	    	->select('r')
	    	->from('Census\Entity\Abono', 'r')
	    	->where('r.polcodigo = :polcodigo')
	    	->setParameter('polcodigo', $id)
	    	->orderBy('r.codigo', 'ASC')
	    	->getQuery()->getResult();
    
    	// dados eviados para detalhes.phtml
    	return new ViewModel(array(
    		'policial' => $policial, 
    		'formacaocivil' => $formacaocivil,
    		'formacaomilitar' => $formacaomilitar,
    		'alteracoes' => $alteracoes,
    		'requerimentos' => $requerimentos,
    	));
    }
 
    // GET /policial/editar/id
    public function editarAction()
    {
    	// definindo variaveis
    	$request = $this->getRequest();
    	$id = $this->params('id');
    	
    	// instanciando services
    	$servicePolicial = $this->getServiceLocator()->get('census-service-policial');
    	
    	// instanciando o repository
    	$dadosPolicial = $this->getEm('Census\Entity\Policial')->find($id)->toArray();
    	
    	// instanciando o form
    	$form = new \Census\Form\Policial();
    	$form->setData($dadosPolicial);
    	
    	if ($request->isPost())
    	{
    		// setando o input filter no orm
    		$data = $request->getPost()->toArray();
    			
    		$form->setData($data);
    	
    			
    		$form->setInputFilter(new \Census\Filter\Policial());
    	
    			
    			
    		if ($form->isValid())
    		{
    			if ($servicePolicial->update($data, 'Census\Entity\Policial', $id))
    			{
    				$this->flashMessenger()->addSuccessMessage("Policial atualizado com sucesso!");
    				return $this->redirect()->toUrl('/census');
    			}
    		}
    	}
    	
    	$view = new ViewModel(array(
    			'form' => $form
    	));
    	$view->setTemplate('census/policial/formPolicial.phtml');
    	
    	return $view;
    }
 
    // PUT /policial/editar/id
    public function atualizarAction()
    {
    }
 
    // DELETE /policial/deletar/id
    public function deletarAction()
    {
    	// filtra id passsado pela url
    	$id = (int) $this->params()->fromRoute('id', 0);
    	
    	// se id = 0 ou não informado redirecione para contatos
    	if (!$id) {
    		// adicionar mensagem de erro
    		$this->flashMessenger()->addMessage("Policial não encotrado");
    	} else {
    		// aqui vai a lógica para deletar o contato no banco
    		// 1 - solicitar serviço para pegar o model responsável pelo delete
    		// 2 - deleta contato
    		$this->getPolicialTable()->delete($id);
    	
    		// adicionar mensagem de sucesso
    		$this->flashMessenger()->addSuccessMessage("Policial de ID $id deletado com sucesso");
    	}
    	
    	// redirecionar para action index
    	return $this->redirect()->toRoute('census');
    }
    
    /**
     * Metodo privado para obter instacia do Model PolicialTable
     *
     * @return PolicialTable
     */
    private function getPolicialTable()
    {
    	// adicionar service ModelPessoa a variavel de classe
    	if (!$this->policialTable) {
    		$this->policialTable = $this->getServiceLocator()->get('ModelPolicial');
    	}
    	
    	// return vairavel de classe com service ModelPessoa
    	return $this->policialTable;
    	//return $this->getServiceLocator()->get('ModelPolicial');
    }
}