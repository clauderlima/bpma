<?php

namespace Census\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Perfil
 *
 * @ORM\Table(name="perfil")
 * @ORM\Entity(repositoryClass="Census\Repository\Perfil")
 */
class Perfil
{
    /**
     * @var integer
     *
     * @ORM\Column(name="per_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="per_nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var \Perfil
     *
     * @ORM\ManyToOne(targetEntity="Perfil", inversedBy="children")
     * @ORM\JoinColumns({
     * 	@ORM\JoinColumn(name="per_PerfilCodigo", referencedColumnName="per_Codigo")
     * })
     */
    private $perfilcodigo;
    
    /**
     * @var \Perfil
     *
     * @ORM\OneToMany(targetEntity="Perfil", mappedBy="perfil")
     */
    private $children;

    public function __construct(array $data) {
    	$hydrator = new ClassMethods();
    	$hydrator->hydrate($data, $this);
    }
    
    public function toArray()
    {
    	$hydrator = new ClassMethods();
    	return $hydrator->extract($this);
    }


    public function getCodigo(){
        return $this->codigo;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
        return $this;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }

    public function getPerfilcodigo(){
        return $this->perfilcodigo;
    }

    public function setPerfilcodigo($perfilcodigo){
        $this->perfilcodigo = $perfilcodigo;
        return $this;
    }


    public function getChildren(){
        return $this->children;
    }

    public function setChildren($children){
        $this->children = $children;
        return $this;
    }

}

