<?php

include '../connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nis = $_POST ['nis'];

    $cari_siswa = mysqli_query ($_AUTH, "SELECT nama_siswa FROM tbl_siswa WHERE nis = '$nis'");

    if($cari_siswa >=0){
        $cari_nis = mysqli_query ($_AUTH, "SELECT nama_siswa, jenis_kelamin, alamat, no_telp, email, tgl_terdaftar FROM tbl_siswa WHERE nis = $nis")
        
        $_response["message"] = "Data siswa ".$nis." berhasil di tambah";
        $_response["code"] = 200;
        $_response["status"] = true;
        $_response['tambahdata'] = array();

            while($row = mysqli_fetch_array($cari_nis)){
                $data = array();

                $data['nama_siswa'] = $row['nama_siswa'];
                $data['jenis_kelamin'] =$row['jenis_kelamin'];
                $data['alamat'] = $row['alamat'];
                $data['no_telp'] = $row['no_telp'];
                $data['email'] = $row ['email';
                $data['tgl_terdaftar'] = $row ['tgl_terdaftar'];

                array_push($response['data_siswa'], $data);
            }

            echo json_encode($response);
        
    }else{
        $response["message"] = "Siswa dengan nis $nis tidak tersedia didatabase";
        $response["code"] = 400;
        $response["status"] = false;

        echo json_encode($response);
    }


}
?>