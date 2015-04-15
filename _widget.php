<?php
#   Copyright 2015 Khaos Farbauti Ibn Oblivion
#
#   Licensed under the Apache License, Version 2.0 (the "License");
#   you may not use this file except in compliance with the License.
#   You may obtain a copy of the License at
#
#       http://www.apache.org/licenses/LICENSE-2.0
#
#   Unless required by applicable law or agreed to in writing, software
#   distributed under the License is distributed on an "AS IS" BASIS,
#   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
#   See the License for the specific language governing permissions and
#   limitations under the License.

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
