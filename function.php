<?php   
// date
// untuk menampilkan tanggal dengan format tertentu 
//echo date("l, d-M-Y");

//time
// UNIX timestamp / EPOCH time 
// detik yang sudah berlalu sejak 1 january 1970
// echo time ();
// echo date ("l", mktime(0,0,0,8,25,1985));

// strtotime 
// echo date ("l" strtotime("25 aug 1985"));
 
function salam ( $waktu = "Datang", $nama = "admin"){
    return "Selamat $waktu, $nama!";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan function</title>
</head>
<body>
    <h1><?= salam("pagi", "Itqon"); ?></h1>
</body>
</html>