<?php
/**
 * Delete blog entity
 */

elgg_deprecated_notice("The action 'proyecto/delete' is deprecated. Use 'entity/delete'.", '3.1');

$blog_guid = (int) get_input('guid');
$blog = get_entity($blog_guid);

if (!($blog instanceof \ElggBlog) || !$blog->canDelete()) {
	return elgg_error_response(elgg_echo('proyecto:error:post_not_found'));
}

///////////////MONGO//////////////
$cliente = new MongoDB\Client("mongodb+srv://nico:nico1234@cluster0.oxwjx.mongodb.net/myFirstDatabase?retryWrites=true&w=majority");
$colección = $cliente->Test->Usuarios;


//////////////////////////////////


$container = $blog->getContainerEntity();
if (!$blog->delete()) {
	return elgg_error_response(elgg_echo('proyecto:error:cannot_delete_post'));
}

if ($container instanceof \ElggGroup) {
	$forward_url = elgg_generate_url('collection:object:proyecto:group', [
		'guid' => $container->guid,
		'subpage' => 'all',
	]);
} else {
	$forward_url = elgg_generate_url('collection:object:proyectog:owner', [
		'username' => $container->username,
	]);
}

return elgg_ok_response('', elgg_echo('proyecto:message:deleted_post'), $forward_url);
