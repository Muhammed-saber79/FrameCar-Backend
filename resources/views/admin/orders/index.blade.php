@extends('layouts.admin')

@section('title')
الطلبات
@endsection

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
      <div class="col-12">
        <div class="row">
          <x-toaster style="position: fixed; top: 110px; left: 50px; width: 300px;" />

          <div class="col-md-12 my-4">
            <h2 class="h4 mb-1">الطلبات</h2>
            <br>
            {{-- <p class="mb-3">Child rows with additional detailed information</p> --}}

            <div class="card shadow">

              <div class="card-body" style="overflow: auto;">
                @if($orders->count() == 0)
                  <h3 class="text-danger text-center">لا يوجد طلبات حتى الان</h3>
                @else
                  <!-- table -->
                  <table class="table table-hover table-borderless border-v">
                    <thead class="thead-dark">
                      <tr>
                        <th class="text-center">الرقم</th>
                        <th class="text-center">اسم صاحب السيارة</th>
                        <th class="text-center">نوع السيارة</th>
                        <th class="text-center">موديل السيارة</th>
                        <th class="text-center">تاريخ التصنيع</th>
                        <th class="text-center">مكان الزجاج</th>
                        <th class="text-center">نوع الخدمة</th>
                        <th class="text-center">تاريخ الطلب</th>
                        <th class="text-center">حالة الطلب</th>
                        <th class="text-center">تم الدفع</th>
                        <th class="text-center">رقم الهاتف</th>
                        <th class="text-center">الموقع </th>
                        <th class="text-center">الإجراءات</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($orders as $order)
                        <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-2474">
                            <!-- <td class="text-center">{{ $loop->iteration }}</td> -->
                            <td class="text-center">{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->carType }}</td>
                            <td>{{ $order->carModel }}</td>
                            <td>{{ $order->carMadeYear }}</td>
                            <td>{{ $order->glassPosition }}</td>
                            <td>{{ $order->serviceType }}</td>
                            <td>{{ $order->created_at->diffForHumans() }}</td>
                            <td style="font-weight: bold;
                                                @if($order->status == 'pending') color: rgb(13, 164, 184);
                                                @elseif( $order->status == 'approved') color: rgb(56, 184, 13);
                                                @elseif( $order->status == 'rejected' ) color: rgb(184, 13, 13); text-decoration: line-through;
                                                @elseif( $order->status == 'canceled' ) color: rgb(220, 172, 14); text-decoration: line-through;
                                                @elseif( $order->status == 'completed' ) color: rgb(91, 94, 91);
                                                @endif" >
                                {{ $order->status }}
                            </td>
                            <td>
                                @if ($order->isPaid == 1)
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path fill="#5df20d" d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"/>
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path fill="#e51515" d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z"/>
                                    </svg>
                                @endif
                            </td>

                            <td>{{ $order->user->phoneNumber }}</td>
                            <td>
                                <a style="color: #84cce4;" href="{{ $order->locationLink }}"> {{ $order->user->name . '/ location'}} </a>
                            </td>

                            <td>
                              <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">الإجراءات</span>
                              </button>

                              <div class="dropdown-menu dropdown-menu-right">
                                <a type="button" class="btn mb-2 dropdown-item" data-toggle="modal" data-target="#delete{{$order->id}}">   حذف  </a>
                                <a type="button" class="btn mb-2 dropdown-item" data-toggle="modal" data-target="#reply-{{$order->id}}">   رد  </a>
                                <a href="{{route('updateStatus',['status'=>'completed','order_id'=>$order->id])}}" type="button" class="btn mb-2 dropdown-item" >   تاكيد  </a>
                                <a href="{{route('updateStatus',['status'=>'canceled','order_id'=>$order->id])}}" type="button" class="btn mb-2 dropdown-item" >   الغاء  </a>
                              </div>
                            </td>

                            <div class="modal fade" id="delete{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="defaultModalLabel"> هل انت متاكد من عملية الحذف ؟ </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form action="{{route('admin.order_delete',$order)}}" method='post' enctype="multipart/form-data">
                                    @csrf
                                    @method("DELETE")

                                  <div class="modal-footer">
                                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">اغلاق</button>
                                    <button type="submit" class="btn mb-2 btn-primary"> تاكيد</button>
                                  </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                            <div class="modal fade" id="reply-{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="defaultModalLabel">يمكنك كتابة رد لإرساله الى العميل {{ $order->user->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>

                                  <form action="{{ route('admin.orders.reply', $order) }}" method='POST' enctype="multipart/form-data">
                                    @csrf
                                    <div style="width: 95%; margin: auto">
                                      <x-form.input attr="readonly" label="البريد الالكتروني الخاص بصاحب السيارة" labelStyle="margin-top: 15px" type="email" name="email" value="{{ $order->user->email }}" placeholder="ادخل البريد الالكتروني الخاص بصاحب السيارة" style="width: 100%; padding: 10px; margin: auto; border: 1px solid #ccc; border-radius: 5px; outline:none;" />
                                    </div>

                                    <div style="width: 95%; margin: auto">
                                      <x-form.input label="التكلفة الكلية" labelStyle="margin-top: 15px" type="number" name="cost" value="" placeholder="حدد التكلفة الكلية اللازمة للخدمة" style="width: 100%; padding: 10px; margin: auto; border: 1px solid #ccc; border-radius: 5px; outline:none;" />
                                    </div>

                                    <div style="width: 95%; margin: auto">
                                      <label for="message" style="margin-top: 15px">محتوى الرسالة</label>
                                      <textarea name="message" id="message" cols="30" rows="5"
                                        style="display: block; width: 100%; padding: 10px; margin: auto; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px; outline:none;"
                                        @error('message') style="border-color: red" @enderror
                                        >{{ old('message') }}</textarea>
                                      @error('message')
                                          <small id="helpId" style="color: red; display: block">{{ $message }}</small>
                                      @enderror
                                    </div>

                                    <div class="modal-footer">
                                      <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">اغلاق</button>
                                      <button type="submit" class="btn mb-2 btn-primary"> تاكيد</button>
                                    </div>
                                  </form>

                                </div>
                              </div>
                            </div>
                          </tr>

                        @endforeach
                    </tbody>
                  </table>

                  {{ $orders->links() }}
                @endif
              </div>

            </div>
          </div>

        </div> <!-- end section -->
      </div>
  </div>
</div>
@endsection
