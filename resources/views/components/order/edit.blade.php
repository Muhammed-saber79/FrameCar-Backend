<!-- Modal -->
<div dir="rtl" class="modal fade" id="editOrderModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title text-center" id="staticBackdropLabel">تعديل بيانات الطلب</h5>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form id="editOrder" action="{{ route('order.update', $order->id) }}" method="POST" enctype="multipart/form-data" style="max-width: 400px; margin: 0 auto; text-align: right;">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="name" value="{{ Auth::user()->id }}">

                    <!-- Populate the input fields with order data -->
                    <x-form.input label="رقم الهاتف" labelStyle="margin-top: 15px" type="tel" name="phoneNumber" value="{{ $order->phoneNumber }}" placeholder="ادخل رقم الهاتف" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; outline:none;" />
                    <x-form.input label="نوع السيارة" labelStyle="margin-top: 15px" type="text" name="carType" value="{{ $order->carType }}" placeholder="ادخل نوع السيارة" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; outline:none;" />
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

                    <x-form.input label="صورة الزجاج المكسور" labelStyle="margin-top: 15px" type="file" name="broken_glass_image" placeholder="" value="{{ asset('storage/' . $order->brokenGlassImage) }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" />
                    @if(isset($order->brokenGlassImage))
                        <img style="margin-top: 15px" width="70" src="{{ asset('./storage/' . $order->brokenGlassImage) }}" alt="صورة الزجاج المكسور"/>
                    @endif

                    <label style="display: block; margin-top: 15px;">الموقع: <span style="font-size: smaller;">قم بتحريك العلامة وضعها على موقعك الحالي</span></label>
                    @error('latitude')
                    <small id="helpId" style="color: red; display: block">{{ $message }}</small>
                    @enderror

                    <div id="map" style="width: 100%; height: 400px;"></div>
                    <input type="hidden" id="latitude" name="latitude" value="{{ $order->latitude }}">
                    <input type="hidden" id="longitude" name="longitude" value="{{ $order->longitude }}">
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
    function initMap() {
        let defaultLatitude = 23.8859, defaultLongitude = 45.0792;
        let lat = Number(document.getElementById('latitude').value);
        let long = Number(document.getElementById('longitude').value);

        if (isNaN(lat) || lat < -90 || lat > 90) {
            lat = defaultLatitude;
        }

        if (isNaN(long) || long < -180 || long > 180) {
            long = defaultLongitude;
        }

        var map = new Microsoft.Maps.Map(document.getElementById('map'), {
            credentials: 'Akh1Nt_GkNKoWSJ7if290r_vwPLtebu-zJIJYbcs9CkmBshpy-sM6_BLSF2jxyG_',
            center: new Microsoft.Maps.Location(lat, long),
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
</script>
<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=initMap' async defer></script>
