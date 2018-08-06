<?php

/**
 * Logo
 */

$Engine->assign('Logo', $Project->getMedia()->getLogoImage());

/**
 * Logo
 */

$avatar = '';

if (QUI::getUserBySession()->getAvatar()) {
    $avatar = QUI::getUserBySession()->getAvatar()->getSizeCacheUrl(50, 50);
}

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

/**
 * Show Header
 */

$showHeader = false;


switch ($Template->getLayoutType()) {
    case 'layout/startPage':
        $showHeader = $Project->getConfig('templateBusinessPro.settings.showHeaderStartPage');
        break;

    case 'layout/noSidebar':
        $showHeader = $Project->getConfig('templateBusinessPro.settings.showHeaderNoSidebar');
        break;

    case 'layout/rightSidebar':
        $showHeader = $Project->getConfig('templateBusinessPro.settings.showHeaderRightSidebar');
        break;

    case 'layout/leftSidebar':
        $showHeader = $Project->getConfig('templateBusinessPro.settings.showHeaderLeftSidebar');
        break;
}

/* site own show header */
switch ($Site->getAttribute('templateBusinessPro.showEmotion')) {
    case 'show':
        $showHeader = true;
        break;

    case 'hide':
        $showHeader = false;
}


$Engine->assign([
    'bodyClass' => $bodyClass,
    'avatar'    => $avatar,

    'showHeader'    => $showHeader,
    'showPageTitle' => $Site->getAttribute('templateBusinessPro.showTitle'),
    'showPageShort' => $Site->getAttribute('templateBusinessPro.showShort'),

    'BricksManager' => QUI\Bricks\Manager::init(),
    'Start'         => $Project->firstChild()
]);


// templates
$Engine->assign([
    'templateHeader' => $Engine->fetch(dirname(__FILE__).'/index.header.html'),
    'templateMenu'   => $Engine->fetch(dirname(__FILE__).'/index.menu.html')
]);
