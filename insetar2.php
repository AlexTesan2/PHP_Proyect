<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>insertarNuevosP</TITLE>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
<style>
    body {
        background-image: url('imgs/ipokeballs.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .todo{
        margin-left: auto;
        margin-right: auto;
        background-color: rgba(255,255,255,0.8);
        width: 900px;
        height: 720px;
    }

    .volver{
        position: absolute;
        bottom: 0;
        right: 0;
        margin: 10px;
    }

    .conexion{
        position: absolute;
        top: 0;
        left: 0;
        margin: 5px;
        color: white;
    }
</style>
</HEAD>
<BODY>
<div class="conexion">
    <?php
        include 'ConexionComprobador.php';
    ?>

    <?php
        $sql = 'SELECT numero_pokedex FROM pokemon ORDER BY numero_pokedex DESC LIMIT 1';
        $result = mysqli_query($mysqli, $sql);
        $fila = mysqli_fetch_assoc($result);
        $siguienteNumero = $fila['numero_pokedex'] + 1;
        include "cerrarDB.php";
    ?>
</div>
<div class="todo">
    <h1 align="center">Añadir nuevos Pokémons</h1>
    <?php
        include 'ConexionComprobador.php';

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $numero_pokedex = htmlentities($_GET['numero_pokedex']);
            $nombre = htmlentities($_GET['nombre']);
            $altura = htmlentities($_GET['altura']);
            $peso = htmlentities($_GET['peso']);

            if ($numero_pokedex === "" || $numero_pokedex < 0 ) {
                echo "<br><br><h2>El número Pokedex no puede estar vacío ni ser negativo</h2>";
                echo "<h3>Redirigiendo al formulario de creación...</h3>";
                header("refresh:2;url=FormularioInsertar.php");
                exit;
            }

            if (!isset($nombre) || $nombre === "") {
                echo "<br><br><h2>El nombre no puede estar vacío</h2>";
                echo "<h3>Redirigiendo al formulario de creación...</h3>";
                header("refresh:2;url=FormularioInsertar.php");
                exit;
            }

            if ($peso < 0 || $peso > 1000) {
                echo "<br><br><h2>El peso debe estar entre 0 y 1000</h2>";
                echo "<h3>Redirigiendo al formulario de creación...</h3>";
                header("refresh:2;url=FormularioInsertar.php");
                exit;
            }

            if ($altura < 0 || $altura > 100) {
                echo "<br><br><h2>La altura debe estar entre 0 y 100</h2>";
                echo "<h3>Redirigiendo al formulario de creación...</h3>";
                header("refresh:2;url=FormularioInsertar.php");
                exit;
            }

            $sql = 'INSERT INTO pokemon VALUES(' . $numero_pokedex . ', "' . $nombre . '", ' . $peso . ', ' . $altura . ')';
            $resultado = mysqli_query($mysqli, $sql);

            if ($resultado) {
                echo "<h2>Creación correcta</h2>";
                echo "<img src='imagenes/gotcha.png'>";
                echo "<h3>Redirigiendo a tu nuevo Pokémon...</h3>";

                $sql2 = 'SELECT MAX(id) FROM Creados';
                $resultado2 = mysqli_query($mysqli, $sql2);
                $id = mysqli_fetch_array($resultado2);
                $sql3 = "UPDATE Creados SET ip_cliente = '" . $_SERVER['REMOTE_ADDR'] . "', user_agent = '" . $_SERVER['HTTP_USER_AGENT'] . "' WHERE id = " . $id[0];
                $resultado3 = mysqli_query($mysqli, $sql3);

                if ($resultado3) {
                    echo "<h3>Se ha registrado la IP del creador</h3>";
                } else {
                    echo "<h3>No se ha registrado la IP del creador</h3>";
                }

                header("refresh:2;url=FormularioEditar.php?numero_pokedex=" . $numero_pokedex);
            } else {
                echo "<h2>Creación incorrecta</h2>";
            }
        }

        include "cerrarDB.php";
    ?>
    <table class="tabla">
        <form id="insertar" name="insertar" method="get" action="insertarPokemon.php">
            <th colspan="2" style="text-align:center">Crear Pokémon</th>
            <tr>
                <td>Número Pokedex</td>
                <td><input required type="number" name="numero_pokedex" id="numero_pokedex" value="<?php echo $siguienteNumero; ?>"></td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><input required type="text" name="nombre" id="nombre" autofocus></td>
            </tr>
            <tr>
                <td>Peso</td>
                <td><input required type="number" min="0" max="1000" step="0.1" name="peso" id="peso"></td>
            </tr>
            <tr>
                <td>Altura</td>
                <td><input required type="number" min="0" max="100" step="0.1" name="altura" id="altura"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Añadir"></td>
            </tr>
        </form>
    </table>
</div>
<div class="volver">
    <table>
        <tr>
            <td><font color="white">Volver al Inicio</font></td>
            <td><a href="P1.php"><button>VOLVER</button></a></td>
        </tr>
    </table>
</div>
</BODY>
</HTML>