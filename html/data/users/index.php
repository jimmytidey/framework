<?
include_once('../../framework.php'); 
$json = list_documents('users');
display_json($json);
?>