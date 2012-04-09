<?
//ensure there is a user collection in the database
$collections = list_collections(); 
if (empty($collections['users'])){ 
    //create_collection('users');
}

$cookie_name = $GLOBALS['APP_NAME']."_user_cookie"; 

//check if Cookie already exists 
if (isset($_COOKIE[$cookie_name])){ 
    $data = json_decode(stripslashes($_COOKIE[$cookie_name]), true);
    $id = $data['_id'];
    $exists = show_document('users', $id);
    $user['last_login'] = time(); 
    $result = update_document('users', $id, $data);
}

else { 
    $user['_id']            = rand(0,99999999999);
    $user['last_login']     = time(); 
    $user['ip']             = $_SERVER['REMOTE_ADDR']; 
    $user['role']           = 'user';
    $json_user_data = json_encode($user); 
    $expire=time()+60*60*24*30;
    setcookie($cookie_name, $json_user_data, $expire);
    create_document('users', $user);
}




?>