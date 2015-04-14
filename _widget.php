<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
#
# This file is part of Chez les amis, a plugin for DotClear2.
#
# Copyright (c) 2008 Khaos Farbauti Ibn Oblivion and contributors
# Licensed under the GPL version 2.0 license.
# See LICENSE file or
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
#
# -- END LICENSE BLOCK ------------------------------------
if (!defined('DC_RC_PATH')) { return; }
$core->addBehavior('initWidgets',array('amisBehaviors','initWidgets'));

class amisBehaviors
{
        public static function initWidgets($widgets)
        {
        $widgets->create('amis',__('Chez les amis'),array('tplamis','amisWidget'));
        $widgets->amis->setting('title',__('Title:'),'');
				$widgets->amis->setting('flux_uri',__('Flux:'),'');
				$widgets->amis->setting('flux_uri2',__('Flux 2:'),'');
				$widgets->amis->setting('flux_uri3',__('Flux 3:'),'');
				$widgets->amis->setting('limit',__('Billets par flux:'),1);
				$widgets->amis->setting('melange_uri',__('Melanger les billets'),0,'check');
				$widgets->amis->setting('montre_date',__('Afficher la date des billets'),1,'check');
		    $widgets->amis->setting('homeonly',__('Display on:'),0,'combo',
    			array(
    				__('All pages') => 0,
    				__('Home page only') => 1,
    				__('Except on home page') => 2
    				)
    		);
        $widgets->amis->setting('content_only',__('Content only'),0,'check');
        $widgets->amis->setting('class',__('CSS class:'),'');
        }
}
?>
