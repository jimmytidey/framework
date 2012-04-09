<?
//this line ensures the framework is present 
include_once('framework.php'); 

function list_collections() {
    $url = $GLOBALS['DB_LOCATION']."/collections?apiKey=".$GLOBALS['DB_API_KEY'];
    $data = file_get_contents($url);
    display_json($data);
}

function create_collection($collection_name) {
    $url = $GLOBALS['DB_LOCATION']."/collections/$collection_name?apiKey=".$GLOBALS['DB_API_KEY'];
    $json_array = array('collection'=> $collection_name);
    $json = json_encode($json_array);
    $result = post($url, $json);
    display_json($result);
}
    
function list_documents($collection) {
    $url = $GLOBALS['DB_LOCATION']."/collections/$collection?apiKey=".$GLOBALS['DB_API_KEY'];
    $data = file_get_contents($url);
    display_json($data);
}

function show_document($collection, $document) {
    $url = $GLOBALS['DB_LOCATION']."/collections/$collection/$document?apiKey=".$GLOBALS['DB_API_KEY'];
    $data = file_get_contents($url);
    display_json($data);
}

function create_document($collection, $data) {
    $url = $GLOBALS['DB_LOCATION']."/collections/$collection?apiKey=".$GLOBALS['DB_API_KEY'];
    $data = json_encode($data);
    $result = post($url, $data);
    display_json($result);
}

function update_document($collection, $document, $data) {
    $url = $GLOBALS['DB_LOCATION']."/collections/$collection/$document?apiKey=".$GLOBALS['DB_API_KEY'];
    $data = json_encode($data);
    $result = put($url, $data);
    display_json($result);
}


?>