<?php

// set the title
$title = "Nuevo Post";

// add the form to the main column
$content = elgg_view_form("proyecto/save");

// optionally, add the content for the sidebar
$sidebar = "";

// draw the page, including the HTML wrapper and basic page layout
echo elgg_view_page($title, [
            'content' => $content,
            'sidebar' => $sidebar
]);