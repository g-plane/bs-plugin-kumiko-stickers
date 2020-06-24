<?php

namespace GPlane\KumikoStickers;

use App\Events\RenderingHeader;
use App\Services\Hook;
use App\Services\Plugin;
use Illuminate\Contracts\Events\Dispatcher;

return function (Dispatcher $events, Plugin $plugin) {
    Hook::addStyleFileToPage($plugin->assets('style.css'));

    $url = $plugin->assets('images/'.random_int(1, 56).'.webp');
    $events->listen(RenderingHeader::class, function (RenderingHeader $event) use ($url) {
        $event->addContent("<style>.content-wrapper{ background-image: url('$url') }</style>");
    });
};
