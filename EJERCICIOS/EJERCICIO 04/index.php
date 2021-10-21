<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carga archivos</title>
  </head>
  <body>
    <form enctype="multipart/form-data" action="subirArchivos.php" method="POST">
      <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
      Archivos a subir: <input name="archivo" type="file"/>
      <select name="carpeta" id="carpeta">
          <option value="Desarrollo">Desarrollo Web</option>
          <option value="Bd">Base de datos</option>
          <option value="Estadistica">Estadistica</option>
      </select>
      <input type="submit" value="Enviar archivo" />
    </form>
  </body>
</html>

<?php
$carpeta=$_POST['carpeta'];
$dir_subida = 'C:\\xampp\\htdocs\\ejercicios-propuestos\\carga-archivos\\Upload\\'.$carpeta.'\\';
$fichero_subido = $dir_subida . basename($_FILES['archivo']['name']);

echo $fichero_subido;
echo '<pre>';
if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
    echo "fichero es válido y se subió con éxito.\n";
} else {
    echo "rror al subir el archivo\n";
}
print "</pre>";
$dir_archivos='C:\\xampp\\htdocs\\ejercicios-propuestos\\carga-archivos\\Upload\\';
mostrarDirectorios($dir_archivos,$carpeta);

function mostrarDirectorios($ruta,$c){
    if (is_dir($ruta)){
        $gestor = opendir($ruta);
        echo "<ul>";
        while (($archivo = readdir($gestor)) !== false)  {
            $ruta_completa = $ruta . "/" . $archivo;
          
            if ($archivo != "." && $archivo != "..") {
             
                if (is_dir($ruta_completa)) {
                    echo "<li>" . $archivo . "</li>";
                    mostrarDirectorios($ruta_completa,$c);
                } else {
                    echo "<li><a href='download.php?carpeta=$c&file=$archivo'>" . $archivo . "</a></li>";
                }
            }
        }
        closedir($gestor);
        echo "</ul>";
    } else {
        echo "Ruta de directorio NO valida<br/>";
    }
}

?>

<?php
if(!empty($_GET['file'])){
    $carpeta = $_GET['carpeta'];
    $fileName = basename($_GET['file']);
    $filePath = 'C:\\xampp\\htdocs\\ejercicios-propuestos\\carga-archivos\\Upload\\'.$carpeta.'\\'.$fileName;
    if(!empty($fileName) && file_exists($filePath)){
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        readfile($filePath);
        exit;
    }else{
        echo 'The file does not exist.';
    }
}

