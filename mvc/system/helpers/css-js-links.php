<?php

// FOR LINK ALL CSS FILE
function linkCSS($cssPath)
{
    $url = BASEURL . "/" . $cssPath;
    echo '<link rel="stylesheet" type="text/css" href="' . $url . '">';
}


// FOR LINK ALL JS FILES
function linkJS($jsPath)
{
    $url = BASEURL . "/" . $jsPath;
    echo '<script type="text/javascript" src="' . $url . '"></script>';
}
