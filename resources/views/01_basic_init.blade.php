<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>Basic initialization</title>
</head>
	<script src="codebase/dhtmlxscheduler.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="codebase/dhtmlxscheduler.css" type="text/css" charset="utf-8">
	<script src="codebase/ext/dhtmlxscheduler_editors.js" type="text/javascript" charset="utf-8"></script>
	<script src="codebase/ext/dhtmlxscheduler_minical.js" type="text/javascript" charset="utf-8"></script>

<style type="text/css" >
	html, body{
		margin:0px;
		padding:0px;
		height:100%;
		overflow:hidden;
	}
	.dhx_cal_event div.dhx_footer,
	.dhx_cal_event.past_event div.dhx_footer,
	.dhx_cal_event.event_english div.dhx_footer,
	.dhx_cal_event.event_math div.dhx_footer,
	.dhx_cal_event.event_science div.dhx_footer{
		background-color: transparent !important;
	}
	.dhx_cal_event .dhx_body{
		-webkit-transition: opacity 0.1s;
		transition: opacity 0.1s;
		opacity: 0.7;
	}
	.dhx_cal_event .dhx_title{
		line-height: 12px;
	}
	.dhx_cal_event_line:hover,
	.dhx_cal_event:hover .dhx_body,
	.dhx_cal_event.selected .dhx_body,
	.dhx_cal_event.dhx_cal_select_menu .dhx_body{
		opacity: 1;
	}

	.dhx_cal_event.event_math div, .dhx_cal_event_line.event_math{
		background-color: orange !important;
		border-color: #a36800 !important;
	}
	.dhx_cal_event_clear.event_math{
		color:orange !important;
	}

	.dhx_cal_event.event_science div, .dhx_cal_event_line.event_science{
		background-color: #36BD14 !important;
		border-color: #698490 !important;
	}
	.dhx_cal_event_clear.event_science{
		color:#36BD14 !important;
	}

	.dhx_cal_event.event_english div, .dhx_cal_event_line.event_english{
		background-color: #FC5BD5 !important;
		border-color: #839595 !important;
	}
	.dhx_cal_event_clear.event_english{
		color:#B82594 !important;
	}
</style>



<script type="text/javascript" charset="utf-8">



	function init() {
		scheduler.config.xml_date="%Y-%m-%d %H:%i";

		scheduler.locale.labels.section_subject = "Subject";
		scheduler.config.readonly = true;
scheduler.config.hour_size_px = 77;
// scheduler.config.readonly = true;

		scheduler.config.first_hour = 8;
		scheduler.config.last_hour = 21;
// scheduler.config.mark_now = true;
// scheduler.config.drag_create = false;
// scheduler.config.drag_lightbox = false;
// scheduler.config.drag_move = false;
// scheduler.config.edit_on_create = false;
// scheduler.config.limit_drag_out = false;
// scheduler.config.icons_select = [];
// scheduler.config.icons_edit = [];
// scheduler.config.dblclick_create = false;
// scheduler.config.details_on_create=false;
// scheduler.config.select = false;
// scheduler.config.icons_select = [
//
// ];
// scheduler.config.show_quick_info = false;
// // scheduler.config.min_grid_size = 99;
// scheduler.config.Lightbox = false;
//
// scheduler.config.details_on_dblclick = false;
//
// scheduler.config.readonly_form = false;
scheduler.templates.event_class=function(start, end, event){
	var css = "";

	if(event.subject) // if event has subject property then special class should be assigned
		css += "event_"+event.subject;

	if(event.id == scheduler.getState().select_id){
		css += " selected";
	}
	return css; // default return

	/*
		Note that it is possible to create more complex checks
		events with the same properties could have different CSS classes depending on the current view:

		var mode = scheduler.getState().mode;
		if(mode == "day"){
			// custom logic here
		}
		else {
			// custom logic here
		}
	*/
};

		scheduler.init('scheduler_here',new Date(2018,3,17),"week");

		scheduler.load("showtimetable", "json", function() {

			// scheduler.showLightbox(2);
		});

	}
</script>

<body onload="init();">
	<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
		<div class="dhx_cal_navline" >
			<div class="dhx_cal_prev_button">&nbsp;</div>
			<div class="dhx_cal_next_button">&nbsp;</div>
			<div class="dhx_cal_today_button"></div>
			<div class="dhx_cal_date"></div>
			<div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
			<div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
			<div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
		</div>
		<div class="dhx_cal_header">
		</div>
		<div class="dhx_cal_data" >

		</div>
	</div>
</body>
</html>
