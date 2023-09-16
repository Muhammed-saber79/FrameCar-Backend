@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <!-- <h2>Section title</h2> -->
        <h2 class="h5 page-title"> مرحبا بك يا </h2>
        <p class="text-muted"></p>
        <br>
        <br>
      
        <!-- info small box -->
        <div class="row">
         <div class="col-md-4 mb-4">
            <a href="">
            <div class="card shadow">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <span class="h2 mb-0">5</span>
                    <p class="small text-muted mb-0">المشرفين</p>
                  </div>
                  <div class="col-auto">
                    <span class="fe fe-32 fe-users text-muted mb-0"></span>
                  </div>
                </div>
              </div>
            </div>
           </a>
          </div>
          
          <div class="col-md-4 mb-4">
            <a href="">
            <div class="card shadow">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <span class="h2 mb-0">3</span>
                    <p class="small text-muted mb-0">المعلمين</p>
                  </div>
                  <div class="col-auto">
                    <span class="fe fe-32 fe-users text-muted mb-0"></span>
                  </div>
                </div>
              </div>
            </div>
           </a>
          </div>
          <div class="col-md-4 mb-4">
            <a href="">
            <div class="card shadow">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <span class="h2 mb-0">4</span>
                    <p class="small text-muted mb-0">الطلاب</p>
                  </div>
                  <div class="col-auto">
                    <span class="fe fe-32 fe-users text-muted mb-0"></span>
                  </div>
                </div>
              </div>
            </div>
           </a>
          </div>
        </div> <!-- end section -->
       
      </div>
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
@endsection