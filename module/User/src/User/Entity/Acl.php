<?php

namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Acl
 *
 * @ORM\Table(name="acl", indexes={@ORM\Index(name="fk_acl_perfil1_idx", columns={"per_Codigo"}), @ORM\Index(name="fk_acl_recurso1_idx", columns={"rec_Codigo"})})
 * @ORM\Entity
 */
class Acl
{
    /**
     * @var integer
     *
     * @ORM\Column(name="acl_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="acl_permissao", type="string", length=10, nullable=false)
     */
    private $permissao;

    /**
     * @var integer
     *
     * @ORM\Column(name="res_Codigo", type="integer", nullable=false)
     */
    private $resCodigo;

    /**
     * @var \Perfil
     *
     * @ORM\ManyToOne(targetEntity="Perfil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="per_Codigo", referencedColumnName="per_Codigo")
     * })
     */
    private $percodigo;

    /**
     * @var \Recurso
     *
     * @ORM\ManyToOne(targetEntity="Recurso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rec_Codigo", referencedColumnName="rec_Codigo")
     * })
     */
    private $reccodigo;

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

    public function getPermissao(){
        return $this->permissao;
    }

    public function setPermissao($permissao){
        $this->permissao = $permissao;
        return $this;
    }

    public function getResCodigo(){
        return $this->resCodigo;
    }

    public function setResCodigo($resCodigo){
        $this->resCodigo = $resCodigo;
        return $this;
    }

    public function getPercodigo(){
        return $this->percodigo;
    }

    public function setPercodigo($percodigo){
        $this->percodigo = $percodigo;
        return $this;
    }

    public function getReccodigo(){
        return $this->reccodigo;
    }

    public function setReccodigo($reccodigo){
        $this->reccodigo = $reccodigo;
        return $this;
    }

}

