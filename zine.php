<?php

if ($_POST['test'] != 'value1'){
$texto = htmlspecialchars($_POST['texto']); $cols = $_POST['cols']; $sepp = $_POST['sepp']; $titu = htmlspecialchars($_POST['titu']); $subt= $_POST['subt'];//datos
}
if ($_POST['test'] == 'value1'){
$texto = $_POST['texto']; $cols = $_POST['cols']; $sepp = $_POST['sepp']; $titu = $_POST['titu']; //datos para txt. (no quita html)
}


if ($_POST['test'] == 'value1'){
	$archivo = substr($titu, 0, 8);
	header("Content-type: text/plain; charset= BASIC_LATIN"); header("Content-Disposition: attachment; filename={$archivo}.txt"); // si está checked, descarga el archivo
}

$barra=str_repeat($sepp, $cols); //crea barra

if ($_POST['cols'] < '34'){
echo " <div style='color:#0000FF; background-color:#ffffcc'><br> ANCHO MÍNIMO SUGERIDO = 34 <hr></div><br>";
}

if ($_POST['test'] != 'value1'){
echo "<pre>";
}


echo $barra."\n".$sepp.str_repeat(" ", ($cols-2)).$sepp."\n".$sepp." ".$titu.str_repeat(" ", ($cols-strlen($titu)-3)).$sepp."\n";
if ($_POST['subt'] != ''){
echo $sepp." ".str_repeat(" ", ($cols-strlen($subt)-4)).$subt." ".$sepp."\n";
}
if ($_POST['subt'] == ''){
echo $sepp.str_repeat(" ", ($cols-2)).$sepp."\n";
}
echo $sepp.str_repeat(" ", ($cols-2)).$sepp."\n".$barra."\n\n"; //titulo
$zine = explode("\n", $texto);
for ($i = 0; $i < count($zine); $i++)
{
	$textonuevo1 = wordwrap($zine[$i], $cols, "\n"); //corta texto
	$sepa="\n".str_repeat($sepp, ($cols-strlen($i)-2))." p".($i)."\n"; //barra con numero de linea
	$textonuevo2 = str_replace('&quot;','"',$textonuevo1); //barra con numero de linea
	$textonuevo2 = str_replace("-=-=-",$sepa,$textonuevo1); //barra con numero de linea
	$textonuevo2 = str_replace("=====",$barra,$textonuevo2); //barra con numero de linea
	$textonuevo2 = str_replace("= = =",(str_repeat($sepp." ", $cols/2)),$textonuevo2); //barra con numero de linea
	echo $textonuevo2; // se imprime! :D
}

echo "\n\n".$barra."\n".$titu."\ncreado con zineGen1 - roll.nl.eu.org/zg1";
if ($_POST['test'] != 'value1'){
echo "</pre>";
}

?>