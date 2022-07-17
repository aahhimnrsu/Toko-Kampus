<?php
session_start();
$_SESSION['sesi']=NULL;

include "koneksi.php";
if(isset($_POST['submit'])){
    // $user = isset($_POST['username'])?$_POST['username']:"";
    // $pass = isset($_POST['password'])?$_POST['password']:"";
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $qry  = mysqli_query($db,"SELECT * FROM admin WHERE username = '$user' AND password = '$pass'");
    $sesi = mysqli_num_rows($qry)   ;

    if($sesi == 1)
    {
        $data_admin = mysqli_fetch_array($qry);
        $_SESSION['id_admin']=$data_admin['id_admin'];
        $_SESSION['sesi']=$data_admin['nm_admin'];

        header('location:../kasir.php');
        echo "<script>alert('Anda berhasil Log in');</script>";
        // echo "<meta http-equiv='refresh' content='0'; url='kasir.php?user=$sesi'>";
   
    }else{
        // echo "<meta http-equiv='refresh' content='0'; url='login.php'>";
        header('location:../login.php');
        echo "<script>alert('Anda Gagal Log in');</script>";
    }

}else{
    include "../login.php";
}
?>