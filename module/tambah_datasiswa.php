<?php

include '../connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nis = $_POST ['nis'];
    $nama_siswa = $_POST ['nama_siswa'];
    $jenis_kelamin = $_POST ['jenis_kelamin'];
    $alamat = $_POST ['alamat'];
    $no_telp = $_POST ['no_telp'];
    $email = $_POST ['email'];
    $id_jurusan = $_POST ['id_jurusan'];
    $id_kelas = $_POST ['id_kelas'];

    $tambah_siswa = mysqli_query ($_AUTH, "INSERT INTO tbl_siswa (nis, nama_siswa, jenis_kelamin, alamat, no_telp, email) VALUES ('$nis', '$nama_siswa', '$jenis_kelamin', '$alamat', '$no_telp', '$email')");
    $tambah_datasiswa = mysqli_query ($_AUTH, "INSERT INTO tbl_datasiswa (id_kelas, nis, id_jurusan) VALUES ('$id_kelas', '$nis', '$id_jurusan')");

    $detect_siswa = mysqli_query($_AUTH, "SELECT COUNT(nama_siswa) 'useradded' FROM tbl_siswa WHERE nama_siswa = '$nama_siswa'");
    $fetch_detect = mysqli_fetch_assoc ($detect_siswa);

    if($fetch_detect ['useradded'] >= 0){

        $datasiswabaru = mysqli_query ($_AUTH, "SELECT nama_siswa, jenis_kelamin, alamat, no_telp, email, tgl_terdaftar FROM tbl_siswa WHERE nama_siswa = '$nama_siswa'");

        $response["message"] = "Siswa dengan nama =  " . $nama_siswa . " berhasil ditambahkan kedalam database";
        $response["code"] = 200;
        $response["status"] = true;
        $response["siswa baru"] = array();

        while($row = mysqli_fetch_array($datasiswabaru)){
            $data = array();

            $data['nama_siswa'] = $row['nama_siswa'];
            $data['jenis_kelamin'] = $row['jenis_kelamin'];
            $data['alamat'] = $row['alamat'];
            $data['no_telp'] = $row['no_telp'];
            $data['email'] = $row['email'];
            $data['tgl_terdaftar'] = $row['tgl_terdaftar'];

            array_push($response['siswa baru'], $data);
        }
        echo json_encode($response);

    }else{
        $response["message"] = "Imposible / tidak memungkinkan menambahkan data siswa kedalam database, karena data tersedia didatabase";
        $response["code"] = 400;
        $response["status"] = false;
    
        echo json_encode($response);
    }
}
