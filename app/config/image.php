<?php

/**
 * app/config/image.php
*/

return array(

	//the folder that will hold original uploaded images
	'upload_folder' => 'uploads',

	//the folder that will hold thumbnails
	'thumb_folder'	=> 'uploads/thumbs',
	// //added because it in the controller it wanted to upload to root dir
	// 'public_upload_folder' => 'public/uploads',

	// //added because it in the controller it wanted to upload to root dir
	// 'public_thumb_folder'	=> 'public/uploads/thumbs',

	//width of the resized thumbnail
	'thumb_width'	=> 320,

	//height of the resized thumbnail
	'thumb_height'	=> 240

);