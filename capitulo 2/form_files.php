<!doctype html>

<html>

<head>

    <title>archivos</title>
    <!--ponemos css para tener el formulario al lado de la lista de contactos-->
    <style>
        body {
            font-family: Arial;
        }

        .agenda {
            float: left;

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




    if (isset($_POST['submit'])) {
    }



    ?>
    <!--Creamos el formulario de la agenda-->
    <div class="contactos">


        <h2>Contactos</h2>

        <form method="post" enctype="multipart/form-data">
            <!--Como no tenemos una base de datos almacenamos todos los contactos con inputs ocultos que se van a generar a medida que que enviemos el formulario-->
            <div>

                <label>Nombre:</label>
                <input type="file" name="archivo1" />
                <label>Nombre:</label>
                <input type="file" name="archivo2" />



                <input type="submit" name='submit' value="Enviar" /><br />


            </div>
        </form>
        <br />
    </div>


    <!--Aqui pintamos los contactos almacenados en $agenda si no hay contactos generara un mensaje para avisar de que esta vacio-->
    <div class="agenda">

        <?php

        echo '<pre>';
        var_dump($_FILES);
        echo '</pre>';





        if (isset($_POST['submit'])) {
            foreach ($_FILES as $key) {

                $name = $_FILES[$key]["name"];
                $tmp_name = $_FILES[$key]["tmp_name"];

                move_uploaded_file($tmp_name, 'C:\xampp\tmp\del/' . $name);
            }
        }
        ?>
    </div>


</body>

</html>