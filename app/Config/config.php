<?php
return[
    'dns' => env('DB_DRIVER').':dbname='.env('DB_NAME'). 'host='.env('DB_HOST').';charset=utf8mb4',
    'user'=> env('DB_USER'),
    'password'=>env('DB_PASSWORD')

];

/*

Padre nuestro que estás en el cielo, 
santificado sea tu Nombre;
venga a nosotros tu Reino;
hágase tu voluntad 
en la tierra como en el cielo.
Danos hoy 
nuestro pan de cada día;
perdona nuestras ofensas,
como también nosotros perdonamos 
a los que nos ofenden;
no nos dejes caer en la tentación,
y líbranos del mal. Amén.

*/