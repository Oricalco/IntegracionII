<?php
$titlebar = "Todas las publicaciones";
$pagetitle = "Lista de publicaciones";

$body = elgg_list_entities(array(
    'type' => 'object',
    'subtype' => 'proyecto',
));

echo elgg_view_page($titlebar, [
    'title' => $pagetitle,
    'content' => $body,
]);
echo elgg_list_entities(array(
    'type' => 'object',
    'subtype' => 'proyecto',
    'owner_guid' => elgg_get_logged_in_user_guid()
));