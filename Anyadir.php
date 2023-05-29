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
        top : 0;
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
<div class=todo>
    <h1 align=center>Añada nuevos Pokemons</h1>
    <table class="tabla">
        <form id="insertar" name="insertar" method="get" action="insertarPokemon.php">
            <th colspan=2 style="text-align:center">Crear Pokemon</th>
            <tr>
            <td>Número pokedex</td>
            <td><input required type="number" name="numero_pokedex" id="numero_pokedex" value="<?php echo $siguienteNumero ?>" ></td>
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
            <td><input required type="number" name="altura" min="0" max="100" step="0.1" id="altura"></td>
            </tr>
            <td><input type="submit" value='Añadir'>
        </form>
    </table>
</div>
<div class="volver">
    <table><tr><td><font color="white">Volver al Inicio</font></td><td><a href="P1.php"><button>VOLVER</button></a></td><tr><table>
</div>
</BODY>
</HTML>