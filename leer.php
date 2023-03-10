<?php
/*
    Ejemplo de lectura de CSV
    desde PHP
    Visita parzibyte.me/blog
*/
# La longitud máxima de la línea del CSV. Si no la sabes,
# ponla en 0 pero la lectura será un poco más lenta
$longitudDeLinea = 1000;
$delimitador = ","; # Separador de columnas
$caracterCircundante = '"'; # A veces los valores son encerrados entre comillas
$nombreArchivo = "https://www.sefin.gob.hn/download_file.php?download_file=/odata/egames/202212.csv"; #Ruta del archivo, en este caso está junto a este script
# Abrir el archivo
$gestor = fopen($nombreArchivo, "r");
if (!$gestor) {
    exit("No se puede abrir el archivo $nombreArchivo");
}

#  Comenzar a leer, $numeroDeFila es para llevar un índice
$numeroDeFila = 1;
while (($fila = fgetcsv($gestor, $longitudDeLinea, $delimitador, $caracterCircundante)) !== false) {

    if ($numeroDeFila === 1) {
        echo "Los encabezados son: ";
    }
    # Ahora $fila es un arreglo. Podríamos acceder al precio de compra en $fila[1]
    # porque los índices de los arreglos comienzan en 0
    foreach ($fila as $numeroDeColumna => $columna) {
        echo "En la columna $numeroDeColumna tenemos a $columna\n";
    }
    # Para separar la impresión
    echo "\n\n";
    # Aumentar el índice
    $numeroDeFila++;
}
# Al finar cerrar el gestor
fclose($gestor);
