<?php

	include_once('rotinas.php');

	if( !empty($_POST['form_submit']) ) {

		if($_POST['botao'] == "get") {
			// GET
			$get = GET();
		}
		else if($_POST['botao'] == "post") {
			// POST
			$post = POST();
		}
		else if($_POST['botao'] == "put") {
			// PUT
			$put = PUT();
		}
		else if($_POST['botao'] == "delete") {
			// DELETE
			$delete = DELETE();
		}
    }
	else {
		$get = "";
		$post = "";
		$put = "";
		$delete = "";
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/umidae_icon.ico">
    <link rel="shortcut icon" href="https://user-images.githubusercontent.com/48556068/59041333-c2e31780-884e-11e9-94b9-893494094279.png">

    <title>MangaMark-API</title>

    <!-- Bootstrap core CSS -->
    <link href="bs/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="bs/themes/signin.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  </head>

  <body role="document">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Home</a>
          <a class="navbar-brand" href="index.php">Mangás</a>
        </div>
	<div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container theme-showcase" role="main">

		<form class="form" method="post" action="index.php">
	    	<input TYPE="hidden" NAME="form_submit" VALUE="OK">

			<div class="page-header">
				<h1 class="form-signin-heading">
					<div id="m_texto">Cadastro e Lista de Mangás</div>
				</h1>
			</div>

			
				<!-- POST -->
				
					<h2>Cadastrar Usuario</h2>
			<div class='container' >

				<br>
				<div class='row' >
					<div class='col-sm-4'>
						<label>Title</label>
						<input type="text" class="form-control" name="title_post" >
					</div>
					<div class='col-sm-3'>
						<label>Author</label>
						<input type="text" class="form-control" name="author_post" >
					</div>
					<div class='col-sm-1'>
						<label>Chapters</label>
						<input type="number" class="form-control" name="chapters_post" value="0">
					</div>
				</div>

				<br>
				<div class='row' >
					<div class='col-sm-8'>
						<label>Link</label>
						<input type="text" class="form-control" name="link_post">
					</div>
				</div>

				<br>
				<div class='row' >
					<div class='col-sm-5'>
						<label>Cover</label>
						<input type="text" class="form-control" name="cover_post">
					</div>
					<div class='col-sm-3'>
						<label>Category</label>
						<input type="text" class="form-control" name="category_post">
					</div>
				</div>			
				
				<br>
				<div class='row' >
					<div class='col-sm-8'>
						<label>Description/Sinopse</label>
						<input type="text" id="inputlg" class="form-control input-lg" name="description_post" max="255">
					</div>
				</div>
				
				<br>
				<div class='row'>
					<div class="col-sm-8" >
						<button type="submit" name="botao" value="post" class="btn btn-primary btn-block">
							<b>Cadastrar</b>
						</button>
					</div>
				</div>
					<?php
						if($post != "") {
							echo "<br><div class='alert alert-success' role='alert'>";
								$dadoJson = json_decode($post);
								$msg = $dadoJson->{'msg'};
			   					echo "<strong>Retorno do Web Service!</strong><br>$msg";
			 				echo "</div>";
						}
					?>
				</div>	
		</form>


		<form class="form" method="post" action="index.php">
	    	<input TYPE="hidden" NAME="form_submit" VALUE="OK">

			<br><br><br>
			<div class='row'>
					<div class="col-sm-8" >
						<button type="submit" name="botao" value="get" class="btn btn-success btn-block">
							<b>GET</b>
						</button>
					</div>
				</div>

				<?php
						if($get != "") {
							echo "<br><div class='alert alert-success' role='alert'>";
								$dadoJson = json_decode($get);
								$msg = $dadoJson[0]->title;
			   					echo "<strong>Retorno do Web Service!</strong><br>$msg";
			 				echo "</div>";


						}
					?>
		</form>

		<div class="page-header">
			<b>&copy;2019&nbsp;&nbsp;&raquo;&nbsp;&nbsp; Adriano C. V. C. Yasuda</b>
		</div>
    </div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
