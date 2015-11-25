<?php

namespace Census\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Arma
 *
 * @ORM\Table(name="arma", uniqueConstraints={@ORM\UniqueConstraint(name="arm_Codigo_UNIQUE", columns={"arm_Codigo"})})
 * @ORM\Entity(repositoryClass="Census\Repository\Arma")
 */
class Arma
{
    /**
     * @var integer
     *
     * @ORM\Column(name="arm_Codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="arm_Tombamento", type="string", length=45, nullable=false)
     */
    private $tombamento;

    /**
     * @var string
     *
     * @ORM\Column(name="arm_Especie", type="string", length=45, nullable=false)
     */
    private $especie;

    /**
     * @var string
     *
     * @ORM\Column(name="arm_Marca", type="string", length=45, nullable=false)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="arm_Modelo", type="string", length=45, nullable=false)
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="arm_NumeroSerie", type="string", length=45, nullable=false)
     */
    private $numeroserie;

    /**
     * @var string
     *
     * @ORM\Column(name="arm_Calibre", type="string", length=45, nullable=false)
     */
    private $calibre;

    public function __construct(array $data)
    {
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

    public function getTombamento(){
        return $this->tombamento;
    }

    public function setTombamento($tombamento){
        $this->tombamento = $tombamento;
        return $this;
    }

    public function getEspecie(){
    	return $this->especie;
    }

    public function setEspecie($especie){
        $this->especie = $especie;
        return $this;
    }

    public function getMarca(){
        return $this->marca;
    }

    public function setMarca($marca){
        $this->marca = $marca;
        return $this;
    }

    public function getModelo(){
        return $this->modelo;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
        return $this;
    }

    public function getNumeroserie(){
        return $this->numeroserie;
    }

    public function setNumeroserie($numeroserie){
        $this->numeroserie = $numeroserie;
        return $this;
    }

    public function getCalibre(){
        return $this->calibre;
    }

    public function setCalibre($calibre){
        $this->calibre = $calibre;
        return $this;
    }

}

