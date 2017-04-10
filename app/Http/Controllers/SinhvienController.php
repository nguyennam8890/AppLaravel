<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Sinhvien;
class SinhvienController extends BaseController
{
    public function getList()
    {
      return Sinhvien::orderBy('id', 'DESC')->get();
    }
    public function postAdd(Request $request){

        $sinhvien        = new Sinhvien;
        $sinhvien->name  = $request->name;
        $sinhvien->age   = $request->age;
        $sinhvien->email = $request->email;
        $sinhvien->phone = $request->phone;
        $sinhvien->save();
        return 'Thêm mới thành công';
    }
}
