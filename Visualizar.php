<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>MostrarDatos</TITLE>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
<style>

    body {
        background-color: yellow;
        background-image: url('imgs/ipikachu.jpg');
        background-size: 80%;
        background-position: center;
        background-repeat: no-repeat;
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
    .ppal{
        position: absolute;
        width: 250px;
        height: 330px;
        background-color: rgba(255,255,255,0.3);
        left: 650px;
        top: 180px;
        border: 3px solid red;
    }

    .texto{
        position: absolute;
        top: 30px;
        left: 20px;
        font-size: 22px;
    }

    .enlaces{
        position: absolute;
        left: 648px;
        top: 600px;
    }

</style>
</HEAD>

<BODY>
<h1 align=center>Introduzca el nombre del pokemon que le interese consultar</h1>

<div class="conexion"><?php
    include 'ConexionComprobador.php';
?>
</div>
<br>

<form align="center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="pname">Nombre del Pokémon:</label>
    <input type="text" name="pname" id="pname">
    <input type="submit" value="Consultar">
</form>

<div class="ppal">
    <div class="texto">
        <?php
            $nombre_pokemon = $_POST['pname'];
            $sql="SELECT eb.numero_pokedex ,eb.ps ,eb.ataque ,eb.defensa ,eb.especial ,eb.velocidad ,p.nombre 
            from estadisticas_base eb ,pokemon p 
            where eb.numero_pokedex =p.numero_pokedex 
            AND p.nombre = '". $nombre_pokemon . "'";

            $resultado=mysqli_query($mysqli,$sql);
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo " Nombre:". $fila["nombre"]."<br>"."NumPokedex:". $fila["numero_pokedex"]."<br>"."Ps: " . $fila["ps"] ."<br>". " Ataque: " . $fila["ataque"] ."<br>"."Defensa:". $fila["defensa"] .
                "<br>"." Especial:". $fila["especial"] ."<br>"." Velocidad:". $fila["velocidad"] ."<br>" ;
            }
            include'cerrarDB.php';
        ?>
    </div>
</div>

<div class="enlaces">
    <table><tr><td>¿Sin ideas? Aqui estan todos los Pokemons</td><td><a href="Todos.php"><button>Ir</button></a></td></tr></table>
</div>

<div class="volver">
    <table><tr><td>Volver al Inicio  </td><td><a href="P1.php"><button>VOLVER</button></a></td></tr></table>
</div>
</BODY>
</HTML>
