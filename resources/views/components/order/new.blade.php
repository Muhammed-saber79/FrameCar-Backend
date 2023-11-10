<!-- Modal -->
  <div dir="rtl" class="modal fade" id="newOrderModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <h5 class="modal-title text-center" id="staticBackdropLabel">إرسال طلب</h5>
        </div>
        <div class="modal-body">
            <!-- Form -->
            <form id="newOrder" action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data" style="max-width: 400px; margin: 0 auto; text-align: right;">
                @csrf
                <input type="hidden" name="name" value="{{ Auth::user()->id }}">

                <!-- <x-form.input label="رقم الهاتف" labelStyle="margin-top: 15px" type="tel" name="phoneNumber" value="" placeholder="ادخل رقم الهاتف" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; outline:none;" /> -->
                <x-form.input label="نوع السيارة" labelStyle="margin-top: 15px" type="text" name="carType" value="" placeholder="ادخل نوع السيارة" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; outline:none;" />
                <x-form.input label="موديل السيارة " labelStyle="margin-top: 15px" type="text" name="carModel" value="" placeholder="ادخل موديل السيارة " style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; outline:none;" />
                <x-form.input label="تاريخ صنع السيارة " labelStyle="margin-top: 15px" type="text" name="carMadeYear" value="" placeholder="ادخل سنة صنع السيارة " style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; outline:none;" />
                <x-form.input label="نوع الزجاج" labelStyle="margin-top: 15px" type="text" name="glassType" value="" placeholder="ادخل نوع الزجاج" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; outline:none;" />

                <label style="display: block; margin-top: 15px;">مكان الزجاج</label>
                <select id="glassPosition" name="glassPosition"
                        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                    <option value="" disabled selected>حدد مكان الزجاج المكسور</option>
                    <option value="front" {{ old('glassPosition') == 'front' ? 'selected' : '' }}>أمامي</option>
                    <option value="back" {{ old('glassPosition') == 'back' ? 'selected' : '' }}>خلفي</option>
                    <option value="left-side" {{ old('glassPosition') == 'left-side' ? 'selected' : '' }}>جانب أيسر</option>
                    <option value="right-side" {{ old('glassPosition') == 'right-side' ? 'selected' : '' }}>جانب أيمن</option>
                    <option value="mirrors" {{ old('glassPosition') == 'mirrors' ? 'selected' : '' }}>مرايا</option>
                </select>
                @error('glassPosition')
                <small id="helpId" style="color: red; display: block">{{ $message }}</small>
                @enderror

                <label style="display: block; margin-top: 15px;">نوع الخدمة</label>
                <select id="serviceType" name="serviceType"
                        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                    <option value="" disabled selected>حدد نوع الخدمة</option>
                    <option value="process" {{ old('serviceType') == 'front' ? 'selected' : '' }}>معالجة زجاج</option>
                    <option value="change" {{ old('serviceType') == 'front' ? 'selected' : '' }}>تغيير زجاج</option>
                    <option value="upRepair" {{ old('serviceType') == 'front' ? 'selected' : '' }}>اصلاح فتحة سقف</option>
                    <option value="machine" {{ old('serviceType') == 'front' ? 'selected' : '' }}>اصلاح ماكينة زجاج</option>
                  
                </select>
                @error('serviceType')
                <small id="helpId" style="color: red; display: block">{{ $message }}</small>
                @enderror

                <label style="display: block; margin-top: 15px;">الموقع:<br>
                <!-- <span style="font-size: smaller;">قم بتحريك العلامة وضعها على موقعك الحالي</span></label> -->
                @error('latitude')
                <small id="helpId" style="color: red; display: block">{{ $message }}</small>
                @enderror

                <input type="hidden" id="latitude" name="latitude">
                 <!-- value="{{ old('latitude') }}"> -->
                <input type="hidden" id="longitude" name="longitude">
                <!-- value="{{ old('longitude') }}"> -->
                <a href="#" onclick="getLocation()" id="getLocation" class="btn btn-outline-success">
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            let lat = document.getElementById('latitude');
                            let long = document.getElementById('longitude');
                            let btn = document.getElementById('getLocation');

                            if (!lat.value) {
                                btn.innerText = 'اضغط هنا لتحديد موقعك الحالي';
                            } else {
                                btn.innerText = 'تم تحديد موقعك بالفعل';
                                btn.style.pointerEvents = 'none'; // Disable click events
                                btn.style.opacity = '0.5'; // Optionally reduce opacity for a disabled look
                            }
                        });
                    </script>
                </a>
                <br><br>
                <div id="map" style="width: 100%; height: 400px;"></div>

            </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button>
          <button
              type="button"
              class="btn btn-outline-info"
              onclick="event.preventDefault(); document.getElementById('newOrder').submit()"
          >إرسال</button>
        </div>
      </div>
    </div>
  </div>

<!-- Script To Get Long & Lat From The Map -->
<script>
    function initMap(lat, long) {
        let defaultLatitude = 23.8859, defaultLongitude = 45.0792;
        localLat = lat;
        localLong = long;
        // let lat = Number(document.getElementById('latitude').value);
        // let long = Number(document.getElementById('longitude').value);

        // if (isNaN(lat) || lat < -90 || lat > 90) {
        //     lat = defaultLatitude;
        // }

        // if (isNaN(long) || long < -180 || long > 180) {
        //     long = defaultLongitude;
        // }

        if (!lat) {
            localLat = defaultLatitude;
        }

        if (!long) {
            localLong = defaultLongitude;
        }

        var map = new Microsoft.Maps.Map(document.getElementById('map'), {
            credentials: 'Akh1Nt_GkNKoWSJ7if290r_vwPLtebu-zJIJYbcs9CkmBshpy-sM6_BLSF2jxyG_',
            center: new Microsoft.Maps.Location(localLat, localLong),
            zoom: 6
        });

        var marker = new Microsoft.Maps.Pushpin(map.getCenter(), {
            draggable: true
        });
        map.entities.push(marker);

        Microsoft.Maps.Events.addHandler(marker, 'dragend', function (event) {
            var location = marker.getLocation();
            console.log('Location:', location.latitude, location.longitude);

            document.getElementById('latitude').value = location.latitude;
            document.getElementById('longitude').value = location.longitude;
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

    // let loactionBtn = document.getElementById('getLocation');
    // loactionBtn.addEventListener('click', getLocation());

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



