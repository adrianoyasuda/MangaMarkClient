<?php

	function POST() {

		// DADO DE ENTRADA VAZIO - ERRO
		if($_POST['title_post'] == "" || $_POST['author_post'] == "" || $_POST['chapters_post'] == "") {
			return json_encode( array('msg' => '[ERRO] Preencha o Campo de Entrada!') );
		}

		// MONTA ARRAY DE DADOS



		$dados = array('title' => $_POST['title_post'], 
						'author' => $_POST['author_post'],
						'chapters' => $_POST['chapters_post'],
						'url' => $_POST['link_post'],
						'cover_url' => $_POST['cover_post'],
						'category' => $_POST['category_post'],
						'description' => $_POST['description_post'] );

		// INICIALIZA/CONFIGURA CURL
		$curl = curl_init("http://jonatassn.servegame.com/api/mangamark/manga");
		// CONFIGURA AS OPÇÕES (parâmetros)
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, 'POST');
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($dados));
		// INVOCA A URL DO WEBSERVICE
		$curl_resposta = curl_exec($curl);
		curl_close($curl);

		return $curl_resposta;
	}


		function GET() {

		// INICIALIZA/CONFIGURA CURL
		$curl = curl_init("http://jonatassn.servegame.com/api/mangamark/manga");
		// CONFIGURA AS OPÇÕES (parâmetros)
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		// INVOCA A URL DO WEBSERVICE
		$curl_resposta = curl_exec($curl);
		curl_close($curl);



		return $curl_resposta;
	}

	function PUT() {

		// DADO DE ENTRADA VAZIO - ERRO
		if($_POST['cpf_put'] == "" ) {
			return json_encode( array('msg' => '[ERRO] Preencha o Campo de Entrada!') );
		}
		// MONTA ARRAY DE DADOS
		$dados = array('cpf' => $_POST['cpf_put']);
		

		// INICIALIZA/CONFIGURA CURL
		$curl = curl_init("http://localhost/Slim/rest.php");
		// CONFIGURA AS OPÇÕES (parâmetros)
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($dados));
		// INVOCA A URL DO WEBSERVICE
		
		$curl_resposta = curl_exec($curl);
		curl_close($curl);

		return $curl_resposta;

	}
?>
