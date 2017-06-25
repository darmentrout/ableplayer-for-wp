<?php

	$able_tranx_id = rand();
	$able_video_id = rand();

	function media_type($src){

		preg_match("/^.*\.(webm|webmv|mp4|ogg|ogv|mp3|oga|wav)$/i", $src, $able_match);
		$able_src_mime = $able_match[1];

		$able_video_types = ["webm","webmv","mp4","ogg","ogv"];
		$able_audio_types = ["mp3","oga","wav"];

		if( in_array($able_src_mime, $able_video_types) ){ $able_type = "video"; }
		if( in_array($able_src_mime, $able_audio_types) ){ $able_type = "audio"; }

		echo $able_type . '/' . $able_src_mime;
	}

?>


<div class="able-container">

	<div class="video-container">

		<video id="<?php echo $able_video_id; ?>" data-able-player data-speed-icons="animals" data-meta-type="selector" data-chapters-div="buttons" data-transcript-div="<?php echo $able_tranx_id; ?>">

			<source src="<?php echo $able_src; ?>" type="<?php media_type($able_src); ?>">

			<!-- <track src="" kind="captions"> -->

			<!-- <track src="" kind="chapters"> -->

		</video>

	</div>

	<div class="tranx-container" id="<?php echo $able_tranx_id; ?>">
		<!-- live transcript goes here -->
	</div>

</div>