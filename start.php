<?php

//elgg_register_event_handler('init', 'system', proyecto_init);

function proyecto_init() {
    elgg_register_plugin_hook_handler('entity:url', 'object', 'proyecto_set_url');
    elgg_extend_view('page/elements/sidebar', 'proyecto/barra');
    
}

return function() {
    // register an initializer
    elgg_register_event_handler('init', 'system', 'proyecto_init');
};

function proyecto_set_url($hook, $type, $url, $params) {
    $entity = $params['entity'];
    if ($entity->getSubtype() === 'proyecto') {
        return "proyecto/view/{$entity->guid}";
    }
}

function my_blog_page_handler($segments) {
    switch ($segments[0]) {
        case 'add':
           echo elgg_view_resource('proyecto/add');
           break;

        case 'view':
            $resource_vars['guid'] = elgg_extract(1, $segments);
            echo elgg_view_resource('proyecto/view', $resource_vars);
            break;

        case 'all':
        default:
           echo elgg_view_resource('proyecto/all');
           break;
    }

    return true;
}