<?php

include '../connection.php';

if($_SERVER['REQUEST_METHOD'] == 'GET') {

    $hitungdata= "SELECT COUNT(*) 'total' FROM tbl_siswa";
    $executehitung= mysqli_query ( $_AUTH, $hitungdata);
    $getdata = mysqli_fetch_assoc($executehitung);

    $cariguru= "SELECT nama_guru FROM `db_kammpus`.`tbl_guru` WHERE `id_guru` = 'DG-0003'";
    $executeguru = mysqli_query ($_AUTH, $cariguru);
    $getguru = mysqli_fetch_assoc($executeguru);

    $carikelas = "SELECT * FROM tbl_kelas WHERE tbl_kelas.id_kelas = 'X2019'";
    $executekelas = mysqli_query ($_AUTH, $carikelas);
    $getkelas = mysqli_fetch_assoc($executekelas);


    $caridatasiswa = "SELECT tbl_siswa.nama_siswa, tbl_siswa.jenis_kelamin, tbl_siswa.alamat, tbl_siswa.no_telp, tbl_siswa.email, tbl_siswa.tgl_terdaftar FROM tbl_siswa";
    $executedatasiswa = mysqli_query ($_AUTH, $caridatasiswa);

    if($getdata > 0){
        $response["message"] = trim("Data Ditemukan");
        $response["code"] = 200; 
        $response["status"] = true;
        $response["Nama Guru"] = $getguru['nama_guru'];
        $response["Kelas"] = $getkelas['kelas'];
        $response["datasiswa"] = array(); 

                while($row = mysqli_fetch_array($executedatasiswa)) {
                    $data = array();

                    $data['nama_siswa'] = $row['nama_siswa'];
                    $data['jenis_kelamin'] = $row['jenis_kelamin'];
                    $data['alamat'] = $row['alamat'];
                    $data['no_telp'] = $row['no_telp'];
                    $data['email'] = $row['email'];
                    $data['tgl_terdaftar'] = $row['tgl_terdaftar'];
                    

                    array_push($response['datasiswa'], $data);
                }

        echo json_encode($response);
    
    }else{
        $response["message"] = trim("Data Tidak Ditemukan");
        $response["code"] = 400; 
        $response["status"] = false;

        echo json_encode($response);

    
    }
}
?>