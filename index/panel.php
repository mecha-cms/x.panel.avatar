<?php

$is_page = 0 === strpos($_['type'] . '/', 'page/');
if (!$_['type'] && ($file = $_['file'])) {
    if (false !== strpos(',archive,draft,page,', ',' . pathinfo($file, PATHINFO_EXTENSION) . ',')) {
        $is_page = true;
    }
}

if ((0 === strpos($_['path'] . '/', 'comment/') || 0 === strpos($_['path'] . '/', 'user/')) && $is_page) {
    State::set("x.panel\\.image.folder", LOT . D . 'asset' . D . 'user' . D . $user->name . D . 'avatar');
    State::set("x.panel\\.image.key", 'avatar');
    State::set("x.panel\\.image.name", date('Y-m-d'));
    State::set("x.panel\\.image.title", 'Avatar');
}