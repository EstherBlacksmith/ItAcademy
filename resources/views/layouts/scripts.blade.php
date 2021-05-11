
  @include('layouts.script-links')
    <script type="text/javascript">

      $(function() {
        // for now, there is something adding a click handler to 'a'
        var tues = moment().day(2).hour(19);

        // build trival night events for example data
        var events = [
          {
            title: "Special Conference",
            start: moment().format('YYYY-MM-DD'),
            url: '#'
          },
          {
            title: "Doctor Appt",
            start: moment().hour(9).add(2, 'days').toISOString(),
            url: '#'
          }

        ];

        var trivia_nights = []

        for(var i = 1; i <= 4; i++) {
          var n = tues.clone().add(i, 'weeks');
          console.log("isoString: " + n.toISOString());
          trivia_nights.push({
            title: 'Trival Night @ Pub XYZ',
            start: n.toISOString(),
            allDay: false,
            url: '#'
          });
        }

        // setup a few events
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listWeek'
          },
          locale: 'es-eu',
          events: events.concat(trivia_nights)
        });
      });
    </script>

</body>

<footer><a href="https://www.vecteezy.com/free-vector/cute">Cute Vectors by Vecteezy</a></footer>

</html>