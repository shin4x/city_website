<?php
//$login= $_POST["login"];
//$password= $_POST["password"];

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

$login = $data["login"];
$password = $data["password"];

//var_dump($data);

$conn =
    new PDO("mysql:host=mysql60.hostland.ru;
    dbname=host1323541_vsuet21",
        "host1323541_vsuet",
        "5q3tfcrK");

$sql = "select  user_login AS 'login', user_password AS 'password', role_name AS 'role', user_is_delete AS 'blocked'
from table_users 
JOIN table_user_roles
ON table_users.role_id = table_user_roles.role_id
WHERE user_login = '$login' AND user_password= '$password';";

//получаем рузельтат
$result = $conn->query($sql);

//если в результате содержиться что то
if ($row = $result->fetch()) {
    //проверка на удаленного пользователя
    if ($row['blocked'] != 0) {
        $json = array('result' => 'ERROR',
            'message' => 'user is deleted');
        //успех
    } else  $json = array('result' => 'SUCCESS',
        'login' => $row['login'],
        'role' => $row['role']);
} //если в результате не получается считать ни одной строки то возвращаем ошибку
else {
    $json = array('result' => 'ERROR', 'message' => 'user not found');

}
echo json_encode($json, JSON_FORCE_OBJECT);





//if ($result -> fetch()) {
//    echo "SUCCESS LOGIN";
//} else {
//    echo "INVALID LOGIN DETAILS";
