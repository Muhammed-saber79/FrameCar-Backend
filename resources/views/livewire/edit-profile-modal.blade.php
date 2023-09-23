<div>
    <div style="display: flex; justify-content: center;">
        <a class="logout" data-bs-toggle="modal" data-bs-target="#editProfileModal"
            wire:click="edit({{ $user->id }})"
        >تعديل البيانات الشخصية</a>
    </div>


    <!-- Modal -->
    <div dir="rtl" class="modal fade" id="editProfileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h5 class="modal-title text-center" id="staticBackdropLabel">تعديل بيانات</h5>
                </div>

                <!-- Form -->
                <form id="editProfile" wire:submit.prevent="update({{ Auth::id() }})">
                    <div class="modal-body">
                        <h4 class="text-info text-center">تعديل البيانات الشخصية</h4>

                        <div class="mb-3">
                            <label for="name" class="form-label">الاسم</label>
                            <input wire:model="name" type="text" class="form-control" id="name" placeholder="أدخل اسمك">
                            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">البريد الإلكتروني</label>
                            <input wire:model="email" type="text" class="form-control" id="email" placeholder="أدخل بريدك الإلكتروني">
                            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phoneNumber" class="form-label">رقم الجوال</label>
                            <input wire:model="phoneNumber" type="text" class="form-control" id="phoneNumber" placeholder="أدخل رقم الجوال">
                            @error('phoneNumber') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button
                            type="submit"
                            id="updateBtn"
                            class="btn btn-outline-info"
                            data-bs-dismiss="modal"
                        >حفظ التغييرات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
