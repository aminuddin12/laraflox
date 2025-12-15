<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Memastikan hanya user yang login yang bisa akses
        // Anda juga bisa menambahkan middleware permission spesifik di sini atau di route
        // $this->middleware(['permission:view dashboard']);
    }

    /**
     * Show the admin dashboard.
     */
    public function index(): View
    {
        // Contoh otorisasi manual jika tidak menggunakan middleware di route
        // if (! auth()->user()->can('view dashboard')) {
        //    abort(403);
        // }

        return view('dashboard'); // Anda bisa membuat view khusus 'admin.dashboard' nanti
    }
}
