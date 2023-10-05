<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use \Illuminate\Notifications\Notifiable;
use App\Enums\NotificationType;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    public function show()
    {
        return view('admin.index');
    }
    public function showmain()
    {
        $visitorCount = DB::table('visitors')->count();
        return view('admin.dash.main' ,compact('visitorCount'));
    }
    public function index()
    {
        $admin = Auth::user();
        return view('admin.profile.index',compact('admin'));
    }
    public function vistitors()
    {
    }
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.profile.edit',compact('admin'));
    }
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'password' => 'nullable|string|min:6',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->name = $validatedData['name'];
        $admin->email = $validatedData['email'];

        if (!empty($validatedData['password'])) {
            $admin->password = bcrypt($validatedData['password']);
        }
        if($admin){

            $admin->save($validatedData);
            Auth::guard('admin')->login($admin);
            session()->flash('notification.message', 'admin été modifier avec succès');
            session()->flash('notification.type', NotificationType::INFO);
            session()->flash('timeout', 5000);

        }else{
            session()->flash('notification.message', 'un problème est apparu');
            session()->flash('notification.type', NotificationType::ERROR);
            session()->flash('timeout', 5000); 
        }
        return redirect()->back();
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->get('remember'))) {
            return redirect()->intended('admin/main');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('admin/login');
    }
}
