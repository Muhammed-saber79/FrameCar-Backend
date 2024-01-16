@extends('layouts.userDashboard')

@section('title')
    لوحة تحكم المستخدم
@endsection


@section('content')
    <div class="content">

        <div class="right">
            <div class="order-container custome" style=";height: 1000px; max-height: 900px !important;">
                @livewire('updated-data')
            </div>
        </div>

        <x-toaster />

        <div class="left">
            <div class="order-container">
                <div class="row justify-content-around text-center">
                    <div class="col-md-4 my-3">
                        <div class="card border-info-subtle rounded-3">
                            <div class="card-body bg-info rounded-3">
                                <div class="row align-items-center">
                                    <div class="col text-end">
                                        <span class="h2 mb-0"> {{ $ordersCount }} </span>
                                        <p class="small text-muted mb-0">إجمالي عدد الطلبات</p>
                                    </div>
                                    <div class="col-auto">
{{--                                        <span class="fe fe-32 fe-users text-muted mb-0"></span>--}}
                                        <svg xmlns="http://www.w3.org/2000/svg" height="46" width="48" viewBox="0 0 576 512">
                                            <style>svg{fill:#0d5de7}</style>
                                            <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 my-3">
                        <div class="card border-info-subtle rounded-3">
                            <div class="card-body bg-success-subtle rounded-3">
                                <div class="row align-items-center">
                                    <div class="col text-end">
                                        <span class="h2 mb-0"> {{ $approvedOrdersCount }} </span>
                                        <p class="small text-muted mb-0">عدد الطلبات المكتملة</p>
                                    </div>
                                    <div class="col-auto">
{{--                                        <span class="fe fe-32 fe-users text-muted mb-0"></span>--}}
                                        <svg xmlns="http://www.w3.org/2000/svg" height="46" width="48" viewBox="0 0 512 512">
                                            <path fill="#07e704" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 my-3">
                        <div class="card border-info-subtle rounded-3">
                            <div class="card-body bg-warning rounded-3">
                                <div class="row align-items-center">
                                    <div class="col text-end">
                                        <span class="h2 mb-0"> {{ $rejectedOrdersCount }} </span>
                                        <p class="small text-muted mb-0">عدد الطلبات المرفوضة</p>
                                    </div>
                                    <div class="col-auto">
{{--                                        <span class="fe fe-32 fe-users text-muted mb-0"></span>--}}
                                        <svg xmlns="http://www.w3.org/2000/svg" height="46" width="48" viewBox="0 0 512 512">
                                            <path fill="#e30202" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="order-container">
                <h1>لوحة الطلبات</h1>

                <div class="d-flex flex-row justify-content-between align-items-center">
                    <a data-bs-toggle="modal" data-bs-target="#newOrderModal"
                        class="addBtn btn btn-icon btn-light text-primary rounded-pill shadow bg-body-tertiary rounded">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                            <style>svg{fill:#0d5de7}</style>
                            <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                        </svg> -->
                        إرسال طلب
                    </a>
                    {{ $orders->links('pagination.simple') }}
                </div>
                <div style="overflow: auto;">
                    @livewire('order.list-orders')
                </div>
            </div>

            <div class="my-3 p-3 order-container">
                <div class="footer-legal text-center position-relative">
                    <div class="container">
                        <div class="copyright text-center mx-auto">
                            جميع الحقوق محفوظة &copy; <strong>
                                <a href="{{ route('site') }}">
                                    <span class="gradient-text">Frame Car</span></strong>.
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <x-order.new />


@endsection
