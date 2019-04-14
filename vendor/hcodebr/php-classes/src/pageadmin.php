<?php

namespace Hcode;		//=> tem que especificar o namespace onde a pasta classes esta

class Pageadmin extends Page{				//=> vamos estender da classe PAGE e obter todos os recursos da classe
	
	public function __construct($opts = array(), $tpl_dir = "/views/admin/"){
		parent::__construct($opts, $tpl_dir);	//=> chama a metodo construtor da classe PAGE 
	}

}
?>