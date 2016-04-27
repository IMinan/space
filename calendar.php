<?php include 'theme/header.php'; ?>
  <?php include 'theme/sidebar.php'; ?>

  <?php echo get_calendar_script(); ?>

 <div class="content-wrapper">
   <script>
  	$(document).ready(function() {
      var dateObj = new Date();
      var month = dateObj.getUTCMonth() + 1; //months from 1-12
      var day = dateObj.getUTCDate();
      var year = dateObj.getUTCFullYear();

      var newdate = year + "-0" + month + "-" + day;

  		$('#calendar').fullCalendar({
  			header: {
  				left: 'prev,next today',
  				center: 'title',
  				right: 'month,agendaWeek,agendaDay'
  			},
  			defaultDate: newdate,
  			selectable: true,
  			selectHelper: true,
  			select: function(start, end) {
  				var title = prompt('Event Title:');
  				var eventData;
  				if (title) {
  					eventData = {
  						title: title,
  						start: start,
  						end: end
  					};
  					$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
  				}
  				$('#calendar').fullCalendar('unselect');
  			},
  			editable: true,
  			eventLimit: true, // allow "more" link when too many events
  			events: <?php include 'editor/code/calendar/calendar.json'; ?>
  		});
  	});
  </script>

  <div id='calendar'></div>
 </div><!--/ .content-wrapper /-->
