<?php
/*
Plugin Name: Service Link
Plugin URI: http://blog.itechtalk.com/2008/service_link/
Description: Automatically add links on your posts to popular social bookmarking site.
Version: 1.0
Author: Iahead
Author URI: http://blog.itechtalk.com/

Copyright 2004 Iahead (info@iahead.com)
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

// Pre-2.6 compatibility
if ( !defined('WP_CONTENT_URL') )
    define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
if ( !defined('WP_CONTENT_DIR') )
    define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
 
// Guess the location
$sociablepluginpath = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/';

function sociable_init_locale(){
	load_plugin_textdomain('service_link', $sociablepluginpath);
}
add_filter('init', 'sociable_init_locale');

$sociable_known_sites = Array(

	'BarraPunto' => Array(
		'favicon' => 'barrapunto.png',
		'url' => 'http://barrapunto.com/submit.pl?subj=TITLE&amp;story=PERMALINK',
	),
	
	'blinkbits' => Array(
		'favicon' => 'blinkbits.png',
		'url' => 'http://www.blinkbits.com/bookmarklets/save.php?v=1&amp;source_url=PERMALINK&amp;title=TITLE&amp;body=TITLE',
	),

	'BlinkList' => Array(
		'favicon' => 'blinklist.png',
		'url' => 'http://www.blinklist.com/index.php?Action=Blink/addblink.php&amp;Url=PERMALINK&amp;Title=TITLE',
	),

	'BlogMemes' => Array(
		'favicon' => 'blogmemes.png',
		'url' => 'http://www.blogmemes.net/post.php?url=PERMALINK&amp;title=TITLE',
	),

	'BlogMemes Fr' => Array(
		'favicon' => 'blogmemes.png',
		'url' => 'http://www.blogmemes.fr/post.php?url=PERMALINK&amp;title=TITLE',
	),

	'BlogMemes Sp' => Array(
		'favicon' => 'blogmemes.png',
		'url' => 'http://www.blogmemes.com/post.php?url=PERMALINK&amp;title=TITLE',
	),

	'BlogMemes Cn' => Array(
		'favicon' => 'blogmemes.png',
		'url' => 'http://www.blogmemes.cn/post.php?url=PERMALINK&amp;title=TITLE',
	),

	'BlogMemes Jp' => Array(
		'favicon' => 'blogmemes.png',
		'url' => 'http://www.blogmemes.jp/post.php?url=PERMALINK&amp;title=TITLE',
	),

	'blogmarks' => Array(
		'favicon' => 'blogmarks.png',
		'url' => 'http://blogmarks.net/my/new.php?mini=1&amp;simple=1&amp;url=PERMALINK&amp;title=TITLE',
	),

	'Blogosphere News' => Array(
		'favicon' => 'blogospherenews.gif',
		'url' => 'http://www.blogospherenews.com/submit.php?url=PERMALINK&amp;title=TITLE',
	),

	'Blogsvine' => Array(
		'favicon' => 'blogsvine.png',
		'url' => 'http://blogsvine.com/submit.php?url=PERMALINK',
	),
	
	'blogtercimlap' => Array(
		'favicon' => 'blogter.png',
		'url' => 'http://cimlap.blogter.hu/index.php?action=suggest_link&amp;title=TITLE&amp;url=PERMALINK',
	),

	'Blue Dot' => Array(
		'favicon' => 'bluedot.png',
		'url' => 'http://bluedot.us/Authoring.aspx?u=PERMALINK&amp;title=TITLE',
	),

	'Book.mark.hu' => Array(
		'favicon' => 'bookmarkhu.png',
		'url' => 'http://book.mark.hu/bookmarks.php/?action=add&amp;address=PERMALINK%2F&amp;title=TITLE',
                'description' => 'description',
	),

	'Bumpzee' => Array(
		'favicon' => 'bumpzee.png',
		'url' => 'http://www.bumpzee.com/bump.php?u=PERMALINK',
	),

	'co.mments' => Array(
		'favicon' => 'co.mments.gif',
		'url' => 'http://co.mments.com/track?url=PERMALINK&amp;title=TITLE',
	),

	'connotea' => Array(
		'favicon' => 'connotea.png',
		'url' => 'http://www.connotea.org/addpopup?continue=confirm&amp;uri=PERMALINK&amp;title=TITLE',
	),
	
     'Dapx' => Array(
		'favicon' => 'dapx.png',
		'url' => 'http://dapx.com/submit?phase=2&amp;url=PERMALINK&amp;title=TITLE',
		'description' => 'dapx',
	),


	'del.icio.us' => Array(
		'favicon' => 'delicious.png',
		'url' => 'http://del.icio.us/post?url=PERMALINK&amp;title=TITLE',
	),

	'De.lirio.us' => Array(
		'favicon' => 'delirious.png',
		'url' => 'http://de.lirio.us/rubric/post?uri=PERMALINK;title=TITLE;when_done=go_back',
	),

	'Design Float' => Array(
		'favicon' => 'designfloat.gif',
		'url' => 'http://www.designfloat.com/submit.php?url=PERMALINK&amp;title=TITLE',
	),

	'Digg' => Array(
		'favicon' => 'digg.png',
		'url' => 'http://digg.com/submit?phase=2&amp;url=PERMALINK&amp;title=TITLE',
		'description' => 'Digg',
	),

	'DotNetKicks' => Array(
		'favicon' => 'dotnetkicks.png',
		'url' => 'http://www.dotnetkicks.com/kick/?url=PERMALINK&amp;title=TITLE',
		'description' => 'description',
	),

	'DZone' => Array(
		'favicon' => 'dzone.png',
		'url' => 'http://www.dzone.com/links/add.html?url=PERMALINK&amp;title=TITLE',
		'description' => 'description',
	),

	'eKudos' => Array(
		'favicon' => 'ekudos.gif',
		'url' => 'http://www.ekudos.nl/artikel/nieuw?url=PERMALINK&amp;title=TITLE',
	),

	'email' => Array(
		'favicon' => 'email_link.png',
		'url' => 'mailto:?subject=TITLE&amp;body=PERMALINK',
		'description' => 'E-mail this story to a friend!',
	),

	'Facebook' => Array(
		'favicon' => 'facebook.png',
		'url' => 'http://www.facebook.com/sharer.php?u=PERMALINK&amp;t=TITLE',
	),

	'Fark' => Array(
		'favicon' => 'fark.png',
		'url' => 'http://cgi.fark.com/cgi/fark/edit.pl?new_url=PERMALINK&amp;new_comment=TITLE&amp;new_comment=BLOGNAME&amp;linktype=Misc',
		// To post to a different category, see the drop-down box labeled "Link Type" at
		// http://cgi.fark.com/cgi/fark/submit.pl for a complete list
	),

	'feedmelinks' => Array(
		'favicon' => 'feedmelinks.png',
		'url' => 'http://feedmelinks.com/categorize?from=toolbar&amp;op=submit&amp;url=PERMALINK&amp;name=TITLE',
	),

	'Furl' => Array(
		'favicon' => 'furl.png',
		'url' => 'http://www.furl.net/storeIt.jsp?u=PERMALINK&amp;t=TITLE',
	),

	'Fleck' => Array(
		'favicon' => 'fleck.gif',
		'url' => 'http://extension.fleck.com/?v=b.0.804&amp;url=PERMALINK',
	),

	'Global Grind' => Array (
		'favicon' => 'globalgrind.gif',
		'url' => 'http://globalgrind.com/submission/submit.aspx?url=PERMALINK&amp;type=Article&amp;title=TITLE'
	),
	
	'Google' => Array (
		'favicon' => 'googlebookmark.png',
		'url' => 'http://www.google.com/bookmarks/mark?op=edit&amp;bkmk=PERMALINK&amp;title=TITLE'
	),
	
	'Gwar' => Array(
		'favicon' => 'gwar.gif',
		'url' => 'http://www.gwar.pl/DodajGwar.html?u=PERMALINK',
	),

	'Haohao' => Array(
		'favicon' => 'haohao.png',
		'url' => 'http://www.haohaoreport.com/submit.php?url=PERMALINK&amp;title=TITLE',
	),

	'HealthRanker' => Array(
		'favicon' => 'healthranker.gif',
		'url' => 'http://healthranker.com/submit.php?url=PERMALINK&amp;title=TITLE',
	),

	'Hemidemi' => Array(
		'favicon' => 'hemidemi.png',
		'url' => 'http://www.hemidemi.com/user_bookmark/new?title=TITLE&amp;url=PERMALINK',
	),
	'Jeqq' => Array(
		'favicon' => 'jeqq.png',
		'url' => 'http://jeqq.com/submit?phase=2&amp;url=PERMALINK&amp;title=TITLE',
		'description' => 'Jeqq',
	),

	'IndiaGram' => Array(
		'favicon' => 'indiagram.png',
		'url' => 'http://www.indiagram.com/mock/bookmarks/desitrain?action=add&amp;address=PERMALINK&amp;title=TITLE',
	),

	'IndianPad' => Array(
		'favicon' => 'indianpad.png',
		'url' => 'http://www.indianpad.com/submit.php?url=PERMALINK',
	),

	'Internetmedia' => Array(
		'favicon' => 'im.png',
		'url' => 'http://internetmedia.hu/submit.php?url=PERMALINK'
	),

	'kick.ie' => Array(
		'favicon' => 'kickit.png',
		'url' => 'http://kick.ie/submit/?url=PERMALINK&amp;title=TITLE',
	),

	'Kirtsy' => Array(
		'favicon' => 'kirtsy.gif',
		'url' => 'http://www.kirtsy.com/submit.php?url=PERMALINK&amp;title=TITLE',
	),

	'laaik.it' => Array(
		'favicon' => 'laaikit.png',
		'url' => 'http://laaik.it/NewStoryCompact.aspx?uri=PERMALINK&amp;headline=TITLE&amp;cat=5e082fcc-8a3b-47e2-acec-fdf64ff19d12',
	),

	'LinkArena' => Array(
		'favicon' => 'linkarena.gif',
		'url' => 'http://linkarena.com/bookmarks/addlink/?url=PERMALINK&amp;title=TITLE',
	),
	
	'LinkaGoGo' => Array(
		'favicon' => 'linkagogo.png',
		'url' => 'http://www.linkagogo.com/go/AddNoPopup?url=PERMALINK&amp;title=TITLE',
	),

	'LinkedIn' => Array(
		'favicon' => 'linkedin.png',
		'url' => 'http://www.linkedin.com/shareArticle?mini=true&amp;url=PERMALINK&amp;title=TITLE&amp;source=BLOGNAME&amp;summary=EXCERPT',
	),

	'Linkter' => Array(
		'favicon' => 'linkter.png',
		'url' => 'http://www.linkter.hu/index.php?action=suggest_link&amp;url=PERMALINK&amp;title=TITLE',
	),
	
	'Live' => Array(
		'favicon' => 'live.png',
		'url' => 'https://favorites.live.com/quickadd.aspx?marklet=1&amp;url=PERMALINK&amp;title=TITLE',
	),

	'Ma.gnolia' => Array(
		'favicon' => 'magnolia.png',
		'url' => 'http://ma.gnolia.com/bookmarklet/add?url=PERMALINK&amp;title=TITLE',
	),

	'Meneame' => Array(
		'favicon' => 'meneame.gif',
		'url' => 'http://meneame.net/submit.php?url=PERMALINK',
	),
	
	'MisterWong' => Array(
		'favicon' => 'misterwong.gif',
		'url' => 'http://www.mister-wong.com/addurl/?bm_url=PERMALINK&amp;bm_description=TITLE&amp;plugin=soc',
	),

	'MisterWong.DE' => Array(
		'favicon' => 'misterwong.gif',
		'url' => 'http://www.mister-wong.de/addurl/?bm_url=PERMALINK&amp;bm_description=TITLE&amp;plugin=soc',
	),
	
	'Mixx' => Array(
		'favicon' => 'mixx.png',
		'url' => 'http://www.mixx.com/submit?page_url=PERMALINK&amp;title=TITLE',
	),
	
	'muti' => Array(
		'favicon' => 'muti.png',
		'url' => 'http://www.muti.co.za/submit?url=PERMALINK&amp;title=TITLE',
	),
	
	'MyShare' => Array(
		'favicon' => 'myshare.png',
		'url' => 'http://myshare.url.com.tw/index.php?func=newurl&amp;url=PERMALINK&amp;desc=TITLE',
	),

	'N4G' => Array(
		'favicon' => 'n4g.gif',
		'url' => 'http://www.n4g.com/tips.aspx?url=PERMALINK&amp;title=TITLE',
	),
	
	'NewsVine' => Array(
		'favicon' => 'newsvine.png',
		'url' => 'http://www.newsvine.com/_tools/seed&amp;save?u=PERMALINK&amp;h=TITLE',
	),

	'Netvouz' => Array(
		'favicon' => 'netvouz.png',
		'url' => 'http://www.netvouz.com/action/submitBookmark?url=PERMALINK&amp;title=TITLE&amp;popup=no',
	),

	'NuJIJ' => Array(
		'favicon' => 'nujij.gif',
		'url' => 'http://nujij.nl/jij.lynkx?t=TITLE&amp;u=PERMALINK',
	),

	'PlugIM' => Array(
		'favicon' => 'plugim.png',
		'url' => 'http://www.plugim.com/submit?url=PERMALINK&amp;title=TITLE',
	),

	'PopCurrent' => Array(
		'favicon' => 'popcurrent.png',
		'url' => 'http://popcurrent.com/submit?url=PERMALINK&amp;title=TITLE&amp;rss=RSS',
        'description' => 'description',
	),

	'Pownce' => Array(
		'favicon' => 'pownce.gif',
		'url' => 'http://pownce.com/send/link/?url=PERMALINK&amp;note_body=TITLE&amp;note_to=all'
	),

	'ppnow' => Array(
		'favicon' => 'ppnow.png',
		'url' => 'http://www.ppnow.net/submit.php?url=PERMALINK',
	),
	
	'Print' => Array(
		'favicon' => 'printer.png',
		'url' => 'javascript:window.print();',
		'description' => 'Print this article!',
	),
	
	'Propeller' => Array(
		'favicon' => 'propeller.gif',
		'url' => 'http://www.propeller.com/submit/?U=PERMALINK&amp;T=TITLE',
	),

	'Ratimarks' => Array(
		'favicon' => 'ratimarks.png',
		'url' => 'http://ratimarks.org/bookmarks.php/?action=add&address=PERMALINK&amp;title=TITLE',
	),

	'RawSugar' => Array(
		'favicon' => 'rawsugar.png',
		'url' => 'http://www.rawsugar.com/tagger/?turl=PERMALINK&amp;tttl=TITLE',
	),

	'Rec6' => Array(
		'favicon' => 'rec6.gif',
		'url' => 'http://www.syxt.com.br/rec6/link.php?url=PERMALINK&amp;=TITLE',
	),

	'Reddit' => Array(
		'favicon' => 'reddit.png',
		'url' => 'http://reddit.com/submit?url=PERMALINK&amp;title=TITLE',
	),

	'SalesMarks' => Array(
		'favicon' => 'salesmarks.gif',
		'url' => 'http://salesmarks.com/submit?edit[url]=PERMALINK&amp;edit[title]=TITLE',
	),
	
	'Scoopeo' => Array(
		'favicon' => 'scoopeo.png',
		'url' => 'http://www.scoopeo.com/scoop/new?newurl=PERMALINK&amp;title=TITLE',
	),	

	'scuttle' => Array(
		'favicon' => 'scuttle.png',
		'url' => 'http://www.scuttle.org/bookmarks.php/maxpower?action=add&amp;address=PERMALINK&amp;title=TITLE',
                'description' => 'description',
	),

	'Segnalo' => Array(
		'favicon' => 'segnalo.gif',
		'url' => 'http://segnalo.alice.it/post.html.php?url=PERMALINK&amp;title=TITLE',
	),

	'Shadows' => Array(
		'favicon' => 'shadows.png',
		'url' => 'http://www.shadows.com/features/tcr.htm?url=PERMALINK&amp;title=TITLE',
	),

	'Simpy' => Array(
		'favicon' => 'simpy.png',
		'url' => 'http://www.simpy.com/simpy/LinkAdd.do?href=PERMALINK&amp;title=TITLE',
	),

	'Slashdot' => Array(
		'favicon' => 'slashdot.png',
		'url' => 'http://slashdot.org/bookmark.pl?title=TITLE&amp;url=PERMALINK',
	),

	'Smarking' => Array(
		'favicon' => 'smarking.png',
		'url' => 'http://smarking.com/editbookmark/?url=PERMALINK&amp;title=TITLE',
	),

	'Socialogs' => Array(
		'favicon' => 'socialogs.gif',
		'url' => 'http://socialogs.com/add_story.php?story_url=PERMALINK&amp;story_title=TITLE',
	),
	
	'Spurl' => Array(
		'favicon' => 'spurl.png',
		'url' => 'http://www.spurl.net/spurl.php?url=PERMALINK&amp;title=TITLE',
	),

	'SphereIt' => Array(
		'favicon' => 'sphere.png',
		'url' => 'http://www.sphere.com/search?q=sphereit:PERMALINK&amp;title=TITLE',
	),

	'Sphinn' => Array(
		'favicon' => 'sphinn.png',
		'url' => 'http://sphinn.com/submit.php?url=PERMALINK&amp;title=TITLE',
	),

	'StumbleUpon' => Array(
		'favicon' => 'stumbleupon.png',
		'url' => 'http://www.stumbleupon.com/submit?url=PERMALINK&amp;title=TITLE',
	),

	'Taggly' => Array(
		'favicon' => 'taggly.png',
		'url' => 'http://taggly.com/bookmarks.php/pass?action=add&amp;address=',
	),

	'Technorati' => Array(
		'favicon' => 'technorati.png',
		'url' => 'http://technorati.com/faves?add=PERMALINK',
	),

	'TailRank' => Array(
		'favicon' => 'tailrank.png',
		'url' => 'http://tailrank.com/share/?text=&amp;link_href=PERMALINK&amp;title=TITLE',
	),

	'ThisNext' => Array(
		'favicon' => 'thisnext.png',
		'url' => 'http://www.thisnext.com/pick/new/submit/sociable/?url=PERMALINK&amp;name=TITLE',
	),

	'TwitThis' => Array(
		'favicon' => 'twitter.png',
		'url' => 'http://twitthis.com/twit?url=PERMALINK',
	),

	'Upnews' => Array(
			'favicon' => 'upnews.gif',
			'url' => 'http://www.upnews.it/submit?url=PERMALINK&title=TITLE',
	),
	
	'Webnews.de' => Array(
        'favicon' => 'webnews.gif',
        'url' => 'http://www.webnews.de/einstellen?url=PERMALINK&amp;title=TITLE',
    ),

	'Webride' => Array(
		'favicon' => 'webride.png',
		'url' => 'http://webride.org/discuss/split.php?uri=PERMALINK&amp;title=TITLE',
	),

	'Wikio' => Array(
		'favicon' => 'wikio.gif',
		'url' => 'http://www.wikio.com/vote?url=PERMALINK',
	),

	'Wikio FR' => Array(
		'favicon' => 'wikio.gif',
		'url' => 'http://www.wikio.fr/vote?url=PERMALINK',
	),

	'Wikio IT' => Array(
		'favicon' => 'wikio.gif',
		'url' => 'http://www.wikio.it/vote?url=PERMALINK',
	),
	
	'Wists' => Array(
		'favicon' => 'wists.png',
		'url' => 'http://wists.com/s.php?c=&amp;r=PERMALINK&amp;title=TITLE',
		'class' => 'wists',
	),

	'Wykop' => Array(
		'favicon' => 'wykop.gif',
		'url' => 'http://www.wykop.pl/dodaj?url=PERMALINK',
	),

	'Xerpi' => Array(
		'favicon' => 'xerpi.gif',
		'url' => 'http://www.xerpi.com/block/add_link_from_extension?url=PERMALINK&amp;title=TITLE',
	),

	'YahooMyWeb' => Array(
		'favicon' => 'yahoomyweb.png',
		'url' => 'http://myweb2.search.yahoo.com/myresults/bookmarklet?u=PERMALINK&amp;=TITLE',
	),

	'Yigg' => Array(
		'favicon' => 'yiggit.png',
		'url' => 'http://yigg.de/neu?exturl=PERMALINK&amp;exttitle=TITLE',
	 ),
);

$sociable_files = Array(
	'description_selection.js',
	'sociable-admin.css',
	'sociable.css',
	'service_link.php',
	'sociable-admin.css',
	'wists.js',
	'images/',
	'images/barrapunto.png',
	'images/blinkbits.png',
	'images/blinklist.png',
	'images/blogmarks.png',
	'images/blogmemes.png',
	'images/blogospherenews.gif',
	'images/blogsvine.png',
	'images/blogter.png',
	'images/bluedot.png',
	'images/bookmarkhu.png',
	'images/bumpzee.png',
	'images/co.mments.gif',
	'images/connotea.png',
        'images/dapx.png',
	'images/delicious.png',
	'images/delirious.png',
	'images/designfloat.gif',
	'images/digg.png',
	'images/dotnetkicks.png',
	'images/dzone.png',
	'images/ekudos.gif',
	'images/email.gif',
	'images/facebook.png',
	'images/fark.png',
	'images/feedmelinks.png',
	'images/fleck.gif',
	'images/furl.png',
	'images/globalgrind.gif',
	'images/googlebookmark.png',
	'images/gwar.gif',
	'images/haohao.png',
	'images/healthranker.gif',
	'images/hemidemi.png',
        'images/jeqq.png',  
	'images/im.png',
	'images/indiagram.png',
	'images/indianpad.png',
	'images/kickit.png',
	'images/kirtsy.gif',
	'images/laaikit.png',
	'images/linkagogo.png',
	'images/linkarena.gif',
	'images/linkedin.png',
	'images/linkter.png',
	'images/linkter.png',
	'images/live.png',
	'images/magnolia.png',
	'images/meneame.gif',
	'images/misterwong.gif',
	'images/mixx.png',
	'images/muti.png',
	'images/myshare.png',
	'images/n4g.gif',
	'images/netvouz.png',
	'images/newsvine.png',
	'images/nujij.gif',
	'images/plugim.png',
	'images/popcurrent.png',
	'images/pownce.gif',
	'images/ppnow.png',
	'images/print.gif',
	'images/propeller.gif',
	'images/ratimarks.png',	
	'images/rawsugar.png',
	'images/rec6.gif',
	'images/reddit.png',
	'images/salesmarks.gif',
	'images/scoopeo.png',
	'images/scuttle.png',
	'images/segnalo.gif',
	'images/shadows.png',
	'images/simpy.png',
	'images/slashdot.png',
	'images/smarking.png',
	'images/socialogs.gif',
	'images/sphere.png',
	'images/sphinn.png',
	'images/spurl.png',
	'images/stumbleupon.png',
	'images/taggly.png',
	'images/tailrank.png',
	'images/technorati.png',
	'images/twitter.png',
	'images/upnews.gif',
	'images/webnews.gif',
	'images/webride.png',
	'images/wikio.gif',
	'images/wists.png',
	'images/wykop.gif',
	'images/yahoomyweb.png',
	'images/yiggit.png',
	'jquery/',
	'jquery/ui.core.js',
	'jquery/ui.sortable.js',
	'jquery/jquery.js',
);

function sociable_html($display=Array()) {
	global $sociable_known_sites, $sociablepluginpath, $wp_query; 

	$active_sites = get_option('sociable_active_sites');

	$html = "";

	$imagepath = $sociablepluginpath.'images/';

	// if no sites are specified, display all active
	// have to check $active_sites has content because WP
	// won't save an empty array as an option
	if (empty($display) and $active_sites)
		$display = $active_sites;
	// if no sites are active, display nothing
	if (empty($display))
		return "";

	// Load the post's data
	$blogname 	= urlencode(get_bloginfo('name')." ".get_bloginfo('description'));
	$post 		= $wp_query->post;
	
	$excerpt	= $post->post_excerpt;
	if ($excerpt == "") {
		$excerpt = urlencode(substr(strip_tags($post->post_content),0,250));
	}
	$excerpt	= str_replace('+','%20',$excerpt);
	
	$permalink 	= urlencode(get_permalink($post->ID));
	
	$title 		= urlencode($post->post_title);
	$title 		= str_replace('+','%20',$title);
	
	$rss 		= urlencode(get_bloginfo('ref_url'));

	$html .= "\n<div class=\"sociable\">\n<div class=\"sociable_tagline\">\n";
	$html .= stripslashes(get_option("sociable_tagline"));
	// $html .= "\n\t<span>" . __("These icons link to social bookmarking sites where readers can share and discover new web pages.", 'sociable') . "</span>";
	$html .= "\n</div>\n<ul>\n";

	foreach($display as $sitename) {
		// if they specify an unknown or inactive site, ignore it
		if (!in_array($sitename, $active_sites))
			continue;

		$site = $sociable_known_sites[$sitename];

		$url = $site['url'];
		$url = str_replace('PERMALINK', $permalink, $url);
		$url = str_replace('TITLE', $title, $url);
		$url = str_replace('RSS', $rss, $url);
		$url = str_replace('BLOGNAME', $blogname, $url);
		$url = str_replace('EXCERPT', $excerpt, $url);

		if (isset($site['description']) && $site['description'] != "") {
			$description = $site['description'];
		} else {
			$description = $sitename;
		}
		$link = "<li>";		
		$link .= "<a rel=\"nofollow\"";
		if (get_option('sociable_usetargetblank')) {
			$link .= " target=\"_blank\"";
		}
		$link .= " href=\"$url\" title=\"$description\">";
		$link .= "<img src=\"$imagepath{$site['favicon']}\" title=\"$description\" alt=\"$description\" class=\"sociable-hovers";
		if ($site['class'])
			$link .= " sociable_{$site['class']}";
		$link .= "\" />";
		$link .= "</a></li>";
		
		$html .= "\t".apply_filters('sociable_link',$link)."\n";
	}

	$html .= "</ul>\n</div>\n";

	return $html;
}

// Hook the_content to output html if we should display on any page
$sociable_contitionals = get_option('sociable_conditionals');
if (is_array($sociable_contitionals) and in_array(true, $sociable_contitionals)) {
	add_filter('the_content', 'sociable_display_hook');
	add_filter('the_excerpt', 'sociable_display_hook');
	// add_filter('the_excerpt_rss', 'sociable_display_hook');
	
	function sociable_display_hook($content='') {
		$conditionals = get_option('sociable_conditionals');
		if ((is_home()     and $conditionals['is_home']) or
		    (is_single()   and $conditionals['is_single']) or
		    (is_page()     and $conditionals['is_page']) or
		    (is_category() and $conditionals['is_category']) or
		    (is_date()     and $conditionals['is_date']) or
		    (is_search()   and $conditionals['is_search'])) {
			$content .= sociable_html();
		} elseif ((is_feed() and $conditionals['is_feed'])) {
			$sociable_html = sociable_html();
			$sociable_html = strip_tags($sociable_html,"<a><img>");
			$sociable_html = str_replace('<a rel="nofollow" title="Print this article!"><img src="'.$imagepath.'printer.png" title="Print this article!" alt="Print this article!" class="sociable-hovers" /></a>','',$sociable_html);
			$content .= $sociable_html . "<br/><br/>";
		}
		return $content;
	}
}

// Hook wp_head to add css
add_action('wp_head', 'sociable_wp_head');
function sociable_wp_head() {
	global $sociablepluginpath;
	if (in_array('Wists', get_option('sociable_active_sites'))) {
		echo '<script language="JavaScript" type="text/javascript" src="' . $sociablepluginpath . 'wists.js"></script>'."\n";
	}
	if (get_option('sociable_usecss') == true) {
		echo '<link rel="stylesheet" type="text/css" media="screen" href="' . $sociablepluginpath . 'sociable.css" />'."\n";
	}
}

// load wp rss functions for update checking.
if (!function_exists('parse_w3cdtf')) {
	require_once(ABSPATH . WPINC . '/rss-functions.php');
}

// Plugin config/data setup
register_activation_hook(__FILE__, 'sociable_activation_hook');

function sociable_activation_hook() {
	return sociable_restore_config(False);
}

// restore built-in defaults, optionally overwriting existing values
function sociable_restore_config($force=False) {
	// Load defaults, taking care not to smash already-set options
	global $sociable_known_sites;

	if ($force or !is_array(get_option('sociable_active_sites')))
		update_option('sociable_active_sites', array(
			'Digg',
                  'Dapx',
			'Sphinn',
			'del.icio.us',
			'Facebook',
                  'Jeqq', 
			'Mixx',
			'Google',
		));

	// tagline defaults to a Hitchiker's Guide to the Galaxy reference
	if ($force or !is_string(get_option('sociable_tagline')))
		update_option('sociable_tagline', "<strong>" . __("Share and Enjoy:", 'sociable') . "</strong>");

	// only display on single posts and pages by default
	if ($force or !is_array(get_option('sociable_conditionals')))
		update_option('sociable_conditionals', array(
			'is_home' => False,
			'is_single' => True,
			'is_page' => True,
			'is_category' => False,
			'is_date' => False,
			'is_search' => False,
			'is_feed' => False,
		));

	if ($force or !is_bool(get_option('usecss')))
		update_option('sociable_usecss', true);
}

// Hook the admin_menu display to add admin page
add_action('admin_menu', 'sociable_admin_menu');
function sociable_admin_menu() {
	add_submenu_page('options-general.php', 'service_link', 'Service_link', 8, 'Sociable', 'sociable_submenu');
}

// Admin page header
add_action('admin_head', 'sociable_admin_head');
function sociable_admin_head() {
	if ($_GET['page'] == 'service_link') {
		global $sociablepluginpath, $wp_version;

		if ($wp_version < "2.6") { 
	?>
	<script language="JavaScript" type="text/javascript" src="<?php echo $sociablepluginpath; ?>jquery/jquery.js"></script>
	<?php } ?>
	<script language="JavaScript" type="text/javascript" src="<?php echo $sociablepluginpath; ?>jquery/ui.core.js"></script>

	<script language="JavaScript" type="text/javascript" src="<?php echo $sociablepluginpath; ?>jquery/ui.sortable.js"></script>
	<script language="JavaScript" type="text/javascript"><!--
	jQuery(document).ready(function(){
	  jQuery("#sociable_site_list").sortable({});
	});
	/* make checkbox action prettier */
	function toggle_checkbox(id) {
		var checkbox = document.getElementById(id);

		checkbox.checked = !checkbox.checked;
		if (checkbox.checked)
			checkbox.parentNode.className = 'active';
		else
			checkbox.parentNode.className = 'inactive';
	}
	--></script>

	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $sociablepluginpath; ?>sociable-admin.css" />
<?php
	}
}

function sociable_message($message) {
	echo "<div id=\"message\" class=\"updated fade\"><p>$message</p></div>\n";
}

// Sanity check the upload worked
function sociable_upload_errors() {
	global $sociable_files;

	$cwd = getcwd(); // store current dir for restoration
	if (!@chdir('../wp-content/plugins'))
		return __("Couldn't find wp-content/plugins folder. Please make sure WordPress is installed correctly.", 'service_link');
	if (!is_dir('service_link'))
		return __("Can't find service_link folder.", 'service_link');
	chdir('service_link');

	foreach($sociable_files as $file) {
		if (substr($file, -1) == '/') {
			if (!is_dir(substr($file, 0, strlen($file) - 1)))
				return __("Can't find folder:", 'sociable') . " <kbd>$file</kbd>";
		} else if (!is_file($file))
		return __("Can't find file:", 'sociable') . " <kbd>$file</kbd>";
	}


	$header_filename = '../../themes/' . get_option('template') . '/header.php';
	if (!file_exists($header_filename) or strpos(@file_get_contents($header_filename), 'wp_head()') === false)
		return __("Your theme isn't set up for Sociable to load its style. Please edit <kbd>header.php</kbd> and add a line reading <kbd>&lt?php wp_head(); ?&gt;</kbd> before <kbd>&lt;/head&gt;</kbd> to fix this.", 'sociable');

	chdir($cwd); // restore cwd

	return false;
}

// The admin page
function sociable_submenu() {
	global $sociable_known_sites, $sociable_date, $sociable_files, $sociablepluginpath;

	// update options in db if requested
	if ($_REQUEST['restore']) {
		sociable_restore_config(True);
		sociable_message(__("Restored all settings to defaults.", 'sociable'));
	} else if ($_REQUEST['save']) {
		// update active sites
		$active_sites = Array();
		if (!$_REQUEST['active_sites'])
			$_REQUEST['active_sites'] = Array();
		foreach($_REQUEST['active_sites'] as $sitename=>$dummy)
			$active_sites[] = $sitename;
		update_option('sociable_active_sites', $active_sites);
		// have to delete and re-add because update doesn't hit the db for identical arrays
		// (sorting does not influence associated array equality in PHP)
		delete_option('sociable_active_sites', $active_sites);
		add_option('sociable_active_sites', $active_sites);

		if ($_POST['usetargetblank']) {
			update_option('sociable_usetargetblank',true);
		} else {
			update_option('sociable_usetargetblank',false);
		}
		
		// update conditional displays
		$conditionals = Array();
		if (!$_POST['conditionals'])
			$_POST['conditionals'] = Array();
		
		$curconditionals = get_option('sociable_conditionals');
		if (!array_key_exists('is_feed',$curconditionals)) {
			$curconditionals['is_feed'] = false;
		}
		foreach($curconditionals as $condition=>$toggled)
			$conditionals[$condition] = array_key_exists($condition, $_POST['conditionals']);
			
		update_option('sociable_conditionals', $conditionals);

		// update tagline
		if (!$_REQUEST['tagline'])
			$_REQUEST['tagline'] = "";
		update_option('sociable_tagline', $_REQUEST['tagline']);

		if (!$_REQUEST['usecss'])
			$usecss = false;
		else
			$usecss = true;
		update_option('sociable_usecss', $usecss);
		
		sociable_message(__("Saved changes.", 'sociable'));
	}

	if ($str = sociable_upload_errors())
		sociable_message("$str</p><p>" . __("In your plugins/sociable folder, you must have these files:", 'sociable') . ' <pre>' . implode("\n", $sociable_files) ); 
	
	// show active sites first and in order
	$active_sites = get_option('sociable_active_sites');
	$active = Array(); $disabled = $sociable_known_sites;
	foreach($active_sites as $sitename) {
		$active[$sitename] = $disabled[$sitename];
		unset($disabled[$site]);
	}
	uksort($disabled, "strnatcasecmp");

	// load options from db to display
	$tagline 		= stripslashes(get_option('sociable_tagline'));
	$conditionals 	= get_option('sociable_conditionals');
	$updated 		= get_option('sociable_updated');
	$usetargetblank = get_option('sociable_usetargetblank');
	// display options
?>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">

<div class="wrap">
	<h2><?php _e("Sociable Options", 'sociable'); ?></h2>
	<table class="form-table">
	<tr>
		<th style="margin-bottom:0; border-bottom-width:0;"><?php _e("Sites", "sociable"); ?></th>
		<td style="margin-bottom:0; border-bottom-width:0;"><?php _e("Drag and drop sites to reorder them. Only the sites you check will appear publicly.", 'sociable'); ?></td>
	</tr>
	<tr>
		<td colspan="2">
			<ul id="sociable_site_list">
				<?php foreach (array_merge($active, $disabled) as $sitename=>$site) { ?>
					<li style="font-size:10px;"
						id="<?php echo $sitename; ?>"
						class="sociable_site <?php echo (in_array($sitename, $active_sites)) ? "active" : "inactive"; ?>">
						<input
							type="checkbox"
							id="cb_<?php echo $sitename; ?>"
							class="checkbox"
							name="active_sites[<?php echo $sitename; ?>]"
							onclick="javascript:toggle_checkbox('<?php echo $sitename; ?>');"
							<?php echo (in_array($sitename, $active_sites)) ? ' checked="checked"' : ''; ?>
						/>
						<img src="<?php echo $sociablepluginpath.'images/'.$site['favicon']; ?>" width="16" height="16" alt="" />
						<?php print $sitename; ?>
					</li>
				<?php } ?>
			</ul>
			<input type="hidden" id="site_order" name="site_order" value="<?php echo join('|', array_keys($sociable_known_sites)) ?>" />
		</td>
	</tr>
	<tr>
		<th scope="row" valign="top">
			Tagline:
		</th>
		<td>
			<?php _e("Change the text displayed in front of the icons below. For complete customization, edit <kbd>sociable.css</kbd> in the Sociable plugin directory.", 'sociable'); ?><br/>
			<input type="text" name="tagline" value="<?php echo htmlspecialchars($tagline); ?>" />
		</td>
	</tr>
	<tr>
		<th scope="row" valign="top">
			<?php _e("Position:", "sociable"); ?>
		</th>
		<td>
			<?php _e("The icons appear at the end of each blog post, and posts may show on many different types of pages. Depending on your theme and audience, it may be tacky to display icons on all types of pages.", 'sociable'); ?><br/>
			<br/>
			<input type="checkbox" name="conditionals[is_home]"<?php echo ($conditionals['is_home']) ? ' checked="checked"' : ''; ?> /> <?php _e("Front page of the blog", 'sociable'); ?><br/>
			<input type="checkbox" name="conditionals[is_single]"<?php echo ($conditionals['is_single']) ? ' checked="checked"' : ''; ?> /> <?php _e("Individual blog posts", 'sociable'); ?><br/>
			<input type="checkbox" name="conditionals[is_page]"<?php echo ($conditionals['is_page']) ? ' checked="checked"' : ''; ?> /> <?php _e('Individual WordPress "Pages"', 'sociable'); ?><br/>
			<input type="checkbox" name="conditionals[is_category]"<?php echo ($conditionals['is_category']) ? ' checked="checked"' : ''; ?> /> <?php _e("Category archives", 'sociable'); ?><br/>
			<input type="checkbox" name="conditionals[is_date]"<?php echo ($conditionals['is_date']) ? ' checked="checked"' : ''; ?> /> <?php _e("Date-based archives", 'sociable'); ?><br/>
			<input type="checkbox" name="conditionals[is_search]"<?php echo ($conditionals['is_search']) ? ' checked="checked"' : ''; ?> /> <?php _e("Search results", 'sociable'); ?><br/>
			<input type="checkbox" name="conditionals[is_feed]"<?php echo ($conditionals['is_feed']) ? ' checked="checked"' : ''; ?> /> <?php _e("RSS feed items", 'sociable'); ?><br/>
		</td>
	</tr>
	<tr>
		<th scope="row" valign="top">
			<?php _e("Use CSS:", "sociable"); ?>
		</th>
		<td>
			<input type="checkbox" name="usecss" <?php echo (get_option('sociable_usecss')) ? ' checked="checked"' : ''; ?> /> <?php _e("Use the sociable stylesheet?", "sociable"); ?>
		</td>
	</tr>
	<tr>
		<th scope="row" valign="top">
			<?php _e("Open in new window:", "sociable"); ?>
		</th>
		<td>
			<input type="checkbox" name="usetargetblank" <?php echo (get_option('sociable_usetargetblank')) ? ' checked="checked"' : ''; ?> /> <?php _e("Use <code>target=_blank</code> on links? (Forces links to open a new window)", "sociable"); ?>
		</td>		
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<span class="submit"><input name="save" value="<?php _e("Save Changes", 'sociable'); ?>" type="submit" /></span>
			<span class="submit"><input name="restore" value="<?php _e("Restore Built-in Defaults", 'sociable'); ?>" type="submit"/></span>
		</td>
	</tr>
	<tr>
		<th colspan="2">
			
		</th>
	</tr>
</table>
</div>

</form>

<?php
}

if (get_option('sociable_usecss_set_once') != true) {
	update_option('sociable_usecss', true);
	update_option('sociable_usecss_set_once', true);
}

?>