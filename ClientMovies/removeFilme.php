<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <meta charset="utf-8">
    <title>Cliente WebService SOAP</title>
  </head>
  <body>
    <ul>
  <li><a class="active" href="index">Pesquisar Filmes</a></li>  
  <li><a href="cadastro">Cadastrar Filme</a></li>
  <li><a href="atualizar">Atualizar Filme</a></li>
</ul>
    <h1>Cliente WS SOAP - Remover Filme</h1>


    <form action="" method="post">

      Filme: <input type="text" name="titulo">

      <button type="submit" name="cadastrar">Remover</button>

    </form>


    <br>
    <form action="" method="get">
        Deseja ver todos os filmes?
        <button type="submit" name="todos" value="sim">Sim</button>
    </form>

    <?php

    class Filme {

        public $titulo;
        public $diretor;
        public $estudio;
        public $genero;
        public $ano;
    }

  $client = new SoapClient("http://localhost:8080/Movies/WebMovies?WSDL");

    if ( isset($_POST['titulo'])){

            $titulo = $_POST['titulo'];

            echo removeMovie($titulo);
        }

    if(isset($_GET['todos'])){
            echo getMovieTodos("Sim");
        }

    function removeMovie($titulo){

      try {
       $filme = $GLOBALS['client']->__soapCall("removeMovie",
        array("parameters"=>array("titulo" => $titulo)));
      } catch (Exception $e) {
        echo "<br><h1>".$e->getMessage()."</h1><br>";
      }

    if (isset($filme)) {
        echo "<br><h1>Filme Removido Com Sucesso</h1><br>";
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

  </body>
</html>
