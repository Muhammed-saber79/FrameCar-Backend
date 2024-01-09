<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\User;
use App\Models\Order;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index (): View
    {
        $usersCount = User::count();
        $ordersCount = Order::count();
        $projectsCount = Project::count();
        $orders = Order::latest()->where('date',Carbon::now()->format('Y-m-d'))->whereIn('status',['pending', 'approved', 'replied'])->get();

        $usersData = [];
        $ordersData = [];

        for ($i = 4; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i)->format('F'); // Get month name
            $usersData['labels'][] = $month;

            // Fetch user count for the current month
            $usersData['data'][] = User::whereYear('created_at', now()->year)
                ->whereMonth('created_at', Carbon::parse($month)->month)
                ->count();
        }

        for ($i = 4; $i >= 0; $i--) {
            $day = Carbon::now()->subDays($i)->format('Y-m-d'); // Get date for the last 5 days
            $ordersData['labels'][] = $day;

            // Fetch user count for the current month
            $ordersData['data'][] = Order::whereDate('created_at', $day)
                ->count();
        }

        return view('admin.index', compact('usersCount', 'ordersCount', 'projectsCount', 'orders', 'usersData', 'ordersData'));
    }

    public function showProfile(): View
    {
        $user = Admin::findOrFail(Auth::id());
        return view('admin.profile.show', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Admin::findOrFail(Auth::id());

        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('admins', 'email')->ignore(auth()->user()->id)],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ], [
            'name.required' => 'حقل الاسم مطلوب',
            'name.string' => 'يجب أن يكون الاسم نصًا',
            'email.required' => 'حقل البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني يجب أن يكون عنوان بريد إلكتروني صالح',
            'email.unique' => 'هذا البريد الإلكتروني مستخدم بالفعل',
            'image.required' => 'حقل الصورة مطلوب',
            'image.image' => 'الملف يجب أن يكون صورة',
            'image.mimes' => 'يجب أن يكون النوع المسموح به للصورة: jpeg, png, jpg, gif',
            'image.max' => 'يجب أن يكون حجم الصورة أقل من 2 ميجابايت',
        ]);

        $old_image = $user->image;
        $data = [];
        if ($request->hasFile("image")){
            $file = $request->file('image');

            if ($file->isValid()) {
                $data = array_merge(
                    $request->only(['name', 'email', 'image']),
                    ['image' => $request->file('image')->store('profile',
                        ['disk' => 'public']
                    )]
                );
            }

            if ($old_image) {
                Storage::disk('public')->delete($old_image);
            }

            $user->update($data);
        }
        else{
            $user->update([
                'name'=>$request->name,
                'email'=>$request->email,
            ]);
        }

        return redirect()->route('admin.profile.show')->with('success', 'تم تحديث بيانات الملف الشخصي بنجاح');
    }
}
