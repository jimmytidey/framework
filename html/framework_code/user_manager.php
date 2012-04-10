<?
$cookie_name = $GLOBALS['APP_NAME']."_user_cookie"; 

//check if Cookie already exists 
if (isset($_COOKIE[$cookie_name])){ 
    $id = $_COOKIE[$cookie_name];
    $existing_data = show_document("users", $id);
    $existing_data['last_login'] =time(); 
    update_document('users', $id, $existing_data);
}

else {
    $id                     = rand(0,99999999999);
    $user['last_login']     = time(); 
    $user['ip']             = $_SERVER['REMOTE_ADDR']; 
    $user['role']           = 'user';
    $expire=time()+60*60*24*30;
    setcookie($cookie_name,  $id, $expire);
    update_document('users', $id, $user);
}




?>