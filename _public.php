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

require dirname(__FILE__).'/_widget.php';
class tplamis
{
	# Widget function
	public static function amisWidget($w){
		
		global $core;

		if (($w->homeonly == 1 && $core->url->type != 'default') ||
			($w->homeonly == 2 && $core->url->type == 'default')) {
			return;
		}
		
		$RSSFEEDS = explode(";", ($w->flux_uri).';'.($w->flux_uri2).';'.($w->flux_uri3));
		if (!$RSSFEEDS) {
			$RSSFEEDS = array();
		}
		
		$nb=sizeof($RSSFEEDS);
		
		$charac_genant = array("&#8217;", "&#8230;");
		
		for ($i = 0; $i < $nb; $i++ ){
			try{
				$feed = feedReader::quickParse($RSSFEEDS[$i],DC_TPL_CACHE);
			}catch (Exception $e){
				$feed = false;
			}
				if ($feed == false || count($feed->items) == 0) {

				$feed = false;

				}
				else {
					$j = 0;
					foreach ($feed->items as $item){
						$lien[] = $item->link;
						$titre[] = str_replace($charac_genant, " ", $item->title);


						$pdate[] = dt::dt2str('%Y%m%d',$item->pubdate,'Europe/Paris');
						$adate[] = dt::dt2str('%d/%m/%Y',$item->pubdate,'Europe/Paris');
						$j++;
						if ($j >= ($w->limit)) break;
					}
				}
		}

		//melange du tableau ou tri chronologique
		
		$nb=sizeof($lien);
		
		if ($w->melange_uri){
			for($i=0; $i<$nb; $i++){
				$valeurs = array_values($lien);

				$valTiree = $valeurs[mt_rand(0, count($valeurs)-1)];
			
				$melange_lien[] = $valTiree;
				$index = array_search($valTiree, $lien);
				$melange_titre[] = $titre[$index];
				$melange_pdate[] = $pdate[$index];
				$melange_adate[] = $adate[$index];
				unset($lien[$index]);
			}
			$lien = $melange_lien;
			$titre = $melange_titre;
			$pdate = $melange_pdate;
			$adate = $melange_adate;
		}
		else {
			for($i=0; $i<$nb; $i++){
				$valeurs = array_values($pdate);
				$index = array_search(max($valeurs), $pdate);
				$tri_lien[] = $lien[$index];
				$tri_titre[] = $titre[$index];
				$tri_pdate[] = $pdate[$index];
				$tri_adate[] = $adate[$index];
				unset($pdate[$index]);
			}
			$lien = $tri_lien;
			$titre = $tri_titre;
			$pdate = $tri_pdate;
			$adate = $tri_adate;
		}
		
		// fin du melange ou tri
		$res = ($w->content_only ? '' : '<div class="amis'.($w->class ? ' '.html::escapeHTML($w->class) : '').'">').
		($w->title ? '<h2>'.html::escapeHTML($w->title).'</h2>' : '').
		'<ul>';
		
		for ($i = 0; $i < $nb; $i++ ){

			$titre[$i] = (html::escapeHTML($titre[$i]) != '' ? html::escapeHTML($titre[$i]) : '--');
			
			$res .= '<li>'.($w->montre_date ? html::escapeHTML($adate[$i]).' ' : '').'<a href="'.html::escapeHTML($lien[$i]).'">'.$titre[$i].'</a></li>';
		}
		
		$res .= '</ul>'.
		($w->content_only ? '' : '</div>');
		
		return $res;
	}
}
?>
