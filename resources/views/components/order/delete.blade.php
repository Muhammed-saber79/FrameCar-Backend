<!-- Modal -->
<div dir="rtl" class="modal fade" id="deleteOrderModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title text-center" id="staticBackdropLabel">حذف طلب</h5>
            </div>
            <div class="modal-body">
                <h4 class="text-warning">هل انت متأكد من حذف هذا الطلب؟</h4>
                <!-- Form -->
                <form id="deleteOrder" action="{{ route('order.destroy', $order->id) }}" method="POST" style="max-width: 400px; margin: 0 auto; text-align: right;">
                    @csrf
                    @method('DELETE')
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button
                    type="button"
                    class="btn btn-outline-danger"
                    onclick="event.preventDefault(); document.getElementById('deleteOrder').submit()"
                >إرسال</button>
            </div>
        </div>
    </div>
</div>



