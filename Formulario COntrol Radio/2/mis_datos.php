<?php
// Recuperaci�n de datos y almacenamiento en variables.
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$sistema = $_POST['sistema'];
$futbol = $_POST['futbol'];
$aficiones = $_POST['aficiones'];
$edadsig = $edad + 1;
echo "Hola <b>". $nombre. "</b> que tal est�s<BR>\n";
echo "Eres ". $sexo. "<BR>\n";
echo "El pr�ximo a�o vas a cumplir ". $edadsig. " A�os<BR>\n";
echo "Tu sistema favorito es ". $sistema. "<BR>\n";
if ($futbol)
{
 echo "Te gusta el futbol <BR>\n";
}
else
{
 echo "NO te gusta el futbol <BR>\n";
}
if ($aficiones != "")
{
 echo "Tus aficiones son: <BR>\n";
 echo $aficiones;
}
else
{
 echo "NO tienes aficiones <BR>\n";
}
?>