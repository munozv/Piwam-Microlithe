<?
/*
use_javascript('Plugin/jquery.js');
use_javascript('Plugins/Common.js');
use_javascript('Plugins/jquery.form.js');
use_javascript('Plugins/jquery.validate.js');
use_javascript('Plugins/datepicker_lang_.js');
use_javascript('Plugins/jquery.datepicker.js');
use_javascript('Plugins/jquery.dropdown.js');
use_javascript('Plugins/jquery.colorselect.js');
use_javascript('edit.js');
 * */

use_javascript('/ksWdCalendarPlugin/js/jquery.js');
//use_javascript("https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js");
use_javascript("/ksWdCalendarPlugin/js/wdCalendar/Common.js");
use_javascript("/ksWdCalendarPlugin/js/wdCalendar/jquery.form.js");
use_javascript("/ksWdCalendarPlugin/js/wdCalendar/jquery.validate.js");
use_javascript("/ksWdCalendarPlugin/js/wdCalendar/datepicker_lang_".$arrayCulture['suffix_file_path'].".js");
use_javascript("/ksWdCalendarPlugin/js/wdCalendar/jquery.datepicker.js");

use_javascript("/ksWdCalendarPlugin/js/wdCalendar/jquery.dropdown.js");
use_javascript("/ksWdCalendarPlugin/js/wdCalendar/jquery.colorselect.js");

use_javascript("/ksWdCalendarPlugin/js/wdCalendar/edit.js");



use_stylesheet('/ksWdCalendarPlugin/css/main.css');
use_stylesheet('/ksWdCalendarPlugin/css/dp.css');
use_stylesheet('/ksWdCalendarPlugin/css/dropdown.css');
use_stylesheet('/ksWdCalendarPlugin/css/colorselect.css');

include_partial('jsVars');
include_javascripts();
include_stylesheets() ;

?>
<h1>New Sf wc event</h1>

<?php include_partial('form', array('form' => $form)) ?>
