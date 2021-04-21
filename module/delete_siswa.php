<?php

include '../connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nis = $_POST ['nis'];

    $execute_searchdata = mysqli_query($_AUTH, "SELECT COUNT(*) total_data FROM tbl_siswa WHERE nis = $nis");
    $get_availabledata = mysqli_fetch_assoc($execute_searchdata);

    if($get_availabledata['total_data'] > 0) {

        $query_deletedatasiswa = "DELETE FROM tbl_siswa WHERE nis = $nis";
        $execute_deleteddata = mysqli_query($_AUTH, $query_deletedatasiswa);
            
        $response['message'] = "Data siswa dengan nis $nis berhasil dihapus dari database";
        $response['code'] = 200;
        $response['status'] = true;
                
        echo json_encode($response);
    }else{
        $response['message'] = "Data siswa dengan nis $nis gagal terhapus dari database, karna data tidak tersedia";
        $response['code'] = 400;
        $response['status'] = false;
                
        echo json_encode($response);
            

    }
    
}  
