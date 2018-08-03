<?php

/**
 * This file contains QUI\Tabler\EventHandler
 */

namespace QUI\Tabler;

use QUI;

/**
 * Class EventHandler
 *
 * @package QUI\Tabler
 */
class EventHandler
{
    /**
     * Event : on request
     *
     * @param \QUI\Rewrite $Rewrite
     * @param string $url
     */
    public static function onRequest(QUI\Rewrite $Rewrite, $url)
    {
        if (empty($url)) {
            return;
        }


        QUI\System\Log::writeRecursive($url);
    }
}
