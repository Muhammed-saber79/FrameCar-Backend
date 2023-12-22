@extends('layouts.admin')

@section('title')
    إعدادت الملف الشخصي
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12 my-4">
                        <h2 class="h4 mb-1"> إعدادت الملف الشخصي</h2>
                        <br>
                        {{-- <p class="mb-3">Child rows with additional detailed information</p> --}}
                        <div class="card shadow">
                            <div class="card-body">

                                <form action="{{route('admin.profile.update')}}" method='post' enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row align-items-center">
                                        <div class="col-md-3 text-center">
                                            <img src="{{ $user->image && file_exists(storage_path('app/public/' . $user->image)) ? asset('storage/' . $user->image) : asset('defaultImages/profile/avatar.png') }}" alt="صورة المستخدم" class="img-fluid rounded-circle mb-3" style="max-width: 100px;">
                                            <label for="image" class="form-label">صورة الملف الشخصي</label>
                                            <input type="file" id="image" name="image" class="form-control-file text-info">
                                        </div>
                                        <div class="col-md-9">

                                                <div class="mb-3">
                                                    <label for="name" class="col-form-label">الاسم</label>
                                                    <div class="d-flex justify-content-between">
                                                        <input type="text" id="name" name="name" class="form-control-plaintext text-info" placeholder="أدخل اسمك" value="{{ old('name', $user->name) }}">
                                                        <style>
                                                            #nameEditIcon:hover {
                                                                cursor: pointer;
                                                                color: #007bff;
                                                            }
                                                        </style>
                                                        <i
                                                            class="fe fe-edit text-info mx-2" id="nameEditIcon"
                                                            onclick="document.getElementById('name').focus()"
                                                        ></i>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="email" class="form-label">البريد الإلكتروني</label>
                                                    <div class="d-flex justify-content-between">
                                                        <input type="email" id="email" name="email" class="form-control-plaintext text-info" placeholder="أدخل بريدك الإلكتروني" value="{{ old('email', $user->email) }}">

                                                        <style>
                                                            #emailEditIcon:hover {
                                                                cursor: pointer;
                                                                color: #007bff;
                                                            }
                                                        </style>
                                                        <i
                                                            class="fe fe-edit text-info mx-2" id="emailEditIcon"
                                                            onclick="document.getElementById('email').focus()"
                                                        ></i>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="status" class="form-label">الحالة:
                                                        <span class="text-success bg-dark p-2 rounded">نشط</span>
                                                    </label>
                                                </div>

                                                <a type="button" href="" class="btn mb-2 btn btn-primary" data-toggle="modal" data-target="#defaultModal"> تحديث الملف الشخصي </a>
                                                <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">

                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="defaultModalLabel">تحديث بيانات الملف الشخصي</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <h4 class="text-info"> هل أنت متأكد من إرسال الطلب لتحديث الملف الشخصي؟ </h4>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">اغلاق</button>
                                                                <button type="submit" class="btn mb-2 btn-primary"> تاكيد</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div> <!-- end section -->
            </div>
        </div>
    </div>
@endsection
