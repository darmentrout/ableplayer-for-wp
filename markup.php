<?php

	$able_tranx_id = rand();
	$able_video_id = rand();

?>


<div class="able-container">

	<div class="media-container">

		<<?php /* VIDEO OR AUDIO (BASED ON FILE EXT) */ able_media_type($able_src, true, $ogg_type); ?> id="<?php echo $able_video_id; ?>" data-able-player data-speed-icons="animals" data-meta-type="selector">

			<source src="<?php echo $able_src; ?>" type="<?php able_media_type($able_src, false, $ogg_type); ?>">

			<?php if( $able_cap ): ?>
				<track src="<?php echo $able_cap; ?>" kind="captions">
			<?php endif; ?>

			<?php if( $able_ch ): ?>
				<track src="<?php echo $able_ch; ?>" kind="chapters">
			<?php endif; ?>

		</<?php /* VIDEO OR AUDIO (BASED ON FILE EXT) */ able_media_type($able_src, true, $ogg_type); ?>>

	</div>

</div>