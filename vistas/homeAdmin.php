<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registro de Frente</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">


<!--===============================================================================================-->

<script src="https://kit.fontawesome.com/de9ac8cf2a.js" crossorigin="anonymous"></script>
</head>
<body>
   
    
    <div class="limiter">

        <div class="container-login100">

            <div class="" style="background: white; border-radius: 12px; padding: 10px;">

                <div style="align-content:center;">
                     <?php 

                     $usuario = $_GET['usuario'];
 
                    echo "Bienvenido"." ".$usuario.", Revisa, acepta o rechaza los trámites de los frentes <br>";
                     ?>
                     <?php 
                    echo "No olvides: "."<a class='btn-light' href='../includes/logout.php' style='font-weight: bold;''>Cerrar Session</a>"." cuando termines"."<br>";
                     ?>

                </div>
                <br>

                   <input type="hidden" value="F1" name="codflujo">
                   <input type="hidden" value="P1" name="codproceso">

                     <?php 
                     include "motor.php";
                        
                    
                      ?>


                
            </div>


        </div>
            
    </div>
    
    

    


</body>
</html>


