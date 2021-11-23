<!doctype html>

<html>

<head>

    <title>Agenda de contactos</title>
    <!--ponemos css para tener el formulario al lado de la lista de contactos-->
    <style>
        body {
            font-family: Arial;
        }

        .agenda {
            width: 300px;
            float: left;
            height: 300px;

        }

        .contactos {
            width: 300px;
            float: left;
            height: 350px;

        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php


    function borrar()
    {
        // unset($_SESSION["agenda"]);
        echo "holaaaaa";
    }
    if (isset($_GET['borrar'])) {
        borrar();
    }

    ?>

    <!--Creamos el formulario de la agenda-->
    <div class="contactos">


        <h2>Contactos</h2>


        <a href="http://localhost/proyectos-php/tests/agenda/tests_sesion.php?borrar=true">Borrar</a>

        <br />
    </div>




    </div>


</body>

</html>