<?php
 
// namespace de localizacao do nosso model
namespace Census\Model;
 
// import ZendDb
use Zend\Db\TableGateway\TableGateway;

use Zend\Db\Sql\Select,
	Zend\Db\ResultSet\HydratingResultSet,
	Zend\Paginator\Adapter\DbSelect,
	Zend\Paginator\Paginator;
use Zend\Stdlib\Hydrator\Reflection;
 
class PolicialTable
{
    protected $tableGateway;
 
    /**
 	* Contrutor com dependencia da classe TableGateway
 	* 
 	* @param TableGateway $tableGateway
 	*/
	public function __construct(TableGateway $tableGateway)
	{
    	$this->tableGateway = $tableGateway;
	}
 
    /**
     * Recuperar todos os elementos da tabela contatos
     * 
     * @return ResultSet
     */
    public function fetchAll()
    {
        return $this->tableGateway->select();
    }
 
    /**
     * Localizar linha especifico pelo id da tabela contatos
     * 
     * @param type $id
     * @return ModelContato
     * @throws Exception
     */
    public function find($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('pol_Codigo' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new Exception("Não foi encontrado contado de id = {$id}");
        }
 
        return $row;
    }
    
    /**
     * Deletar um contato existente
     *
     * @param type $id
     */
    public function delete($id)
    {
    	$this->tableGateway->delete(array('pol_Codigo' => (int) $id));
    }
    
    /**
     * Localizar itens por paginação
     *
     * @param type $pagina
     * @param type $itensPagina
     * @param type $ordem
     * @param type $like
     * @param type $itensPaginacao
     * @return type Paginator
     */
    public function fetchPaginator($pagina = 1, $itensPagina = 10, $ordem = 'pol_NomeGuerra ASC', $like = null, $itensPaginacao = 5)
    {
    	// preparar um select para tabela contato com uma ordem
    	$select = (new Select('policial'))->order($ordem);
    
    	if (isset($like)) {
    		$select
    		->where
    		->like('pol_Matricula', "%{$like}%")
    		->or
    		->like('pol_RG', "%{$like}%")
    		->or
    		->like('pol_CPF', "%{$like}%")
    		->or
    		->like('pol_NomeCompleto', "%{$like}%")
    		;
    	}
    
    	// criar um objeto com a estrutura desejada para armazenar valores
    	$resultSet = new HydratingResultSet(new Reflection(), new Policial());
    
    	// criar um objeto adapter paginator
    	$paginatorAdapter = new DbSelect(
    			// nosso objeto select
    			$select,
    			// nosso adapter da tabela
    			$this->tableGateway->getAdapter(),
    			// nosso objeto base para ser populado
    			$resultSet
    		);
    	
   
    	// resultado da paginação
    	return (new Paginator($paginatorAdapter))
    	// pagina a ser buscada
    	->setCurrentPageNumber((int) $pagina)
    	// quantidade de itens na página
    	->setItemCountPerPage((int) $itensPagina)
    	->setPageRange((int) $itensPaginacao);
    }
    
}