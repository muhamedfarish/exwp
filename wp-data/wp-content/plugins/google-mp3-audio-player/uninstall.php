<?php

	if(!defined('WP_UNINSTALL_PLUGIN'))
	{
		exit();
	}
	
	delete_option('ca_mp3_player_option');

?>