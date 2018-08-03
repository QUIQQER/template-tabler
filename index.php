<?php

/**
 * body class
 */
$bodyClass = '';

switch ($Template->getLayoutType()) {
    case 'layout/startPage':
        $bodyClass = 'start-page';
        break;

    case 'layout/noSidebar':
        $bodyClass = 'no-sidebar';
        break;

    case 'layout/rightSidebar':
        $bodyClass = 'right-sidebar';
        break;

    case 'layout/leftSidebar':
        $bodyClass = 'left-sidebar';
        break;
}

$Engine->assign([
    'bodyClass' => $bodyClass,
    'Start'     => $Project->firstChild(),

    'templateMenu' => dirname(__FILE__).'/menu.html'
]);
