$(document).ready(function() {     
  var view="week";          
  
  var op = {
    view: view,
    theme:3,
    showday: new Date(),
    EditCmdhandler:Edit,
    DeleteCmdhandler:Delete,
    ViewCmdhandler:View,
    onWeekOrMonthToDay:wtd,
    onBeforeRequestData: cal_beforerequest,
    onAfterRequestData: cal_afterrequest,
    onRequestDataError: cal_onerror,
    autoload:true,
    url: sf_calendar_url_list,
    quickAddUrl: sf_calendar_url_add,
    quickUpdateUrl: sf_calendar_url_update,
    quickDeleteUrl: sf_calendar_url_delete
  };
  
  var $dv = $("#calhead");
  var _MH = document.documentElement.clientHeight;
  var dvH = $dv.height() + 2;
  op.height = _MH - dvH;
  op.eventItems =[];
  
  var p = $("#gridcontainer").bcalendar(op).BcalGetOp();
  if (p && p.datestrshow) {
    $("#txtdatetimeshow").text(p.datestrshow);
  }
  
  $("#caltoolbar").noSelect();
  
  $("#hdtxtshow").datepicker({ picker: "#txtdatetimeshow", showtarget: $("#txtdatetimeshow"),
    onReturn:function(r){
      var p = $("#gridcontainer").gotoDate(r).BcalGetOp();
      if (p && p.datestrshow) {
        $("#txtdatetimeshow").text(p.datestrshow);
      }
    }
  });
  
  function cal_beforerequest(type)
  {
    var t=sf_calendar_loading;
    
    switch (type) {
      case 1:
        t=sf_calendar_loading;
        break;
      case 2:
      case 3:
      case 4:
        t=sf_calendar_request;
        break;
    }
    
    $("#errorpannel").hide();
    $("#loadingpannel").html(t).show();
  }
  
  function cal_afterrequest(type)
  {
    switch (type) {
      case 1:
        $("#loadingpannel").hide();
        break;
      case 2:
      case 3:
      case 4:
        $("#loadingpannel").html(sf_calendar_success);
        window.setTimeout(function(){ $("#loadingpannel").hide();},2000);
        break;
    }
  }
  
  function cal_onerror(type,data)
  {
    $("#errorpannel").show();
  }
  
  function Edit(data)
  {
    var eurl=sf_calendar_url_edit + "?id={0}&start={2}&end={3}&isallday={4}&title={1}";
    
    if (data) {
      var url = StrFormat(eurl,data);
      OpenModelWindow(url,{ width: 600, height: 400, caption:sf_calendar_manage,onclose:function(){
        $("#gridcontainer").reload();
      }});
    }
  }
  
  function View(data)
  {
    var str = "";
    $.each(data, function(i, item){
      str += "[" + i + "]: " + item + "\n";
    });
    
    alert(str);
  }
  
  function Delete(data,callback)
  {
    $.alerts.okButton="Ok";
    $.alerts.cancelButton="Cancel";
    hiConfirm(sf_calendar_delete, 'Confirm',function(r){ r && callback(0);});
  }
  
  function wtd(p)
  {
    if (p && p.datestrshow) {
      $("#txtdatetimeshow").text(p.datestrshow);
    }
    
    $("#caltoolbar div.fcurrent").each(function() {
      $(this).removeClass("fcurrent");
    })
    
    $("#showdaybtn").addClass("fcurrent");
  }
  
  //to show day view
  $("#showdaybtn").click(function(e) {
    $("#caltoolbar div.fcurrent").each(function() {
      $(this).removeClass("fcurrent");
    })
    
    $(this).addClass("fcurrent");
    var p = $("#gridcontainer").swtichView("day").BcalGetOp();
    if (p && p.datestrshow) {
      $("#txtdatetimeshow").text(p.datestrshow);
    }
  });
  
  //to show week view
  $("#showweekbtn").click(function(e) {
    $("#caltoolbar div.fcurrent").each(function() {
      $(this).removeClass("fcurrent");
    })
    
    $(this).addClass("fcurrent");
    var p = $("#gridcontainer").swtichView("week").BcalGetOp();
    if (p && p.datestrshow) {
      $("#txtdatetimeshow").text(p.datestrshow);
    }
  });
  
  //to show month view
  $("#showmonthbtn").click(function(e) {
    $("#caltoolbar div.fcurrent").each(function() {
      $(this).removeClass("fcurrent");
    })
    
    $(this).addClass("fcurrent");
    var p = $("#gridcontainer").swtichView("month").BcalGetOp();
    if (p && p.datestrshow) {
      $("#txtdatetimeshow").text(p.datestrshow);
    }
  });
  
  $("#showreflashbtn").click(function(e){
    $("#gridcontainer").reload();
  });
  
  //Add a new event
  $("#faddbtn").click(function(e) {
    var url=sf_calendar_url_edit;
    OpenModelWindow(url,{ width: 500, height: 400, caption: sf_calendar_create});
  });
  
  //go to today
  $("#showtodaybtn").click(function(e) {
    var p = $("#gridcontainer").gotoDate().BcalGetOp();
    if (p && p.datestrshow) {
      $("#txtdatetimeshow").text(p.datestrshow);
    }
  });
  
  //previous date range
  $("#sfprevbtn").click(function(e) {
    var p = $("#gridcontainer").previousRange().BcalGetOp();
    if (p && p.datestrshow) {
      $("#txtdatetimeshow").text(p.datestrshow);
    }
  });
  
  //next date range
  $("#sfnextbtn").click(function(e) {
    var p = $("#gridcontainer").nextRange().BcalGetOp();
    if (p && p.datestrshow) {
      $("#txtdatetimeshow").text(p.datestrshow);
    }
  });
});