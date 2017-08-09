<?php
/*
Plugin Name: CircleWaves Music Player
Plugin URI: http://circlewaves.com
Description: Plugin is NOT SUPPORTED ANYMORE. Use Background Music player instead. http://bit.ly/1fEKIJR
Author: CircleWaves
Version: 1.0.3
Author URI: http://circlewaves.com
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/


$cw_musicplayer_plugin_url=trailingslashit( get_bloginfo('wpurl') ).PLUGINDIR.'/'. dirname( plugin_basename(__FILE__) );
$cw_musicplayer_plugin_dir=dirname(__FILE__);
$cw_musicplayer_option_show='cw_musicplayer_show';
$cw_musicplayer_option_enabledPlayer='cw_musicplayer_enabledPlayer';
$cw_musicplayer_option_enabledAutoplay='cw_musicplayer_enabledAutoplay';
$cw_musicplayer_option_enabledShuffle='cw_musicplayer_enabledShuffle';
$cw_musicplayer_option_playlist='cw_musicplayer_playlist';
$cw_musicplayer_option_current_html='cw_musicplayer_current_html';
$cw_musicplayer_option_current_css='cw_musicplayer_current_css';
$cw_musicplayer_option_plugin_version='cw_musicplayer_plugin_version';

	$cw_musicplayer_option_default_htmlVal='	<div id="cw_musicplayer_container">
		<div class="cw_musicplayer_container_inner">
			<div class="cw_musicplayer_mainTitle">&#9834;</div>
			<div id="cw_musicplayer_controls">
				<div class="cw_musicplayer_controls_top">
					<span id="cw_musicplayer_controls_btnPlay">&#9658;</span>
					<span id="cw_musicplayer_controls_btnPause">&#8214;</span>
				</div>
				<div class="cw_musicplayer_controls_bottom">
					<div class="cw_musicplayer_controls_left"><span id="cw_musicplayer_controls_btnPrev">&#0171;</span></div>
					<div class="cw_musicplayer_controls_right"><span id="cw_musicplayer_controls_btnNext">&#0187;</span></div>
				</div>
			</div>
		</div>
	</div>	';
	
	$cw_musicplayer_option_default_cssVal='#cw_musicplayer_container{font-family:Arial !important;display:none;position:fixed;z-index:9999;background:#fff;right:0px;top:30%;width:80px;height:80px;-moz-border-radius:80px 0px 0px 80px;border-radius:80px 0px 0px 80px;-webkit-box-shadow: -4px 4px 10px rgba(50, 50, 50, 0.5);-moz-box-shadow:-4px 4px 10px rgba(50, 50, 50, 0.5);box-shadow:-4px 4px 10px rgba(50, 50, 50, 0.5);-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;}
#cw_musicplayer_container .cw_musicplayer_container_inner{overflow:hidden;height:80px;}
#cw_musicplayer_container .cw_musicplayer_container_inner .cw_musicplayer_mainTitle{float:left;font-size:30px;padding:0px 5px 0px 10px;height:80px;line-height:80px;border-right:1px dashed #e3e3e3;width:19px;}
#cw_musicplayer_container #cw_musicplayer_controls{float:right;font-size:30px  !important;height:80px;width:28px;padding:0px 10px 0px 7px}
#cw_musicplayer_container #cw_musicplayer_controls .cw_musicplayer_controls_top{height:36px;padding-top:20px;line-height:36px !important;}
#cw_musicplayer_container #cw_musicplayer_controls .cw_musicplayer_controls_bottom{height:24px;line-height:24px  !important;font-size:18px  !important;overflow:hidden;}
#cw_musicplayer_container #cw_musicplayer_controls .cw_musicplayer_controls_bottom .cw_musicplayer_controls_left{float:left;}
#cw_musicplayer_container #cw_musicplayer_controls .cw_musicplayer_controls_bottom .cw_musicplayer_controls_right{float:right;}
#cw_musicplayer_container #cw_musicplayer_controls_btnPlay{cursor:pointer;text-align:center;display:none;}
#cw_musicplayer_container #cw_musicplayer_controls_btnPlay:hover{color:#a8a8a8;}
#cw_musicplayer_container #cw_musicplayer_controls_btnPause{cursor:pointer;text-align:center;display:none;}
#cw_musicplayer_container #cw_musicplayer_controls_btnPause:hover{color:#a8a8a8;}
#cw_musicplayer_container #cw_musicplayer_controls_btnPrev{cursor:pointer;display:none;}
#cw_musicplayer_container #cw_musicplayer_controls_btnPrev:hover{color:#a8a8a8;}
#cw_musicplayer_container #cw_musicplayer_controls_btnNext{cursor:pointer;display:none;}
#cw_musicplayer_container #cw_musicplayer_controls_btnNext:hover{color:#a8a8a8;}';	


register_activation_hook(__FILE__,'cw_musicplayer_install');
function cw_musicplayer_install() {
	$cw_musicplayer_option_show='cw_musicplayer_show';
	$cw_musicplayer_option_enabledPlayer='cw_musicplayer_enabledPlayer';
	$cw_musicplayer_option_enabledAutoplay='cw_musicplayer_enabledAutoplay';
	$cw_musicplayer_option_current_html='cw_musicplayer_current_html';
	$cw_musicplayer_option_current_css='cw_musicplayer_current_css';
	$cw_musicplayer_option_plugin_version='cw_musicplayer_plugin_version';
	$cw_musicplayer_option_plugin_versionVal='1.0.2';

	$cw_musicplayer_option_default_htmlVal='	<div id="cw_musicplayer_container">
		<div class="cw_musicplayer_container_inner">
			<div class="cw_musicplayer_mainTitle">&#9834;</div>
			<div id="cw_musicplayer_controls">
				<div class="cw_musicplayer_controls_top">
					<span id="cw_musicplayer_controls_btnPlay">&#9658;</span>
					<span id="cw_musicplayer_controls_btnPause">&#8214;</span>
				</div>
				<div class="cw_musicplayer_controls_bottom">
					<div class="cw_musicplayer_controls_left"><span id="cw_musicplayer_controls_btnPrev">&#0171;</span></div>
					<div class="cw_musicplayer_controls_right"><span id="cw_musicplayer_controls_btnNext">&#0187;</span></div>
				</div>
			</div>
		</div>
	</div>	';
	
	$cw_musicplayer_option_default_cssVal='#cw_musicplayer_container{font-family:Arial !important;display:none;position:fixed;z-index:9999;background:#fff;right:0px;top:30%;width:80px;height:80px;-moz-border-radius:80px 0px 0px 80px;border-radius:80px 0px 0px 80px;-webkit-box-shadow: -4px 4px 10px rgba(50, 50, 50, 0.5);-moz-box-shadow:-4px 4px 10px rgba(50, 50, 50, 0.5);box-shadow:-4px 4px 10px rgba(50, 50, 50, 0.5);-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;}
#cw_musicplayer_container .cw_musicplayer_container_inner{overflow:hidden;height:80px;}
#cw_musicplayer_container .cw_musicplayer_container_inner .cw_musicplayer_mainTitle{float:left;font-size:30px;padding:0px 5px 0px 10px;height:80px;line-height:80px;border-right:1px dashed #e3e3e3;width:19px;}
#cw_musicplayer_container #cw_musicplayer_controls{float:right;font-size:30px  !important;height:80px;width:28px;padding:0px 10px 0px 7px}
#cw_musicplayer_container #cw_musicplayer_controls .cw_musicplayer_controls_top{height:36px;padding-top:20px;line-height:36px !important;}
#cw_musicplayer_container #cw_musicplayer_controls .cw_musicplayer_controls_bottom{height:24px;line-height:24px  !important;font-size:18px  !important;overflow:hidden;}
#cw_musicplayer_container #cw_musicplayer_controls .cw_musicplayer_controls_bottom .cw_musicplayer_controls_left{float:left;}
#cw_musicplayer_container #cw_musicplayer_controls .cw_musicplayer_controls_bottom .cw_musicplayer_controls_right{float:right;}
#cw_musicplayer_container #cw_musicplayer_controls_btnPlay{cursor:pointer;text-align:center;display:none;}
#cw_musicplayer_container #cw_musicplayer_controls_btnPlay:hover{color:#a8a8a8;}
#cw_musicplayer_container #cw_musicplayer_controls_btnPause{cursor:pointer;text-align:center;display:none;}
#cw_musicplayer_container #cw_musicplayer_controls_btnPause:hover{color:#a8a8a8;}
#cw_musicplayer_container #cw_musicplayer_controls_btnPrev{cursor:pointer;display:none;}
#cw_musicplayer_container #cw_musicplayer_controls_btnPrev:hover{color:#a8a8a8;}
#cw_musicplayer_container #cw_musicplayer_controls_btnNext{cursor:pointer;display:none;}
#cw_musicplayer_container #cw_musicplayer_controls_btnNext:hover{color:#a8a8a8;}';	
	

	update_option($cw_musicplayer_option_show, '0');
	update_option($cw_musicplayer_option_enabledPlayer, '0');
	update_option($cw_musicplayer_option_enabledAutoplay, '0');
	update_option($cw_musicplayer_option_enabledShuffle, '0');
	update_option($cw_musicplayer_option_plugin_version, $cw_musicplayer_option_plugin_versionVal);

	if(!get_option($cw_musicplayer_option_current_html)){
		update_option($cw_musicplayer_option_current_html, $cw_musicplayer_option_default_htmlVal);
	}
	if(!get_option($cw_musicplayer_option_current_css)){
		update_option($cw_musicplayer_option_current_css, $cw_musicplayer_option_default_cssVal);
	}
}

register_deactivation_hook(__FILE__,'cw_musicplayer_uninstall');
function cw_musicplayer_uninstall() {
	global $cw_musicplayer_option_show;
	global $cw_musicplayer_option_enabledPlayer;
	global $cw_musicplayer_option_enabledAutoplay;
	global $cw_musicplayer_option_enabledShuffle;
	global $cw_musicplayer_option_playlist;
	global $cw_musicplayer_option_plugin_version;
	
	delete_option($cw_musicplayer_option_show);
	delete_option($cw_musicplayer_option_enabledPlayer);
	delete_option($cw_musicplayer_option_enabledAutoplay);
	delete_option($cw_musicplayer_option_enabledShuffle);
	delete_option($cw_musicplayer_option_plugin_version);
}

add_action('admin_menu','cw_musicplayer_admin_menu');

function cw_musicplayer_admin_menu() { 
global $cw_musicplayer_plugin_url;
global $cw_musicplayer_plugin_dir;
   add_menu_page('CircleWaves Music Player', 'CW Music Player', 'add_users', $cw_musicplayer_plugin_dir.'/cw_musicplayer-index.php', '',   $cw_musicplayer_plugin_url.'/img/icon.png');
}

function cw_musicplayer_isShowPlayer(){
global $cw_musicplayer_option_show;
$cw_musicplayer_option_showValue=(int)get_option($cw_musicplayer_option_show);
if($cw_musicplayer_option_showValue>0){
return true;
}
return false;
}

function cw_musicplayer_isEnabledPlayer(){
global $cw_musicplayer_option_enabledPlayer;
$cw_musicplayer_option_enabledPlayerValue=(int)get_option($cw_musicplayer_option_enabledPlayer);
if($cw_musicplayer_option_enabledPlayerValue>0){
return true;
}
return false;
}

function cw_musicplayer_loadFrontendHeader() {
if(cw_musicplayer_isEnabledPlayer()){
	global $cw_musicplayer_plugin_url;
	global $cw_musicplayer_option_enabledAutoplay;
	global $cw_musicplayer_option_enabledShuffle;
	global $cw_musicplayer_option_current_css;
	$cw_musicplayer_option_cssValue=get_option($cw_musicplayer_option_current_css);
	?>
	<style type="text/css">
	<?php echo $cw_musicplayer_option_cssValue;?>
	</style>

<script src="<?php echo $cw_musicplayer_plugin_url;?>/js/soundmanager/soundmanager2-nodebug-jsmin.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('#cw_musicplayer_controls_btnPlay').click(function(){
		cw_musicplayer_audio.nowPlaying.play();
		jQuery('#cw_musicplayer_controls_btnPlay').css('display','none');
		jQuery('#cw_musicplayer_controls_btnPause').css('display','block');
	});
	
	jQuery('#cw_musicplayer_controls_btnPause').click(function(){
		cw_musicplayer_audio.nowPlaying.pause();
		jQuery('#cw_musicplayer_controls_btnPause').css('display','none');
		jQuery('#cw_musicplayer_controls_btnPlay').css('display','block');
	});
	
	if(jQuery('#cw_musicplayer_controls_btnNext').length>0){
		jQuery('#cw_musicplayer_controls_btnNext').click(function(){
			cw_musicplayer_playlistId++;
			cw_musicplayer_playAudio(cw_musicplayer_playlistId);			
		});	
	}
	
	if(jQuery('#cw_musicplayer_controls_btnPrev').length>0){	
		jQuery('#cw_musicplayer_controls_btnPrev').click(function(){
			cw_musicplayer_playlistId--;
			cw_musicplayer_playAudio(cw_musicplayer_playlistId);			
		});		
	}
	
	
function cw_musicplayer_switchPlayPause(){
if(cw_musicplayer_audio.nowPlaying.playState==1){
	jQuery('#cw_musicplayer_controls_btnPlay').css('display','none');
	jQuery('#cw_musicplayer_controls_btnPause').css('display','block');
}else{
	jQuery('#cw_musicplayer_controls_btnPause').css('display','none');
	jQuery('#cw_musicplayer_controls_btnPlay').css('display','block');		
}

}
	
var cw_musicplayer_play_state=true;
var cw_musicplayer_play_autoplay=<?php echo get_option($cw_musicplayer_option_enabledAutoplay)?'true':'false';?>;
var cw_musicplayer_play_shuffle=<?php echo get_option($cw_musicplayer_option_enabledShuffle)?'true':'false';?>;

function cw_musicplayer_setCookie(c_name,value,exdays){
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
}

function cw_musicplayer_getCookie(c_name){
var i,x,y,ARRcookies=document.cookie.split(";");
for (i=0;i<ARRcookies.length;i++)
{
  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
  x=x.replace(/^\s+|\s+$/g,"");
  if (x==c_name)
    {
    return unescape(y);
    }
  }
}
if(cw_musicplayer_getCookie('cw_musicplayer_cookie')=='active'){cw_musicplayer_play_state=false;}else{cw_musicplayer_setCookie('cw_musicplayer_cookie','active');}
window.onunload = function(){if(cw_musicplayer_play_state===true){cw_musicplayer_setCookie('cw_musicplayer_cookie','notactive',-1);}}



	var cw_musicplayer_audio = [];
	var cw_musicplayer_playlistId=0;
	
	cw_musicplayer_audio.playlist = [	
<?php
$cw_musicplayer_playlistValArr = trim(get_option('cw_musicplayer_playlist'));
$cw_musicplayer_playlistValArr=explode("\n",$cw_musicplayer_playlistValArr);

$cw_musicplayer_playlistValArrOut=array();
foreach ($cw_musicplayer_playlistValArr as $name => $value){
  array_push($cw_musicplayer_playlistValArrOut, "'".trim($value)."'");  
}
if($cw_musicplayer_option_enabledShuffle){
shuffle($cw_musicplayer_playlistValArrOut);
}
echo implode(',', $cw_musicplayer_playlistValArrOut); 

?>
	];
	 
	function cw_musicplayer_playAudio(playlistId1){
		playlistId1 = playlistId1 ? playlistId1 : 0;
		if (cw_musicplayer_audio.nowPlaying){
			cw_musicplayer_audio.nowPlaying.destruct();
		}
			if(playlistId1 >= cw_musicplayer_audio.playlist.length){
				cw_musicplayer_playlistId = 0;
			}	
			if(playlistId1 < 0){
				cw_musicplayer_playlistId = cw_musicplayer_audio.playlist.length-1;
			}					
			cw_musicplayer_audio.nowPlaying = soundManager.createSound({
				id: 'CW_Track',
				url: cw_musicplayer_audio.playlist[cw_musicplayer_playlistId],
				autoLoad: cw_musicplayer_play_state,
				autoPlay: cw_musicplayer_play_state,
				volume: 50,
				onfinish: function(){
					cw_musicplayer_playlistId ++;
					cw_musicplayer_playAudio(cw_musicplayer_playlistId);
				}
			})	
		cw_musicplayer_switchPlayPause();
	}

soundManager.setup({
  url: '<?php echo $cw_musicplayer_plugin_url;?>/js/soundmanager/swf/',
  flashVersion: 8, 
  useFlashBlock: false,
  onready: function() {
  
	if(jQuery('#cw_musicplayer_container').length>0){  
	  if(!cw_musicplayer_play_autoplay){
	  cw_musicplayer_play_stateOld=cw_musicplayer_play_state
	  cw_musicplayer_play_state=false;
	  cw_musicplayer_playAudio(cw_musicplayer_playlistId);
	  cw_musicplayer_play_state=cw_musicplayer_play_stateOld;
	  }else{
	  cw_musicplayer_playAudio(cw_musicplayer_playlistId);
	  }
		
		jQuery('#cw_musicplayer_container').css('display','block');
		jQuery('#cw_musicplayer_controls_btnNext').css('display','block');
		jQuery('#cw_musicplayer_controls_btnPrev').css('display','block');
		
	}
}
});

});
</script>


<?php	
	}
return false;
}
add_action('wp_head', 'cw_musicplayer_loadFrontendHeader');

function cw_musicplayer_displayFrontendPlayer(){
if(cw_musicplayer_isEnabledPlayer()){
	global $cw_musicplayer_plugin_url;
	global $cw_musicplayer_option_current_html;
	$cw_musicplayer_option_htmlValue=get_option($cw_musicplayer_option_current_html);
	echo $cw_musicplayer_option_htmlValue;
 }
}

function cw_musicplayer_showPlayer() {
if(cw_musicplayer_isShowPlayer()){
	cw_musicplayer_displayFrontendPlayer();
	}
return false;	
}
add_action('wp_footer', 'cw_musicplayer_showPlayer');



function cw_musicplayer_loadScripts() {
//wp_enqueue_script('media-upload');
//wp_enqueue_script('thickbox');
//wp_register_script('my-upload', WP_PLUGIN_URL.'/my-script.js', array('jquery','media-upload','thickbox'));
///wp_enqueue_script('my-upload');
}
 
function cw_musicplayer_loadStyles() {
global $cw_musicplayer_plugin_url;
global $cw_musicplayer_plugin_dir;
wp_enqueue_style('cw_musicplayer_admin_css',$cw_musicplayer_plugin_url.'/css/cw_musicplayer_admin_css.css');
}
 if(is_admin()){
if (isset($_GET['page'])&&(strpos($_GET['page'],'cw_musicplayer')!==false)) {
add_action('admin_print_scripts', 'cw_musicplayer_loadScripts');
add_action('admin_print_styles', 'cw_musicplayer_loadStyles');
}
}

?>