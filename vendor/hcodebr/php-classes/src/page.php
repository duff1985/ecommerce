<?php

namespace Hcode;		//=> tem que especificar o namespace onde a pasta classes esta

use Rain\Tpl;			//=> como vamos usar classes de outro namespace (RainTpl) temos que colocar o namespace dele


class Page{				//=> vamos criar a nossa classe Page
	private $tpl;		//=> varivel da classe TPL
	private $options=[];	//=> varivel que é um array
	private $defaults = [	//=> varivel que é um array dentro de outro array
		"data"=> []
	];

	public function __construct($opts = array()){		//=> vamos criar o metodo construtor (1° a ser executado)

		$this->options = array_merge($this->defaults, $opts);	//=> função que se der um conflito entre os dois, vale o $opts (mescla)
		
		//Copiado do arquivo example-simple.php do TPL
		$config = array(
			"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/",				//=> colocando o diretorio onde esta o template (obrigatorio)
			"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",		//=> colocando o diretorio onde esta o cache (obrigatorio)
			"debug"         => false 											//=>nao precisa mecher so colocar false
	   );
		Tpl::configure( $config );
		//Copiado do arquivo example-simple.php do TPL

		$this->tpl = new Tpl;				//=>crindo a classe TPL e colocando em uma variavel private (para usar em outras classes)

		$this->setData($this->options["data"]);			//=>chamando a função setData
		
		$this->tpl->draw("header");	//=> vamos desenhar o template na tela (cabeçalho)
	}

	private function setData($data = array()){		//=> função que pega as variaveis da pagina e joga num array
		foreach ($this->options["data"] as $key => $value) {				//=> os nossos dados vai estar na chave data do options
			$this->tpl->assign($key, $value);								//=> função que espera uma chave e um valor
		}
	}

	public function setTpl($nome, $data=array(), $returnHTML = false){//=> metodo so para o conteudo da pagina (arquivo, variaveis, retorno)
		$this->setData($data);			//=>chamando a função setData

		return $this->tpl->draw($nome, $returnHTML);	//=> vamos desenhar o template na tela (conteudo)

	}

	public function __destruct(){		//=> vamos criar o metodo desconstrutor (ultimo a ser executado)
		$this->tpl->draw("footer");		//=> vamos desenhar o template na tela (rodape)

	}

}
?>