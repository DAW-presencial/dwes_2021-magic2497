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



    session_start();

    if (isset($_POST['submit'])) { //Validamos los datos 
        $nuevo_nombre = filter_input(INPUT_POST, 'nombre');
        $nuevo_telefono = filter_input(INPUT_POST, 'telefono');
        if (empty($nuevo_nombre)) { //si no se envia nombre mandara un error
            echo " <p class='error'>Debes introducir un nombre primero</p><br />";
        } elseif (empty($nuevo_telefono)) {
            unset($_SESSION["agenda"][$nuevo_nombre]);
        } else {

            $_SESSION["agenda"][$nuevo_nombre] = $nuevo_telefono;
        }
    }

    if (isset($_POST['borrar'])) {
        borrar();
    }



    ?>
    <!--Creamos el formulario de la agenda-->
    <div class="contactos">


        <h2>Contactos</h2>

        <form method="post">
            <!--Como no tenemos una base de datos almacenamos todos los contactos con inputs ocultos que se van a generar a medida que que enviemos el formulario-->
            <div>

                <label style="padding-left: 3px">Nombre:<input type="text" name="nombre" /></label><br /><br />
                <label>Teléfono:<input type="number" name="telefono" /></label><br /><br />
                <input type="submit" name='submit' value="Enviar" /><br />
                <input type="submit" name='borrar' value="borrar" /><br />
            </div>
        </form>
        <br />
    </div>


    <!--Aqui pintamos los contactos almacenados en $agenda si no hay contactos generara un mensaje para avisar de que esta vacio-->
    <div class="agenda">
        <h2 style="padding-left: 21px">Agenda</h2>
        <?php
        if (isset($_SESSION['agenda'])) {
            echo "<ul>";
            foreach ($_SESSION['agenda'] as $nombre => $telefono) {
                echo "<li>" . $nombre . ': ' . $telefono . "</li>";
            }
            echo "</ul>";
        }

        function borrar()
        {
            unset($_SESSION["agenda"]);
        }

        ?>
    </div>


</body>

</html>