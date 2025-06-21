<?php
/*
Plugin Name: CodeArt - Google MP3 Player
Plugin URI: http://wordpress.org/extend/plugins/google-mp3-audio-player/
Description: Embedding MP3 audio files using Google MP3 Audio Player.
Version: 1.0.11
Author: CodeArt
Author URI: http://codeart.mk
License: GPL3
*/
/*  Copyright 2012  CodeArt  (email : tomislav [at] codeart.mk)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
	// Define AUTH constant
	define('CODEART_PLUGIN', 		true);

	// Define variable constants
	define('CA_PLUGIN_NAME', 		'codeart-google-mp3-player');
	define('CA_PLUGIN_PATH', 		plugin_dir_path(__FILE__) );
	define('CA_PLUGIN_URL',			plugin_dir_url(__FILE__) );
	define('CA_PLUGIN_TITLE', 		'CodeArt - Google MP3 Audio Plyer');
	define('CA_PLUGIN_ADMIN_PAGE', 	'ca-admin-page.php');
	define('CA_PLUGIN_MENU_TITLE', 	'Google MP3 Player');
	require_once('Mobile_Detect.php');

	if( ! defined( 'CODEART_GOOGLE_PLUGIN_VERSION' ) )
		define( 'CODEART_GOOGLE_PLUGIN_VERSION', '1.0.9' );
		
	class CodeartGoogleAudopPlayerActivation {
		
		private static $instance = null;
		
		public function get_instance()
		{
			if( null == self::$instance )
				self::$instance = new self;
			
			return self::$instance;
		}
	
		public function __construct()
		{
			add_action( 'admin_notices', array( $this, 'codeart_plugin_activation' ) ) ;
		}
	
		public function codeart_plugin_activation()
		{
			if( !get_option( 'codeart_google_plugin_version' ) || (CODEART_GOOGLE_PLUGIN_VERSION > get_option( 'codeart_google_plugin_version' )) )
			{
				add_option( 'codeart_google_plugin_version', CODEART_GOOGLE_PLUGIN_VERSION );
				update_option( 'codeart_google_plugin_version', CODEART_GOOGLE_PLUGIN_VERSION );
				
                $html = '<div class="updated"><p>';
				printf(__('If you notice any bugs/errors after updating to the latest version please do not leave negative rating but instead ask for support in the <a href="http://wordpress.org/support/plugin/google-mp3-audio-player">wordpress support forums</a> and help us and the other users to find and fix the problems. Thank you. | <a href="%1$s">Hide Notice</a>'), '?example_nag_ignore=0');
				echo '</p></div><!-- /.updated -->';
				
				echo $html;
			}
		}
	
	}
	
	// $aga = new CodeartGoogleAudopPlayerActivation();
	
	/* Display a notice that can be dismissed */
	add_action('admin_notices', 'codeart_example_admin_notice');
	
	function codeart_example_admin_notice() {
		global $current_user ;
		
		$user_id = $current_user->ID;
		/* Check that the user hasn't already clicked to ignore the message */
		if ( ! get_user_meta($user_id, 'example_ignore_notice') ) {
			echo '<div class="updated"><p>';
			printf(__('<h2>CodeArt - Google MP3 Player</h2>If you notice any bugs/errors after updating to the latest version please do not leave negative rating but instead ask for support in the <a href="http://wordpress.org/support/plugin/google-mp3-audio-player" target="_blank">wordpress support forums</a> and help us and the other users to find and fix the problems. Thank you. | <a href="%1$s">Hide Notice</a>'), '?example_nag_ignore=0');
			echo "</p></div>";
		}
	}
	
	add_action('admin_init', 'codeart_example_nag_ignore');
	function codeart_example_nag_ignore() {
		global $current_user;
		$user_id = $current_user->ID;
		/* If user clicks to ignore the notice, add that to their user meta */
		if ( isset($_GET['example_nag_ignore']) && '0' == $_GET['example_nag_ignore'] ) {
			add_user_meta($user_id, 'example_ignore_notice', 'true', true);
		}
	}

	/*
		Register options
	*/
	function ca_mp3_player_register_options()
	{
		register_setting('ca_mp3_player_option', 'ca_mp3_player_width', 'intval');
		register_setting('ca_mp3_player_option', 'ca_mp3_player_height', 'intval');
		register_setting('ca_mp3_player_option', 'ca_mp3_player_css_class');
		register_setting('ca_mp3_player_option', 'ca_mp3_player_in_single');
		register_setting('ca_mp3_player_option', 'ca_mp3_player_autoplay');
		register_setting('ca_mp3_player_option', 'ca_mp3_player_download');
		register_setting('ca_mp3_player_option', 'ca_mp3_player_html5');
		register_setting('ca_mp3_player_option', 'ca_mp3_player_skin');
		
		register_setting('ca_mp3_player_option', 'ca_mp3_player_align');
	}
	
	/**
	*	Hook, add submenu into admin area (in settings menu)
	*	Init, Register options
	*/
	if( is_admin() )
	{
		add_action('admin_menu', 'ca_google_audio_player_menu');
		add_action('admin_init', 'ca_mp3_player_register_options');
	}

	/*****************************************************************************
	*	Start of ca_audio shortcode
	******************************************************************************/
	
	/**
	*	Method to generate embed code
	*	@param string $url The URL of the mp3 audio file
	*	@param integer $width Player width in pixels (Optional) [Default: 500px]
	*	@param integer $height Player height in pixels (Optional) [Default: 27px]
	*	@param string $css_class The class of the div (Optional) [Default: ca_google_mp3_audio_player]
	*	@return string HTML code
	*/
	function ca_google_audio_player_code($url_mp3 = NULL, $url_ogg = NULL, $width = 500, $height = 27, $autoplay = false, $css_class = CA_PLUGIN_NAME, $download = false, $html5 = false, $skin = 'regular', $align = 'none')
	{	
		if( empty($url_mp3) && empty($url_ogg)) return 'No Files Found';
		
		$width = is_numeric($width) ? $width : 500;
		$height = is_numeric($height) ? $height : 27;
		
		if($autoplay==="true")
			$autoplay=true;
		else if($autoplay==="false")
			$autoplay=false;
		if($download==="true")
			$download=true;
		else if($download==="false")
			$download=false;
		if($html5==="true")
			$html5=true;
		else if($html5==="false")
			$html5=false;

		$css_class = empty($css_class) ? CA_PLUGIN_NAME . ' ' . $css_class : $css_class == CA_PLUGIN_NAME ? $css_class : CA_PLUGIN_NAME . ' ' . $css_class;

		$google_swf_player 	= 'http://prac-gadget.googlecode.com/svn/branches/google-audio-step.swf';
		
		$aplay = '';
		$aplay_mob = '';
		$aplay5 = '';
		$aplay_class = " pause";
		if( $autoplay == true )
		{
			$aplay = '&autoPlay=true';
			$aplay_mob = ' autoplay="autoplay"';
			$aplay5 = ' autoplay="autoplay"';
			$aplay_class = " play";
		}
		
		if( $download == true )
			$download_res = 'true';
		else
			$download_res = 'false';
			
		if( $skin === "small" ){
			$minH = "min-height:34px;";
		}
		else{
			$minH = "min-height:60px;";
		}
		
		if($width<300)
			$pomwidth = 300;
		else
			$pomwidth = $width;
		$flash_width = $pomwidth-34;
		
		//Add a random 5 char sequence to help identify multiple audio players within a page
		$seed = str_split('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
		shuffle($seed);
		$id_rand = '';
		for($i=0;$i<5;$i++)
			 $id_rand.= $seed[mt_rand(0,count($seed)-1)];
		
		$detect = new Mobile_Detect;
		
		$html5pl = '<div class="'.$css_class.' '.$skin.' align' . $align . ' mp3holder" style="overflow:hidden;width:' . $pomwidth . 'px; height: ' . $height . 'px;'.$minH.'">';
		if($html5 == true || $detect->isMobile()){
			
			$html5pl.='
					<audio id="audio_with_controls' . $id_rand . '"'.$aplay5.' preload="metadata" onloadedmetadata="ca_metaLoaded(\''.$id_rand.'\')" ontimeupdate="ca_timeUpdate(\'seek' . $id_rand . '\',this, \'' . $id_rand . '\');" onended="ca_audioEnded(\'playpause' . $id_rand . '\');" style="width:0px;height:0px;">';
						if($url_mp3) $html5pl.='<source src="' . $url_mp3 . '" type="audio/mpeg"/>';
						if($url_ogg) $html5pl.='<source src="' . $url_ogg . '" type="audio/ogg"/>';
			$html5pl.='	
					</audio>
					<div id="controls' . $id_rand . '" class="controls gradient" style="float:left;width:'.$pomwidth.'px;height:'.$height.'px;'.$minH.'">
						<input type="button" id="playpause' . $id_rand . '" class="playpause'.$aplay_class.'" value="Play/Pause" title="Play/Pause" class="pause" onclick="ca_tooglePlayPause(\'audio_with_controls' . $id_rand . '\',this);"/>
						<input type="button" id="stop' . $id_rand . '" class="stop" value="Stop" title="Stop" class="stop" onclick="ca_stop(\'audio_with_controls' . $id_rand . '\', \'' . $id_rand . '\');"/>
						<div id="gutter'.$id_rand.'" class="gutter"></div>
						<div id="seek'.$id_rand.'" class="seekBar"></div>
						<span id="timer' . $id_rand . '" class="timer">
							<span id="currentTime' . $id_rand . '" class="currentTime">0:00</span>
							<span id="duration' . $id_rand . '" class="duration"></span>
						</span>
						<input type="button" id="muteButton' . $id_rand . '" class="muteButton fullVolume" value="Mute" title="Mute" class="mute" onclick="ca_toogleMuted(\'audio_with_controls' . $id_rand . '\',this);"/>
						<div id="volume'.$id_rand.'" class="volumeBar"></div>';
						if( $download == true )
							$html5pl .= '<a id="downloadButton' . $id_rand . '" class="download-'.$skin.'" href="'.plugins_url().'/google-mp3-audio-player/direct_download.php?file='.$url_mp3.'"></a>';
			$html5pl.='
					</div>
					
					<div id="default_player_fallback' . $id_rand . '"></div>
					<script type="text/javascript">';
						if(!$detect->isMobile()){
						$html5pl.='
						if((!supports_media("audio/mpeg", "audio") && "'.$url_mp3.'"!="" && ("'.$url_ogg.'"=="" || "'.$url_ogg.'"=="OGGURL")) || (!supports_media("audio/mpeg", "audio") && !supports_media("audio/ogg", "audio") && "'.$url_mp3.'"!="") || ($codeart.browser.mozilla && "'.$url_mp3.'"!="" && ("'.$url_ogg.'"=="" || "'.$url_ogg.'"=="OGGURL"))){
							var settings = { audioUrl: "'.$url_mp3.'" };
							swfobject.embedSWF("'.$google_swf_player.'","default_player_fallback' . $id_rand . '","'.$flash_width.'","27","9.0.0",null,settings);
							document.getElementById("audio_with_controls' . $id_rand . '").style.display = "none";
							document.getElementById("controls' . $id_rand . '").style.display = "none";
							ca_appendDownloadButton("'.$id_rand.'","'.plugins_url().'/google-mp3-audio-player/direct_download.php?file='.$url_mp3.'");
						}';
						}
						$html5pl.='
						ca_createVolumeBar("'.$id_rand.'");
						ca_createSeekBar("'.$id_rand.'");
						ca_initMuteButtonClass("'.$id_rand.'");
						ca_responsiveAudioPlayer("'.$id_rand.'","'.$skin.'","'.$download_res.'");
					</script>';
		} else{
			$size = ' width="' . $flash_width . '" height="27"';
			$embed = '<embed type="application/x-shockwave-flash" src="' . $google_swf_player . '" quality="best" flashvars="audioUrl=' . $url_mp3 . $aplay . '" ' . $size . '></embed>';
			$html5pl.=$embed;
			if( $download == true )
				$html5pl .= '<a id="downloadButton' . $id_rand . '" class="download-flash" href="'.plugins_url().'/google-mp3-audio-player/direct_download.php?file='.$url_mp3.'"></a>';
		}
		$html5pl.= '</div>';
		
		return $html5pl;
		//return '<div class="' . $css_class . '">' . $embed . $download_link . '</div>';
	}
add_action('wp_head', 'easy_style');
function easy_style()
{
?>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
	<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
	<script src="<?php echo plugins_url() ."/google-mp3-audio-player/jquery.ui.touch-punch.js";?>"></script>
	<script src="<?php echo plugins_url() ."/google-mp3-audio-player/swfobject.js";?>"></script>
	<link rel="stylesheet" href="<?php echo plugins_url() ."/google-mp3-audio-player/style.css";?>" />
	<script type="text/javascript">
		
		//An array containing the id's of all mp3 players
		var ca_myPlayers = new Array();
		//An array containing the Volume State of each mp3 player
		var ca_volumeStates = new Array();
		var ca_position = 0;
		
		var $codeart = jQuery.noConflict();
		$codeart(document).ready(function() {
		});
		
		//Function that checks whether or not an audio format is supported
		function supports_media(mimetype, container) {
			var elem = document.createElement(container);
			if(typeof elem.canPlayType == 'function'){
				var playable = elem.canPlayType(mimetype);
				if((playable.toLowerCase() == 'maybe')||(playable.toLowerCase() == 'probably')){
					return true;
				}
			}	
			return false;
		};
		
		function ca_stopAllAudio(except){
			$codeart('audio').each(function(){
				if(this.id!=except){
					this.pause(); // Stop playing
				}
			});
			$codeart('.playpause').removeClass('play');
			$codeart('.playpause').addClass('pause');
		}
		
		//Function that toogles play/pause functions of the audio element
		function ca_tooglePlayPause(el,sender){
			var btn = document.getElementById(sender.id);
			if(document.getElementById(el).paused){
				ca_stopAllAudio(el);
				document.getElementById(el).play();	
				btn.className = "playpause play";
			}
			else{
				document.getElementById(el).pause();
				btn.className = "playpause pause";
			}
		}
		
		//Funtion to stop the audio playing
		function ca_stop(el,id){
			document.getElementById(el).pause();
			document.getElementById(el).currentTime = 0;
			document.getElementById("playpause"+id).className = "playpause pause";
		}
		
		//timeupdate media event handler
		function ca_timeUpdate(el, sender, id){
			//update span id current_time
			var sec = sender.currentTime;
			sec = sec % 3600;
			var min = Math.floor(sec / 60);
			sec = Math.floor(sec % 60);
			if (sec.toString().length < 2) sec = "0" + sec;
			if (min.toString().length < 2) min = "0" + min;
			document.getElementById('currentTime'+id).innerHTML = min + ":" + sec + " / ";
			
			//update span id duration
			var sec2 = sender.duration;
			sec2 = sec2 % 3600;
			var min2 = Math.floor(sec2 / 60);
			sec2 = Math.floor(sec2 % 60);
			if (sec2.toString().length < 2) sec2 = "0" + sec2;
			if (min2.toString().length < 2) min2 = "0" + min2;
			document.getElementById('duration'+id).innerHTML = min2 + ":" + sec2;
			
			//update seekbar attributes: start time, end time, and current time
			var seekbar = document.getElementById(el);
			seekbar.min = sender.startTime;
			seekbar.max = sender.duration;
			seekbar.value = sender.currentTime;
			
			$codeart( "#"+el ).slider( "value", sender.currentTime);
			$codeart( "#"+el ).slider( "option", "max", sender.duration );
			
			//update buffered percent of the audio file
			var width = $codeart('#seek'+id).width();
			var parentWidth = $codeart('#seek'+id).offsetParent().width();
			var percent = 100*width/parentWidth;
			var res = (sender.buffered.end(0)/sender.duration)*percent+"%";
			$codeart("#gutter"+id).css("width", res);
		}
		
		//Toogle muted property of the audio
		function ca_toogleMuted(el,sender){
			var btn = document.getElementById(sender.id);
			if(document.getElementById(el).muted==true){
				document.getElementById(el).muted=false;
				var i=ca_myPlayers.indexOf(el);
				var classVolume = ca_volumeStates[i];
				btn.className = "muteButton "+classVolume;
			}
			else{
				document.getElementById(el).muted=true;
				btn.className = "muteButton noVolume";
			}
		}
		
		//When the audio ends make the pause button look like a play button
		function ca_audioEnded(el){
			btn = document.getElementById(el);
			btn.className = "playpause pause";
		}
		
		//loadedmetadata Media event handler to update span id=duration of the audio player
		function ca_metaLoaded(id){
			var sender = document.getElementById("audio_with_controls"+id);
			var sec = sender.duration;
			sec = sec % 3600;
			var min = Math.floor(sec / 60);
			sec = Math.floor(sec % 60);
			if (sec.toString().length < 2) sec = "0" + sec;
			if (min.toString().length < 2) min = "0" + min;
			document.getElementById('duration'+id).innerHTML = min + ":" + sec;
		}
		
		//function to create the volume bar of the audio player
		function ca_createVolumeBar(id){
			$codeart("#volume"+id).slider({
				value  : 75,
				step   : 1,
				range  : "min",
				min    : 0,
				max    : 100,
				change : function(){
					var value = $codeart("#volume"+id).slider("value");
					var player = document.getElementById("audio_with_controls"+id);
					player.volume = (value / 100);
					
					var classVolume = "";
					if(value>55){
						classVolume = "fullVolume";
					} else if(value>10 && value<=55){
						classVolume = "middleVolume";
					} else{
						classVolume = "noVolume";
					}
					var i=ca_myPlayers.indexOf("audio_with_controls"+id);
					ca_volumeStates[i] = classVolume;
					if(player.muted==true){
						player.muted=false;
					}
					document.getElementById("muteButton"+id).className = "muteButton "+classVolume;
				}
			});
		}
		
		//function to create the seek bar of the audio player
		function ca_createSeekBar(id){
			var seek = $codeart("#seek"+id).slider({
				value  : 0,
				step   : 0.00000001,
				range  : "min",
				min    : 0,
				max    : document.getElementById("audio_with_controls"+id).duration,
				slide  : function( event, ui ) {
					var player = document.getElementById("audio_with_controls"+id);
					player.currentTime = ui.value;
				}
			});
		}
		
		//Initialize the volume state of the audio player when page is loaded
		function ca_initMuteButtonClass(id){
			ca_myPlayers[ca_position] = "audio_with_controls"+id;
			if($codeart("#muteButton"+id).hasClass("fullVolume")) 
			{
				ca_volumeStates[ca_position] = "fullVolume";
			} else if($codeart("#muteButton"+id).hasClass("middleVolume")){
				ca_volumeStates[ca_position] = "middleVolume";
			} else{
				ca_volumeStates[ca_position] = "noVolume";
			}
			ca_position++;
		}
		
		//Make the audio player responsive
		function ca_responsiveAudioPlayer(id,skin,download){
			var playerH = $codeart("#controls"+id).height();
			var playerW = $codeart("#controls"+id).width();
			
			//Verticaly center playpause button
			var playpauseH = $codeart("#playpause"+id).height();
			var fplaypauseH = (playerH-playpauseH)/2;
			$codeart("#playpause"+id).css("top",fplaypauseH);
			
			//Verticaly center seekbar
			var seekH = $codeart("#seek"+id).height();
			var fseekH = (playerH-seekH)/2;
			$codeart("#seek"+id).css("top",fseekH);
			
			//Verticaly center gutter
			var gutterH = $codeart("#gutter"+id).height();
			var fgutterH = (playerH-gutterH)/2;
			$codeart("#gutter"+id).css("top",fgutterH);
			
			//Verticaly adjust timer span to be above the seekbar
			var timerH = 27;
			var ftimerH = ((playerH-timerH)/2)-(gutterH);
			$codeart("#timer"+id).css("top",ftimerH);
			//Verticaly center volumebar
			var volumeH = $codeart("#volume"+id).height();
			var fvolumeH = (playerH-volumeH)/2;
			$codeart("#volume"+id).css("top",fvolumeH);
			//Verticaly center mute button
			var muteH = $codeart("#muteButton"+id).height()+2;
			var fmuteH = (playerH-muteH)/2;
			$codeart("#muteButton"+id).css("top",fmuteH);
			var stopminiH = $codeart("#stop"+id).height();
			if(skin==="small"){
				//Available space for the seekbar & volumebar within audio player
				//The seekbar's volumebar's width attribute changes, other elements remain the same
				var available = playerW-95;
				if(download==="true"){
					available = playerW-110;
				}
				//Verticaly center stop button
				var fstopminiH = (playerH-stopminiH)/2;
				var pomMuteR = 7;
				var pomTimerR = 27;
				if(download==="true"){
					pomMuteR = 35;
					pomTimerR = 50;
				}
			} else{
				//Available space for the seekbar & volumebar within audio player
				//The seekbar's volumebar's width attribute changes, other elements remain the same
				var available = playerW-100;
				//Align stop button with playpause button
				var fstopminiH = (playpauseH+fplaypauseH-stopminiH);
				var pomMuteR = 12;
				var pomTimerR = 35;
			}
			//The seekbar and the gutter are 3/4 of the available space
			var seekW = (available*75)/100;
			$codeart("#seek"+id).css("width",seekW);
			$codeart("#gutter"+id).css("width",seekW);
			
			//The volumebar is 1/4 of the available space
			var volumeW = (available*25)/100;
			if(download==="true" && skin==="small"){
				volumeW = (available*20)/100;
				$codeart("#volume"+id).css("right","34px");	
				
			}
			$codeart("#volume"+id).css("width",volumeW);
			
			var muteR = volumeW+pomMuteR;
			$codeart("#muteButton"+id).css("right",muteR);
			var timerR = volumeW+pomTimerR;
			$codeart("#timer"+id).css("right",timerR);
			$codeart("#stop"+id).css("top",fstopminiH);
			
			if(download==="true")
				$codeart("#downloadButton"+id).css("top",fstopminiH);
		}
		
		function ca_appendDownloadButton(id,mp3){
			$codeart('#default_player_fallback'+id).after('<a id="downloadButton'+id+'" class="download-flash" href="'+mp3+'"></a>');
		}
	</script>
	
	<style type="text/css">
	.codeart-google-mp3-player .download-link{
		display:block;
		padding: 0 5px 0 5px;
		float: left;
	}
	.codeart-google-mp3-player embed{
		float: left;
	}
	.codeart-google-mp3-player{
		overflow: hidden;
	}
	.codeart-google-mp3-player object{
		float: left;
	}
	</style>
	<!--[if gte IE 9]>
		<style type="text/css">
			.gradient {
				filter: none;
			}
		</style>
	<![endif]-->
<?php
}

	/**
	*	Method to handle 'ca_audio' shortcode
	*	@params array $atts An associative array of attributes
	*	@return callback function ca_google_audio_player_code(...)
	*/
	function ca_google_mp3_audio_player_shortcode_handler( $atts )
	{
		
		$in_single = get_option('ca_mp3_player_in_single');
		$opts = ca_get_custom_options();
		
		if( is_numeric($opts['autoplay']) && $opts['autoplay'] === '1' ){
			$autoplay = true;
		} else{
			$autoplay = false;
		}
		if( is_numeric($opts['download']) && $opts['download'] === '1' ){
			$download = true;
		} else{
			$download = false;
		}
		if( is_numeric($opts['html5']) && $opts['html5'] === '1' ){
			$html5 = true;
		} else{
			$html5 = false;
		}
		
		extract( shortcode_atts( array(
		
			'url'				=> '',
			'url_mp3' 			=> '',
			'url_ogg' 			=> '',
			'width' 		=> $opts['width'],
			'height' 		=> $opts['height'],
			'autoplay'			=> $autoplay,
			'css_class' 	=> $opts['css_class'],
			'download'		=> $download,
			'html5'			=> $html5,
			'skin'		=> $opts['skin'],
			
			'align'		=> $opts['align'],
		), $atts ) );
		
		$mp3_file = empty($url_mp3) ? $url : $url_mp3;
		
		if( is_numeric($in_single) && $in_single === '1' ){
			if( is_single() || is_page() ){
				return ca_google_audio_player_code($mp3_file, $url_ogg, $width, $height, $autoplay, $css_class, $download, $html5, $skin, $align);
			}
		}else{
			return ca_google_audio_player_code($mp3_file, $url_ogg, $width, $height,  $autoplay, $css_class, $download, $html5, $skin, $align);
		}
	}
	
	/**
	*	Hook, add shorcode 'ca_audio'
	*	@shortcode_name: ca_audio
	*/
	add_action( 'init', 'ca_audio_player_register_shortcodes' );
	function ca_audio_player_register_shortcodes()
	{
		// Register ca_audio shortcode
		add_shortcode( 'ca_audio', 'ca_google_mp3_audio_player_shortcode_handler' );
		
		// Add support for text widget
		add_filter('widget_text', 'do_shortcode');
	}
	
	/*****************************************************************************
	*	End of ca_audio shortcode
	******************************************************************************/
	
	/*
		Function to get the custom options
	*/
	function ca_get_custom_options()
	{
		$width 		= esc_attr( intval(get_option('ca_mp3_player_width')) );
		$height 	= esc_attr( intval(get_option('ca_mp3_player_height')) );
		$css 		= esc_attr( get_option('ca_mp3_player_css_style') );
		$in_single 	= esc_attr( get_option('ca_mp3_player_in_single') );
		$autoplay	= esc_attr( get_option('ca_mp3_player_autoplay') );
		$download	= esc_attr( get_option('ca_mp3_player_download') );
		$html5		= esc_attr( get_option('ca_mp3_player_html5') );
		$skin		= esc_attr( get_option('ca_mp3_player_skin') );
		
		$align		= esc_attr( get_option('ca_mp3_player_align') );
		
		$opts = array(
			'width' 		=> empty($width) ? 500 : $width,
			'height' 		=> empty($height) ? 27 : $height,
			'css_class' 	=> empty($css) ? 'codeart-google-mp3-player' : $css,
			'in_single' 	=> $in_single,
			'autoplay' 	=> $autoplay,
			'download'	=> $download,
			'html5'		=> $html5,
			'skin'		=> $skin,
			
			'align'		=> $align
		);
		return $opts;
	}

	/*********************************************
	*	Admin Panel
	*	CodeArt - Google MP3 Audiot Player
	**********************************************/
	
	/**
	*	Method to display the admin (option) page
	*/
	function ca_google_mp3_audio_player_admin_page()
	{
		?>
		
        <div class="wrap">
        
        	<div id="icon-options-general" class="icon32"><br /></div>
            
            <h2><?php echo CA_PLUGIN_TITLE; ?></h2>
            <h3 style="margin-top: 35px;">Google MP3 Player Settings</h3>
            
            <form method="post" action="options.php">
            	<?php
					settings_fields('ca_mp3_player_option');
					
					$opts = ca_get_custom_options();
				?>
				<table class="form-table">
                	
                    <tr valign="top">
                    	<th scope="row">Google MP3 PLayer size</th>
                        <td>
                        	<label for="ca_mp3_player_width">Width</label>
                            <input name="ca_mp3_player_width" type="text" id="ca_mp3_player_width" value="<?php echo $opts['width']; ?>" class="small-text">
                            <span class="description" style="font-style: normal;">px.</span>
                            
                            <label for="ca_mp3_player_height" style="margin-left: 30px;">Height</label>
                            <input name="ca_mp3_player_height" type="text" id="ca_mp3_player_height" value="<?php echo $opts['height']; ?>" class="small-text">
                            <span class="description" style="font-style: normal;">px.</span>
                        </td>
                    </tr>
					
					<tr valign="top">
                    	<th scope="row">Google MP3 PLayer options</th>
                        <td>
                        	<label for="ca_mp3_player_autoplay">Autoplay</label>
                            <input name="ca_mp3_player_autoplay" type="checkbox" id="ca_mp3_player_autoplay" value="1" class="small-text" <?php checked( $opts['autoplay'], 1 ); ?>>
                            
                            <label for="ca_mp3_player_download" style="margin-left: 30px;">Download</label>
                            <input name="ca_mp3_player_download" type="checkbox" id="ca_mp3_player_download" value="1" class="small-text" <?php checked( $opts['download'], 1 ); ?>>
                        </td>
                    </tr>
                    
                    <tr valign="top">
                    	<th scope="row"><label for="ca_mp3_player_css_class">CSS class name</label></th>
                        <td>
                        	<input name="ca_mp3_player_css_class" type="text" id="ca_mp3_player_css_class" value="<?php echo $opts['css_class']; ?>" class="regular-text code">
                        	<span class="description">DIV class name <code><?php echo htmlentities('<div class="CLASS_NAME">MP3 Player</div>'); ?></code></span>
                            <br />
                            <input name="ca_mp3_player_in_single" type="checkbox" id="ca_mp3_player_in_single" value="1" <?php checked( $opts['in_single'], 1 ); ?> />
                            <label for="ca_mp3_player_in_single">Display MP3 player only in single post <span class="description">(Exclude loops, excerpts, sidebars/widgets etc...)</span>.</label>
                        </td>
                    </tr>
					
					<tr valign="top">
                    	<th scope="row">HTML5 options</th>
                        <td>
                        	<label for="ca_mp3_player_html5">Use HTML5 Audio Features</label>
                            <input name="ca_mp3_player_html5" type="checkbox" id="ca_mp3_player_html5" value="1" class="small-text" <?php checked( $opts['html5'], 1 ); ?>>
							
							<label for="ca_mp3_player_skin">Select Skin For The Audio Player</label>
							<select name="ca_mp3_player_skin" id="ca_mp3_player_skin">
								<option value="regular" <?php if($opts['skin']=="regular") echo "selected"; ?>>Regular Skin Audio Player</option>
								<option value="small" <?php if($opts['skin']=="small") echo "selected"; ?>>Small Skin Audio Player</option>
							</select>
                        </td>
                    </tr>
                </table>
                
				<br />
				
				<?php
					if( is_numeric($opts['html5']) && $opts['html5'] === '1' ){
						if($opts['skin']=="regular"){
							$preview_width = 502;
							$preview_height = 62;
						} else if($opts['skin']=="small"){
							$preview_width = 502;
							$preview_height = 34;
						}
						$image_preview = plugin_dir_url( __FILE__ ) . 'images/' . $opts['skin'] . '-player.png';  
					} else{
						$image_preview = plugin_dir_url( __FILE__ ) . 'images/flash-player.png';  
					}
				?>
                <img src="<?php echo $image_preview; ?>" width="<?php echo $preview_width; ?>" height="<?php echo $preview_height; ?>" alt="Player Preview" />
				
                <br />
                
                <?php $image_url = plugin_dir_url( __FILE__ ) .  'favicon.ico';  ?>
                <span class="description">
                	To embed the MP3 Player, copy the following shortcode and paste in the post(s), page(s) and/or sidebar(s) where you want to be displayed the MP3 Player 
                    <br />
                    or you can use the visual editor by clicking on the <img align="absbottom" src="<?php echo $image_url; ?>" width="16" alt="Media Button..." /> in the text editor (media button).
                </span>
                <br />
                <span class="description"><strong>NOTE: Do not forget to replace the 'URL' paramether with the FULL URL of the MP3 which you want to embed!</strong></span>
                <br />
				<?php
					if( is_numeric($opts['autoplay']) && $opts['autoplay'] === '1' ){
						$autoplay = "true";
					} else{
						$autoplay = "false";
					}
					if( is_numeric($opts['download']) && $opts['download'] === '1' ){
						$download = "true";
					} else{
						$download = "false";
					}
					if( is_numeric($opts['html5']) && $opts['html5'] === '1' ){
						$html5 = "true";
						$skin = ' skin= "'.$opts['skin'].'"';
					} else{
						$html5 = "false";
						$skin = "";
					}
					$shortcode_preview = '[ca_audio url_mp3="MP3URL" url_ogg="OGGURL" css_class="'.$opts['css_class'].'" autoplay="'.$autoplay.'" download="'.$download.'" html5="'.$html5.'"'.$skin.']';
					$do_shortcode_preview = '<?php echo do_shortcode(\''.$shortcode_preview.'\'); ?>'
				?>
                <textarea rows="2" cols="200"><?php echo $shortcode_preview; ?></textarea>
				<br />
				<span class="description">
					If you want to place the audio player in a template file copy the code from below in the template
				</span>
				<br />
				<textarea rows="2" cols="220"><?php echo $do_shortcode_preview; ?></textarea>
                <br />
                <span>Also, you can visit the <a href="http://wordpress.org/extend/plugins/google-mp3-audio-player/" target="_blank">plugin site (CodeArt - Google MP3 Player)</a> for more information.</span>
                
                <p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes"></p>
                
                <?php $image_url = plugin_dir_url( __FILE__ ) .  'codeart-watermark3.png';  ?>
                <a href="http://codeart.mk/" title="Visit out website..." target="_blank"><img align="absbottom" src="<?php echo $image_url; ?>" width="71" height="55" alt="CodeArt Watermark" /></a>
            
            </form>
            
            
    	</div>
            
		<?php
		
		/*
		$filename = CA_PLUGIN_PATH . 'ca-admin-page.php';
		if( file_exists($filename) )
		{
			@require_once(CA_PLUGIN_ADMIN_PAGE);
		}
		else
		{
			echo CA_PLUGIN_TITLE;
		}
		*/
		
	}

	/**
	*	Method to add a submenu into admin area, in settings menu
	*	@submenu_name: CodeArt: Google MP3 Audio Player Plugin
	*	@title: Google MP3 Player
	*	@alias: ca-google-mp3-audio-player
	*	@callback_func: ca_google_mp3_audio_player_admin_page
	*/
	function ca_google_audio_player_menu()
	{
		add_options_page(CA_PLUGIN_TITLE, CA_PLUGIN_MENU_TITLE, 'manage_options', CA_PLUGIN_NAME, 'ca_google_mp3_audio_player_admin_page');
	}

	//add a button to the content editor, next to the media button
	//this button will show a popup that contains inline content
	add_action('media_buttons_context', 'add_my_custom_button');
	
	
	//add some content to the bottom of the page
	//This will be shown in the inline modal
	add_action('admin_footer', 'add_inline_popup_content');

	//action to add a custom button to the content editor
	function add_my_custom_button($context)
	{
		//path to my icon
		// $img = CA_PLUGIN_URL . 'mp3-icon.png';
		$img = CA_PLUGIN_URL . 'favicon.ico';
		
		//the id of the container I want to show in the popup
		$container_id = 'ca_google_audio_player_popup_container';
		//our popup's title
		$title = 'Insert an audio file';
		//append the icon
		$context .= "<a class='thickbox' title='{$title}' href='#TB_inline?width=660&inlineId={$container_id}'><img src='{$img}' width='16' alt='ca_mp3_img' /></a>";
		return $context;
	}
	
	/**
	 *	Function
	 */
	function add_inline_popup_content()
	{	
		$opts = ca_get_custom_options();
	?>
    <script type="text/javascript">
		function InsertMP3Player(){
			
			try {
				var ca_full_mp3_url 	= jQuery('#ca_full_mp3_url').val();
				var ca_full_ogg_url 	= jQuery('#ca_full_ogg_url').val();
				var ca_width 		= jQuery('#ca_width').val();
				var ca_height 		= jQuery('#ca_height').val();
				var ca_css_style 	= jQuery('#ca_css_style').val();
				var ca_autoplay 	= jQuery('#ca_autoplay').is(':checked');
				var ca_download		= jQuery('#ca_download').is(':checked');
				var ca_html5		= jQuery('#ca_html5').is(':checked');
				var ca_skin			= jQuery('#ca_skin').val();
				
				var ca_align 	= jQuery('#ca_align').val();
				
				
				
				var ca_width_def = "<?php echo $opts['width']; ?>";
				var ca_height_def = "<?php echo $opts['height']; ?>";
				var ca_css_style_def = "<?php echo $opts['css_class']; ?>";
				var ca_autoplay_def = "<?php echo $opts['autoplay']; ?>";
				var ca_download_def = "<?php echo $opts['download']; ?>";
				var ca_html5_def = "<?php echo $opts['html5']; ?>";
				var ca_skin_def = "<?php echo $opts['skin']; ?>";
				
				var ca_align_def = "<?php echo $opts['align']; ?>";
				
				var shortcode = '[ca_audio url_mp3="' + ca_full_mp3_url + '" url_ogg="' + ca_full_ogg_url + '"';
				if(ca_width != ca_width_def)
					shortcode += ' width="'+ca_width+'"';
				if(ca_height != ca_height_def)
					shortcode += ' height="'+ca_height+'"';
				if(ca_css_style != ca_css_style_def)
					shortcode += ' css_class="'+ca_css_style+'"';
				if(ca_autoplay != ca_autoplay_def)
					shortcode += ' autoplay="'+ca_autoplay+'"';
				if(ca_download != ca_download_def)
					shortcode += ' download="'+ca_download+'"';
				if(ca_html5 != ca_html5_def)
					shortcode += ' html5="'+ca_html5+'"';
				if(ca_skin != ca_skin_def)
					shortcode += ' skin="'+ca_skin+'"';
					
					
				if(ca_align != ca_align_def)
				
					shortcode += ' align="'+ca_align+'"';
					
				shortcode += ']';
				
				var win = window.dialogArguments || opener || parent || top;
				win.send_to_editor(shortcode);
			} catch (e) {}
			
		}
	</script>
    
    <div id="ca_google_audio_player_popup_container" style="display: none;">
    	<h3>Insert MP3 Player!</h3>
        <div style="display: block; clear: both; height:600px; position:relative;">
        <table height="600" class="form-table">
            
        	<tr class="form-field">
				<th scope="row"><label for="ca_full_mp3_url">Full MP3 URL:</label></th>
				<td><input type="text" id="ca_full_mp3_url" name="ca_full_mp3_url" style="width: 225px;" /></td>
				<th scope="row"><em>Full MP3 URL (Required).</em></th>
			</tr>
			
			<tr class="form-field">
				<th scope="row"><label for="ca_full_ogg_url">Full OGG URL:</label></th>
				<td><input type="text" id="ca_full_ogg_url" name="ca_full_ogg_url" style="width: 225px;" /></td>
				<th scope="row"><em>Full OGG URL (Optional).</em></th>
			</tr>
            
            <tr class="form-field">
				<th scope="row"><label for="ca_width">Width:</label></th>
				<td><input type="number" id="ca_width" name="ca_width" style="width: 90px;" value="<?php echo $opts['width']; ?>" /></td>
				<th scope="row"><em>Width of the MP3 Player (Optional).</em></th>
			</tr>
            
            <tr class="form-field">
				<th scope="row"><label for="ca_height">Height:</label></th>
				<td><input type="number" id="ca_height" name="ca_height" style="width: 90px;" value="<?php echo $opts['height']; ?>" /></td>
				<th scope="row"><em>Height of the MP3 Player (Optional).</em></th>
			</tr>
            
            <tr class="form-field">
				<th scope="row"><label for="ca_autoplay">Autoplay:</label></th>
				<td><input name="ca_autoplay" type="checkbox" style="width: 20px;" id="ca_autoplay" value="1" <?php checked( $opts['autoplay'], 1 ); ?> /></td>
				<th scope="row"><em>Automatically start the song (Optional).</em></th>
			</tr>
			
			<tr class="form-field">
				<th scope="row"><label for="ca_download">Download:</label></th>
				<td><input name="ca_download" type="checkbox" style="width: 20px;" id="ca_download" value="1" <?php checked( $opts['download'], 1 ); ?> /></td>
				<th scope="row"><em>Make the audio file downloadable (Optional).</em></th>
			</tr>
			
			<tr class="form-field">
				<th scope="row"><label for="ca_html5">HTML5:</label></th>
				<td><input name="ca_html5" type="checkbox" style="width: 20px;" id="ca_html5" value="1" <?php checked( $opts['html5'], 1 ); ?> /></td>
				<th scope="row"><em>Use HTML5 Audio Features (Optional).</em></th>
			</tr>
			
			<tr class="form-field">
				<th scope="row"><label for="ca_skin">Player skin:</label></th>
				<td>
					<select name="ca_skin" id="ca_skin">
						<option value="regular" <?php if($opts['skin']=="regular") echo "selected"; ?>>Regular Skin Audio Player</option>
						<option value="small" <?php if($opts['skin']=="small") echo "selected"; ?>>Small Skin Audio Player</option>
					</select>
				</td>
				<th scope="row"><em>Select Skin For The Audio Player</em></th>
			</tr>
   
            <tr class="form-field">
				<th scope="row"><label for="ca_skin">Player Align:</label></th>
				<td>
					<select name="ca_align" id="ca_align">
						<option value="none" <?php if($opts['align']=="none") echo "selected"; ?>>- None - </option>
                        <option value="center" <?php if($opts['align']=="center") echo "selected"; ?>>Center</option>
                        <option value="left" <?php if($opts['align']=="left") echo "selected"; ?>>Left</option>
                        <option value="right" <?php if($opts['align']=="right") echo "selected"; ?>>Right</option>
					</select>
				</td>
				<th scope="row"><em>Select Skin For The Audio Player</em></th>
			</tr>
            
            <tr class="form-field">
				<th scope="row"><label for="ca_css_style">CSS Class</label></th>
				<td><input type="text" id="ca_css_style" name="ca_css_style" value="<?php echo $opts['css_class']; ?>" style="width: 225px;" /></td>
				<th scope="row"><em>CSS class of the DIV tag (Optional).</em></th>
			</tr>
            
            <tr class="form-field">
				<td><input type="button" style="height: 21px; line-height: 21px; width: 170px;" class="button-primary" value="Insert MP3 Player" onclick="InsertMP3Player();"/></td>
				<td><a class="button" style="height: 21px; display: block; text-align: center; line-height: 21px; width: 100px;" href="#" onclick="tb_remove(); return false;">Cancel</a></td>
            </tr>
            
        </table>
        </div>
        <!--
        <div style="width: 100%; text-align: center; margin-top: 12px; border-bottom: 1px #DDD solid; padding-bottom: 4px;">
        	<em>Upload the MP3 audio file(s) which you want to embed into post/player. Copy the full URL of the uploaded audio file and paste into text field. Press 'Insert MP3 Player' and enjoy!</em>
        </div>
        -->
        
        <!-- <iframe src="media-upload.php?post_id=57&tab=type" width="655" style="min-height: 530px; margin: 20px 0 0 -10px;"></iframe> -->
        
    </div>
	<?php
    }
?>