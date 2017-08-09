<?php
if(isset($_POST['cw_musicplayer_form_submitted'])) {
$_POST=array_map( 'stripslashes_deep', $_POST );

$cw_musicplayer_isShow=$_POST['cw_musicplayer_isShow']?1:0;
$cw_musicplayer_isEnabled=$_POST['cw_musicplayer_isEnabled']?1:0;
$cw_musicplayer_isAutoplayEnabled=$_POST['cw_musicplayer_isAutoplayEnabled']?1:0;
$cw_musicplayer_isShuffleEnabled=$_POST['cw_musicplayer_isShuffleEnabled']?1:0;
$cw_musicplayer_option_current_htmlVal=$_POST['cw_musicplayer_option_current_htmlVal'];
$cw_musicplayer_option_current_cssVal=$_POST['cw_musicplayer_option_current_cssVal'];
$cw_musicplayer_option_playlistVal=$_POST['cw_musicplayer_option_playlistVal'];
update_option($cw_musicplayer_option_show, $cw_musicplayer_isShow);
update_option($cw_musicplayer_option_enabledPlayer, $cw_musicplayer_isEnabled);
update_option($cw_musicplayer_option_enabledAutoplay, $cw_musicplayer_isAutoplayEnabled);
update_option($cw_musicplayer_option_enabledShuffle, $cw_musicplayer_isShuffleEnabled);
update_option($cw_musicplayer_option_current_html, $cw_musicplayer_option_current_htmlVal);
update_option($cw_musicplayer_option_current_css, $cw_musicplayer_option_current_cssVal);
update_option($cw_musicplayer_option_playlist, $cw_musicplayer_option_playlistVal);
$cw_musicplayer_isUpdated=1;
}
$cw_musicplayer_option_showValue=(int)get_option($cw_musicplayer_option_show);
$cw_musicplayer_option_enabledPlayerValue=(int)get_option($cw_musicplayer_option_enabledPlayer);
$cw_musicplayer_option_enabledAutoplayValue=(int)get_option($cw_musicplayer_option_enabledAutoplay);
$cw_musicplayer_option_enabledShuffleValue=(int)get_option($cw_musicplayer_option_enabledShuffle);
$cw_musicplayer_option_current_htmlVal=get_option($cw_musicplayer_option_current_html);
$cw_musicplayer_option_current_cssVal=get_option($cw_musicplayer_option_current_css);
$cw_musicplayer_option_playlistVal=get_option($cw_musicplayer_option_playlist);
?>

<script type="text/javascript">
jQuery(document).ready(function() {
  jQuery('#btnLoadDefaultHTML').click(function(){
	  var isLoadDefaultHTML=confirm("Are you sure that you would like to load default HTML Code? \n Your current HTML code will be lost.");
	  if(isLoadDefaultHTML){ 
		  <?php
			$cw_musicplayer_option_default_htmlValFormatted=strtr($cw_musicplayer_option_default_htmlVal, array("\r\n" => '\r\n\\', "\r" => '\r\\', "\n" => '\n\\'));
		  ?>	  
		jQuery('#cw_musicplayer_option_current_htmlVal').val('<?php echo $cw_musicplayer_option_default_htmlValFormatted; ?>');
	  }
  });
   jQuery('#btnLoadDefaultCSS').click(function(){
	  var isLoadDefaultCSS=confirm("Are you sure that you would like to load default CSS? \n Your current CSS will be lost.");
	  if(isLoadDefaultCSS){
		  <?php
			$cw_musicplayer_option_default_cssValFormatted=strtr($cw_musicplayer_option_default_cssVal, array("\r\n" => '\r\n\\', "\r" => '\r\\', "\n" => '\n\\'));
		  ?>
		jQuery('#cw_musicplayer_option_current_cssVal').val('<?php echo $cw_musicplayer_option_default_cssValFormatted; ?>');
	  }
  }); 
});
</script>


<div class="cw_musicplayer_admin_main">
	<?php if(isset($cw_musicplayer_isUpdated)&&($cw_musicplayer_isUpdated==1)) { ?>
	<div class="cw_musicplayer_msgSuccess">
		Options has been updated successfully
	</div>
	<?php }?>
	<div class="">
		<form action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" method="post">
			<input type="hidden" name="cw_musicplayer_form_submitted" value="1" />
			<div class="cw_musicplayer_admin_optionbox_wrapper">
				<div class="cw_musicplayer_admin_optionbox">
					<div class="cw_musicplayer_admin_optionbox_title_wrapper">
						<div class="cw_musicplayer_admin_optionbox_title">MAIN OPTIONS</div>
					</div>
					<div class="cw_musicplayer_admin_optionbox_itembox">
						<div class="cw_musicplayer_admin_optionbox_item"><input type="checkbox" name="cw_musicplayer_isEnabled" id="cw_musicplayer_isEnabled" <?php if($cw_musicplayer_option_enabledPlayerValue>0){echo "checked";}?> /><label class="cw_musicplayer_admin_labelCheckBox" for="cw_musicplayer_isEnabled">Enable Music Player<br /><span class="cw_musicplayer_admin_spanHelp">Use this option to activate Music Player</span></label></div>
						<div class="cw_musicplayer_admin_optionbox_item">
							<input type="checkbox" name="cw_musicplayer_isShow" id="cw_musicplayer_isShow" <?php if($cw_musicplayer_option_showValue>0){echo "checked";}?> /><label class="cw_musicplayer_admin_labelCheckBox" for="cw_musicplayer_isShow">Show Music Player<br /><span class="cw_musicplayer_admin_spanHelp">Use this option to display Music Player, or you can use following code:</span></label><br />
							<span class="cw_musicplayer_admin_spanHelp"><?php echo htmlentities("<?php if(function_exists('cw_musicplayer_displayFrontendPlayer')){cw_musicplayer_displayFrontendPlayer();} ?>"); ?></span>
						</div>
						<div class="cw_musicplayer_admin_optionbox_item"><input type="checkbox" name="cw_musicplayer_isAutoplayEnabled" id="cw_musicplayer_isAutoplayEnabled" <?php if($cw_musicplayer_option_enabledAutoplayValue>0){echo "checked";}?> /><label class="cw_musicplayer_admin_labelCheckBox" for="cw_musicplayer_isAutoplayEnabled">Enable auto-play</label></div>
						<div class="cw_musicplayer_admin_optionbox_item"><input type="checkbox" name="cw_musicplayer_isShuffleEnabled" id="cw_musicplayer_isShuffleEnabled" <?php if($cw_musicplayer_option_enabledShuffleValue>0){echo "checked";}?> /><label class="cw_musicplayer_admin_labelCheckBox" for="cw_musicplayer_isShuffleEnabled">Shuffle</label></div>
					</div>
				</div>
			</div>
			<div class="cw_musicplayer_admin_textareabox">
				<div class="cw_musicplayer_admin_textareabox_title"><label class="cw_musicplayer_admin_labelTextareaBox" for="cw_musicplayer_option_playlistVal">PLAYLIST:</label></div>
				<div class="cw_musicplayer_admin_textareaboxWrapper">
					<div class="cw_musicplayer_admin_textareaboxLeft">
						<textarea id="cw_musicplayer_option_playlistVal" name="cw_musicplayer_option_playlistVal"><?php echo $cw_musicplayer_option_playlistVal; ?></textarea>
					</div>	
					<div class="cw_musicplayer_admin_textareaboxRight">
						<b>Add the Song URL, one in each line.</b><br /><br />
						<b><i>Example:</i></b><br /><br />
						http://example.com/song1.mp3<br />
						http://example.com/song2.mp3<br />
						http://example.com/song3.mp3
					</div>				
				</div>			
			</div>			
			<div class="cw_musicplayer_admin_textareabox">
				<div class="cw_musicplayer_admin_textareabox_title"><label class="cw_musicplayer_admin_labelTextareaBox" for="cw_musicplayer_option_current_htmlVal">Player HTML Code:</label></div>
				<div class="cw_musicplayer_admin_textareaboxWrapper">
					<div class="cw_musicplayer_admin_textareaboxLeft"><textarea id="cw_musicplayer_option_current_htmlVal" name="cw_musicplayer_option_current_htmlVal"><?php echo $cw_musicplayer_option_current_htmlVal; ?></textarea></div>
					<div class="cw_musicplayer_admin_textareaboxRight">
					<b>List of <u>REQUIRED</u> Player Containers (CSS ID):</b><br /><br />
					<b>#cw_musicplayer_container</b> &mdash; <i>Main Container</i>, all others containers must be located inside this container<br /><br />
					<b>#cw_musicplayer_controls</b><br />
					<b>#cw_musicplayer_controls_btnPlay</b><br />
					<b>#cw_musicplayer_controls_btnPause</b><br />
					<br />
					<b>List of <u>NOT REQUIRED</u> Player Containers (CSS ID):</b><br /><br />
					<b>#cw_musicplayer_controls_btnNext</b><br />
					<b>#cw_musicplayer_controls_btnPrev</b><br />
					</div>
				</div>
				<div class="cw_musicplayer_admin_btnBox">
					<input type="button" class="btnSubmit2" id="btnLoadDefaultHTML" name="btnLoadDefaultHTML" value="LOAD DEFAULT HTML" />
				</div>
			</div>
			<div class="cw_musicplayer_admin_textareabox">
				<div class="cw_musicplayer_admin_textareabox_title"><label class="cw_musicplayer_admin_labelTextareaBox" for="cw_musicplayer_option_current_cssVal">Player CSS Styles:</label></div>
				<div><textarea id="cw_musicplayer_option_current_cssVal" name="cw_musicplayer_option_current_cssVal"><?php echo $cw_musicplayer_option_current_cssVal; ?></textarea></div>
				<div class="cw_musicplayer_admin_btnBox">
					<input type="button" class="btnSubmit2" id="btnLoadDefaultCSS" name="btnLoadDefaultCSS" value="LOAD DEFAULT CSS" />
				</div>			
			</div>			
			<div>
				<input type="submit" class="btnSubmit" value="SAVE" />
			</div>
		</form>
	</div>


	<div class="cw_musicplayer_admin_footer">
		<div class="cw_musicplayer_admin_footer_logo">
			<a href="http://circlewaves.com" title="CIRCLE WAVES | Web-development, Consulting, Custom Solutions, WordPress Plugins Development, WordPress Theme Development" target="_blank"><img src="<?php echo $cw_musicplayer_plugin_url;?>/img/cw_logo.png" /></a>
		</div>
		<div class="cw_musicplayer_admin_footer_info">
			<div class="cw_musicplayer_admin_info_line1">HTML music player</div>
			<div class="cw_musicplayer_admin_info_line2">Powered by <a href="http://circlewaves.com" title="CIRCLE WAVES | Web-development, Consulting, Custom Solutions, WordPress Plugins Development, WordPress Theme Development" target="_blank">CIRLCEWAVES</a></div>
		</div>
		<div class="cw_musicplayer_admin_footer_inspiration">
			<a href="http://circlewaves.com" title="Incredible Kraken - One of our inspiring creatures" target="_blank"><img src="<?php echo $cw_musicplayer_plugin_url;?>/img/cw_logo_kraken.png" /></a>
		</div>
	</div>
		

</div>

