<?php

require_once(CRP_FRONT_VIEWS_DIR_PATH."/components/crp-front-project-details.php");

?>

<!--Here Goes CSS-->
<style>
    /* Portfolio Options Configuration Goes Here*/
    #gallery div{
        margin-left: 0px !important;
        margin-right: 0px !important;
        padding-left: 0px !important;
        padding-right: 0px !important;
    }
</style>

<!--Here Goes HTML-->
<div class="crp-wrapper">
    <div id="gallery">
        <div id="ftg-items" class="ftg-items">
            <?php foreach($crp_portfolio->projects as $crp_project): ?>
                <div id="crp-tile-<?php echo $crp_project->id?>" class="tile">
                    <?php $coverInfo = json_decode(base64_decode($crp_project->cover)); ?>

                    <a id="<?php echo $crp_project->id ?>" class="tile-inner">
                        <img class="item" src="<?php echo CRPHelper::thumbWithQuality($coverInfo,$crp_portfolio->options[CRPOption::kThumbnailQuality]) ?>" />
                        <div class="caption">
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php foreach($crp_portfolio->projects as $crp_project): ?>
        <div id="crp-tile-<?php echo $crp_project->id?>-popup" class="crp-full-screen-popup" style="display: none">
            <?php crp_renderProject($crp_project); ?>
        </div>
    <?php endforeach; ?>
</div>

<!--Here Goes JS-->
<script>
    (function($) {
        jQuery('#gallery').crpTiledLayer({});

        jQuery(".tile").on('click', function (event){
            event.preventDefault();
            if(jQuery(event.target).hasClass("fa") && !jQuery(event.target).hasClass("zoom")) return;

            jQuery("#" + jQuery(this).attr("id") + "-popup").css("display", "block");

            var plugin = jQuery("#malihu-" + jQuery(this).attr("id").replace("crp-tile-","")).crpFullScreenViewer();
            plugin.prepareToShow();
        });

        jQuery(".crp-full-screen-popup").appendTo("body");
    })( jQuery );
</script>