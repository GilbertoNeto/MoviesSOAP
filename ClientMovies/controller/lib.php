<?php

ini_set("soap.wsdl_cache_enabled", "0");

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
                echo getMovieTodos("Sim");
        }

        function getMovieTitle($title){

        $filme = $GLOBALS['client']->__soapCall("getMovieTitle", array("parameters"=>array("titulo" => $title)));

        imprime($filme);

        }

        function getMovieDirector($diretor){
        $filme = $GLOBALS['client']->__soapCall("getMovieDiretor", array("parameters"=>array("diretor" => $diretor)));

        imprime($filme);
        }

        function getMovieAge($anoLancamento){

        $filme = $GLOBALS['client']->__soapCall("getMovieAge", array("parameters"=>array("age" => $anoLancamento)));

        imprime($filme);

        }

        function getMovieGenre($genre){
        $filme = $GLOBALS['client']->__soapCall("getMovieGenre", array("parameters"=>array("genero" => $genre)));

        imprime($filme);

        }

        function getMovieTodos($value){
            // echo var_dump($GLOBALS['client']->__getFunctions ());
            $filme = $GLOBALS['client']->__soapCall("listAll",array("parameters"=>array("value" => "Sim")));

            imprime($filme);
        }

        function imprime($filme){
            if (isset($filme)) {
                 foreach ($filme as $key => $value) {
                    echo "<table>
                              <tr>
                                <th>Titulo</th>
                                <th>Ano Lancamento</th>
                                <th>Diretor</th>
                                <th>Genero</th>
                                <th>Estudio</th>
                              </tr>";
                    json_encode($value);
                    if(is_array($value)){
                        foreach ($value as $key => $value2) {
                        echo "
                              <tr>
                                <td>".$value2->titulo."</td>
                                <td>".$value2->anoLancamento."</td>
                                <td>".$value2->diretor."</td>
                                <td>".$value2->genero."</td>
                                <td>".$value2->estudio."</td>
                              </tr>
                            ";
                        }
                    }else{
                        echo "
                              <tr>
                                <td>".$value->titulo."</td>
                                <td>".$value->anoLancamento."</td>
                                <td>".$value->diretor."</td>
                                <td>".$value->genero."</td>
                                <td>".$value->estudio."</td>
                              </tr>
                            ";
                    }
                    echo "</table>";
                }
            }else{
                echo "string";
            }
        }

        ?>
