<?php
DEFINE('DB_USER','root');
DEFINE('DB_PASS','');
DEFINE('HOST','localhost');
$conn = mysqli_connect('localhost', 'root', '', "mypham") or die ('Không thể kết nối tới database'. mysqli_connect_error());
mysqli_set_charset($conn, 'UTF8');  
?>