<?php

header("Content-type: text/css; charset: UTF-8");

$tablerDir    = dirname(dirname(dirname(dirname(dirname(__FILE__))))) .'/tabler/tabler/dist';
$dashboardCSS = $tablerDir .'/assets/css/dashboard.css';

if (file_exists($dashboardCSS)) {
    echo file_get_contents($dashboardCSS);
}

exit;
