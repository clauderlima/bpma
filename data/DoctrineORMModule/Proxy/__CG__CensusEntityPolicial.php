<?php

namespace DoctrineORMModule\Proxy\__CG__\Census\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Policial extends \Census\Entity\Policial implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'codigo', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'nomecompleto', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'cpf', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'rg', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'orgaoexpedidor', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'naturalidade', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'naturalidadeuf', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'datanascimento', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'nomepai', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'nomemae', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'sexo', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'cnh', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'cnhcategoria', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'cnhvalidade', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'estadocivil', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'telefonefixo', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'telefonecelular', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'email', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'matricula', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'matriculasiape', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'comportamento', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'dataadmissao', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'quadro', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'nomeguerra', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'postograduacao', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'tiposangue', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'doadorsangue', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'funcionaltipo', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'identidadefuncionalvalidade', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'portearmasituacao', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'pispasep', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'subunidade', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'servicoposto', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'servicofuncao', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'lotacao', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'servicohorario', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'servicoescala', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'bienalvalidade', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'tafvalidade', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'antiguidade', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'foto', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'fototipo', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'enderecouf', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'enderecocidade', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'enderecobairro', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'enderecoquadra', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'enderecoconjunto', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'endereconumero', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'enderecocep', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'enderecocomplemento', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'enderecotipo', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'ferias');
        }

        return array('__isInitialized__', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'codigo', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'nomecompleto', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'cpf', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'rg', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'orgaoexpedidor', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'naturalidade', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'naturalidadeuf', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'datanascimento', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'nomepai', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'nomemae', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'sexo', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'cnh', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'cnhcategoria', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'cnhvalidade', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'estadocivil', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'telefonefixo', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'telefonecelular', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'email', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'matricula', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'matriculasiape', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'comportamento', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'dataadmissao', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'quadro', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'nomeguerra', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'postograduacao', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'tiposangue', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'doadorsangue', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'funcionaltipo', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'identidadefuncionalvalidade', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'portearmasituacao', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'pispasep', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'subunidade', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'servicoposto', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'servicofuncao', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'lotacao', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'servicohorario', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'servicoescala', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'bienalvalidade', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'tafvalidade', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'antiguidade', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'foto', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'fototipo', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'enderecouf', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'enderecocidade', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'enderecobairro', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'enderecoquadra', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'enderecoconjunto', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'endereconumero', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'enderecocep', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'enderecocomplemento', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'enderecotipo', '' . "\0" . 'Census\\Entity\\Policial' . "\0" . 'ferias');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Policial $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function toArray()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'toArray', array());

        return parent::toArray();
    }

    /**
     * {@inheritDoc}
     */
    public function getCodigo()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getCodigo();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodigo', array());

        return parent::getCodigo();
    }

    /**
     * {@inheritDoc}
     */
    public function getNomecompleto()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNomecompleto', array());

        return parent::getNomecompleto();
    }

    /**
     * {@inheritDoc}
     */
    public function setNomecompleto($nomecompleto)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNomecompleto', array($nomecompleto));

        return parent::setNomecompleto($nomecompleto);
    }

    /**
     * {@inheritDoc}
     */
    public function getCpf()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCpf', array());

        return parent::getCpf();
    }

    /**
     * {@inheritDoc}
     */
    public function setCpf($cpf)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCpf', array($cpf));

        return parent::setCpf($cpf);
    }

    /**
     * {@inheritDoc}
     */
    public function getRg()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRg', array());

        return parent::getRg();
    }

    /**
     * {@inheritDoc}
     */
    public function setRg($rg)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRg', array($rg));

        return parent::setRg($rg);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrgaoexpedidor()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOrgaoexpedidor', array());

        return parent::getOrgaoexpedidor();
    }

    /**
     * {@inheritDoc}
     */
    public function setOrgaoexpedidor($orgaoexpedidor)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOrgaoexpedidor', array($orgaoexpedidor));

        return parent::setOrgaoexpedidor($orgaoexpedidor);
    }

    /**
     * {@inheritDoc}
     */
    public function getnaturalidade()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getnaturalidade', array());

        return parent::getnaturalidade();
    }

    /**
     * {@inheritDoc}
     */
    public function setnaturalidade($naturalidade)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setnaturalidade', array($naturalidade));

        return parent::setnaturalidade($naturalidade);
    }

    /**
     * {@inheritDoc}
     */
    public function getnaturalidadeuf()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getnaturalidadeuf', array());

        return parent::getnaturalidadeuf();
    }

    /**
     * {@inheritDoc}
     */
    public function setNaturalidadeuf($naturalidadeuf)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNaturalidadeuf', array($naturalidadeuf));

        return parent::setNaturalidadeuf($naturalidadeuf);
    }

    /**
     * {@inheritDoc}
     */
    public function getDatanascimento()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDatanascimento', array());

        return parent::getDatanascimento();
    }

    /**
     * {@inheritDoc}
     */
    public function setDatanascimento($datanascimento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDatanascimento', array($datanascimento));

        return parent::setDatanascimento($datanascimento);
    }

    /**
     * {@inheritDoc}
     */
    public function getNomepai()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNomepai', array());

        return parent::getNomepai();
    }

    /**
     * {@inheritDoc}
     */
    public function setNomepai($nomepai)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNomepai', array($nomepai));

        return parent::setNomepai($nomepai);
    }

    /**
     * {@inheritDoc}
     */
    public function getNomemae()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNomemae', array());

        return parent::getNomemae();
    }

    /**
     * {@inheritDoc}
     */
    public function setNomemae($nomemae)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNomemae', array($nomemae));

        return parent::setNomemae($nomemae);
    }

    /**
     * {@inheritDoc}
     */
    public function getSexo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSexo', array());

        return parent::getSexo();
    }

    /**
     * {@inheritDoc}
     */
    public function setSexo($sexo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSexo', array($sexo));

        return parent::setSexo($sexo);
    }

    /**
     * {@inheritDoc}
     */
    public function getCnh()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCnh', array());

        return parent::getCnh();
    }

    /**
     * {@inheritDoc}
     */
    public function setCnh($cnh)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCnh', array($cnh));

        return parent::setCnh($cnh);
    }

    /**
     * {@inheritDoc}
     */
    public function getCnhcategoria()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCnhcategoria', array());

        return parent::getCnhcategoria();
    }

    /**
     * {@inheritDoc}
     */
    public function setCnhcategoria($cnhcategoria)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCnhcategoria', array($cnhcategoria));

        return parent::setCnhcategoria($cnhcategoria);
    }

    /**
     * {@inheritDoc}
     */
    public function getCnhvalidade()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCnhvalidade', array());

        return parent::getCnhvalidade();
    }

    /**
     * {@inheritDoc}
     */
    public function setCnhvalidade($cnhvalidade)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCnhvalidade', array($cnhvalidade));

        return parent::setCnhvalidade($cnhvalidade);
    }

    /**
     * {@inheritDoc}
     */
    public function getEstadocivil()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEstadocivil', array());

        return parent::getEstadocivil();
    }

    /**
     * {@inheritDoc}
     */
    public function setEstadocivil($estadocivil)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEstadocivil', array($estadocivil));

        return parent::setEstadocivil($estadocivil);
    }

    /**
     * {@inheritDoc}
     */
    public function getTelefonefixo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTelefonefixo', array());

        return parent::getTelefonefixo();
    }

    /**
     * {@inheritDoc}
     */
    public function setTelefonefixo($telefonefixo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTelefonefixo', array($telefonefixo));

        return parent::setTelefonefixo($telefonefixo);
    }

    /**
     * {@inheritDoc}
     */
    public function getTelefonecelular()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTelefonecelular', array());

        return parent::getTelefonecelular();
    }

    /**
     * {@inheritDoc}
     */
    public function setTelefonecelular($telefonecelular)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTelefonecelular', array($telefonecelular));

        return parent::setTelefonecelular($telefonecelular);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', array());

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', array($email));

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getMatricula()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMatricula', array());

        return parent::getMatricula();
    }

    /**
     * {@inheritDoc}
     */
    public function setMatricula($matricula)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMatricula', array($matricula));

        return parent::setMatricula($matricula);
    }

    /**
     * {@inheritDoc}
     */
    public function getMatriculasiape()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMatriculasiape', array());

        return parent::getMatriculasiape();
    }

    /**
     * {@inheritDoc}
     */
    public function setMatriculasiape($matriculasiape)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMatriculasiape', array($matriculasiape));

        return parent::setMatriculasiape($matriculasiape);
    }

    /**
     * {@inheritDoc}
     */
    public function getDataadmissao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDataadmissao', array());

        return parent::getDataadmissao();
    }

    /**
     * {@inheritDoc}
     */
    public function setDataadmissao($dataadmissao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDataadmissao', array($dataadmissao));

        return parent::setDataadmissao($dataadmissao);
    }

    /**
     * {@inheritDoc}
     */
    public function getQuadro()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getQuadro', array());

        return parent::getQuadro();
    }

    /**
     * {@inheritDoc}
     */
    public function setQuadro($quadro)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setQuadro', array($quadro));

        return parent::setQuadro($quadro);
    }

    /**
     * {@inheritDoc}
     */
    public function getNomeguerra()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNomeguerra', array());

        return parent::getNomeguerra();
    }

    /**
     * {@inheritDoc}
     */
    public function setNomeguerra($nomeguerra)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNomeguerra', array($nomeguerra));

        return parent::setNomeguerra($nomeguerra);
    }

    /**
     * {@inheritDoc}
     */
    public function getPostograduacao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPostograduacao', array());

        return parent::getPostograduacao();
    }

    /**
     * {@inheritDoc}
     */
    public function setPostograduacao($postograduacao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPostograduacao', array($postograduacao));

        return parent::setPostograduacao($postograduacao);
    }

    /**
     * {@inheritDoc}
     */
    public function getTiposangue()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTiposangue', array());

        return parent::getTiposangue();
    }

    /**
     * {@inheritDoc}
     */
    public function setTiposangue($tiposangue)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTiposangue', array($tiposangue));

        return parent::setTiposangue($tiposangue);
    }

    /**
     * {@inheritDoc}
     */
    public function getDoadorsangue()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDoadorsangue', array());

        return parent::getDoadorsangue();
    }

    /**
     * {@inheritDoc}
     */
    public function setDoadorsangue($doadorsangue)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDoadorsangue', array($doadorsangue));

        return parent::setDoadorsangue($doadorsangue);
    }

    /**
     * {@inheritDoc}
     */
    public function getfuncionaltipo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getfuncionaltipo', array());

        return parent::getfuncionaltipo();
    }

    /**
     * {@inheritDoc}
     */
    public function setfuncionaltipo($funcionaltipo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setfuncionaltipo', array($funcionaltipo));

        return parent::setfuncionaltipo($funcionaltipo);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdentidadefuncionalvalidade()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdentidadefuncionalvalidade', array());

        return parent::getIdentidadefuncionalvalidade();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdentidadefuncionalvalidade($identidadefuncionalvalidade)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdentidadefuncionalvalidade', array($identidadefuncionalvalidade));

        return parent::setIdentidadefuncionalvalidade($identidadefuncionalvalidade);
    }

    /**
     * {@inheritDoc}
     */
    public function getPortearmasituacao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPortearmasituacao', array());

        return parent::getPortearmasituacao();
    }

    /**
     * {@inheritDoc}
     */
    public function setPortearmasituacao($portearmasituacao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPortearmasituacao', array($portearmasituacao));

        return parent::setPortearmasituacao($portearmasituacao);
    }

    /**
     * {@inheritDoc}
     */
    public function getPispasep()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPispasep', array());

        return parent::getPispasep();
    }

    /**
     * {@inheritDoc}
     */
    public function setPispasep($pispasep)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPispasep', array($pispasep));

        return parent::setPispasep($pispasep);
    }

    /**
     * {@inheritDoc}
     */
    public function getcomportamento()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getcomportamento', array());

        return parent::getcomportamento();
    }

    /**
     * {@inheritDoc}
     */
    public function setComportamento($comportamento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setComportamento', array($comportamento));

        return parent::setComportamento($comportamento);
    }

    /**
     * {@inheritDoc}
     */
    public function getSubunidade()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSubunidade', array());

        return parent::getSubunidade();
    }

    /**
     * {@inheritDoc}
     */
    public function setSubunidade($subunidade)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSubunidade', array($subunidade));

        return parent::setSubunidade($subunidade);
    }

    /**
     * {@inheritDoc}
     */
    public function getServicoposto()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getServicoposto', array());

        return parent::getServicoposto();
    }

    /**
     * {@inheritDoc}
     */
    public function setServicoposto($servicoposto)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setServicoposto', array($servicoposto));

        return parent::setServicoposto($servicoposto);
    }

    /**
     * {@inheritDoc}
     */
    public function getServicofuncao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getServicofuncao', array());

        return parent::getServicofuncao();
    }

    /**
     * {@inheritDoc}
     */
    public function setServicofuncao($servicofuncao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setServicofuncao', array($servicofuncao));

        return parent::setServicofuncao($servicofuncao);
    }

    /**
     * {@inheritDoc}
     */
    public function getLotacao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLotacao', array());

        return parent::getLotacao();
    }

    /**
     * {@inheritDoc}
     */
    public function setLotacao($lotacao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLotacao', array($lotacao));

        return parent::setLotacao($lotacao);
    }

    /**
     * {@inheritDoc}
     */
    public function getServicohorario()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getServicohorario', array());

        return parent::getServicohorario();
    }

    /**
     * {@inheritDoc}
     */
    public function setServicohorario($servicohorario)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setServicohorario', array($servicohorario));

        return parent::setServicohorario($servicohorario);
    }

    /**
     * {@inheritDoc}
     */
    public function getServicoescala()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getServicoescala', array());

        return parent::getServicoescala();
    }

    /**
     * {@inheritDoc}
     */
    public function setServicoescala($servicoescala)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setServicoescala', array($servicoescala));

        return parent::setServicoescala($servicoescala);
    }

    /**
     * {@inheritDoc}
     */
    public function getBienalvalidade()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBienalvalidade', array());

        return parent::getBienalvalidade();
    }

    /**
     * {@inheritDoc}
     */
    public function setBienalvalidade($bienalvalidade)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBienalvalidade', array($bienalvalidade));

        return parent::setBienalvalidade($bienalvalidade);
    }

    /**
     * {@inheritDoc}
     */
    public function getTafvalidade()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTafvalidade', array());

        return parent::getTafvalidade();
    }

    /**
     * {@inheritDoc}
     */
    public function setTafvalidade($tafvalidade)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTafvalidade', array($tafvalidade));

        return parent::setTafvalidade($tafvalidade);
    }

    /**
     * {@inheritDoc}
     */
    public function getAntiguidade()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAntiguidade', array());

        return parent::getAntiguidade();
    }

    /**
     * {@inheritDoc}
     */
    public function setAntiguidade($antiguidade)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAntiguidade', array($antiguidade));

        return parent::setAntiguidade($antiguidade);
    }

    /**
     * {@inheritDoc}
     */
    public function getFoto()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFoto', array());

        return parent::getFoto();
    }

    /**
     * {@inheritDoc}
     */
    public function setFoto($foto)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFoto', array($foto));

        return parent::setFoto($foto);
    }

    /**
     * {@inheritDoc}
     */
    public function getFototipo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFototipo', array());

        return parent::getFototipo();
    }

    /**
     * {@inheritDoc}
     */
    public function setFototipo($fototipo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFototipo', array($fototipo));

        return parent::setFototipo($fototipo);
    }

    /**
     * {@inheritDoc}
     */
    public function getEnderecouf()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEnderecouf', array());

        return parent::getEnderecouf();
    }

    /**
     * {@inheritDoc}
     */
    public function setEnderecouf($enderecouf)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEnderecouf', array($enderecouf));

        return parent::setEnderecouf($enderecouf);
    }

    /**
     * {@inheritDoc}
     */
    public function getEnderecocidade()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEnderecocidade', array());

        return parent::getEnderecocidade();
    }

    /**
     * {@inheritDoc}
     */
    public function setEnderecocidade($enderecocidade)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEnderecocidade', array($enderecocidade));

        return parent::setEnderecocidade($enderecocidade);
    }

    /**
     * {@inheritDoc}
     */
    public function getEnderecobairro()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEnderecobairro', array());

        return parent::getEnderecobairro();
    }

    /**
     * {@inheritDoc}
     */
    public function setEnderecobairro($enderecobairro)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEnderecobairro', array($enderecobairro));

        return parent::setEnderecobairro($enderecobairro);
    }

    /**
     * {@inheritDoc}
     */
    public function getEnderecoquadra()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEnderecoquadra', array());

        return parent::getEnderecoquadra();
    }

    /**
     * {@inheritDoc}
     */
    public function setEnderecoquadra($enderecoquadra)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEnderecoquadra', array($enderecoquadra));

        return parent::setEnderecoquadra($enderecoquadra);
    }

    /**
     * {@inheritDoc}
     */
    public function getEnderecoconjunto()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEnderecoconjunto', array());

        return parent::getEnderecoconjunto();
    }

    /**
     * {@inheritDoc}
     */
    public function setEnderecoconjunto($enderecoconjunto)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEnderecoconjunto', array($enderecoconjunto));

        return parent::setEnderecoconjunto($enderecoconjunto);
    }

    /**
     * {@inheritDoc}
     */
    public function getEndereconumero()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEndereconumero', array());

        return parent::getEndereconumero();
    }

    /**
     * {@inheritDoc}
     */
    public function setEndereconumero($endereconumero)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEndereconumero', array($endereconumero));

        return parent::setEndereconumero($endereconumero);
    }

    /**
     * {@inheritDoc}
     */
    public function getEnderecocep()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEnderecocep', array());

        return parent::getEnderecocep();
    }

    /**
     * {@inheritDoc}
     */
    public function setEnderecocep($enderecocep)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEnderecocep', array($enderecocep));

        return parent::setEnderecocep($enderecocep);
    }

    /**
     * {@inheritDoc}
     */
    public function getEnderecocomplemento()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEnderecocomplemento', array());

        return parent::getEnderecocomplemento();
    }

    /**
     * {@inheritDoc}
     */
    public function setEnderecocomplemento($enderecocomplemento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEnderecocomplemento', array($enderecocomplemento));

        return parent::setEnderecocomplemento($enderecocomplemento);
    }

    /**
     * {@inheritDoc}
     */
    public function getEnderecotipo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEnderecotipo', array());

        return parent::getEnderecotipo();
    }

    /**
     * {@inheritDoc}
     */
    public function setEnderecotipo($enderecotipo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEnderecotipo', array($enderecotipo));

        return parent::setEnderecotipo($enderecotipo);
    }

    /**
     * {@inheritDoc}
     */
    public function setCodigo($codigo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCodigo', array($codigo));

        return parent::setCodigo($codigo);
    }

    /**
     * {@inheritDoc}
     */
    public function getFerias()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFerias', array());

        return parent::getFerias();
    }

    /**
     * {@inheritDoc}
     */
    public function setFerias($ferias)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFerias', array($ferias));

        return parent::setFerias($ferias);
    }

}
