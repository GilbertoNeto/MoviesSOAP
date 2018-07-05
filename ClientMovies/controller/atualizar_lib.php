<?php

ini_set("soap.wsdl_cache_enabled", "0");

    class Filme {

        public $titulo;
        public $diretor;
        public $estudio;
        public $genero;
        public $ano;
    }

  $client = new SoapClient("http://localhost:8080/Movies/WebMovies?WSDL");

    if (isset($_POST['novoTitulo']) && isset($_POST['titulo'])){

            $titulo = $_POST['titulo'];
            $novoTitulo = $_POST['novoTitulo'];
            echo updateMovie($titulo, $novoTitulo);
        }

    if(isset($_GET['todos'])){
            echo getMovieTodos("Sim");
        }


    function updateMovie($titulo, $novoTitulo){
    try {
     $filme = $GLOBALS['client']->__soapCall("updateMovie",
    array("parameters"=>array("titulo" => $titulo, "novoTitulo" => $novoTitulo)));
    } catch (Exception $e) {
        echo "<br><h1>".$e->getMessage()."</h1><br>";
    }

    if (isset($filme)) {
        echo "<br><h1>Filme atualizado Com Sucesso</h1><br>";
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
            }

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
                          </tr><br>";
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
