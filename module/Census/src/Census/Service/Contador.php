<?php

namespace Census\Service;

use Census\Service\AbstractService;

class Contador extends AbstractService
{
	public function total()
	{
		$adapter = $this->getServiceLocator()->get('AdapterDb');
		
		$efetivo['Total'] = $adapter->query("SELECT * FROM `policial`")->execute()->count();
    	$efetivo['TC'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='TC'")->execute()->count();
    	$efetivo['Maj'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Maj'")->execute()->count();
    	$efetivo['Cap'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Cap'")->execute()->count();
    	$efetivo['1Ten'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='1º Ten'")->execute()->count();
    	$efetivo['2Ten'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='2º Ten'")->execute()->count();
    	$efetivo['ST'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='ST'")->execute()->count();
    	$efetivo['1Sgt'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='1º Sgt'")->execute()->count();
    	$efetivo['2Sgt'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='2º Sgt'")->execute()->count();
    	$efetivo['3Sgt'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='3º Sgt'")->execute()->count();
    	$efetivo['Cb'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Cb'")->execute()->count();
    	$efetivo['Sd'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Sd'")->execute()->count();
    	$efetivo['SemClass'] = $adapter->query("SELECT * FROM `policial` WHERE pol_Lotacao='' ORDER BY pol_Antiguidade")->execute()->count();
    	
    	return $efetivo;
	}
	
	public function conta($subUnidade)
	{
		$adapter = $this->getServiceLocator()->get('AdapterDb');
	
		$efetivo['Total'] = $adapter->query("SELECT * FROM `policial` WHERE pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['TC'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='TC' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['Maj'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Maj' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['Cap'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Cap' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['1Ten'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='1º Ten' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['2Ten'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='2º Ten' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['ST'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='ST' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['1Sgt'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='1º Sgt' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['2Sgt'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='2º Sgt' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['3Sgt'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='3º Sgt' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['Cb'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Cb' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['Sd'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Sd' AND pol_SubUnidade='$subUnidade'")->execute()->count();
	
		return $efetivo;
	}
	
	public function contasub($subUnidade)
	{
		$adapter = $this->getServiceLocator()->get('AdapterDb');
	
		$efetivo['Total'] = $adapter->query("SELECT * FROM `policial` WHERE pol_Lotacao='$subUnidade'")->execute()->count();
		$efetivo['TC'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='TC' AND pol_Lotacao='$subUnidade'")->execute()->count();
		$efetivo['Maj'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Maj' AND pol_Lotacao='$subUnidade'")->execute()->count();
		$efetivo['Cap'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Cap' AND pol_Lotacao='$subUnidade'")->execute()->count();
		$efetivo['1Ten'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='1º Ten' AND pol_Lotacao='$subUnidade'")->execute()->count();
		$efetivo['2Ten'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='2º Ten' AND pol_Lotacao='$subUnidade'")->execute()->count();
		$efetivo['ST'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='ST' AND pol_Lotacao='$subUnidade'")->execute()->count();
		$efetivo['1Sgt'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='1º Sgt' AND pol_Lotacao='$subUnidade'")->execute()->count();
		$efetivo['2Sgt'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='2º Sgt' AND pol_Lotacao='$subUnidade'")->execute()->count();
		$efetivo['3Sgt'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='3º Sgt' AND pol_Lotacao='$subUnidade'")->execute()->count();
		$efetivo['Cb'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Cb' AND pol_Lotacao='$subUnidade'")->execute()->count();
		$efetivo['Sd'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Sd' AND pol_Lotacao='$subUnidade'")->execute()->count();
	
		return $efetivo;
	}
	
	
	public function expediente()
	{
		$adapter = $this->getServiceLocator()->get('AdapterDb');
	
		$efetivo['Total'] = $adapter->query("SELECT * FROM `policial` WHERE pol_Lotacao IN ('Sad','SSAd','NGP','NCC','Sec','NCS','SSLog','NProj','Almox','NMan','SOp','SSInt','SAOpe','SSDIE','NEEC','NEAN','CeAPA')")->execute()->count();
		$efetivo['TC'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='TC' AND pol_Lotacao IN ('Sad','SSAd','NGP','NCC','Sec','NCS','SSLog','NProj','Almox','NMan','SOp','SSInt','SAOpe','SSDIE','NEEC','NEAN','CeAPA')")->execute()->count();
		$efetivo['Maj'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Maj' AND pol_Lotacao IN ('Sad','SSAd','NGP','NCC','Sec','NCS','SSLog','NProj','Almox','NMan','SOp','SSInt','SAOpe','SSDIE','NEEC','NEAN','CeAPA')")->execute()->count();
		$efetivo['Cap'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Cap' AND pol_Lotacao IN ('Sad','SSAd','NGP','NCC','Sec','NCS','SSLog','NProj','Almox','NMan','SOp','SSInt','SAOpe','SSDIE','NEEC','NEAN','CeAPA')")->execute()->count();
		$efetivo['1Ten'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='1º Ten' AND pol_Lotacao IN ('Cmd','Sad','SSAd','NGP','NCC','Sec','NCS','SSLog','NProj','Almox','NMan','SOp','SSInt','SAOpe','SSDIE','NEEC','NEAN','CeAPA')")->execute()->count();
		$efetivo['2Ten'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='2º Ten' AND pol_Lotacao IN ('Cmd','Sad','SSAd','NGP','NCC','Sec','NCS','SSLog','NProj','Almox','NMan','SOp','SSInt','SAOpe','SSDIE','NEEC','NEAN','CeAPA')")->execute()->count();
		$efetivo['ST'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='ST' AND pol_Lotacao IN ('Cmd','Sad','SSAd','NGP','NCC','Sec','NCS','SSLog','NProj','Almox','NMan','SOp','SSInt','SAOpe','SSDIE','NEEC','NEAN','CeAPA')")->execute()->count();
		$efetivo['1Sgt'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='1º Sgt' AND pol_Lotacao IN ('Cmd','Sad','SSAd','NGP','NCC','Sec','NCS','SSLog','NProj','Almox','NMan','SOp','SSInt','SAOpe','SSDIE','NEEC','NEAN','CeAPA')")->execute()->count();
		$efetivo['2Sgt'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='2º Sgt' AND pol_Lotacao IN ('Cmd','Sad','SSAd','NGP','NCC','Sec','NCS','SSLog','NProj','Almox','NMan','SOp','SSInt','SAOpe','SSDIE','NEEC','NEAN','CeAPA')")->execute()->count();
		$efetivo['3Sgt'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='3º Sgt' AND pol_Lotacao IN ('Cmd','Sad','SSAd','NGP','NCC','Sec','NCS','SSLog','NProj','Almox','NMan','SOp','SSInt','SAOpe','SSDIE','NEEC','NEAN','CeAPA')")->execute()->count();
		$efetivo['Cb'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Cb' AND pol_Lotacao IN ('Cmd','Sad','SSAd','NGP','NCC','Sec','NCS','SSLog','NProj','Almox','NMan','SOp','SSInt','SAOpe','SSDIE','NEEC','NEAN','CeAPA')")->execute()->count();
		$efetivo['Sd'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Sd' AND pol_Lotacao IN ('Cmd','Sad','SSAd','NGP','NCC','Sec','NCS','SSLog','NProj','Almox','NMan','SOp','SSInt','SAOpe','SSDIE','NEEC','NEAN','CeAPA')")->execute()->count();
	
		return $efetivo;
	}
	
	public function listaGOA()
	{
		$adapter = $this->getServiceLocator()->get('AdapterDb');
	
		$efetivo['Total'] = $adapter->query("SELECT * FROM `policial` WHERE pol_Lotacao IN ('GOA','Lac','RPA','TA')")->execute()->count();
		$efetivo['TC'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='TC' AND pol_Lotacao IN ('GOA','Lac','RPA','TA')")->execute()->count();
		$efetivo['Maj'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Maj' AND pol_Lotacao IN ('GOA','Lac','RPA','TA')")->execute()->count();
		$efetivo['Cap'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Cap' AND pol_Lotacao IN ('GOA','Lac','RPA','TA')")->execute()->count();
		$efetivo['1Ten'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='1º Ten' AND pol_Lotacao IN ('GOA','Lac','RPA','TA')")->execute()->count();
		$efetivo['2Ten'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='2º Ten' AND pol_Lotacao IN ('GOA','Lac','RPA','TA')")->execute()->count();
		$efetivo['ST'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='ST' AND pol_Lotacao IN ('GOA','Lac','RPA','TA')")->execute()->count();
		$efetivo['1Sgt'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='1º Sgt' AND pol_Lotacao IN ('GOA','Lac','RPA','TA')")->execute()->count();
		$efetivo['2Sgt'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='2º Sgt' AND pol_Lotacao IN ('GOA','Lac','RPA','TA')")->execute()->count();
		$efetivo['3Sgt'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='3º Sgt' AND pol_Lotacao IN ('GOA','Lac','RPA','TA')")->execute()->count();
		$efetivo['Cb'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Cb' AND pol_Lotacao IN ('GOA','Lac','RPA','TA')")->execute()->count();
		$efetivo['Sd'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Sd' AND pol_Lotacao IN ('GOA','Lac','RPA','TA')")->execute()->count();
	
		return $efetivo;
	}
	
	public function lista($subUnidade)
	{
		$adapter = $this->getServiceLocator()->get('AdapterDb');
	
		$efetivo['Total'] = $adapter->query("SELECT * FROM `policial` WHERE pol_SubUnidade='$subUnidade'")->execute();
		$efetivo['TC'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='TC' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['Maj'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Maj' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['Cap'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Cap' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['1Ten'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='1º Ten' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['2Ten'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='2º Ten' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['ST'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='ST' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['1Sgt'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='1º Sgt' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['2Sgt'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='2º Sgt' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['3Sgt'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='3º Sgt' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['Cb'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Cb' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['Sd'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Sd' AND pol_SubUnidade='$subUnidade'")->execute()->count();
	
		return $efetivo;
	}
	
	public function listaSub($subUnidade)
	{
		$adapter = $this->getServiceLocator()->get('AdapterDb');
	
		$efetivo['Total'] = $adapter->query("SELECT * FROM `policial` WHERE pol_SubUnidade='$subUnidade'")->execute();
		$efetivo['TC'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='TC' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['Maj'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Maj' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['Cap'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Cap' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['1Ten'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='1º Ten' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['2Ten'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='2º Ten' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['ST'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='ST' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['1Sgt'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='1º Sgt' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['2Sgt'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='2º Sgt' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['3Sgt'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='3º Sgt' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['Cb'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Cb' AND pol_SubUnidade='$subUnidade'")->execute()->count();
		$efetivo['Sd'] = $adapter->query("SELECT * FROM `policial` WHERE pol_PostoGraduacao='Sd' AND pol_SubUnidade='$subUnidade'")->execute()->count();
	
		return $efetivo;
	}
	
}