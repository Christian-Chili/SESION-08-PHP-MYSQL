<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Venta de pasajes</title>
  </head>
  <body>
    <h1>Venta de pasajes</h1>
    <hr />
    <form action="validaInfo.php" method="post">
      <label for="txtnombre">Nombre</label>
      <input type="text" name="txtnombre" id="txtnombre" autocomplete="off"/>
      <br />
      <label for="txtapellido">Apellido</label>
      <input type="text" name="txtapellido" id="txtapellido" autocomplete="off"/>
      <br />
      <label for="fecha">Fecha nacimiento</label>
      <input type="date" name="fecha" id="fecha" />
      <br />
      <label for="origen">Lugar de origen</label>
      <select name="origen" id="origen">
        <option value="Peru" selected>Peru</option>
        <option value="Mexico">Mexico</option>
        <option value="Argentina">Argentina</option>
        <option value="España">España</option>
      </select>
      <br />
      <label for="destino">Lugar de destino</label>
      <select name="destino" id="destino">
        <option value="Peru">Peru</option>
        <option value="España" selected>España</option>
      </select>
      <input type="submit" value="Enviar">
    </form>
  </body>
</html>


<?php
$nombre=$_POST['txtnombre'];
$apellido=$_POST['txtapellido'];
$fecha = $_POST['fecha'];
$origen=$_POST['origen'];
$destino=$_POST['destino'];

$precio=120;
$año=explode('-',$fecha);
$edad=date("Y")-$año[0];

echo "<h1>Compra de pasaje de avion</h1><hr>";
echo "<h4>Datos de compra</h4>";
echo "Precio standar del boleto: <b> $precio  </b><br>";
echo "Nombre: $nombre $apellido <br>";
echo "Fecha nacimiento: $fecha <br>";
echo "Edad: $edad <br>";
echo "Lugar de origen: $origen <br>";
echo "Lugar de destino: $destino <br>";

if (date("Y") - $año[0] <= 2) {
	$precio=0;
}else if(date("Y") - $año[0]<=17){
	$precio=$precio*0.75;
}else{
	$precio=$precio;
}
echo "Total a pagar: <b>$ $precio <b/>";

?>
