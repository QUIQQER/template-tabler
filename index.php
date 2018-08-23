<?php

$Template->setAttribute('noConflict', true);

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
 * Setting
 */

$Engine->assign([
    'showProfile'    => $Project->getConfig('templateTabler.settings.showProfile'),
    'showSearch'     => $Project->getConfig('templateTabler.settings.showSearch'),
    'showBreadcrumb' => $Project->getConfig('templateTabler.settings.showBreadcrumb'),

    'showPageHeader' => true,
    'showPageTitle'  => true, //$Site->getAttribute('templateTabler.showTitle'),
    'showPageShort'  => true, //$Site->getAttribute('templateTabler.showShort'),

]);


/**
 * Assigning
 */
$Engine->assign([
    'bodyClass' => $bodyClass,
    'avatar'    => $avatar,

    'BricksManager' => QUI\Bricks\Manager::init(),
    'Breadcrumb'    => new QUI\Controls\Breadcrumb(),
    'Start'         => $Project->firstChild()
]);


// templates
$Engine->assign([
    'templateHeader'     => $Engine->fetch(dirname(__FILE__).'/index.header.html'),
    'templateBreadcrumb' => $Engine->fetch(dirname(__FILE__).'/index.breadcrumb.html'),
    'templateMenu'       => $Engine->fetch(dirname(__FILE__).'/index.menu.html')
]);
