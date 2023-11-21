@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <!-- <h2>Section title</h2> -->
        <h2 class="h5 page-title">مرحبا بك يا <span class="text-info text-bold">{{ Auth::user()->name }}</span></h2>
        <p class="text-muted"></p>
        <br>
        <br>
      
        <!-- info small box -->
        <div class="row">

          <div class="col-md-4 mb-4">
            <a href="{{ route('admin.users.index') }}">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <span class="h2 mb-0"> {{ $usersCount }} </span>
                      <p class="small text-muted mb-0">العملاء</p>
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
            <a href="{{ route('admin.orders') }}">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <span class="h2 mb-0">{{ $ordersCount }}</span>
                      <p class="small text-muted mb-0">الطلبات</p>
                    </div>
                    <div class="col-auto">
                      <!-- <span class="fe fe-32 fe:cart text-muted mb-0"></span> -->
                      <!-- <span class="fas fa-cart-shopping text-muted mb-0"></span> -->
                      <!-- <i class="fa-solid fa-cart-shopping"></i> -->
                      <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                        <style>
                          svg{
                            fill:#ADB5BD;
                            font-size: xx-large;
                          }
                        </style>
                        <path d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z"/>
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>

          <div class="col-md-4 mb-4">
            <a href="{{ route('admin.projects.index') }}">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <span class="h2 mb-0">{{ $projectsCount }}</span>
                      <p class="small text-muted mb-0">المشاريع</p>
                    </div>
                    <div class="col-auto">
                      <!-- <span class="fe fe-32 fe-users text-muted mb-0"></span> -->

                      <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                        <style>
                          svg{
                            fill:#ADB5BD;
                            font-size: xx-large;
                          }
                        </style>
                        <path d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z"/>
                      </svg>

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