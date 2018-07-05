<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <title>Cliente WebService SOAP</title>
  </head>
  <body>
    <ul>
  <li><a class="active" href="index">Pesquisar Filmes</a></li>
  <li><a href="removeFilme">Remover Filme</a></li>
  <li><a href="atualizar">Atualizar Filme</a></li>  
</ul>
    <h1>Cliente WS SOAP - Cadastro de Filmes</h1>


    <form action="" method="post">

      Filme: <input type="text" name="titulo">
      Diretor: <input type="text" name="diretor">
      Estudio: <input type="text" name="estudio">
      Genero: <input type="text" name="genero">
      Ano de Lançamento: <input type="text" name="ano">

      <button type="submit" name="cadastrar">Cadastrar</button>

    </form>

    <?php require_once('controller/cadastro_lib.php'); ?>     

  </body>
</html>
