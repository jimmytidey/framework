<?

function list_collections() {
    $url = $GLOBALS['DB_LOCATION']."/collections?apiKey=".$GLOBALS['DB_API_KEY'];
    $data = file_get_contents($url);
    $json['data'] = json_decode($data);
    $json['info'] = 'List all collections';
    return $json;
}

function create_collection($collection_name) {
    $url = $GLOBALS['DB_LOCATION']."/collections/$collection_name?apiKey=".$GLOBALS['DB_API_KEY'];
    $json = '';
    $result = post($url, $json);
    return json_decode($result, true);
}
    
function list_documents($collection) {
    $url = $GLOBALS['DB_LOCATION']."/collections/$collection?apiKey=".$GLOBALS['DB_API_KEY'];
    $data = file_get_contents($url);
    return json_decode($data, true);
}

function show_document($collection, $document) {
    $url = $GLOBALS['DB_LOCATION']."/collections/$collection/$document?apiKey=".$GLOBALS['DB_API_KEY'];
    $data = file_get_contents($url);
    return json_decode($data, true);
}

function create_document($collection, $data) {
    $url = $GLOBALS['DB_LOCATION']."/collections/$collection?apiKey=".$GLOBALS['DB_API_KEY'];
    $data = json_encode($data);
    $result = post($url, $data);
    return json_decode($result, true);
}

function update_document($collection, $document, $data) {
    $url = $GLOBALS['DB_LOCATION']."/collections/$collection/$document?apiKey=".$GLOBALS['DB_API_KEY'];
    $data = json_encode($data);
    $result = put($url, $data);
    return json_decode($result, true);
}


?>