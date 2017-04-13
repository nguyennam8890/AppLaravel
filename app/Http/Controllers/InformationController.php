<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Sinhvien;
use App\Information;
use DateTime;
class InformationController extends BaseController
{
   public function getListInformation()
   {
    return Information::orderBy('id','DESC')->get();
   }
   public function postAdd(Request $request)
   {
	   	Information::create([
				'name'          => $request->name,
				'keyword'       =>$request->keyword,
				'register_time' => new DateTime(),
				'created_at'    => new DateTime(),
	   		]);
	   	return 'ok';
   }
   public function getEdit($id)
   {
   	return Information::findOrFail($id);
   }
   public function postEdit(Request $request, $id)
   {
		$information = Information::findOrFail($id);
		$information->name          = $request->name;
		$information->keyword       = $request->keyword;
		$information->register_time = new DateTime();
		$information->updated_at    = new DateTime();
		$information->save();

	return 'ok';
   }
}

