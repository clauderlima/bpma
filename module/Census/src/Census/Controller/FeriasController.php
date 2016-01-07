<?php
 
namespace Census\Controller;
 
use Zend\View\Model\ViewModel;
 
class FeriasController extends AbstractController
{
	protected $feriasTable;
	protected $policialTable;
	
    // GET /policial
    public function indexAction()
    {
    	$meses = array(
    			'JAN','FEV','MAR','ABR','MAI','JUN','JUL','AGO','SET','OUT','NOV','DEZ'
    	);
    	$resumoFerias = array();
    	
    	foreach ($meses as $mes)
    	{
    		$query = $this->getEm()->createQuery("SELECT count(f.codigo) FROM Census\Entity\Ferias f WHERE f.programacao = :programacao AND f.anoreferencia = 2015");
    		$query->setParameter('programacao',$mes);
    		$ferias = $query->getResult()[0][1];
    		$resumoFerias[$mes] = $ferias;
    	}
    	
    	$policiaisSemFerias = $this->getEm()->createQueryBuilder()
    			->select('p')
    			->from('\Census\Entity\Policial', 'p')
    			->orderBy('p.antiguidade', 'ASC')
    			->getQuery()
    			->getResult();
    	
    	$view = new ViewModel(array(
    			'resumoFerias' => $resumoFerias, 
    			'policiaisSemFerias' => $policiaisSemFerias
    	));
    	
    	return $view;
    }
 
    // GET /policial/novo
    public function mostraAction()
    {
    	// Pegando o Policial
    	$id = (int) $this->params()->fromRoute('id', 0);
    	$serviceFerias = $this->getServiceLocator()->get('census-service-ferias');
    	echo "<pre>";
    	print_r($serviceFerias);
    	exit;
    }
 
    // POST /policial/adicionar
    public function adicionarAction()
    {
    	// Pegando o Policial
    	$id = (int) $this->params()->fromRoute('id', 0);
    	
    	if (!$id) {
    		// adicionar mensagem
    		$this->flashMessenger()->addMessage("Policial não encontrado");
    		 
    		// redirecionar para action index
    		return $this->redirect()->toRoute('ferias');
    	}
    	
    	// Busca dados do policial informado
    	$policial = $this->getPolicialTable()->find($id);
    	
    	// Definindo variaveis
    	$request = $this->getRequest();
    	
    	// Instaciando services
    	$serviceFerias = $this->getServiceLocator()->get('census-service-ferias');
    	
    	// Instaciando o Form
    	$form = new \Census\Form\Ferias();
    	
    	if ($request->isPost())
    	{
    		// setando o input filter no orm
    		$data = $request->getPost()->toArray();
    		
    		$form->setData($data);
    		$form->setInputFilter(new \Census\Filter\Ferias());
    
    			
    		if ($form->isValid())
    		{
    			if ($serviceFerias->insert($data, 'Census\Entity\Ferias'))
    			{
    				$this->flashMessenger()->addSuccessMessage("Férias programada com sucesso!");
    				return $this->redirect()->toUrl('/ferias/adicionar/'.$id);
    			}
    		} else {
    			$this->flashMessenger()->addErrorMessage('Erro ao criar contato! <br>Verifique se os campos foram preenchidos corretamente.');
    		}
    	}
    	
    	// Dados do Resumo
    	$query = $this->getEm()->createQuery("SELECT f.programacao,f.codigo,f.anoreferencia,f.naogozo,f.boletim,f.parcela,f.inicio,f.qtddias
    			FROM Census\Entity\Ferias f WHERE f.polcodigo = :polcodigo ORDER BY f.anoreferencia");
    	$query->setParameter('polcodigo',$id);
    	$ferias = $query->getResult();
    	
    	
    	$view = new ViewModel(array(
    			'form' => $form,
    			'policial' => $policial,
    			'ferias' => $ferias
    	));
    	
    	$view->setTemplate('census/ferias/formFerias.phtml');
    	
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
    	 
    	// dados eviados para detalhes.phtml
    	return (new ViewModel())
    	->setTerminal($this->getRequest()->isXmlHttpRequest())
    	->setVariable('policial', $policial);
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
    	$id = (int) $this->params()->fromRoute('id', 0);
    	
    	$service = $this->getServiceLocator()->get('census-service-ferias');
    	
    	$dados = $this->getEm('Census\Entity\Ferias')->find($id);
    	
    	$policial = $dados->getPolcodigo()->getCodigo();
    	
    	if ($dados)
    	{
    		if ($service->delete('Census\Entity\Ferias', $id))
    			return $this->redirect()->toUrl('/ferias/adicionar/' . $policial);
    	}
    }
    
    public function listarAction()
    {
    
    	$mes = $_GET['mes'];
    	
    	
    	 
    	//$query = $this->getEm()->createQuery("SELECT p.codigo,p.matricula,p.subunidade,p.lotacao,p.telefonecelular,p.postograduacao,p.nomeguerra FROM Census\Entity\Policial p");
    	
    	$query = $this->getEm()->createQueryBuilder()
    			->select('p.codigo,p.matricula,p.subunidade,p.lotacao,p.telefonecelular,p.postograduacao,p.nomeguerra,f.programacao')
    			->from('\Census\Entity\Ferias','f')
    			->innerJoin('f.polcodigo','p')
    			->where('f.programacao = :mes AND f.anoreferencia = 2015')
    			->setParameter('mes',$mes)
    			->orderBy('p.antiguidade', 'ASC')
    			->getQuery();
    	
    	
    	$lista = $query->getResult();
    	 
    	return (new ViewModel())
    	->setVariable('lista', $lista);
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