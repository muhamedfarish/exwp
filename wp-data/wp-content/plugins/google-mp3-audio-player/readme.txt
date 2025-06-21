=== CodeArt - Google MP3 Player ===
Contributors: codeart, SkyDriver, dimisko
Tags: plugin, mp3, audio, google, media, player
Requires at least: 3.0
Tested up to: 3.5
Stable tag: 3.0.0
License: GPLv2 or later

Embedding MP3 audio files using Google MP3 Audio Player.

== Description ==

The CodeArt - Google MP3 Player plugin allows you to easily embed any mp3 file in your wordpress website.
You can put the player in any post, page or widget area.

- Added HTML 5 version for all browsers now, in case the browser doesnt support HTML it will fall back to the default flash player (in version 1.0.9)
- Added HTML5 support for iPhone (in version 1.0.8)

= How to use the plugin? =

First after installing the plugin go to the plugin options page which can be found under 
Settings -> Google Mp3 Player

Set up / change the default settings of the plugin here.

*Note: You can overwrite these settings for each player you add, with using the shortcode attributes (explained below)*

= How to add/embed new player =

Option 1: Copy the shortcode you are presented with at the plugin option page and replace the URL attributes. Best used when you want to embed the player in widget areas where you dont have the visual editor, or when you use just the text editor within wordpress.

Option 2: When using the visual editor you will see a small 'note' icon next to the Add Media button. By clicking that you will be presented with list of options which are needed for the player shortcode. You can change the default settings you have set on the plugin options page. Click Insert and you are done.

*Note: It's reccomended to use OGG files along with the MP3 files if you want Firefox to display the HTML5 player. By default Firefox does not support HTML5 with MP3 files. You can use this online tool
<http://media.io/>*

Example shortcode:

`
[ca_audio url_mp3="audiofile.mp3" url_ogg="audiofile.ogg" width="400" height="50" css_class="codeart-google-mp3-player" autoplay="false" download="true" html5="true" skin="small" align="none"]
`
**Don't forget to replace the example url's with your real ones.**

= Shortcode Attributes =

* **url_mp3** - Full URL to the MP3 audio file which you want to embed in the posts [Required].
* **url_ogg** - Full URL to the OGG audio file which you want to embed in the posts [Optional but reccomended for use of HTML5 on Firefox browser].
* **width** - Width of the MP3 player (must be integer) [optional].
* **height** - Height of the MP3 player (must be integer) [optional].
* **autoplay** - Automatically start the song [optional, default is false].
* **download** - Automatically add download button next to the player for each song [options, default is false]
* **html5** - Choose whether to use the HTML5 player. [optional, defalt is false, usefulf if you want mobile devices to play the song]
* **skin** - Choose whether to use the small or the big HTML5 skin. [optional, takes effect only when HTML5 is set to true, values are "small" and "regular"]
* **align** - You can choose to align the player right/left/center/none [Optional, default is none]
* **css_class** - This is for the developers. [optional]



== Installation ==

1. Upload the entire `google-mp3-audio-player` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Look at your toolbar / admin bar for "Settings" in a submenu "Google MP3 Player" and enjoy using the Google MP3 Audio Player!

== Changelog ==

= 1.0.11 =

- FIX: Fixed the player for all iOS devices, the plugin now displays properly.
- FIX: Added box-sizing: border-box property to player controls holder.
- FIX: Fixed the fallback to flash player for Mozilla.
- FIX: Fixed the look of the flash player with download option ON.
- FIX: Changed the name of the downloadable audio file from audio file path to audio file title.


= 1.0.10 =

- FIX: Fixed the bug when updating from old version.
- FIX: Fixed the bug when using custom class.
- NEW: Added an option to choose the player alignment (left/right/center/none)


= 1.0.9 = 

- NEW: Added HTML5 support (you must enable it in the plugin options page)
- NEW: Added 2 skins for HTML 5 (regular & small)
- NEW: Added option to set the audio file to be downloadable


= 1.0.8 = 

- NEW: Added autoplay option
- NEW: Add HTML5 player support for iPhone only


= 1.0.7 = 

- Fixed bug - Admin background color


= 1.0.6 = 

- Forced update
* NEW: The new player is available (the old player was deprecated from Google)

= 1.0.5 = 

* NEW: Added settings page
* NEW: Added support for displaying the player in the sidebars using shortcode
* NEW: Added media button and visual editor to generate the chortcode
* NEW: Added many options (You can see in the Settings > Google MP3 Player submenu
* User-friendly editor and options
* Greater Security

= 1.0.0 =

Initial release. 

== Screenshots ==

1. Embedded Google MP3 Audio Player
2. Settings Page
3. Media Button in the text editor
4. Visual editor to generate shortcode
5. Settings submenu