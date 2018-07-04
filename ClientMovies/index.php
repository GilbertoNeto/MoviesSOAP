<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cliente WebService SOAP</title>
    </head>
    <body>
        <h1>Cliente WS SOAP</h1>
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
            Pesquise por todos:
            <button type="submit" name="todos">Enviar</button>
        </form>

        <br>

        <?php

        class Filme {
          
            public $titulo;
            public $diretor;
            public $estudio;
            public $genero;
            public $anoLancamento;
        }


//        $client = new SoapClient("http://localhost:8080/webMoovies/WebMoovies?WSDL", array('classmap' => array('Filme' => "Filme")));

        $client = new SoapClient("http://localhost:8080/Movies/WebMovies?WSDL");

        if(isset($_GET['titulo'])){
            if($_GET['titulo'])
                echo getMovieTitle($_GET['titulo']);
        }
        if(isset($_GET['diretor'])){
            if($_GET['diretor'])
            echo getMovieDirector($_GET['diretor']);
        }
        if(isset($_GET['age'])){
            if($_GET['age'])
            echo getMovieAge($_GET['age']);
        }

        if(isset($_GET['genre'])){
            if($_GET['genre'])
            echo getMovieGenre($_GET['genre']);
        }

        if(isset($_GET['todos'])){
                echo getMovieTodos();
        }

        function getMovieTitle($title){
        $filme = $GLOBALS['client']->__soapCall("getMovieTitle", array("parameters"=>array("titulo" => $title)));

        $JSON = json_encode($filme);

        print_r($JSON);

        }

        function getMovieDirector($diretor){
        $filme = $GLOBALS['client']->__soapCall("getMovieDiretor", array("parameters"=>array("diretor" => $diretor)));
        $JSON = json_encode($filme);

        print_r($JSON);
        }

        function getMovieAge($anoLancamento){

        $filme = $GLOBALS['client']->__soapCall("getMovieAge", array("parameters"=>array("age" => $anoLancamento)));
        $JSON = json_encode($filme);

        print_r($JSON);
        }

        function getMovieGenre($genre){
        $filme = $GLOBALS['client']->__soapCall("getMovieGenre", array("parameters"=>array("genero" => $genre)));
        $JSON = json_encode($filme);

        print_r($JSON);
        }

        function getMovieTodos(){
            echo var_dump($GLOBALS['client']->__getFunctions ());
//            $filme = $GLOBALS['client']->__soapCall("getAllMovie",array("parameters"=>array()));
//            echo var_dump($filme);
        }
        ?>
    </body>
</html>
