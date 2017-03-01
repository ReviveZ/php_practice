<?php
/**
 * Created by PhpStorm.
 * User: Zebang
 * Date&time: 2015/11/29 21:25
 */
header("Content-type: text/html; charset=utf-8");
echo "Hello,bang,你好<br>";
echo date('y/m/d');
echo '<br>';

 if(!file_exists("welcome.txt"))
{
    echo "File not found";
}
else
{
    $file=fopen("welcome.txt","r");

}

echo '<br>';
echo md5(123456);
echo '<br>';


$servername = "localhost";
$username = "root";
$password = "123456";
$con = new mysqli($servername, $username, $password);

if ($con->connect_error)
{
    echo 'Could not connect: ' . $con->connect_error;
}
else{
    echo "已连接<br>";
}
echo md5('abc123');
$sql = "SELECT * FROM tmp";

$con->select_db("test");
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $name = $row['name'];
        $sex = $row['sex'];
        echo "</br>";
        echo "$id&nbsp";
        echo "$name&nbsp";
        echo "$sex&nbsp";
        echo "<br>";

    }
}
else {
    echo "0 results";
}


$con->close();


?>