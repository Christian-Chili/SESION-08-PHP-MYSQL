<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
      <div class="title">
        <h2>Formulario de inscripcion de usuarios</h2>
      </div>
      <form action="confirmarRegistro.php" method="post" class="grid-container">
        <div class="grid-item">Nombre completo</div>
        <div class="grid-item">
          <input type="text" name="txtnombre" id="txtnombre" />
        </div>
        <div class="grid-item">Direccion</div>
        <div class="grid-item">
          <textarea
            name="txtdireccion"
            id="txtdireccion"
            cols="20"
            rows="2"
          ></textarea>
        </div>
        <div class="grid-item">Correo electronico</div>
        <div class="grid-item"> <input type="text" name="txtcorreo" id="txtcorreo"> </div>
        <div class="grid-item">Contraseña</div>
        <div class="grid-item"><input type="password" name="txtpassword" id="txtpassword"></div>
        <div class="grid-item">Confirmar contraseña</div>
        <div class="grid-item"><input type="password" name="txtconfirmpassword" id="txtconfirmpassword"></div>
        <div class="grid-item">Fecha de nacimiento</div>
        <div class="grid-item">
            <select name="mes" id="mes"></select>
            <select name="dia" id="dia"></select>
            <input type="text" name="anio" id="anio">(yyyy)
        </div>
        <div class="grid-item">Sexo</div>
        <div class="grid-item" id="sexo">
          <input type="radio" name="sexo" id="hombre" value="Hombre">
          <label for="hombre">Hombre</label>
          <input type="radio" name="sexo" id="mujer" value="Mujer">
          <label for="mujer">Mujer</label>
        </div>
        <div class="grid-item">
          Por favor, elije los temas de interes
        </div>
        <div class="grid-item" id="intereses">
          <input type="checkbox" name="intereses[]" value="Ficcion" id="ficcion">
          <label for="ficcion">Ficcion</label>
          <input type="checkbox" name="intereses[]" value="Terror" id="terror">
          <label for="terror">Terror</label>
          <input type="checkbox" name="intereses[]" value="Accion" id="accion">
          <label for="accion">Accion</label>
          <input type="checkbox" name="intereses[]" value="Comedia" id="comedia">
          <label for="comedia">Comedia</label>
          <input type="checkbox" name="intereses[]" value="Suspenso" id="suspenso">
          <label for="suspenso">Suspenso</label>
        </div>
        <div class="grid-item">Selecciona tus aficiones</div>
        <div class="grid-item">
          <select name="aficiones[]" id="aficiones" multiple>
            <option value="deporteLibre">Deporte-aire-libre</option>
            <option value="musicaPop">Musica Pop</option>
            <option value="gaming">Gaming</option>
            <option value="futbol">Futbol</option>
          </select>
        </div>
        <div class="grid-item" id="formSubmit">
          <input type="submit" value="Enviar">
        </div>
      </form>
    </div>
    <script src="main.js"></script>
  </body>
</html>

*{
    padding: 0;
    margin: 0;
    color:rgb(206, 206, 206);
    font-family: Arial, Helvetica, sans-serif;
    box-sizing: border-box;
}
body{
    background-color: rgb(26, 26, 26);
    background-attachment: fixed;
}
.container{
    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.title{
    text-align: center;
}
.grid-container{
    width: 600px;
    height: 700px;
    background-color: rgb(41, 41, 41);
    border-radius: 10px;
    padding: 5px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: repeat(9,60px);
    grid-auto-rows: 1fr;
    gap:3px;
}
.grid-item{
    display: flex;
    align-items: center;
    background-color: rgb(63, 63, 63);
    padding: 5px;
}

.grid-item input,textarea,select,option{
    color:#000;
}

.grid-item #anio{
    width: 50px;
}
#sexo{
    display: flex;
    gap:10px;
}
#intereses{
    display: flex;
    flex-wrap: wrap;
    gap:15px;
}

#formSubmit{
    
    grid-column: 1 / 3;
}
#formSubmit input{
    margin:auto;
    width: 150px;
    height: 30px;
    background-color: rgb(115, 12, 184);
    color:white;
    border:none;
}

const mes = document.getElementById("mes");
const dia = document.getElementById("dia");

const mesesArr = [
  "Enero",
  "Febrero",
  "Marzo",
  "Abril",
  "Mayo",
  "Junio",
  "Agosto",
  "Septiembre",
  "Octubre",
  "Noviembre",
  "Diciembre",
];

window.onload = () => {
  let fragment1 = document.createDocumentFragment();
  
  for (let i = 0; i < 11; i++) {
    let option1 = document.createElement("option");
    option1.setAttribute("value", mesesArr[i]);
    option1.innerText = mesesArr[i];
    fragment1.appendChild(option1);
  }
  mes.appendChild(fragment1);

  let fragment2 = document.createDocumentFragment();
  for (let i = 1; i <= 31; i++) {
    let option2 = document.createElement("option");
    option2.setAttribute("value", i);
    option2.innerText = i;
    fragment2.appendChild(option2);
  }
  
  dia.appendChild(fragment2);
};

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
	if($_SERVER["REQUEST_METHOD"] == 'POST'){
		$nombre=$_POST['txtnombre'];
		$direccion=$_POST['txtdireccion'];
		$correo=$_POST['txtcorreo'];
		$password=$_POST['txtpassword'];
		$confirmPassword=$_POST['txtconfirmpassword'];
		$fecha=$_POST['dia']."/".$_POST['mes']."/".$_POST['anio'];
		$sexo=$_POST['sexo'];
		$intereses=$_POST['intereses'];
		$aficiones=$_POST['aficiones'];

		if($password!=$confirmPassword){
			echo "Las contraseñas coinciden<br>";
			echo "<a href='index.html'>Volver</a>";
		}else{
			
    ?>
    <div class="container">
        <form action="registrado.php" class="grid-container">
            <div class="grid-item">Nombre completo</div>
            <div class="grid-item">
                <?php echo $nombre ?>
            </div>
            <div class="grid-item">Direccion</div>
            <div class="grid-item">
                <?php echo $direccion ?>
            </div>
            <div class="grid-item">Correo electronico</div>
            <div class="grid-item">
                <?php echo $correo ?>
            </div>
            <div class="grid-item">Contraseña</div>
            <div class="grid-item">
                <?php echo $password ?>
            </div>
            <div class="grid-item">Fecha de nacimiento</div>
            <div class="grid-item">
                <?php
			echo $_POST['dia']."/".$_POST['mes']."/".$_POST['anio'];
                ?>
            </div>
            <div class="grid-item">Sexo</div>
            <div class="grid-item" id="sexo">
                <?php echo $sexo ?>
            </div>
            <div class="grid-item">
                Temas de interes
            </div>
            <div class="grid-item" id="intereses">
                <?php
			$interesesString=implode(',',$intereses); 
			echo $interesesString;
                ?>
            </div>
            <div class="grid-item">Selecciona tus aficiones</div>
            <div class="grid-item">
                <?php 
			$aficionesString=implode(',',$aficiones);
			echo $aficionesString;
                ?>
            </div>
            <div class="grid-item" id="formSubmit">
                <input type="submit" value="Confirmar registro">
            </div>
        </form>
    </div>
    <?php 
		}
	}
    ?>
</body>

</html>
<?php
echo "<h1> Usuario registrado con exito </h1>";
?>
