<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB; // Tambahkan ini untuk menggunakan DB::raw

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string', 'max:20'],
            'date_of_birth' => ['required', 'date'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        // Hash password sebelum disimpan
        $hashedPassword = Hash::make($data['password']);

        // Panggil stored procedure untuk insert data
        DB::statement('CALL InsertUser(?, ?, ?, ?, ?)', [
            $data['name'],
            $data['email'],
            $data['phone_number'],
            $data['date_of_birth'],
            $hashedPassword,
        ]);

        // Ambil data user yang baru saja dibuat
        $user = User::where('email', $data['email'])->first();

        return $user;
    }
}