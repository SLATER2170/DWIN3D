<?php
//$datos = array();

function elapi($ruta)
{
    $url = "http://173.249.49.169:88/api/test/consulta/";
    $res = $url . $ruta;
    return $res;
}

$lacedula;

if (isset($_POST['btnSend'])) {
    $lacedula = $_POST['cedula'];
    $lacedula = trim($lacedula, " ");

    //echo $lacedula;
}

if (empty($lacedula)) {

    $datos = "dasd";

    $datos = json_decode($datos, null);
} else {

    $direx = elapi($lacedula);
    $json = file_get_contents($direx);
    $datos = json_decode($json, true);
    //var_dump ($datos);
    //var_dump($json);
}

if ($datos['Ok'] == false) {
    $datos = "dasd";
    $datos = json_decode($datos, null);

    //echo "lalal";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario de contacto</title>

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/font-awesome.css">

    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>


    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <link rel="stylesheet" href="estilos.css">



</head>

<body>

    <!-- Navigation -->
   <?php
   
   include 'plantillas/nav.php';
   ?>


    <section class="form_wrap">

        <section class="cantact_info">
            <img src="<?= $datos['Foto']; ?>" alt="card image cap" style="max-height:200px;max-width:200px">
        </section>

        <form action="" class="form_contact" method="post">
            <!--  <input type="text" id="cedula" name="cedula">

           #region <input  value="BUSCAR" >-->
           
            <button type="button" id="btn-abrir-popup" name="btn-abrir-popup" class="btn btn-info" style="margin-left:40%; ">Buscar</button>
            
            <div class="user_info">
                <br><br>
                <label for="names">Cedula: <?= $datos['Cedula']; ?></label>
                <!-- <input type="text" id="names">-->
                <br>
                <label for="phone">Nombre: <?= $datos['Nombres']; ?></label>
                <br>

                <label for="email">Apellidos: <?= $datos['Apellido1'] ?> <?= $datos['Apellido2']; ?> </label>
                <br>

                <label for="mensaje">Fecha Nacimiento: <?= $datos['FechaNacimiento']; ?> </label>
                <br>


            </div>
            <div class="overlay" id="overlay">

			<div class="popup" id="popup">
				<a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
				<h3>Busca en el padron</h3>
				<h4>Escribe una cedula</h4>
				
					<div class="contenedor-inputs">
						<input type="text" placeholder="Cedula" id="cedula" name="cedula">
					</div>
					<input type="submit" class="btn-submit" value="Consultar" name="btnSend">
				
            </div>
            
		</div>
        </form> 
    </section>

    

    <?php
    include 'plantillas/end.php'; 
    ?>

<script src="popup.js"></script>

</body>

</html>