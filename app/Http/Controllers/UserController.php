<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        if(Auth::check()){
        }else{
            return view('user.register');
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required' // min:8
        ]);

        User::create([
            'name'      => $request->input('name'),
            'provider'      => "Hệ thống",
            'email'     => $request->input('email'),
            'password'  => Hash::make($request->input('password'))
        ]);
        // Phương thức with() được sử dụng để flash dữ liệu vào phiên, nghĩa là dữ liệu sẽ được lưu trữ tạm thời và có thể được truy cập trong các yêu cầu tiếp theo.
        return redirect('/login')
            ->with('flash_notification.message', 'User registered successfully')
            ->with('flash_notification.level', 'success');
    }

    public function edit(string $id)
    {
        if(Auth::check()){
            $user = DB::table('users')->where('id', $id)->first();
            return view('user.edit', ['user' => $user]);
        }else{
            return redirect('/login');
        }
    }

    public function update(Request $request, string $id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password'  => $request->input('password')
            ]);
        return redirect('/todo/list')->with('flash_notification.message', 'User update successfully!');
    }
}
