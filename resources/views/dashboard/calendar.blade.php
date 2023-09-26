@extends('layouts.admin2')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">{{ clean(trans('niva-backend.dashboard'), ['Attr.EnableID' => true]) }}</h1>



        <!-- Calendar -->
        <div class="card shadow mb-4 dashboard-page">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Календар</h6>
            </div>
            <div class="card-body">
                <div class="row">

                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        <!-- Calendar End-->
        <div class="card shadow mb-4 dashboard-page">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Забраняване/Разрешаване на часове</h6>
            </div>
            <form action="/dashboard" method="get">
                <div class="card-body">
                    <div class="row">
                        <div class="container">
                            <div class="form-group col-md-12">
                                <select data-placeholder="Изберете часове" multiple class="chosen-select" name="test">
                                    <option value=""></option>
                                    <option>09:00</option>
                                    <option>09:30</option>
                                    <option>10:00</option>
                                    <option>10:30</option>
                                    <option>11:00</option>
                                    <option>11:30</option>
                                    <option>12:00</option>
                                    <option>12:30</option>
                                    <option>13:00</option>
                                    <option>13:30</option>
                                    <option>14:00</option>
                                    <option>14:30</option>
                                    <option>15:00</option>
                                    <option>15:30</option>
                                    <option>16:00</option>
                                    <option>16:30</option>
                                    <option>17:00</option>
                                    <option>17:30</option>
                                </select>
                                <button onClick="window.location.reload();">Забрани часоге</button>
                                <button onClick="window.location.reload();">Разреши часове</button>
            </form>
        </div>
        <div class="form-group col-md-12">
            <h3>Резервация</h3>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <form action="{{ route('adminBook') }}" method="POST" class="appointment-form ajax-contact"
                id="reservationForm">
                @csrf
                <div class="row gx-24">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="car_plate" id="car_plate"
                            placeholder="Марка/Модел на автомобил" />
                    </div>
                    <div class="form-group col-md-6">
                        <input type="phone" class="form-control" name="phone" id="phone" placeholder="Телефон" />
                    </div>
                    <input name="subject" type="hidden" value="GTP">
                    <div class="form-group col-md-6">
                        <input type="text" class="date-pick form-control" name="date" id="date-pick"
                            placeholder="Изберете Дата" autocomplete="off" onChange="dataSet()" />
                    </div>
                    <div class="form-group col-md-6">

                        <select id="selectFreeHour" name="selectFreeHour">
                            <option>Изберете час</option>
                        </select>
                    </div>
                    <div class="form-btn col-5 mt-5" style="margin-top:30%"><button class="as-btn"
                            onClick="document.getElementById('reservationForm').submit();">Направи
                            резервация</button></div>
                </div>
                <p class="form-messages mb-0 mt-3"></p>
            </form>
        </div>

    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- /.container-fluid -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />
    <script>
        $(".chosen-select").chosen({
            no_results_text: "Oops, nothing found!"
        })
    </script>
    <style>
        .chosen-container {
            width: 170px !important;
        }
    </style>
    <script>
        $(function() {
            $("#date-pick").datepicker();
        });

        function dataSet() {
            d = document.getElementById("date-pick").value;


            var getSubject = 'GTP';
            var value = getSubject.value;
            var allhours = [];
            var possibleHours = [];
            freeHours = [];

            function removeOptions(selectElement) {
                var i, L = selectElement.options.length - 1;
                for (i = L; i >= 0; i--) {
                    selectElement.remove(i);
                }
            }

            // using the function:
            removeOptions(document.getElementById('selectFreeHour'));
            fetch(
                    "https://diceauto.bg/api/booking?status[eq]=0&day[eq]=" + d + "&service[eq]=" + value
                )
                .then((data) => {
                    return data.json();
                })
                .then((objectData) => {
                    objectData.data.forEach((element, index, array) => {
                        //console.log(element.hour);
                        //temp.hours = element.hour;
                        allhours.push(element.hour);
                    });
                    const reservedHours = new Set(allhours);
                    //console.log(allhours);
                    const start = new Date();
                    start.setHours(8, 30, 0); //8 AM
                    const end = new Date();
                    end.setHours(17, 0, 0); //5 PM
                    while (start <= end) {
                        const cFormat = start.toLocaleString('bg-BG', {
                            hour: '2-digit',
                            minute: '2-digit'
                        }).replace(" ч.", '');
                        start.setMinutes(start.getMinutes() + 30);
                        possibleHours.push(cFormat);
                    }
                    const freeHours = possibleHours.filter(x => !reservedHours.has(x));
                    //console.log(freeHours);
                    var select = document.getElementById("selectFreeHour");
                    var options = freeHours;
                    for (var i = 0; i < options.length; i++) {
                        var opt = options[i];
                        var el = document.createElement("option");
                        el.textContent = opt;
                        el.value = opt;
                        select.appendChild(el);
                    }
                });
        }
    </script>
    <script>
        // initialize your calendar, once the page's DOM is ready
        $(document).ready(function() {
            $('#calendar').evoCalendar({

                'todayHighlight': true,
                'sidebarDisplayDefault': false,
                'sidebarToggler': true,
                'firstDayOfWeek': 1,
                'format': 'dd MM, yyyy',
                calendarEvents: [

                    @php

                        $getBookings = file_get_contents('https://diceauto.bg/api/booking');

                        $decodeData = json_decode($getBookings, true);

                        //var_dump($decodeData['data']);
                        foreach ($decodeData['data'] as $booking) {
                            //var_dump($booking);

                            if ($booking['status'] == 0) {
                                $dayFormat = explode('-', $booking['day']);
                                $data = $dayFormat[1] . '/' . $dayFormat[0] . '/' . $dayFormat[2];

                                echo '              {
                                id: ' .
                                    $booking['id'] .
                                    ',
                                name: "М: ' .
                                    $booking['carPlate'] .
                                    '",
                                description: "Телефон: ' .
                                    $booking['phone'] .
                                    ' Час: ' .
                                    $booking['hour'] .
                                    '",
                                date: "' .
                                    $data .
                                    '",
                                type: "event",
                                everyYear: "false",
                                color: "#dacd53"
                                },';
                            } else {
                            }
                        }

                    @endphp

                ]
            })
        })
    </script>
@stop
