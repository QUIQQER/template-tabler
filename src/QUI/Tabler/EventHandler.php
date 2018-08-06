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

        if (strpos($url, 'assets/') === 0) {
            self::onAssetRequest($url);

            return;
        }

        $requestDir = 'packages/quiqqer/template-tabler/bin/';

        if (strpos($url, $requestDir) !== 0) {
            return;
        }

        $assetsDir = OPT_DIR.'tabler/tabler/dist/assets/';

        $requestAsset = str_replace($requestDir, '', $url);
        $requestAsset = $assetsDir.$requestAsset;

        if (file_exists($requestAsset)) {
            echo file_get_contents($requestAsset);
            exit;
        }

        QUI\System\Log::addNotice($requestAsset);
    }

    /**
     * Request for assets/ url
     *
     * @param string $url
     */
    public static function onAssetRequest($url)
    {
        $assetsDir    = OPT_DIR.'tabler/tabler/dist/';
        $requestAsset = $assetsDir.$url;

        if (file_exists($requestAsset)) {
            echo file_get_contents($requestAsset);
            exit;
        }
    }
}
