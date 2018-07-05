<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style2.css">
            <title>Cliente WebService SOAP - Pesquisar Filmes</title>
        </head>
    <body>
<ul>
  <li><a class="active" href="cadastro">Cadastrar Filme</a></li>  
  <li><a href="removeFilme">Remover Filme</a></li>
  <li><a href="atualizar">Atualizar Filme</a></li>
</ul>
        <h1>Cliente WS SOAP - Pesquisar filmes</h1>
        <form action="" method="get">
            Pesquise pelo titulo: <input type="text" name="titulo">
            <button type="submit">Enviar</button>
        </form>
        <br>
        <form action="" method="get">
            Pesquise pelo diretor: <input type="text" name="diretor">
            <button type="submit">Enviar</button>
        </form>
        <br>
        <form action="" method="get">
            Pesquise pelo ano de lançamento: <input type="text" name="age">
            <button type="submit">Enviar</button>
        </form>
        <br>
        <form action="" method="get">
            Pesquise pelo genero: <input type="text" name="genre">
            <button type="submit">Enviar</button>
        </form>
        <br>
        <form action="" method="get">
            Deseja ver todos os filmes?
            <button type="submit" name="todos" value="sim">Sim</button>
        </form>

        <br>

        <?php require_once('controller/lib.php'); ?>

    </body>
</html>
