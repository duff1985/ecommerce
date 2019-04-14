<?php 

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\page;
use \Hcode\pageadmin;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$page = new Page();			//=> ele ja chama o __CONSTRUCT e adiciona o header (cabeçalho)
	$page->setTpl("index");		//=> ele chama o conteudo da pagina
								//=> como nao tem mais nada ele chama o __DESTRUCT e adiciona o footer (rodape)
});

$app->get('/admin', function() {
    
	$page = new Pageadmin();			//=> ele ja chama o __CONSTRUCT e adiciona o header (cabeçalho)
	$page->setTpl("index");		//=> ele chama o conteudo da pagina
								//=> como nao tem mais nada ele chama o __DESTRUCT e adiciona o footer (rodape)
});

$app->run();

 ?>