@extends('layouts.userDashboard')

@section('title')
    لوحة تحكم المستخدم
@endsection

@section('content')
    <div class="order-details-card animate">
        <h1>تفاصيل الطلب</h1>
        <div class="sub-card animate">
            <label>الرقم:</label>
            <span>{{ $order->id }}</span>
        </div>

        <div class="sub-card animate">
            <label>نوع السيارة:</label>
            <span>{{ $order->carType }}</span>
        </div>

        <div class="sub-card animate">
            <label>نوع الزجاج:</label>
            <span>{{ $order->glassType }}</span>
        </div>

        <div class="sub-card animate">
            <label>مكان الزجاج:</label>
            <span>{{ $order->glassPosition }}</span>
        </div>

        <div class="sub-card animate">
            <label>تاريخ الطلب:</label>
            <span>{{ $order->created_at->format('Y-m-d') }}</span>
        </div>

        <div class="sub-card animate">
            <label>حالة الطلب:</label>
            <span style="font-weight: bold;
            @if($order->status == 'pending') color: rgb(13, 164, 184);
            @elseif( $order->status == 'approved') color: rgb(56, 184, 13);
            @elseif( $order->status == 'rejected' ) color: rgb(184, 13, 13); text-decoration: line-through;
            @elseif( $order->status == 'canceled' ) color: rgb(220, 172, 14); text-decoration: line-through;
            @elseif( $order->status == 'completed' ) color: rgb(91, 94, 91);
            @endif"
            >{{ $order->status }}</span>
        </div>


        <div class="sub-card animate">
            <label>رقم الهاتف:</label>
            <span>{{ $order->phoneNumber }}</span>
        </div>

        <div class="sub-card animate">
            <label>صورة الزجاج المكسور:</label>
            <img width="100" src="{{ asset('storage/' . $order->brokenGlassImage) }}" alt="صورة الزجاج المكسور">
        </div>

        <div class="sub-card animate">
            <label>موقعك الجغرافي:</label>
            <a style="color: #84cce4;" href="{{ $order->locationLink }}"> {{ $order->user->name . '/ location'}} </a>
        </div>

        <!-- Button to open the edit modal -->
        <a data-bs-toggle="modal" data-bs-target="#editOrderModal"
           class="addBtn btn btn-icon btn-light text-primary rounded-pill shadow bg-body-tertiary rounded">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" fill="cyan"/>
            </svg>
        </a>
    </div>

    <x-toaster />

    <x-order.edit :order="$order" />
@endsection
