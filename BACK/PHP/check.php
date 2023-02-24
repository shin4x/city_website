<?php
//$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING); // Удаляет все лишнее и записываем значение в переменную //$login
//$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
//$password = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
//
//if(mb_strlen($login) < 5 || mb_strlen($login) > 90){
//    echo "Недопустимая длина логина";
//    exit();
//}
//else if(mb_strlen($name) < 5){
//    echo "Недопустимая длина имени.";
//    exit();
//} // Проверяем длину имени
//
//$sql = "select  user_login AS 'login', user_password AS 'password', role_name AS 'role', user_is_delete AS 'blocked'
//from table_users
//JOIN table_user_roles
//ON table_users.role_id = table_user_roles.role_id
//WHERE user_login = '$login' AND user_password= '$password';";
//
//$result1 = $sql->query("SELECT * FROM `table_users` WHERE `user_login` = '$login'");
//$user1 = $result1->fetch_assoc(); // Конвертируем в массив
//if(!empty($user1)){
//    echo "Данный логин уже используется!";
//    exit();
//}
//
//$sql->query("INSERT INTO `table_users` (`user_login`, `user_password`, `user_name`)
//	VALUES('$login', '$pass', '$name')");
//$mysql->close();