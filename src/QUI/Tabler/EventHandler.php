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

    /**
     * Event : on smarty init
     *
     * @param \Smarty $Smarty - \Smarty
     * @throws \Exception
     */
    public static function onSmartyInit($Smarty)
    {
        if (!isset($Smarty->registered_plugins['function']) ||
            !isset($Smarty->registered_plugins['function']['fetch'])
        ) {
            $Smarty->registerPlugin(
                "function",
                "fetch",
                "\\QUI\\Tabler\\EventHandler::fetch"
            );
        }
    }

    /**
     * Helper to fetch templates
     *
     * @param $params
     * @param $Smarty
     * @return string
     */
    public static function fetch($params, $Smarty)
    {
        $template = $params['template'];
        $path     = OPT_DIR.'quiqqer/template-tabler/';

        try {
            $Engine = QUI::getTemplateManager()->getEngine();
        } catch (QUI\Exception $Exception) {
            return '';
        }

        $Engine->assign($params);

        return $Engine->fetch($path.$template);
    }
}
