<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // جلب جميع العملاء من قاعدة البيانات
        $clients = User::all(); // أو يمكنك تحديد نوع المستخدم إذا كان هناك نوع معين للعملاء
        
        return view('admin.dashboard', compact('clients'));
    }
}
