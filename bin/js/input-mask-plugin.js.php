<?php

$tablerDir  = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/tabler/tabler/dist';
$maskPlugin = $tablerDir.'/assets/plugins/input-mask/plugin.js';

if (file_exists($maskPlugin)) {
    echo file_get_contents($maskPlugin);
}

exit;
