@extends('layouts.admin')

@section('title')
المشاريع
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
  <div class="row">
    <div class="col-md-12 my-4">
      <h2 class="h4 mb-1"> المشاريع</h2>
      <br>
      {{-- <p class="mb-3">Child rows with additional detailed information</p> --}}
      <div class="card shadow">
        <div class="card-header">
          <a type="button" href="" class="btn mb-2 btn btn-primary" data-toggle="modal" data-target="#defaultModal">   اضافة مشروع  </a>

        </div>
        <div class="card-body">
          <!-- table -->
          <table class="table table-hover table-borderless border-v">
            <thead class="thead-dark">
              <tr>
       
                <th>م</th>
                <th>اسم المشروع</th>
                <th>الصورة </th>               
                <th>العمليات</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-2474">

                <td>{{$loop->iteration}}</td>
                <td>{{$project->name}}</td>
                <td>
                  <img src="{{asset('storage/'.$project->photo)}}" width="200px" alt="">
                </td>
               
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="text-muted sr-only">Action</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a type="button" class="btn mb-2 dropdown-item" data-toggle="modal" data-target="#defaultModal{{$project->id}}">   تعديل  </a>
                  <a type="button" class="btn mb-2 dropdown-item" data-toggle="modal" data-target="#delete{{$project->id}}">   حذف  </a>
                 
                </div>
                
              </td>


              <div class="modal fade" id="delete{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="defaultModalLabel"> هل انت متاكد من عملية الحذف ؟ </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{route('projects.destroy',$project->id)}}" method='post' enctype="multipart/form-data">
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
                    <div class="modal fade" id="defaultModal{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="defaultModalLabel"> تعديل المشروع</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="{{route('projects.update',$project->id)}}" method='post' enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="modal-body"> 
                              <label for="inputPassword4"> اسم المشروع  </label>
                              <input type="text" name="name" value="{{$project->name}}"  class="form-control" id="inputPassword4" >
                          
                            </div>
                            <div class="modal-body"> 
                              <label for="inputPassword4"> صورة المشروع  </label>
                              <input type="file" name="photo"  class="form-control" id="inputPassword4" >
                          
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
                
             

                <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="defaultModalLabel"> اضافة مشروع</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{route('projects.store')}}" method='post' enctype="multipart/form-data">
                        @csrf
                      <div class="modal-body"> 
                        <label for="inputPassword4"> اسم المشروع  </label>
                        <input type="text" name="name"  class="form-control" id="inputPassword4" >
                    
                      </div>
                      <div class="modal-body"> 
                        <label for="inputPassword4"> صورة المشروع  </label>
                        <input type="file" name="photo"  class="form-control" id="inputPassword4" >
                    
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn mb-2 btn-primary"> تاكيد</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
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