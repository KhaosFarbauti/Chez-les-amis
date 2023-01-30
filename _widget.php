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

if (!defined('DC_RC_PATH')) { return; }

dcCore::app()->addBehavior('initWidgets',['amisBehaviors','initWidgets']);

class amisBehaviors
{
	public static function initWidgets($widgets)
	{
		$widgets->create('amis',__('Among friends'),array('tplamis','amisWidget'),null,__('Display Friends RSS'));
		
		$widgets->amis->setting('title',__('Title:'),__('Among friends'));
		$widgets->amis->setting('flux_uri',__('RSS 1:'),'');
		$widgets->amis->setting('flux_uri2',__('RSS 2:'),'');
		$widgets->amis->setting('flux_uri3',__('RSS 3:'),'');
		$widgets->amis->setting('limit',__('Entry per RSS:'),1);
		$widgets->amis->setting('melange_uri',__('Randomize'),0,'check');
		$widgets->amis->setting('montre_date',__('Display date'),1,'check');
		$widgets->amis->setting('homeonly',__('Display on:'),0,'combo',
    	[
    	__('All pages') => 0,
    	__('Home page only') => 1,
    	__('Except on home page') => 2
    	]
    );
		$widgets->amis->setting('content_only',__('Content only'),0,'check');
		$widgets->amis->setting('class',__('CSS class:'),'');
		$widgets->amis->setting('offline',__('Offline'),0,'check');
  }
}