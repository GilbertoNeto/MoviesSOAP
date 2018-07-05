
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
  <li><a href="cadastro">Cadastrar Filme</a></li>
  <li><a href="removeFilme">Remover Filme</a></li>
</ul>
    <h1>Cliente WS SOAP - Atualizar Filmes</h1>


    <form action="" method="post">

      Filme a ser atualizado: <input type="text" name="titulo">
      Novo Titulo: <input type="text" name="novoTitulo">

      <button type="submit" name="atualizar">Atualizar</button>

    </form>

<br>

    <form action="" method="get">
        Deseja ver todos os filmes?
        <button type="submit" name="todos" value="sim">Sim</button>
    </form>

    <?php require_once('controller/atualizar_lib.php'); ?>

  </body>
</html>
