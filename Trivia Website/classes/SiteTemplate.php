<?php

require_once("Template.php");

class SiteTemplate extends Template {

 // protected $_headSection = '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">' . "\n";
  protected $_bottomSection = '<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>' . "\n" . '<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>' . "\n";

function finalizeTopSection() {
        $returnVal = "";
        $returnVal .= "<!doctype html>\n";
        $returnVal .= "<html lang=\"en\">\n";
        $returnVal .= "<head><title>";
        $returnVal .= $this->_title;
        $returnVal .= "</title>\n";
        $returnVal .= '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">';
        $returnVal .= $this->_headSection;
        $returnVal .= "</head>\n";
        $returnVal .= "<body class=\"text-center\">\n";

        $this->_top = $returnVal;

} //end function finalizeTopSection



} //end class SiteTemplate
