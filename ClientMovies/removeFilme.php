<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cliente WebService SOAP</title>
  </head>
  <body>
    <h1>Cliente WS SOAP - Remover Filme</h1>


    <form action="" method="post">

      Filme: <input type="text" name="titulo">

      <button type="submit" name="cadastrar">Remover</button>

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

    function removeMovie($titulo){
    $filme = $GLOBALS['client']->__soapCall("removeMovie",
    array("parameters"=>array("titulo" => $titulo)));

    $JSON = json_encode($filme);

    print_r($JSON);

    }

    ?>

  </body>
</html>
