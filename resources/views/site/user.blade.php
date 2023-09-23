@extends('layouts.userDashboard')

@section('title')
    لوحة تحكم المستخدم
@endsection


@section('content')
    <div class="content">

        <div class="right">
            <div class="order-container">
                @livewire('updated-data')
            </div>
        </div>

        <x-toaster />

        <div class="left">
            <div class="order-container">
                <h1>لوحة الطلبات</h1>
                
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <a data-bs-toggle="modal" data-bs-target="#newOrderModal"
                        class="addBtn btn btn-icon btn-light text-primary rounded-pill shadow bg-body-tertiary rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                            <style>svg{fill:#0d5de7}</style>
                            <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                        </svg>
                    </a>
                    {{ $orders->links('pagination.simple') }}
                </div>
                <div  style="overflow-x: scroll;">
                    @livewire('order.list-orders') 
                </div>
            </div>
        </div>
       
    </div>

    <x-order.new />

    <script>
        window.addEventListener('close-modal', event => {
            document.getElementById('#editProfileModal').style.display = 'none';
        })
    </script>
@endsection
