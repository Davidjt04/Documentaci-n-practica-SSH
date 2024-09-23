<?php
//debo de mirar si despues del ? se pasan los datos correctamente y si no sacar un error 
//hace un array de errores 
//comprobar con if si estan bien o no el nombre y el ap 
//si no hay errores no los saco y saco un 200 si los tengo sacarlos 

// echo  "hola caracola";

//Declaro las variables 
$nombre = isset($_GET["nombre"]) ? $_GET["nombre"] : ""; //utilizo un condicional  condicional ? si es verdad : si es mentira
$ap = isset($_GET["ap"]) ? $_GET["ap"] : "";
$errores = [];
//La función isset() en PHP devuelve true si una variable está definida y no es null, incluso si el valor es una cadena vacía ("")
//empty() en PHP devuelve true si una variable está vacía, 

//if count errores hara que se recorra el array errores para ver si hay errrores si count 0 no hay errores si es mayor a 0 hay errores

//que esten los dos bien
if (!empty($_GET["nombre"]) && !empty($_GET["ap"])) {
    //Modificamos el status según sea pertinenete 
    http_response_code(200);
    //se muestra el nombre y el apellido en pantalla 
    // echo $nombre+" "+ $ap;
    $errores[] ="el campo nombre y apellido son correctos "; 

}

//que esten los dos mal 
if(empty($_GET["nombre"]) && empty($_GET["ap"])) {
    //Modificamos el status según sea pertinenete 
    http_response_code(300);
    //sumamos el mensaje a el array 
    $errores[] ="el campo nombre y apellido no están definidos "; 
}

// que este bien el nombre
if(!empty($_GET["nombre"]) && empty($_GET["ap"])) {
    //Modificamos el status según sea pertinenete 
    http_response_code(301);
    //sumamos el mensaje a el array 
    $errores[] ="el campo apellido no está definido "; 

    
}

//que este bien el apellido 
if(!empty($_GET["ap"]) && empty($_GET["nombre"])) {
    //Modificamos el status según sea pertinenete 
    http_response_code(302);
    //sumamos el mensaje a el array 
    $errores[] ="el campo apellido no está definido "; 

    
}

//si el array errores tiene algún elemento lo sacamos por pantalla 
for ($i = 0; $i <=count($errores)-1 ; $i++) {
    echo $errores[$i];
}