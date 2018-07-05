<?php

    class Filme {

        public $titulo;
        public $diretor;
        public $estudio;
        public $genero;
        public $ano;
    }

  $client = new SoapClient("http://localhost:8080/Movies/WebMovies?WSDL");

    if (isset($_POST['ano']) && isset($_POST['genero'])
        && isset($_POST['estudio']) && isset($_POST['diretor']) && isset($_POST['titulo'])){

            $titulo = $_POST['titulo'];
            $diretor = $_POST['diretor'];
            $estudio = $_POST['estudio'];
            $genero = $_POST['genero'];
            $ano = $_POST['ano'];
            echo newMovie($titulo, $diretor, $estudio, $genero, $ano);
        }

    function newMovie($titulo, $diretor, $estudio, $genero, $ano){
    try {
     $filme = $GLOBALS['client']->__soapCall("newMovie",
    array("parameters"=>array("titulo" => $titulo, "diretor" => $diretor,
          "estudio" => $estudio, "genero" => $genero, "lancamento" => $ano)));   
    } catch (Exception $e) {
        echo "<br><h1>".$e->getMessage()."</h1><br>";
    }    

    if (isset($filme)) {
        echo "<br><h1>Filme Cadastrato Com Sucesso</h1><br>";
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

    ?>