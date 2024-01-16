<!-- Modal -->
<div dir="rtl" class="modal fade" id="editOrderModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title text-center" id="staticBackdropLabel">تحديث تفاصيل طلب</h5>
            </div>

            <div class="modal-body">
                <!-- Form -->
                <form id="editOrder" action="{{ route('order.update', $order->id) }}" method="POST" enctype="multipart/form-data" style="margin: 0 auto; text-align: right;">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-xl-12 d-flex flex-column flex-xl-row mx-auto gap-1">
                            <input type="hidden" name="name" value="{{ Auth::user()->id }}">

                            <div class="mb-3 col-md-12 col-xl-4">
                                <label for="" class="form-label">نوع السيارة</label>
                                <input
                                    type="text"
                                    name="carType"
                                    id="carType"
                                    placeholder="ادخل نوع السيارة"
                                    class="form-control col-xl-5"

                                    value="{{ old('carType', $order->carType) }}"
                                    @error('carType') style="border-color: red" @enderror
                                >
                                @error('carType')
                                    <small id="helpId" style="color: red; display: block">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12 col-xl-4">
                                <label for="" class="form-label">موديل السيارة</label>
                                <input
                                    type="text"
                                    name="carModel"
                                    id="carModel"
                                    placeholder="ادخل موديل السيارة"
                                    class="form-control col-xl-5"

                                    value="{{ old('carModel', $order->carModel) }}"
                                    @error('carModel') style="border-color: red" @enderror
                                >
                                @error('carModel')
                                    <small id="helpId" style="color: red; display: block">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12 col-xl-4">
                                <label for="" class="form-label">تاريخ صنع السيارة</label>
                                <input
                                    type="text"
                                    name="carMadeYear"
                                    id="carMadeYear"
                                    placeholder="ادخل سنة صنع السيارة"
                                    class="form-control col-xl-5"

                                    value="{{ old('carMadeYear', $order->carMadeYear) }}"
                                    @error('carMadeYear') style="border-color: red" @enderror
                                >
                                @error('carMadeYear')
                                    <small id="helpId" style="color: red; display: block">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                        <div class="col-xl-12 mx-auto">
                            <div class="mb-3 col-xl-12 mx-1">
                                <label class="form-label">نوع الخدمة</label>
                                <select id="serviceType" name="serviceType" class="form-select col-xl-5">
                                    <option value="" disabled selected>حدد نوع الخدمة</option>
                                    <option value="process" {{ $order->serviceType == 'process' ? 'selected' : '' }}>معالجة زجاج</option>
                                    <option value="change" {{ $order->serviceType == 'change' ? 'selected' : '' }}>تغيير زجاج</option>
                                    <option value="upRepair" {{ $order->serviceType == 'upRepair' ? 'selected' : '' }}>اصلاح فتحة سقف</option>
                                    <option value="machine" {{ $order->serviceType == 'machine' ? 'selected' : '' }}>اصلاح ماكينة زجاج</option>
                                </select>

                                @error('serviceType')
                                <small id="helpId" style="color: red; display: block">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-12 d-flex flex-column flex-xl-row mx-auto gap-2">
                            <div id="glassType" class="mb-3 col-xl-6">
                                <label class="form-label"> نوع الزجاج</label>
                                <select id="serviceType" name="glassType" class="form-select col-xl-5">
                                    <option value="" disabled selected>حدد نوع الزجاج</option>
                                    <option value="XYG" {{ $order->glassType == 'XYG' ? 'selected' : '' }}>مستورد صيني </option>
                                    <option value="VELTRIO" {{ $order->glassType == 'VELTRIO' ? 'selected' : '' }}>أخرى </option>
                                </select>
                                @error('glassType')
                                <small id="helpId" style="color: red; display: block">{{ $message }}</small>
                                @enderror
                            </div>

                            <div id="glassPosition" class="mb-3 col-xl-6">
                                <label class="form-label">مكان الزجاج</label>
                                <select id="glassPosition" name="glassPosition" class="form-select col-xl-5">
                                    <option value="" disabled selected>حدد مكان الزجاج المكسور</option>
                                    <option value="front" {{ old('glassPosition', $order->glassPosition) == 'front' ? 'selected' : '' }}>زجاج أمامي</option>
                                    <option value="back" {{ old('glassPosition', $order->glassPosition) == 'back' ? 'selected' : '' }}>زجاج خلفي</option>

                                    <option value="front-left-door" {{ old('glassPosition', $order->glassPosition) == 'front-left-door' ? 'selected' : '' }}>باب أمامي يسار</option>
                                    <option value="front-right-door" {{ old('glassPosition', $order->glassPosition) == 'front-right-door' ? 'selected' : '' }}>باب أمامي يمين</option>

                                    <option value="back-left-door" {{ old('glassPosition', $order->glassPosition) == 'back-left-door' ? 'selected' : '' }}>باب خلفي يسار</option>
                                    <option value="back-right-door" {{ old('glassPosition', $order->glassPosition) == 'back-right-door' ? 'selected' : '' }}>باب خلفي يمين</option>

                                    <option value="left-side" {{ old('glassPosition', $order->glassPosition) == 'left-side' ? 'selected' : '' }}>جانب أيسر</option>
                                    <option value="right-side" {{ old('glassPosition', $order->glassPosition) == 'right-side' ? 'selected' : '' }}>جانب أيمن</option>

                                    <option value="front-left-air" {{ old('glassPosition', $order->glassPosition) == 'front-left-air' ? 'selected' : '' }}>هواية أمامي يسار</option>
                                    <option value="front-right-air" {{ old('glassPosition', $order->glassPosition) == 'front-right-air' ? 'selected' : '' }}>هواية أمامي يمين</option>

                                    <option value="back-left-air" {{ old('glassPosition', $order->glassPosition) == 'back-left-air' ? 'selected' : '' }}>هواية خلفي يسار</option>
                                    <option value="back-right-air" {{ old('glassPosition', $order->glassPosition) == 'back-right-air' ? 'selected' : '' }}>هواية خلفي يمين</option>

                                    <option value="upper" {{ old('glassPosition', $order->glassPosition) == 'upper' ? 'selected' : '' }}>زجاج فتحة السقف</option>

                                    <option value="mirrors-left" {{ old('glassPosition', $order->glassPosition) == 'mirrors-left' ? 'selected' : '' }}>مرايا يسار</option>
                                    <option value="mirrors-right" {{ old('glassPosition', $order->glassPosition) == 'mirrors-right' ? 'selected' : '' }}>مرايا يمين</option>
                                </select>
                                @error('glassPosition')
                                <small id="helpId" style="color: red; display: block">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-12 d-flex flex-column flex-xl-row mx-auto gap-2">
                            <div class="mb-3 col-xl-6">
                                <label class="form-label">طريقة الدفع</label>
                                <select id="paymentMethod" name="paymentMethod" class="form-select col-xl-5">
                                    <option value="" disabled selected>حدد طريقة الدفع</option>
                                    <option value="online" {{ $order->paymentMethod == 'online' ? 'selected' : '' }}>اونلاين</option>
                                    <option value="offline" {{$order->paymentMethod  == 'offline' ? 'selected' : '' }}>عند الاستلام</option>
                                </select>
                                @error('paymentMethod')
                                <small id="helpId" style="color: red; display: block">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-xl-6">
                                <label class="form-label">مكان الصيانة</label>
                                <select id="servicePlace" name="servicePlace" class="form-select col-xl-5">
                                    <option value="" disabled selected>حدد مكان الصيانة</option>
                                    <option value="workshop" {{ $order->servicePlace == 'workshop' ? 'selected' : '' }}>في مقر الصيانة الخاص بنا</option>
                                    <option value="clientLocation" {{ $order->servicePlace == 'clientLocation' ? 'selected' : '' }}>الموقع الخاص بك (الخدمة المتنقلة)</option>
                                </select>
                                @error('servicePlace')
                                <small id="helpId" style="color: red; display: block">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-12 d-flex flex-column flex-xl-row mx-auto gap-2">
                            <div class="mb-3 col-xl-6">
                                <label for="" class="form-label">تاريخ الصيانة</label>
                                <input
                                    type="date"
                                    name="date"
                                    id="date"
                                    placeholder="ادخل نوع السيارة"
                                    class="form-control col-xl-5"
                                    min="{{ now()->format('Y-m-d') }}"

                                    value="{{ old('date', $order->date) }}"
                                    @error('date') style="border-color: red" @enderror
                                >
                                @error('date')
                                    <small id="helpId" style="color: red; display: block">{{ $message }}</small>
                                @enderror
                            </div>

                            <div id="time" class="mb-3 col-xl-6">
                                <label class="form-label"> وقت الخدمة </label>
                                <select id="timeSelect" name="time" class="form-select col-xl-5">
                                    <option value="" disabled selected>حدد الوقت المناسب لاجراء الخدمة </option>
                                    @for($i = 8 ; $i < 17; $i++)
                                        <option value="{{$i}}" @if(in_array($i,$hours)) disabled @endif @if($i == $order->time) selected @endif>{{$i.':00'}}</option>
                                    @endfor
                                </select>
                                @error('time')
                                <small id="helpId" style="color: red; display: block">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{--
                        <div class="col-xl-12 d-flex flex-column flex-xl-row mx-auto">
                            <div class="mb-3 col-12">
                                <label for="" class="form-label">صورة الزجاج المكسور</label>
                                <input
                                    type="file"
                                    name="broken_glass_image"
                                    id="broken_glass_image"
                                    placeholder="قم برفع صورة الزجاج المكسور"
                                    class="form-control"

                                    value="{{ old('broken_glass_image') }}"
                                    @error('broken_glass_image') style="border-color: red" @enderror
                                >
                                @error('broken_glass_image')
                                    <small id="helpId" style="color: red; display: block">{{ $message }}</small>
                                @enderror

                                <div class="my-3 text-center">
                                    <img src="{{asset($order->brokenGlassImage)}}" class="img-fluid rounded w-50" alt="image desc"/>
                                </div>
                            </div>
                        </div>
--}}
                        <div class="col-xl-12 d-flex flex-column flex-xl-row mx-auto gap-1">

                            <div class="mb-3 col-md-12 col-xl-4">
                                <label for="" class="form-label">صورة السيارة بالكامل من الأمام</label>
                                <input
                                    type="file"
                                    name="car_front_image_1"
                                    id="car_front_image_1"
                                    placeholder="قم برفع صورة السيارة بالكامل من الأمام"
                                    class="form-control  col-xl-5"
                                    accept="image/*"

                                    value="{{ old('car_front_image_1, $order->car_front_image') }}"
                                    @error('car_front_image_1') style="border-color: red" @enderror
                                >
                                @error('car_front_image_1')
                                <small id="helpId" style="color: red; display: block">{{ $message }}</small>
                                @enderror

                                <div class="my-3 text-center">
                                    <img src="{{asset($order->car_front_image)}}" class="img-fluid rounded w-50" alt="image desc"/>
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 col-xl-4">
                                <label for="" class="form-label">صورة السيارة واضحة من الخلف</label>
                                <input
                                    type="file"
                                    name="car_back_image_1"
                                    id="car_back_image_1"
                                    placeholder="قم برفع صورة السيارة واضحة من الخلف"
                                    class="form-control  col-xl-5"
                                    accept="image/*"

                                    value="{{ old('car_back_image_1, $order->car_back_image') }}"
                                    @error('car_back_image_1') style="border-color: red" @enderror
                                >
                                @error('car_back_image_1')
                                <small id="helpId" style="color: red; display: block">{{ $message }}</small>
                                @enderror

                                <div class="my-3 text-center">
                                    <img src="{{asset($order->car_back_image)}}" class="img-fluid rounded w-50" alt="image desc"/>
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 col-xl-4">
                                <label for="" class="form-label">صورة حساس أو كاميرا ان وجد</label>
                                <input
                                    type="file"
                                    name="camera_image_1"
                                    id="camera_image_1"
                                    placeholder="قم برفع صورة حساس أو كاميرا ان وجد"
                                    class="form-control  col-xl-5"
                                    accept="image/*"

                                    value="{{ old('camera_image_1, $order->camera_image') }}"
                                    @error('camera_image_1') style="border-color: red" @enderror
                                >
                                @error('camera_image_1')
                                <small id="helpId" style="color: red; display: block">{{ $message }}</small>
                                @enderror

                                <div class="my-3 text-center">
                                    <img src="{{asset($order->camera_image)}}" class="img-fluid rounded w-50" alt="image desc"/>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-12" id="location">
                            <label style="display: block; margin-top: 15px;">الموقع:<br>
                                <!-- <span style="font-size: smaller;">قم بتحريك العلامة وضعها على موقعك الحالي</span></label> -->
                                @error('latitude')
                                <small id="helpId" style="color: red; display: block">{{ $message }}</small>
                                @enderror

                                <input type="hidden" id="latitude" name="latitude" value="{{ $order->latitude }}">
                                <input type="hidden" id="longitude" name="longitude" value="{{ $order->longitude }}">

                                <a href="#" onclick="getLocation()" id="getLocation" class="btn btn-outline-success mb-3">
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            let lat = document.getElementById('latitude');
                                            let long = document.getElementById('longitude');
                                            let btn = document.getElementById('getLocation');

                                            if (!lat.value) {
                                                btn.innerText = 'اضغط هنا لتحديد موقعك الحالي';
                                            } else {
                                                btn.innerText = 'تم تحديد موقعك بالفعل, يمكنك الضغط لتحديثه';
                                                // btn.style.pointerEvents = 'none'; // Disable click events
                                                // btn.style.opacity = '0.5'; // Optionally reduce opacity for a disabled look
                                            }
                                        });
                                    </script>
                                </a>
                                <div id="map" style="width: 100%; height: 400px;"></div>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-outline-info">إرسال</button>
                    </div>

                </form>

            </div>



        </div>
    </div>
</div>

<!-- Script To Get Long & Lat From The Map -->
<script>
    // function initMap(lat, long) {
    //     let defaultLatitude = 23.8859, defaultLongitude = 45.0792;
    //     localLat = lat;
    //     localLong = long;
    //     // let lat = Number(document.getElementById('latitude').value);
    //     // let long = Number(document.getElementById('longitude').value);

    //     // if (isNaN(lat) || lat < -90 || lat > 90) {
    //     //     lat = defaultLatitude;
    //     // }

    //     // if (isNaN(long) || long < -180 || long > 180) {
    //     //     long = defaultLongitude;
    //     // }

    //     if (!lat) {
    //         localLat = defaultLatitude;
    //     }

    //     if (!long) {
    //         localLong = defaultLongitude;
    //     }

    //     var map = new Microsoft.Maps.Map(document.getElementById('map'), {
    //         credentials: 'Akh1Nt_GkNKoWSJ7if290r_vwPLtebu-zJIJYbcs9CkmBshpy-sM6_BLSF2jxyG_',
    //         center: new Microsoft.Maps.Location(localLat, localLong),
    //         zoom: 6
    //     });

    //     var marker = new Microsoft.Maps.Pushpin(map.getCenter(), {
    //         draggable: true
    //     });
    //     map.entities.push(marker);

    //     Microsoft.Maps.Events.addHandler(marker, 'dragend', function (event) {
    //         var location = marker.getLocation();
    //         console.log('Location:', location.latitude, location.longitude);

    //         document.getElementById('latitude').value = location.latitude;
    //         document.getElementById('longitude').value = location.longitude;
    //     });
    // }

    async function initMap(lat, long) {
        let defaultLatitude = Number(document.getElementById('latitude').value),
            defaultLongitude = Number(document.getElementById('longitude').value) ;
        let localLat = lat || defaultLatitude;
        let localLong = long || defaultLongitude;

        // Request needed libraries.
        const { Map } = await google.maps.importLibrary("maps");
        const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

        const map = new Map(document.getElementById("map"), {
            center: {
                lat: localLat,
                lng: localLong
            },
            zoom: 14,
            mapId: "4504f8b37365c3d0",
        });

        const draggableMarker = new AdvancedMarkerElement({
            map,
            position: {
                lat: localLat,
                lng: localLong
            },
            gmpDraggable: true,
            title: "قم بتحريك الماركر لمكانك الحالي",
        });

        draggableMarker.addListener("dragend", (event) => {
            const position = draggableMarker.position;

            document.getElementById('latitude').value = position.lat;
            document.getElementById('longitude').value = position.lng;
        });
    }

    // async function initMap(lat, long) {
    //     let defaultLatitude = 23.8859;
    //     defaultLongitude = 45.0792;
    //     let localLat = lat || defaultLatitude;
    //     let localLong = long || defaultLongitude;
    //
    //     // Request needed libraries.
    //     const {
    //         Map
    //     } = await google.maps.importLibrary("maps");
    //     const {
    //         AdvancedMarkerElement
    //     } = await google.maps.importLibrary("marker");
    //     const map = new Map(document.getElementById("map"), {
    //         center: {
    //             lat: localLat,
    //             lng: localLong
    //         },
    //         zoom: 14,
    //         mapId: "4504f8b37365c3d0",
    //     });
    //     // const infoWindow = new InfoWindow();
    //     const draggableMarker = new AdvancedMarkerElement({
    //         map,
    //         position: {
    //             lat: localLat,
    //             lng: localLong
    //         },
    //         gmpDraggable: true,
    //         title: "This marker is draggable.",
    //     });
    //
    //     draggableMarker.addListener("dragend", (event) => {
    //         const position = draggableMarker.position;
    //         console.log(position);
    //         document.getElementById('latitude').value = position.lat;
    //         document.getElementById('longitude').value = position.lng;
    //     });
    //
    // }

    function displayToasterErrors(errors) {
        // Create a toaster notification to display validation errors
        var toaster = document.createElement('div');
        toaster.className = 'alert alert-danger alert-dismissible fade show';
        toaster.setAttribute('role', 'alert');

        var closeButton = document.createElement('button');
        closeButton.type = 'button';
        closeButton.className = 'btn-close';
        closeButton.setAttribute('data-bs-dismiss', 'alert');
        closeButton.setAttribute('aria-label', 'Close');
        toaster.appendChild(closeButton);

        var errorMessage = document.createTextNode('Validation errors: ' + errors.join(', '));
        toaster.appendChild(errorMessage);

        // Display the toaster notification within the modal
        var modalBody = document.querySelector('.modal-body');
        modalBody.appendChild(toaster);

        // Keep the modal open
        $('#newOrderModal').modal('handleUpdate');
    }

    function getLocation(event) {
        if (navigator.permissions) {
            navigator.permissions.query({
                name: 'geolocation'
            }).then(permissionStatus => {
                if (permissionStatus.state === 'granted') {
                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                } else if (permissionStatus.state === 'prompt') {
                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                } else if (permissionStatus.state === 'denied') {
                    alert('Geolocation permission is denied. Please enable it in your browser settings.');
                }
            });
        } else if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            alert('Geolocation is not supported by this browser.');
        }
    }


    function showPosition(position) {
        document.getElementById('latitude').value = position.coords.latitude;
        document.getElementById('longitude').value = position.coords.longitude;
        document.getElementById('getLocation').innerText = 'تم تحديد الموقع الخاص بك'

        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;

        alert("Latitude: " + latitude + "\nLongitude: " + longitude);
        initMap(latitude, longitude);
    }

    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                var retryPermission = confirm('User denied the request for Geolocation. Retry?');
                if (retryPermission) {
                    getLocation();
                } else {
                    alert('You chose not to retry obtaining location permission.');
                }
                break;
            case error.POSITION_UNAVAILABLE:
                alert('Loaction information is unavailable...!');
                break;
            case error.TIMEOUT:
                alert('The request to get the user location timed out...!');
                break;
            case error.UNKNOWN_ERROR:
                alert('An unknown error occurred...!');
                break;
        }
    }
</script>
<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=initMap' async defer></script>
<script>
    $(document).ready(function() {
        // Hide custom divs by default
        $("#glassType").show();
        $("#glassPosition").show();
    })
</script>
