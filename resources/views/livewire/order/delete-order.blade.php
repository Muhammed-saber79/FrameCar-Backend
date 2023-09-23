<div>
    <a wire:click="showModal()" href="#" data-bs-toggle="modal" data-bs-target="#deleteOrderModal-{{ $order->id }}"
        class="addBtn btn btn-icon btn-light text-primary rounded-pill shadow bg-body-tertiary rounded">
        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
            <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" fill="red"/>
        </svg>
    </a>

    <!-- Modal -->
    <div dir="rtl" class="modal fade" id="deleteOrderModal-{{ $order->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h5 class="modal-title text-center" id="staticBackdropLabel">حذف طلب</h5>
                </div>

                <!-- Form -->
                <form id="deleteOrder" wire:submit.prevent="delete({{ $order->id }})">
                    <div class="modal-body">
                        <h4 class="text-warning">هل انت متأكد من حذف الطلب رقم <span class="text-danger font-bold">{{ $order->id }}</span>؟</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button
                            type="submit"
                            id="updateBtn"
                            class="btn btn-outline-danger"
                            data-bs-dismiss="modal"
                        >حذف</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
