@extends('layouts.admin')

@section('title')
المستخدمين
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
  <div class="row">
    <div class="col-md-12 my-4">
      <h2 class="h4 mb-1">العملاء</h2>
      <br>
      {{-- <p class="mb-3">Child rows with additional detailed information</p> --}}
      <div class="card shadow">
      
        <div class="card-body">
          <!-- table -->
          <table class="table table-hover table-borderless border-v">
            <thead class="thead-dark">
              <tr>
       
                <th class="text-center">م</th>
                <th class="text-center">اسم المستخدم </th>
                <th class="text-center">البريد الالكتروني </th>               
                <th class="text-center">رقم الهاتف</th>
                <th class="text-center">عدد الطلبات</th>
                <th class="text-center">تاريخ التسجيل على المنصة</th>
                <th class="text-center">العمليات</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-2474">

                <td class="text-center">{{$loop->iteration}}</td>
                <td class="text-center">{{$user->name}}</td>
                <td class="text-center text-info">{{$user->email}}</td>
                <td class="text-center">{{$user->phoneNumber}}</td>
                <td class="text-center text-warning">{{$user->orders->count()}}</td>
                <td class="text-center text-success">{{ $user->created_at->format('F j, Y g:i a') }}</td>
               
                <td class="text-center"><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="text-muted sr-only">Action</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a type="button" class="btn mb-2 dropdown-item text-danger" data-toggle="modal" data-target="#delete{{$user->id}}">   حذف  </a>
                 
                </div>
                
              </td>


              <div class="modal fade" id="delete{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="defaultModalLabel"> هل انت متاكد من عملية الحذف ؟ </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{route('admin.users.destroy',$user)}}" method='post' enctype="multipart/form-data">
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
          {{$users->links('pagination::bootstrap-4')}}
        </div>
      </div>
    </div>
  </div> <!-- end section -->
</div>
</div>
</div>
@endsection