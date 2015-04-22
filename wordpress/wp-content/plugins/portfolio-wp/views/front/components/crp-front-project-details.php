<?php

?>

<!--Here Goes CSS-->
<style>

</style>


<?php
function crp_renderProject($project)
{
    //Ignore if project doesn't have a cover
    if(!isset($project->cover) || empty($project->cover)){
        return;
    }
?>

    <div id="malihu-<?php echo $project->id ?>" class="malihu" style="display: block">
        <div id="bg">
            <?php $coverInfo = json_decode(base64_decode($project->cover)); ?>

            <a href="#" class="nextImageBtn" title="next"></a>
            <a href="#" class="prevImageBtn" title="previous"></a>
            <img src="" width="1680" height="1050" alt="" title="" id="bgimg" />
        </div>
        <div id="preloader"><i class="fa fa-spinner fa-spin"></i></div>
        <div id="img_title"></div>

        <?php if( (isset($project->title) && $project->title !== '' ) || (isset($project->description) && $project->description !== '' ) || (isset($project->url) && $project->url !== '' ) ) : ?>
            <div id="details">
                <?php if(isset($project->title) && $project->title !== '' ) : ?>
                    <h4><?php echo base64_decode($project->title) ?></h4>
                <?php endif; ?>

                <?php if(isset($project->description) && $project->description !== '' ) : ?>
                    <p><?php echo base64_decode($project->description) ?></p>
                <?php endif; ?>

                <?php if(isset($project->url) && $project->url !== '' ) : ?>
                    <div id="read_more_wrapper"><a href="<?php echo !empty($project->url) ? $project->url : '#'; ?>" id="read_more">READ MORE</a></div>
                <?php endif; ?>

            </div>
        <?php endif; ?>

        <div id="toolbar">
            <a class="closeBtn" href="#" title="" onclick="crp_closePopup(event,'<?php echo $project->id ?>')"></a>
            <a class="viewModeBtn" href="#" title=""></a>
        </div>
        <div id="thumbnails_wrapper">
            <div id="outer_container">
                <div class="thumbScroller">
                    <div class="container">
                        <?php foreach($project->pics as $pic): ?>
                            <?php if(!empty($pic)): ?>
                                <?php $picInfo = json_decode(base64_decode($pic)); ?>

                                <div class="content">
                                    <div>
                                        <a href="<?php echo $picInfo->original ?>">
                                            <img src="<?php echo $picInfo->medium ?>" title="<?php echo $project->title ?>" alt="" class="thumb" />
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var plugin = jQuery("#malihu-<?php echo $project->id ?>").crpFullScreenViewer({
            bgsrc: '<?php echo isset($coverInfo->original) ? $coverInfo->original : "" ?>'
        });
        //plugin.update();
    </script>
    
<?php
}
?>

<!--Here Goes JS-->
<script>

    function crp_closePopup(event, projectId){
        event.preventDefault();

        //jQuery("#crp-tile-" + projectId + "-popup").fadeOut();
        jQuery("#crp-tile-" + projectId + "-popup").css("display", "none");
    }

</script>