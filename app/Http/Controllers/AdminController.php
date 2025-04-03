<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
        public function index()
        {
            return view('admin.index');
        }
        public function create()
        {
            return view('admin.create');
        }
        public function store(Request $request)
        {
            // Handle the form submission and save the data
            // You can use Eloquent models to interact with the database
            // For example:
            // $admin = new Admin();
            // $admin->name = $request->input('name');
            // $admin->email = $request->input('email');
            // $admin->save();

            return redirect()->route('admin.index')->with('success', 'Admin created successfully.');
        }
}
