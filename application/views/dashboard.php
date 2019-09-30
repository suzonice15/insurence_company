<div class="col-md-offset-0 col-md-12">
<div class="box  box-success ">
	<div class="box-header with-border">
	</div>

			</div>
</div>


<script type="text/javascript">

$(function () {
	var events = <?php echo json_encode($event) ?>;



	var date = new Date()

	var d    = date.getDate(),

		m    = date.getMonth(),

		y    = date.getFullYear()



	$("#calendar").fullCalendar({

		header    : {

			left  : 'prev,next today',

			center: 'title',

			right : 'month,agendaWeek,agendaDay'

		},

		buttonText: {

			today: 'today',

			month: 'month',

			week : 'week',

			day  : 'day'

		},

		events    : events

	})
});



</script>



