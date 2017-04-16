<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Sinhvien;
use DateTime;

class SinhvienController extends BaseController
{
    public function getList(){
        return Sinhvien::orderBy('id', 'DESC')->get();
    }

    public function postAdd(Request $request){
        $nameExists = Sinhvien::where('name', $request->name)->count();
        if ($nameExists > 0) {
            return 'no ok';
        } else {
            Sinhvien::firstOrCreate([
                'name' => $request->name,
                'age' => $request->age,
                'email' => $request->email,
                'phone' => $request->phone,
                'created_at' => new DateTime(),
            ]);
            return 'ok';
        }
    }
    public function getEdit($id){
        return Sinhvien::findOrFail($id);
    }
    public function postEdit(Request $request, $id){
        $sinhvien = Sinhvien::findOrFail($id);
        $sinhvien->name = $request->name;
        $sinhvien->age = $request->age;
        $sinhvien->email = $request->email;
        $sinhvien->phone = $request->phone;
        $sinhvien->save();
        return 'ok';
    }
    public function getDelete($id){
        $sinhvien = Sinhvien::findOrFail($id);
        $sinhvien->delete();
        return 'ok';
    }
}

