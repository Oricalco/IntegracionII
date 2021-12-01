<?php

// get the entity
$guid = elgg_extract('guid', $vars);
$my_blog = get_entity($guid);

// get the content of the post
$content = elgg_view_entity($my_blog, array('full_view' => true));
$sidebar = elgg_view('input/button',array('name' => 'export', 'value' => 'Exportar'));

echo elgg_view_page($my_blog->getDisplayName(), [
    'content' => $content,
    'sidebar' => $sidebar
]);