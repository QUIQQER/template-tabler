<?php

/**
 * This file contains QUI\Tabler\Bricks\Card
 */

namespace QUI\Tabler\Bricks;

use QUI;

/**
 * Class Card
 * - Default card
 *
 * @package QUI\Tabler\Bricks
 */
class Card extends QUI\Control
{
    /**
     * constructor
     *
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
    }


    /**
     * (non-PHPdoc)
     *
     * @see \QUI\Control::create()
     */
    public function getBody()
    {
        $Engine = QUI::getTemplateManager()->getEngine();

        $Engine->assign([
            'this' => $this
        ]);

        return $Engine->fetch(dirname(__FILE__).'/Banner.html');
    }

}