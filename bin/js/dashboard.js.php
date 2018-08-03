<?php

$tablerDir   = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/tabler/tabler/dist';
$dashboardJS = $tablerDir.'/assets/js/dashboard.js';

if (file_exists($dashboardJS)) {
    echo file_get_contents($dashboardJS);
}

exit;
