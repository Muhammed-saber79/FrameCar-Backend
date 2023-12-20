<!-- Modal -->
<div dir="rtl" class="modal fade" id="editOrderModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title text-center" id="staticBackdropLabel">تعديل بيانات الطلب</h5>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form id="editOrder" action="{{ route('order.update', $order->id) }}" method="POST" enctype="multipart/form-data" style="margin: 0 auto; text-align: right;">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-6">
                            <input type="hidden" name="name" value="{{ Auth::user()->id }}">

                            <!-- Populate the input fields with order data -->

                            {{-- <x-form.input label="رقم الهاتف" labelStyle="margin-top: 15px" type="tel" name="phoneNumber" value="{{ auth('web')->user()->phoneNumber }}" placeholder="ادخل رقم الهاتف" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; outline:none;" /> --}}
                            <x-form.input label="نوع السيارة" labelStyle="margin-top: 15px" type="text" name="carType" value="{{ $order->carType }}" placeholder="ادخل نوع السيارة" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; outline:none;" />
                            <x-form.input label="موديل السيارة " labelStyle="margin-top: 15px" type="text" name="carModel" value="{{ $order->carModel }}" placeholder="ادخل موديل السيارة " style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; outline:none;" />
                            <x-form.input label="تاريخ صنع السيارة " labelStyle="margin-top: 15px" type="text" name="carMadeYear" value="{{ $order->carMadeYear }}" placeholder="ادخل سنة صنع السيارة " style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; outline:none;" />
                            <x-form.input label="نوع الزجاج" labelStyle="margin-top: 15px" type="text" name="glassType" value="{{ $order->glassType }}" placeholder="ادخل نوع الزجاج" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; outline:none;" />

                            <label style="display: block; margin-top: 15px;">مكان الزجاج</label>
                            <select id="glassPosition" name="glassPosition" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                                <option value="" disabled>حدد مكان الزجاج المكسور</option>
                                <option value="front" {{ $order->glassPosition === 'front' ? 'selected' : '' }}>أمامي</option>
                                <option value="back" {{ $order->glassPosition === 'back' ? 'selected' : '' }}>خلفي</option>
                                <option value="left-side" {{ $order->glassPosition === 'left-side' ? 'selected' : '' }}>جانب أيسر</option>
                                <option value="right-side" {{ $order->glassPosition === 'right-side' ? 'selected' : '' }}>جانب أيمن</option>
                                <option value="mirrors" {{ $order->glassPosition === 'mirrors' ? 'selected' : '' }}>مرايا</option>
                            </select>
                            @error('glassPosition')
                            <small id="helpId" style="color: red; display: block">{{ $message }}</small>
                            @enderror

                            <label style="display: block; margin-top: 15px;">نوع الخدمة</label>
                            <select id="serviceType" name="serviceType"
                                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                                <option value="" disabled selected>حدد نوع الخدمة</option>
                                <option value="process" @selected($order->getAttribute('serviceType')=='معالجة زجاج')>معالجة زجاج</option>
                                <option value="change" @selected($order->getAttribute('serviceType')=='تغيير زجاج')>تغيير زجاج</option>
                                <option value="upRepair" @selected($order->getAttribute('serviceType')=='اصلاح فتحة سقف')>اصلاح فتحة سقف</option>
                                <option value="machine" @selected($order->getAttribute('serviceType')=='اصلاح ماكينة زجاج')>اصلاح ماكينة زجاج</option>

                            </select>
                            @error('serviceType')
                            <small id="helpId" style="color: red; display: block">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-xl-6">
                            <label style="display: block; margin-top: 15px;">الموقع: <span style="font-size: smaller;">قم بتحريك العلامة وضعها على موقعك الحالي</span></label>
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
                                            btn.innerText = 'إعادة تحديد موقعك الحالي';
                                        }
                                    });
                                </script>
                            </a>
                            <div id="map" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-outline-info" onclick="event.preventDefault(); document.getElementById('editOrder').submit()">حفظ التغييرات</button>
            </div>
        </div>
    </div>
</div>

<!-- Script To Get Long & Lat From The Map -->
<script>
    // function initMap() {
    //     let defaultLatitude = 23.8859, defaultLongitude = 45.0792;
    //     let lat = Number(document.getElementById('latitude').value);
    //     let long = Number(document.getElementById('longitude').value);

    //     if (isNaN(lat) || lat < -90 || lat > 90) {
    //         lat = defaultLatitude;
    //     }

    //     if (isNaN(long) || long < -180 || long > 180) {
    //         long = defaultLongitude;
    //     }

    //     var map = new Microsoft.Maps.Map(document.getElementById('map'), {
    //         credentials: 'Akh1Nt_GkNKoWSJ7if290r_vwPLtebu-zJIJYbcs9CkmBshpy-sM6_BLSF2jxyG_',
    //         center: new Microsoft.Maps.Location(lat, long),
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

    // function displayToasterErrors(errors) {
    //     // Create a toaster notification to display validation errors
    //     var toaster = document.createElement('div');
    //     toaster.className = 'alert alert-danger alert-dismissible fade show';
    //     toaster.setAttribute('role', 'alert');

    //     var closeButton = document.createElement('button');
    //     closeButton.type = 'button';
    //     closeButton.className = 'btn-close';
    //     closeButton.setAttribute('data-bs-dismiss', 'alert');
    //     closeButton.setAttribute('aria-label', 'Close');
    //     toaster.appendChild(closeButton);

    //     var errorMessage = document.createTextNode('Validation errors: ' + errors.join(', '));
    //     toaster.appendChild(errorMessage);

    //     // Display the toaster notification within the modal
    //     var modalBody = document.querySelector('.modal-body');
    //     modalBody.appendChild(toaster);

    //     // Keep the modal open
    //     $('#newOrderModal').modal('handleUpdate');
    // }


    async function initMap(lat = Number(document.getElementById('latitude').value), long = Number(document.getElementById('longitude').value)) {
        let defaultLatitude = 23.8859, defaultLongitude = 45.0792;

        if (isNaN(lat) || lat < -90 || lat > 90) {
            lat = defaultLatitude;
        }

        if (isNaN(long) || long < -180 || long > 180) {
            long = defaultLongitude;
        }

        let localLat = lat ?? defaultLatitude;
        let localLong = long ?? defaultLongitude;
 
        // Request needed libraries.
        const { Map } = await google.maps.importLibrary("maps");
        const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
        const map = new Map(document.getElementById("map"), {
            center: { lat: localLat, lng: localLong },
            zoom: 14,
            mapId: "4504f8b37365c3d0",
        });
        // const infoWindow = new InfoWindow();
        const draggableMarker = new AdvancedMarkerElement({
            map,
            position: { lat: localLat, lng: localLong },
            gmpDraggable: true,
            title: "This marker is draggable.",
        });

        draggableMarker.addListener("dragend", (event) => {
            const position = draggableMarker.position;

            document.getElementById('latitude').value = position.h;
            document.getElementById('longitude').value = position.i;
        });
    }

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

    function getLocation (event) {
        if (navigator.permissions) {
            navigator.permissions.query({ name: 'geolocation' }).then(permissionStatus => {
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

    function showPosition (position) {
        document.getElementById('latitude').value = position.coords.latitude;
        document.getElementById('longitude').value = position.coords.longitude;
        document.getElementById('getLocation').innerText = 'تم تحديد الموقع الخاص بك'

        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;

        alert("Latitude: " + latitude + "\nLongitude: " + longitude);
        initMap(latitude, longitude);
    }

    function showError (error) {
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
