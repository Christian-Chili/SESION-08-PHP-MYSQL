<?php
$valor = rand(1,100);
echo "El Valor sorteado es: $valor<br>";
if($valor <=9)
{
    echo "Tiene un digito";
}
else
{
    if($valor < 100)
    {
        echo "Tiene 2 digitos";
    }
    else
    {
        echo "Tiene 3 digitos";
    }
}
?>