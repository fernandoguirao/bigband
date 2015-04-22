<?php
    global $crp_portfolio;

    //Setup ordered projects array
    $crp_portfolio->projects = getOrderedProjects($crp_portfolio);
?>


<!--Link JS Files-->
<script src="<?php echo CRP_JS_URL.'/jquery/jquery.modernizr.min.js' ?>"></script>
<script src="<?php echo CRP_JS_URL.'/crp-tiled-layer.js' ?>"></script>
<script src="<?php echo CRP_JS_URL.'/crp-fs-viewer.js' ?>"></script>


<!--Link CSS Files-->
<link href="<?php echo CRP_CSS_URL.'/crp-tiled-layer.css' ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo CRP_CSS_URL.'/fsviewer/crp-fs-viewer.css' ?>" rel="stylesheet" type="text/css" />


<?php
    //Validation goes here
    if($crp_portfolio) {
        require_once(CRP_FRONT_VIEWS_DIR_PATH . "/layouts/crp-front-tiled-layout.php");
    }else{
        echo "Ooooops!!! Short-code related portfolio wasn't found in your database!";
    }


function getOrderedProjects($crp_portfolio){
    $orderedProjects = array();

    if(isset($crp_portfolio->projects) && isset($crp_portfolio->corder)){
        foreach($crp_portfolio->corder as $pid){
            $orderedProjects[] = $crp_portfolio->projects[$pid];
        }
    }

    return $orderedProjects;
}
