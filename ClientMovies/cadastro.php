<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cliente WebService SOAP</title>
  </head>
  <body>
    <h1>Cliente WS SOAP - Cadastro de Filmes</h1>


    <form action="" method="post">

      Filme: <input type="text" name="titulo">
      Diretor: <input type="text" name="diretor">
      Estudio: <input type="text" name="estudio">
      Genero: <input type="text" name="genero">
      Ano de Lançamento: <input type="text" name="ano">

      <button type="submit" name="cadastrar">Cadastrar</button>

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
    $filme = $GLOBALS['client']->__soapCall("newMovie",
    array("parameters"=>array("titulo" => $titulo, "diretor" => $diretor,
          "estudio" => $estudio, "genero" => $genero, "lancamento" => $ano)));

    $JSON = json_encode($filme);

    print_r($JSON);

    }

    ?>

  </body>
</html>
