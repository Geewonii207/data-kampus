<?php
  
  include '../connection.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $nis = $_POST ['nis'];
    $cari_siswa = mysqli_query ($_AUTH, "SELECT * FROM tbl_siswa WHERE nis = '$nis'");

        if (mysqli_fetch_array($cari_siswa)) {
         $cari_nis = mysqli_query ($_AUTH, "SELECT nama_siswa, jenis_kelamin, alamat, no_telp, email, tgl_terdaftar FROM tbl_siswa WHERE nis = $nis");
         
            
            $response["message"] = "Siswa dengan nis $nis tersedia di database";
            $response["code"] = 201;
            $response["status"] = true;
            $response["dataSiswa"] = array();

            while($row =  mysqli_fetch_array($cari_nis)){
                $data = array();
    
                $data['nama_siswa'] = $row['nama_siswa'];
                $data['jenis_kelamin'] = $row['jenis_kelamin'];
                $data['alamat'] = $row['alamat'];
                $data['no_telp'] = $row['no_telp'];
                $data['email'] = $row['email'];
                $data['tgl_terdaftar'] = $row['tgl_terdaftar'];
    
                array_push($response['dataSiswa'], $data);
            }
            echo json_encode($response);
        }else{
            $response['message'] = "Data notes dengan id $nis tidak tersedia di database";
            $response['code'] = 404;
            $response['status'] = false;
            echo json_encode($response);
     
        }    
    }

?>