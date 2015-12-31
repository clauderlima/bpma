<?php

namespace Scriba\Controller;

use Zend\View\Model\ViewModel;
class ProtocoloController extends AbstractController
{
	public function indexAction()
	{
		$dataProtocolo = $this->getEm('Scriba\Entity\Protocolo')->findAll();

		return new ViewModel(array(
			'$dados' => $dataProtocolo,
		));
	}
}	