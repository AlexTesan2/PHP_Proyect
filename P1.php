<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Index</TITLE>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
<style>

    .titulo {
        position: absolute;
        top: 5px; 
        left: 500px;
        width: 500px;
        height: auto;
    }

    .tabla {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 800px; 
    }
    .boton{
        width: 5px; 
        background-color: black;
    }

    .tx{
        width: 35%;
        background-color: black;
        color: white;
        font-size: 37px;
    }

    body {
        background-image: url('imgs/isiluetas.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    table {
        border-collapse: collapse;
        width: 83%;
        color: white;
    }

    td {
        text-align: left;
        padding: 16px;
        width: 800px; 
    }
</style>
</HEAD>

<BODY>
<h1 align=center></h1>
<?php
    $imTitulo = 'imgs/ilogo.jpg';
    echo '<img src="'.$imTitulo.'" class="titulo">';
?>

<div class="tabla">
    <table border="3" align=center>
        <td><div class="tx">Visualizar Pokemons</div></td>
        <td class="boton"><a href="Visualizar.php"><button>Ir</button></a></td>
        </tr>
        <tr>
        <td><div class="tx">Insertar nuevos Pokemons</div></td>
        <td class="boton"><a href="Anyadir.php"><button>Ir</button></a></td>
        </tr>
        <tr>
        <td><div class="tx">Eliminar Pokemons</div></td>
        <td class="boton"><a href="Eliminar.php"><button>Ir</button></a></td>
        </tr>
    </table>
</div>

</BODY>
</HTML>