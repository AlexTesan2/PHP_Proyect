<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Eliminar</TITLE>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
<style>

    body {
        background-image: url('imgs/imiedo.jpg');
        /*background-image: url('imgs/ipokeagua.jpg');*/
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
    }


</style>
</HEAD>

<BODY>
<div class="conexion">
    <?php
        include 'ConexionComprobador.php';
    ?>
</div>
<div class="conexion">
    <?php
        include 'ConexionComprobador.php';
    ?>
</div>


<?php
    $num_pokemon = $_POST['numPoke'];
    $sql="DELETE *
    from pokemon p 
    where p.numero_pokedex = '". $numPoke . "'";

    include "cerrarDB.php";
?>

<div class=todo>
    <h1 align=center>Elimine Pokemons</h1>

    <form align="center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="numPoke">Número del Pokémon:</label>
        <input type="number" name="numPoke" id="numPoke">
        <input type="submit" value="ELIMINAR">
    </form>

</div>
<div class="volver">
    <table><tr><td><font color="white">Volver al Inicio</font></td><td><a href="P1.php"><button>VOLVER</button></a></td><tr><table>
</div>

</BODY>
</HTML>