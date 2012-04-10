<?
/*  
THIS FILE HANDLES ALL REQUESTS TO FILES THAT DO NOT EXIST INSIDE THE DATA FOLDER

/data/     					                = list all collections
/data/create/create 				        = "You cannot create a collection with the name 'create'"
/data/create/{name}    				        = create collection 
/data/{collection}				            = list all documents
/data/{collection}/{document} 			    = list all data in the document 
/data/{collection}/create/{docname}/{data} 	= create document 
/data/{collection}/update/{docname}/{data}	= update document

*/


include_once('../framework_code/framework.php'); 

//GET parameters from URL 
if (isset($_GET['url'])) { $path_array = explode('/', $_GET['url']);}
else { $path_array = false;}

//  PATH: /data/ ,  RESULT: list all collections
if (!$path_array) { 
        $json =list_collections();
}

//  PATH: /data/create/{name} , RESULT: create collection 
else if ($path_array[0]== 'create') {
    
    //test for banned words
    if ($path_array[1] == 'create' || $path_array[1] == 'update' || $path_array[1] == 'search' || $path_array[1] == 'users') { 
        $json['info'] = array('Error' => 'You cannot create a collection with the names create, update, users or search'); 
    }

    //test for empty
    else if (empty($path_array[1])) { 
        $json['info']= array('Error' => 'This collection has no name!'); 
    }    
    
    else {
        $json['data']= create_collection($path_array[1]);
        $json['info'] = 'creating collection';  
    }
}

//  PATH: /data/collection_name , RESULT: show the documents in the collection, or return an error
else if ($path_array[0] != 'create' && !isset($path_array[1])) {
    $json['data'] = list_documents($path_array[0]);
    $json['info'] = 'List everything in collection';
}

//  PATH: /data/collection_name/document , RESULT: show only one document
else if ($path_array[0] != 'create' && $path_array[1] != 'create' && $path_array[1] != 'update') { //not creating or updating
    $json['data'] = show_document($path_array[0], $path_array[1]);
}

//  PATH: /data/collection_name/create/ , RESULT: You must add data...  
else if ($path_array[0] != 'create' && $path_array[1] == 'create' && !isset($path_array[2])) { 
    $json['data'] = array('Error' => 'You must provide data '); 
}

//  PATH: /data/collection_name/create/{data} , RESULT: create a document 
else if ($path_array[0] != 'create' && $path_array[1] == 'create') {
    parse_str($path_array[2], $data);
    $json['data'] = create_document($path_array[0], $data); 
    $json['info'] = 'creating document';
}

//  PATH: /data/collection_name/create/ , RESULT: You must add data...  
else if ($path_array[0] != 'create' && $path_array[1] == 'create' && !isset($path_array[2])) { 
    $json['data'] = array('Error' => 'You must provide data '); 
}

//  PATH: /data/collection_name/update/{document}/{data} , RESULT: update a document 
else if($path_array[0] != 'create' && $path_array[1] == 'update') {
    parse_str($path_array[3], $data);
    $json['data'] =  update_document($path_array[0], $path_array[2], $data); 
    $json['info'] = 'updating document';
}

display_json($json); 

?>