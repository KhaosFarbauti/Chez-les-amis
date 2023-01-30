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
if (!defined('DC_RC_PATH')) {return;}

$this->registerModule(
    'Among friends',
    'Display Friends RSS',
    'Khaos Farbauti Ibn Oblivion, Pierre Van Glabeke and contributors',
    '2.0-dev',
    [
        'requires'    => [['core', '2.24']],
        'permissions' => dcCore::app()->auth->makePermissions([
            dcAuth::PERMISSION_USAGE,
            dcAuth::PERMISSION_ADMIN,
        ]),
        'type'       => 'plugin',
        'support'    => 'http://blog.chaosklub.com/index.php/post/2006/12/22/Chez-les-amis-V15',
        'details'    => 'https://plugins.dotaddict.org/dc2/details/' . basename(__DIR__),
    ]
);
