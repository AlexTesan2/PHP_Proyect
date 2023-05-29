<HTML>
<HEAD>
<TITLE>EjemplosDePokemons</TITLE>
<style>
    body {
        background-color: #375F65;
        background-image: url('imgs/ipokeagua.jpg');
        background-size: 60%;
        background-position: left;
        background-repeat: no-repeat;
    }

    .volver {
        position: absolute;
        bottom: 0;
        right: 0;
        margin: 10px;
    }

    .conexion {
        position: absolute;
        top: 0;
        left: 0;
        margin: 5px;
    }

    .ppal {
        position: absolute;
        width: 450px;
        height: 580px;
        background-color: rgba(0, 0, 0, 0.5);
        left: 950px;
        top: 90px;
        border: 3px solid red;
        overflow-y: scroll;
    }

    .texto {
        position: absolute;
        top: 30px;
        left: 20px;
        font-size: 22px;
        color: white;
    }

</style>
</HEAD>

<BODY>
<h1 align=center style="color: white;">Nombres de Pokemons</h1>

<div class="conexion">
    <?php
    include 'ConexionComprobador.php';
    ?>
</div>
<br>

<div class="ppal">
    <div class="texto">
        <?php

        // Obtener los parámetros de orden
        $ordenNumero = isset($_GET['ordenNumero']) ? $_GET['ordenNumero'] : 'asc';
        $ordenNombre = isset($_GET['ordenNombre']) ? $_GET['ordenNombre'] : 'asc';

        // Construir la consulta SQL con los órdenes especificados
        $sql = "SELECT numero_pokedex, nombre FROM pokemon ORDER BY numero_pokedex $ordenNumero, nombre $ordenNombre";
        $resultado = mysqli_query($mysqli, $sql);

        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo $fila["nombre"] . "&nbsp;&nbsp;&nbsp; " . $fila["numero_pokedex"] . "<br><br>";
        }

        include 'cerrarDB.php';
        ?>
    </div>
</div>

<div class="volver">
    <table>
        <tr>
            <td>Volver</td>
            <td><a href="Visualizar.php"><button>VOLVER</button></a></td>
        </tr>
    </table>
</div>


<div style="position: absolute; bottom: 30px; left: 950px;">
    <form action="" method="GET">
        <input type="hidden" name="ordenNumero" value="<?php echo $ordenNumero === 'asc' ? 'desc' : 'asc'; ?>">
        <input type="submit" value="Cambiar Orden por Número">
    </form>
</div>


<div style="position: absolute; bottom: 30px; left: 1150px;">
    <form action="" method="GET">
        <input type="hidden" name="ordenNombre" value="<?php echo $ordenNombre === 'asc' ? 'desc' : 'asc'; ?>">
        <input type="submit" value="Cambiar Orden por Nombre">
    </form>
</div>

</BODY>
</HTML>