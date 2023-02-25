<?php

$file = $_['file'];
$is_page = 0 === strpos($_['type'] . '/', 'page/');
if ($file && !isset($_['type'])) {
    if (false !== strpos(',archive,draft,page,', ',' . pathinfo($file, PATHINFO_EXTENSION) . ',')) {
        $is_page = true;
    }
}

if ($is_page && (0 === strpos($_['path'] . '/', 'comment/') || 0 === strpos($_['path'] . '/', 'user/'))) {
    State::set("x.panel\\.image.folder", LOT . D . 'asset' . D . 'user' . D . ($file ? pathinfo($file, PATHINFO_FILENAME) : $user->name) . D . 'avatar');
    State::set("x.panel\\.image.height", 400);
    State::set("x.panel\\.image.key", 'avatar');
    State::set("x.panel\\.image.name", date('Y-m-d'));
    State::set("x.panel\\.image.title", 'Avatar');
    State::set("x.panel\\.image.width", 400);
}