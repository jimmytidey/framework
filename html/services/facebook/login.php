<?
include_once('../../framework_code/framework.php'); 
include_once('src/facebook.php'); 

$facebook = new Facebook(array(
  'appId'  => $GLOBALS['FB_APP_ID'], 
  'secret' => $GLOBALS['FB_SECRET'], 
));

// Get User ID
$user = $facebook->getUser();
$expire=time()+200;
if (!isset($_GET['return_url'])) { $return_url = '/';}
else {$return_url = $_GET['return_url'];}

setcookie("FB_RETURN_URL", $return_url, $expire);

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    
    //check if a user with this FB ID already exists
    
    
    header("Location: " . $_COOKIE['FB_RETURN_URL']);
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
if (!$user) {
  $loginUrl = $facebook->getLoginUrl();
  $error = array('login_url' => $loginUrl); 
  header("Location: ".$loginUrl);
}


?>

