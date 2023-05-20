<?php

$conn = mysqli_connect("localhost", "admin", "215314045", "belajar");
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;

    $tambah = htmlspecialchars($data["tambah"]);

    $query = "INSERT INTO datatambah
        VALUES ('','$tambah')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



function hapus($id)
{
    global $conn;
    $id = mysqli_real_escape_string($conn, $id);
    mysqli_query($conn, "DELETE FROM datatambah WHERE id = $id LIMIT 1");
    return (mysqli_affected_rows($conn));
}

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM login WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
        return false;
    }


    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO login VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);

}

function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $tambah = htmlspecialchars($data["tambah"]);


    $query = "UPDATE datatambah SET
    tambah = '$tambah'
    WHERE id = '$id'";


    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}