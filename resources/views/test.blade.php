<html>
    <head>
        <title>My Evo Calendar</title>
        <link rel="stylesheet" type="text/css" href="css/evo-calendar.css"/>
        <link rel="stylesheet" type="text/css" href="css/evo-calendar.midnight-blue.css"/>
    </head>
    <body>


        <div id="calendar"></div>

        <script src="{{ asset('js/libs/jquery.min.js') }}"></script>
        <script src="js/evo-calendar.js"></script>

        <script>
        // initialize your calendar, once the page's DOM is ready
        $(document).ready(function() {
            $('#calendar').evoCalendar({
                theme: 'Midnight Blue'
            })
        })
        </script>

    </body>
</html>
