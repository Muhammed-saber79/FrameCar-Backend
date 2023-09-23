<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class EditProfileModal extends Component
{
    public $name = '';
    public $email = '';
    public $phoneNumber = '';
    public $isOpen = false;

    public function edit($id): void
    {
        $user = User::findOrFail($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phoneNumber = $user->phoneNumber;
        $this->isOpen = true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'regex:/^(?=.*[a-zA-Z]).{3,50}$/'],
            'phoneNumber' => ['required', 'regex:/^(\+\d{1,3}[- ]?)?\d{11}$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class . ',email,' . Auth::id()],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'يرجى إدخال إسم المستخدم...!',
            'name.regex' => 'يرجى إدخال إسم مستخدم لا يقل عن 3 احرف...!',
            'phone.required' => 'يرجى إدخال رقم الجوال...!',
            'phone.regex' => 'رقم الجوال خاطئ...!',
            'email.required' => 'يرجى إدخال البريد الالكتروني...!',
            'email.email' => 'بريد إلكتروني خاطئ...!',
            'email.unique' => 'تم استخدام هذا البريد الإلكتروني مسبقا...!',
        ];
    }

    public function update($user_id): void
    {
        $this->validate($this->rules());

        $user = User::findOrFail($user_id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->phoneNumber = $this->phoneNumber;
        $user->save();
        $this->isOpen = false;

        session()->flash('success', 'تم تحديث البيانات بنجاح');
        $this->dispatch('dataUpdated');
    }
    
    public function render()
    {
        return view('livewire.edit-profile-modal')->with(['user' => Auth::user()]);
    }
}
