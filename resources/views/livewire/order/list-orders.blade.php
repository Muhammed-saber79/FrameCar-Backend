<div>
    @if($orders->count() == 0)
        <h3 class="text-danger text-center">لا يوجد طلبات حتى الان</h3>
    @else
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
            <tbody wire:pagination>
                @foreach($orders as $order)
                    <tr>
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
                        <td>
                            <div class="btns">
                                <a href="{{ route('order.edit', $order->id) }}"
                                    class="addBtn btn btn-icon btn-light text-primary rounded-pill shadow bg-body-tertiary rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" fill="cyan"/>
                                    </svg>
                                </a>
                                <livewire:order.delete-order :order="$order" :key="$order->id" >
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
