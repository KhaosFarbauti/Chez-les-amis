<?php
/**
 * @brief amis, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugin
 *
 * @author Khaos Farbauti Ibn Oblivion, Pierre Van Glabeke and contributors
 *
 * @copyright Apache License-2.0 https://www.apache.org/licenses/LICENSE-2.0
 */

if (!defined('DC_CONTEXT_ADMIN')) { return; }

l10n::set(dirname(__FILE__).'/locales/'.dcCore::app()->lang.'/admin');

require dirname(__FILE__).'/_widget.php';
