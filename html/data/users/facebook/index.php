<?
include_once('../../../framework.php'); 
include_once('src/facebook.php'); 

$facebook = new Facebook(array(
  'appId'  => $GLOBALS['FB_APP_ID'], 
  'secret' => $GLOBALS['FB_SECRET'], 
));




// Get User ID
$user = $facebook->getUser();


if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
    $user_profile['logout_url'] = $facebook->getLogoutUrl();
    $user_profile['logout_url'] = $facebook->getLogoutUrl();
    $json = json_encode($user_profile);
    display_json($json);
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
if (!$user) {
  $loginUrl = $facebook->getLoginUrl();
  $error = array('login_url' => $loginUrl); 
  $json = json_encode($error);
  display_json($json);

}


?>

