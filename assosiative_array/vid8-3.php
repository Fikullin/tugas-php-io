<?php

$mahasiswa = [
    [
        "nrp" => "0232323",
        "nama" => "itqon Fikullin",
        "email" => "itqonfikullin@gmail.com",
        "jurusan" => "Teknik Informatika",
        "gambar" => "itqon.jpg"
        
    ],
    [
        "nama" => "Rizki",
        "nrp" => "123123",
        "email" => "rizki@gmail.com",
        "jurusan" => "Teknik Informatika",
        "gambar" => "Rizky.jpg"
    ]

    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    

<h1>Daftar Mahasiswa</h1>

<?php foreach ( $mahasiswa as $mhs ) : ?>
<ul>
    <li>
        <img src="img/<?= $mhs["gambar"]; ?>">
    </li>
    <li>Nama : <?= $mhs['nama']; ?></li>
    <li>NRP : <?= $mhs['nrp']; ?></li>
    <li>Jurusan : <?= $mhs['jurusan']; ?></li>
    <li>Email : <?= $mhs['email']; ?></li>
</ul>
<?php endforeach; ?>

</body>
</html>