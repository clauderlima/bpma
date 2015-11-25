<?php

namespace Census\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Census\Entity\Ctgrafi;

class CtgrafiFilter extends AbstractHelper
{
	protected $ctgrafi;
	
	public function __invoke(Ctgrafi $ctgrafi) 
	{
		$this->ctgrafi = $ctgrafi;
		return $this;
	}
	
	public function especie()
	{
		$result = $this->ctgrafi->getEspecie();
		return $this->view->escapeHTML($result);
	}
	
	
}