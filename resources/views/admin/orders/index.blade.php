@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
<div class="row">
    <div class="col-md-12 my-4">
      <h2 class="h4 mb-1">طلبات التواصل </h2>
      <br>
      {{-- <p class="mb-3">Child rows with additional detailed information</p> --}}
      <div class="card shadow">

        <div class="card-body">
          <!-- table -->
          <table class="table table-hover table-borderless border-v">
            <thead class="thead-dark">
              <tr>

                  <th>الرقم</th>
                  <th>اسم صاحب السيارة</th>
                  <th>نوع السيارة</th>
                  <th>مكان الزجاج</th>
                  <th>صورة الزجاج المكسور</th>
                  <th>تاريخ الطلب</th>
                  <th>حالة الطلب</th>
                  <th>رقم الهاتف</th>
                  <th>الموقع </th>
                  {{-- <th>الإجراءات</th> --}}
              </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-2474">

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->carType }}</td>
                    <td>{{ $order->glassPosition }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $order->brokenGlassImage) }}" width="100" alt="">
                    </td>
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
                    <td>{{ $order->phoneNumber }}</td>
                    <td>
                        <a style="color: #84cce4;" href="{{ $order->locationLink }}"> {{ $order->user->name . '/ location'}} </a>

                    </td>


                {{-- <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="text-muted sr-only">Action</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a type="button" class="btn mb-2 dropdown-item" data-toggle="modal" data-target="#delete{{$order->id}}">   حذف  </a>

                </div>

              </td> --}}


              <div class="modal fade" id="delete{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="defaultModalLabel"> هل انت متاكد من عملية الحذف ؟ </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{route('order.destroy',$order)}}" method='post' enctype="multipart/form-data">
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

                    <!-- Button trigger modal -->
                    <!-- Modal -->

                  </tr>

                @endforeach




            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div> <!-- end section -->
</div>
</div>
</div>


  @endsection
