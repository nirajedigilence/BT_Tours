<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > News
Breadcrumbs::for('news.list', function ($trail) {
    $trail->parent('home');
    $trail->push('News', route('news.list'));
});

// Home > News > [name]
Breadcrumbs::for('NewsController@show', function ($trail, $i) {
    $trail->parent('news.list');
    $trail->push($i->title, action('NewsController@show', $i->id));
});

// Home > Info > [name]
Breadcrumbs::for('menus.info.show', function ($trail, $info) {
    $trail->parent('home');

    foreach($info->parentActive as $parent) {
        $linkUrl = "";
        if($parent->url){
            $linkUrl = $parent->url;
        }else if($parent->htaccess_url){
            $linkUrl = $parent->htaccess_url;
        }else{
            $linkUrl = route('menus.info.show', $parent->id);
        }
        $trail->push($parent->name, $linkUrl);
    }

    $linkUrl = "";
    if($info->url){
        $linkUrl = $info->url;
    }else if($info->htaccess_url){
        $linkUrl = $info->htaccess_url;
    }else{
        $linkUrl = route('menus.info.show', $info->id);
    }
    $trail->push($info->name, $linkUrl);
});
