<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getDangnhap()
    {
    	return view('admin.login');
    }
    public function getIndex()
    {
    	return view('admin.index');
    }
    public function getThongtinnhatuyendung()
    {
    	return view('admin.thongtinnhatuyendung');
    }
    public function getTintuyendung()
    {
    	return view('admin.tintuyendung');
    }
    public function getThongtinungvien()
    {
    	return view('admin.thongtinungvien');
    }
}
