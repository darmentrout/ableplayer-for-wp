<?php

	$able_tranx_id = rand();
	$able_video_id = rand();

?>


<div class="able-container">

	<div class="media-container">

		<<?php media_type($able_src, true, $ogg_type); ?> id="<?php echo $able_video_id; ?>" data-able-player data-speed-icons="animals" data-meta-type="selector" data-chapters-div="buttons" data-transcript-div="<?php echo $able_tranx_id; ?>">

			<source src="<?php echo $able_src; ?>" type="<?php media_type($able_src, false, $ogg_type); ?>">

			<!-- <track src="" kind="captions"> -->

			<!-- <track src="" kind="chapters"> -->

		</<?php media_type($able_src, true, $ogg_type); ?>>

	</div>

	<div class="tranx-container" id="<?php echo $able_tranx_id; ?>">
		<!-- live transcript goes here -->
	</div>

</div>