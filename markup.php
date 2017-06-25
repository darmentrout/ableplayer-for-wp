<?php
	$able_tranx_id = rand();
	preg_match("/^.*\.(webm|webmv|mp4|ogg|ogv)$/i", $able_src, $able_src_mime);
	/*
	AUDIO FOR FUTURE RELEASE
	audio/flac
	audio/x-flac
	audio/wave
	audio/wav
	audio/x-wav
	audio/x-pn-wav
	audio/mpeg
	audio/ogg
	*/
?>


<div class="able-container">

	<div class="video-container">

		<video data-able-player data-speed-icons="animals" data-meta-type="selector" data-chapters-div="buttons" data-transcript-div="<?php echo $able_tranx_id; ?>">

			<source src="<?php echo $able_src; ?>" type="video/<?php echo $able_src_mime[1]; ?>">

			<!-- <track src="" kind="captions"> -->

			<!-- <track src="" kind="chapters"> -->

		</video>

	</div>

	<div class="tranx-container" id="<?php echo $able_tranx_id; ?>">
		<!-- live transcript goes here -->
	</div>

</div>

<!-- https://www.quirksmode.org/html5/videos/big_buck_bunny.webm -->
<!-- https://www.quirksmode.org/html5/videos/big_buck_bunny.ogv -->