<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

use_helper("I18N") ;

//use_stylesheet('http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.0/themes/base/jquery-ui.css');
use_stylesheet('/ksWdCalendarPlugin/css/main-wdcalendar.css');
use_stylesheet('/ksWdCalendarPlugin/css/dp.css');
use_stylesheet('/ksWdCalendarPlugin/css/dailog.css');
use_stylesheet('/ksWdCalendarPlugin/css/calendar.css');
//use_stylesheet('dropdown.css');
use_stylesheet('/ksWdCalendarPlugin/css/alert.css');
//use_stylesheet('colorselect.css');

/*
use_javascript('http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js');
use_javascript("https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js");
 */

use_javascript('/ksWdCalendarPlugin/js/jquery.js');
//use_javascript("https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js");
use_javascript("/ksWdCalendarPlugin/js/wdCalendar/Common.js");
use_javascript("/ksWdCalendarPlugin/js/wdCalendar/datepicker_lang_".$arrayCulture['suffix_file_path'].".js");
use_javascript("/ksWdCalendarPlugin/js/wdCalendar/jquery.datepicker.js");

use_javascript("/ksWdCalendarPlugin/js/wdCalendar/jquery.alert.js");
use_javascript("/ksWdCalendarPlugin/js/wdCalendar/jquery.ifrmdailog.js");

use_javascript("/ksWdCalendarPlugin/js/wdCalendar/wdCalendar_lang_".$arrayCulture['suffix_file_path'].".js");
use_javascript("/ksWdCalendarPlugin/js/wdCalendar/jquery.calendar.js");
use_javascript("/ksWdCalendarPlugin/js/wdCalendar/index.js");
include_partial('jsVars');
?>
<div>

      <div id="calhead" style="padding-left:1px;padding-right:1px;">
            <div class="cHead"><div class="ftitle">My Calendar</div>
            <div id="loadingpannel" class="ptogtitle loadicon" style="display: none;">Loading data...</div>
             <div id="errorpannel" class="ptogtitle loaderror" style="display: none;">Sorry, could not load your data, please try again later</div>
            </div>

            <div id="caltoolbar" class="ctoolbar">
              <div id="faddbtn" class="fbutton">
                <div><span title='Click to Create New Event' class="addcal">

                New Event
                </span></div>
            </div>
            <div class="btnseparator"></div>
             <div id="showtodaybtn" class="fbutton">
                <div><span title='Click to back to today ' class="showtoday">
                Today</span></div>
            </div>
              <div class="btnseparator"></div>

            <div id="showdaybtn" class="fbutton">
                <div><span title='Day' class="showdayview">Day</span></div>
            </div>
              <div  id="showweekbtn" class="fbutton fcurrent">
                <div><span title='Week' class="showweekview">Week</span></div>
            </div>
              <div  id="showmonthbtn" class="fbutton">
                <div><span title='Month' class="showmonthview">Month</span></div>

            </div>
            <div class="btnseparator"></div>
              <div  id="showreflashbtn" class="fbutton">
                <div><span title='Refresh view' class="showdayflash">Refresh</span></div>
                </div>
             <div class="btnseparator"></div>
            <div id="sfprevbtn" title="Prev"  class="fbutton">
              <span class="fprev"></span>

            </div>
            <div id="sfnextbtn" title="Next" class="fbutton">
                <span class="fnext"></span>
            </div>
            <div class="fshowdatep fbutton">
                    <div>
                        <input type="hidden" name="txtshow" id="hdtxtshow" />
                        <span id="txtdatetimeshow">Loading</span>

                    </div>
            </div>

            <div class="clear"></div>
            </div>
      </div>
      <div style="padding:1px;">

        <div class="t1 chromeColor">
            &nbsp;</div>
        <div class="t2 chromeColor">
            &nbsp;</div>
        <div id="dvCalMain" class="calmain printborder">
            <div id="gridcontainer" style="overflow-y: visible;">
            </div>
        </div>
        <div class="t2 chromeColor">

            &nbsp;</div>
        <div class="t1 chromeColor">
            &nbsp;
        </div>
        </div>

  </div>
