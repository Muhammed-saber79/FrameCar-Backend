@extends('layouts.userDashboard')

@section('title')
    لوحة تحكم المستخدم
@endsection

@section('content')
    <div class="content">

        <div class="right">
            <div class="order-container">
                <div class="top" style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin: 15px auto;">
                    <img src="{{ asset('site/assets/img/user.png') }}" width="75" alt="">
                    <h3>محمد صابر</h3>
                </div>
                <div class="bottom">
                    <div class="data">محمد صابر</div>
                    <div class="data">muhammed.saber@gmail.com</div>
                    <div class="data">01065821556</div>
                    <div style="display: flex; justify-content: center;">
                        <a class="logout" href="#">تسجيل الخروج</a>
                    </div>
                </div>
            </div>
        </div>

        <x-toaster />

        <div class="left">
            <div class="order-container" style="height: 100%">
                <h1>لوحة الطلبات</h1>
                <a data-bs-toggle="modal" data-bs-target="#newOrderModal"
                   class="addBtn btn btn-icon btn-light text-primary rounded-pill shadow bg-body-tertiary rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                        <style>svg{fill:#0d5de7}</style>
                        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                    </svg>
                </a>
                <div  style="overflow-x: scroll;">
                    <table>
                        <thead>
                        <tr>
                            <th>الرقم</th>
                            <th>نوع السيارة</th>
                            <th>نوع الزجاج</th>
                            <th>مكان الزجاج</th>
                            <th>صورة الزجاج المكسور</th>
                            <th>تاريخ الطلب</th>
                            <th>حالة الطلب</th>
                            <th>رقم الهاتف</th>
                            <th>الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr id="{{ $order->id }}">
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->carType }}</td>
                                    <td>{{ $order->glassType }}</td>
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
                                    <td class="btns">
                                        <a href="{{ route('order.edit', $order->id) }}"
                                           class="addBtn btn btn-icon btn-light text-primary rounded-pill shadow bg-body-tertiary rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" fill="cyan"/>
                                            </svg>
                                        </a>
                                        &nbsp;&nbsp;|&nbsp;&nbsp;
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteOrderModal" data-order-id="{{ $order->id }}"
                                            class="addBtn btn btn-icon btn-light text-primary rounded-pill shadow bg-body-tertiary rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                                <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" fill="red"/>
                                            </svg>
                                        </a>

                                    </td>
                                </tr>

                                <x-order.delete :order="$order" />
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <x-order.new />
@endsection
