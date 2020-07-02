/*=========================================================================================
    File Name: fullcalendar.js
    Description: Fullcalendar
    --------------------------------------------------------------------------------------
    Item Name: Stack - Responsive Admin Theme
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/


$(document).ready(function(){	

	
	 /************************************************
  *               External Dragging               *
  ************************************************/

  /* initialize the calendar
  -----------------------------------------------------------------*/

  var Calendar = FullCalendar.Calendar;
  var Draggable = FullCalendarInteraction.Draggable;

  var containerEl = document.getElementById('external-events');
  var calendarEl = document.getElementById('fc-external-drag');
  var checkbox = document.getElementById('drop-remove');


  // initialize the external events
  // -----------------------------------------------------------------

  new Draggable(containerEl, {
    itemSelector: '.fc-event',
    eventData: function(eventEl) {
      return {
        title: eventEl.innerText
      };
    }
  });

  $('#external-events .fc-event').each(function() {

    // Different colors for events
    $(this).css({'backgroundColor': $(this).data('color'), 'borderColor': $(this).data('color')});

    // store data so the calendar knows to render an event upon drop
    $(this).data('event', {
        title: $.trim($(this).text()), // use the element's text as the event title
        color: $(this).data('color'),
        stick: true // maintain when user navigates (see docs on the renderEvent method)
    });

    // // make the event draggable using jQuery UI
    // $(this).draggable({
    //     zIndex: 999,
    //     revert: true,      // will cause the event to go back to its
    //     revertDuration: 0  //  original position after the drag
    // });

});

  // initialize the calendar
  // -----------------------------------------------------------------

  var calendar = new Calendar(calendarEl, {
    header: {
        left: 'prev,next today',
        center: 'title',
        right: "dayGridMonth,timeGridWeek,timeGridDay"
    },
    editable: true,
    plugins: ["dayGrid", "timeGrid", "interaction"],
    droppable: true, // this allows things to be dropped onto the calendar
    defaultDate: '2016-06-12',
    events: [
        {
            title: 'All Day Event',
            start: '2016-06-01',
            color: '#967ADC'
        },
        {
            title: 'Long Event',
            start: '2016-06-07',
            end: '2016-06-10',
            color: '#37BC9B'
        },
        {
            id: 999,
            title: 'Repeating Event',
            start: '2016-06-09T16:00:00',
            color: '#37BC9B'
        },
        {
            id: 999,
            title: 'Repeating Event',
            start: '2016-06-16T16:00:00',
            color: '#F6BB42'
        },
        {
            title: 'Conference',
            start: '2016-06-11',
            end: '2016-06-13',
            color: '#DA4453'
        },
        {
            title: 'Meeting',
            start: '2016-06-12T10:30:00',
            end: '2016-06-12T12:30:00',
            color: '#DA4453'
        },
        {
            title: 'Lunch',
            start: '2016-06-12T12:00:00',
            color: '#DA4453'
        },
        {
            title: 'Meeting',
            start: '2016-06-12T14:30:00',
            color: '#DA4453'
        },
        {
            title: 'Happy Hour',
            start: '2016-06-12T17:30:00',
            color: '#DA4453'
        },
        {
            title: 'Dinner',
            start: '2016-06-12T20:00:00',
            color: '#DA4453'
        },
        {
            title: 'Birthday Party',
            start: '2016-06-13T07:00:00',
            color: '#DA4453'
        },
        {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: '2016-06-28',
            color: '#3BAFDA'
        }
    ],
    drop: function(info) {
      // is the "remove after drop" checkbox checked?
      if (checkbox.checked) {
        // if so, remove the element from the "Draggable Events" list
        info.draggedEl.parentNode.removeChild(info.draggedEl);
      }
    }
  });

  calendar.render();


//  var calendarE2 = document.getElementById('fc-external-drag');
//  var fcExternalDrag = new FullCalendar.Calendar(calendarE2, {
//       header: {
//           left: 'prev,next today',
//           center: 'title',
//           right: "dayGridMonth,timeGridWeek,timeGridDay"
//       },
//       editable: true,
//       plugins: ["dayGrid", "timeGrid", "interaction"],
//       droppable: true, // this allows things to be dropped onto the calendar
//       defaultDate: '2016-06-12',
//       events: [
//           {
//               title: 'All Day Event',
//               start: '2016-06-01',
//               color: '#967ADC'
//           },
//           {
//               title: 'Long Event',
//               start: '2016-06-07',
//               end: '2016-06-10',
//               color: '#37BC9B'
//           },
//           {
//               id: 999,
//               title: 'Repeating Event',
//               start: '2016-06-09T16:00:00',
//               color: '#37BC9B'
//           },
//           {
//               id: 999,
//               title: 'Repeating Event',
//               start: '2016-06-16T16:00:00',
//               color: '#F6BB42'
//           },
//           {
//               title: 'Conference',
//               start: '2016-06-11',
//               end: '2016-06-13',
//               color: '#DA4453'
//           },
//           {
//               title: 'Meeting',
//               start: '2016-06-12T10:30:00',
//               end: '2016-06-12T12:30:00',
//               color: '#DA4453'
//           },
//           {
//               title: 'Lunch',
//               start: '2016-06-12T12:00:00',
//               color: '#DA4453'
//           },
//           {
//               title: 'Meeting',
//               start: '2016-06-12T14:30:00',
//               color: '#DA4453'
//           },
//           {
//               title: 'Happy Hour',
//               start: '2016-06-12T17:30:00',
//               color: '#DA4453'
//           },
//           {
//               title: 'Dinner',
//               start: '2016-06-12T20:00:00',
//               color: '#DA4453'
//           },
//           {
//               title: 'Birthday Party',
//               start: '2016-06-13T07:00:00',
//               color: '#DA4453'
//           },
//           {
//               title: 'Click for Google',
//               url: 'http://google.com/',
//               start: '2016-06-28',
//               color: '#3BAFDA'
//           }
//       ],
//       drop: function() {
//           // is the "remove after drop" checkbox checked?
//           if ($('#drop-remove').is(':checked')) {
//               // if so, remove the element from the "Draggable Events" list
//               $(this).remove();
//           }
//       }
//   });

//   fcExternalDrag.render();
//   new Draggable(draggableEl);

//   /* initialize the external events
//   -----------------------------------------------------------------*/

//   $('#external-events .fc-event').each(function() {

//       // Different colors for events
//       $(this).css({'backgroundColor': $(this).data('color'), 'borderColor': $(this).data('color')});

//       // store data so the calendar knows to render an event upon drop
//       $(this).data('event', {
//           title: $.trim($(this).text()), // use the element's text as the event title
//           color: $(this).data('color'),
//           stick: true // maintain when user navigates (see docs on the renderEvent method)
//       });

//       // make the event draggable using jQuery UI
//       $(this).draggable({
//           zIndex: 999,
//           revert: true,      // will cause the event to go back to its
//           revertDuration: 0  //  original position after the drag
//       });

//   });

	/****************************************
	*				Selectable				*
	****************************************/
	var calendarE7 = document.getElementById('fc-selectable');
    var fcSelectable = new FullCalendar.Calendar(calendarE7, {
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		defaultDate: '2016-06-12',
		selectable: true,
		plugins: ["dayGrid", "timeGrid", "interaction"],
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
				$('#fc-selectable').fullCalendar('renderEvent', eventData, true); // stick? = true
			}
			$('#fc-selectable').fullCalendar('unselect');
		},
		editable: true,
		eventLimit: true, // allow "more" link when too many events
		events: [
			{
				title: 'All Day Event',
				start: '2016-06-01'
			},
			{
				title: 'Long Event',
				start: '2016-06-07',
				end: '2016-06-10'
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: '2016-06-09T16:00:00'
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: '2016-06-16T16:00:00'
			},
			{
				title: 'Conference',
				start: '2016-06-11',
				end: '2016-06-13'
			},
			{
				title: 'Meeting',
				start: '2016-06-12T10:30:00',
				end: '2016-06-12T12:30:00'
			},
			{
				title: 'Lunch',
				start: '2016-06-12T12:00:00'
			},
			{
				title: 'Meeting',
				start: '2016-06-12T14:30:00'
			},
			{
				title: 'Happy Hour',
				start: '2016-06-12T17:30:00'
			},
			{
				title: 'Dinner',
				start: '2016-06-12T20:00:00'
			},
			{
				title: 'Birthday Party',
				start: '2016-06-13T07:00:00'
			},
			{
				title: 'Click for Google',
				url: 'http://google.com/',
				start: '2016-06-28'
			}
		]
	});
	fcSelectable.render();

});