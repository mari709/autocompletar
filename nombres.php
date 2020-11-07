<?php
$link = mysqli_connect( "localhost", "root", "")
or die ("no se ha podido conectar");
mysqli_select_db($link, "contactos")
or die("Error al tratar de selecccionar esta base");

$letras = $_GET['q'];
$datos = array();
$enviar = array();

$consultasql = "select nombre from contactos where nombre like '%".$letras."%' group by nombre";

$consulta = mysqli_query($link,$consultasql);




while($row = mysqli_fetch_array($consulta)){
$datos[] = $row['nombre'];
}


$tamaño = sizeof($datos);


if($tamaño<=50)
{$enviar = $datos;}
if($tamaño>50)
{$enviar[]="Hay mas de 50 registros";}

if($tamaño==0)
{$enviar[] = "No hay registos";}






/*
else
{unset($datos)
$datos = array();
$datos[] = 'Redefinir busqueda';
echo json_encode(datos);
}
*/



echo json_encode($enviar);









