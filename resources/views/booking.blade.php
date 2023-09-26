@extends('layouts.front')


@section('content')
    <div class="breadcumb-wrapper" data-bg-src="assets/img/breadcumb/breadcumb-bg.jpg">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Резервации</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="{{ route('home') }}">Начало</a></li>
                        <li>Резервации</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="space">
        <div class="container">
            <div class="row gx-0 bg-smoke">
                <div class="col-xl-5">
                    <div class="appointment-img2">
                        <img src="assets/img/normal/appointment_2.jpg" alt="Appointment" />
                        <div class="as-experience style2" data-bg-src="assets/img/normal/year_bg_2.png">
                            <h3 class="experience-year"><span class="counter-number">25</span></h3>
                            <h4 class="experience-text">Години опит</h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 appointment-form-wrap">
                    <div class="title-area mb-40 text-xl-start text-center">
                        <h2 class="sec-title">Направи резервация</h2>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form action="{{ route('bookingPost') }}" method="POST" class="appointment-form ajax-contact"
                        id="reservationForm">
                        @csrf
                        <div class="row gx-24">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="car_plate" id="car_plate"
                                    placeholder="Марка/Модел на автомобил" />
                                <i class="fal fa-user"></i>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="phone" class="form-control" name="phone" id="phone"
                                    placeholder="Телефон" />
                                <i class="fal fa-phone"></i>
                            </div>
                            <div class="form-group col-12">
                                <select name="subject" id="subject" class="form-select"
                                    onchange="javascript:location.href = this.value;">
                                    <option value="GTP" selected="selected">Годишен технически преглед</option>
                                    <option value="/contact">Диагностика</option>
                                    <option value="/contact">Ремонт</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="date-pick form-control" name="date" id="date-pick"
                                    placeholder="Изберете Дата" autocomplete="off" onChange="dataSet()" />
                                <i class="far fa-calendar"></i>
                            </div>
                            <div class="form-group col-md-6">

                                <select id="selectFreeHour" name="selectFreeHour">
                                    <option>Изберете час</option>
                                </select>
                            </div>
                            <div class="form-btn col-12 mt-10" style="margin-top:30%"><button class="as-btn"
                                    onClick="document.getElementById('reservationForm').submit();">Направи
                                    резервация</button></div>
                        </div>
                        <p class="form-messages mb-0 mt-3"></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        function dataSet() {
            d = document.getElementById("date-pick").value;


            var getSubject = document.getElementById("subject");
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
@endsection
