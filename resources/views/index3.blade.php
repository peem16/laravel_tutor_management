<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>jQuery Schedule Plugin Demo</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-1.11.3.min.js" type="text/javascript" language="javascript"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript" language="javascript"></script>
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.11.4/themes/base/jquery-ui.css" />
<script type="text/javascript" src="js/jq.schedule.js"></script>
<link rel="stylesheet" type="text/css" href="css/style2.css" />

<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
    var $sc = jQuery("#schedule").timeSchedule({
        startTime: "07:00", // schedule start time(HH:ii)
        endTime: "21:00",   // schedule end time(HH:ii)
        widthTime:60 * 10,  // cell timestamp example 10 minutes
        timeLineY:60,       // height(px)
        verticalScrollbar:20,   // scrollbar (px)
        timeLineBorder:2,   // border(top and bottom)
        debug:"#debug",     // debug string output elements
        rows : {
            '1' : {
                title : 'Title Area',
                schedule:[
                    {
                        start:'09:00',
                        end:'12:00',
                        text:'Text Area',
                        data:{
                        }
                    },
                    {
                        start:'11:00',
                        end:'14:00',
                        text:'Text Area',
                        data:{
                        }
                    }
                ]
            },
            '2' : {
                title : 'Title Area',
                schedule:[
                    {
                        start:'16:00',
                        end:'17:00',
                        text:'Text Area',
                        data:{
                        }
                    }
                ]
            }
        },
        change: function(node,data){
            alert("change event");
        },
        init_data: function(node,data){
        },
        click: function(node,data){
            alert("click event");
        },
        append: function(node,data){
        },
        time_click: function(time,data){
            alert("time click event");
        },
    });
});
</script>
</head>
<body>
<div id="jquery-script-menu">
<div class="jquery-script-center">
<ul>

</ul>

</div>
<div class="container" style="margin-top:150px;">

  <h1 id="demo">jQuery Schedule Plugin Demo</h1>
  <div style="padding: 0 0 40px;">
    <div id="schedule"></div>
  </div>

  <!-- /container --></div>

</body>
</html>
