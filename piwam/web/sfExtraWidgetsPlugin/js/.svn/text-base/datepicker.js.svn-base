var dp_element_id = 'datepicker';
var dp_input_id = null;
var dp_url = '/main_dev.php/datepicker/';

function dp_display(input_id)
{
    dp_input_id = input_id;
    
    if($(dp_element_id) == null)
    {
        dp_createElement();
        dp_loadDays($F(dp_input_id));
    }
    else
    {
        if($(dp_element_id).style.display == 'block')
        {
            dp_hide();
        }
        else
        {
            dp_loadDays($F(dp_input_id));
        }
    }
}

function dp_createElement(input_id)
{
    var n_node = document.createElement("div");
    n_node.setAttribute("id", dp_element_id);
    n_node.setAttribute("style", "display: none;");
    document.body.appendChild(n_node);
}

function dp_loadDays(date)
{
    new Ajax.Updater(dp_element_id, dp_url + 'days', { 
        onComplete: dp_show(),
        asynchronous:true, 
        evalScripts:true, 
        parameters: { 
            date: date
        }
    });
}

function dp_show()
{
    var dp_input = $(dp_input_id + '_icon');
    var x = dp_input.offsetLeft;
    var y = dp_input.offsetTop + dp_input.offsetHeight ;

    while (dp_input.offsetParent) {
        dp_input = dp_input.offsetParent;
        x += dp_input.offsetLeft;
        y += dp_input.offsetTop ;
    }
  
    var pickerDiv = $(dp_element_id);
    pickerDiv.style.position = "absolute";
    pickerDiv.style.left = x + "px";
    pickerDiv.style.display = "block";
    pickerDiv.style.top = y + "px";
    pickerDiv.style.zIndex = 10000;
}

function dp_hide()
{
    $(dp_element_id).style.display = "none";
}

function dp_updateField(value)
{
    $(dp_input_id).value = value;
    dp_hide();
}

function dp_nextMonth(nextDate)
{
    dp_loadDays(nextDate);
}

function dp_prevMonth(prevDate)
{
    dp_loadDays(prevDate);
}