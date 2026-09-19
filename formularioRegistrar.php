<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrar Persona</title>

</head>

<body>

    <h1>REGISTRAR PERSONA</h1>

    <hr style="border: 0; border-top: 2px solid black;">

    <form action="registrar.php" method="POST" class="formulario">

        <!-- Nombre -->

        <div class="campo">

            <label for="nombre">
                Nombre:
            </label>

            <input type="text"
                   id="nombre"
                   name="nombre"
                   required
                   maxlength="50"
                   placeholder="Ingrese el nombre">

        </div>


       

        <div class="campo">

            <label for="direccion">
                Direccion:
            </label>

            <input type="text"
                   id="direccion"
                   name="direccion"
                   required
                   maxlength="200"
                   placeholder="Ingrese la direccion">

        </div>


       

        <div class="campo">

            <label for="telefono">
                Telefono:
            </label>

            <input type="tel"
                   id="telefono"
                   name="telefono"
                   required
                   maxlength="20"
                   placeholder="Ingrese el telefono">

        </div>


       

        <div class="acciones">

            <button type="submit" class="btn-registrar">
                Registrar
            </button>

            <a href="index.php" class="btn-cancelar">
                Cancelar
            </a>

        </div>

    </form>

</body>

</html>


<style>

    h1 {
        text-align: center;
    }

    .formulario {

        width: 500px;

        margin: 30px auto;

        padding: 25px;

        border: 1px solid #ddd;

        border-radius: 5px;

    }

    .campo {

        margin-bottom: 18px;

    }

    .campo label {

        display: block;

        margin-bottom: 6px;

        font-weight: bold;

    }

    .campo input {

        width: 100%;

        padding: 10px;

        box-sizing: border-box;

        border: 1px solid #ccc;

        border-radius: 4px;

    }

    .campo input:focus {

        border-color: #3498db;

        outline: none;

    }

    .acciones {

        margin-top: 20px;

        text-align: center;

    }

    .btn-registrar {

        background-color: green;

        color: white;

        padding: 8px 15px;

        border: none;

        border-radius: 3px;

        cursor: pointer;

    }

    .btn-cancelar {

        background-color: grey;

        color: white;

        padding: 8px 15px;

        margin-left: 10px;

        border-radius: 3px;

        text-decoration: none;

    }

</style>
