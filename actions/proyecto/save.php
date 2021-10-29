<?php
// get the form inputs
$title = get_input('title');
$body = get_input('body');
$tags = string_to_tag_array(get_input('tags'));

// create a new my_blog object and put the content in it
$blog = new ElggObject();
$blog->title = $title;
$blog->description = $body;
$blog->tags = $tags;
$guid = elgg_get_logged_in_user_guid();
// the object can and should have a subtype
$blog->subtype = 'proyecto';

// for now, make all my_blog posts public
$blog->access_id = ACCESS_PUBLIC;

// owner is logged in user
$blog->owner_guid = $guid;

///////////////MONGO//////////////
$cliente = new MongoDB\Client("mongodb+srv://nico:nico1234@cluster0.oxwjx.mongodb.net/myFirstDatabase?retryWrites=true&w=majority");
$colección = $cliente->Test->Usuarios;

$resultado = $colección->insertOne( [
      'guid' => $guid,
     'titulo' =>  $title,
     'cuerpo'  => $body,
     'tags' => $tags,
] );

//////////////////////////////////

// save to database and get id of the new my_blog
$blog_guid = $blog->save();

// if the my_blog was saved, we want to display the new post
// otherwise, we want to register an error and forward back to the form
if ($blog_guid) {
   system_message("Se ha guardado correctamente");
   forward($blog->getURL());
} else {
   register_error("No pudo ser guardado");
   forward(REFERER); // REFERER is a global variable that defines the previous page
}