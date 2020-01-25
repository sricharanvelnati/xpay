<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cms;
use Validator;
use File;

class CmsController extends Controller
{
   public function create(Request $request){

      $getCms = Cms::first();

      return view('Admin.Cms.create',compact('getCms'));

   }

   public function update(Request $request){

     $rules = [
       'email' => 'required',
       'contactNumber' => 'required',
       'siteLogo' => 'nullable',
       'address' => 'required',
       'privacy' => 'required',
       'terms' => 'required'
     ];

     $validator = Validator::make($request->all(), $rules);

     if($validator->fails()) {
         return redirect()->back()
         ->withInput()
         ->withErrors($validator);
     }

         $data['email'] = $request->email;
         $data['contactNumber'] = $request->contactNumber;
         $data['address'] = $request->address;
         $data['privacy'] = $request->privacy;
         $data['terms'] = $request->terms;

         $update = Cms::where('id',1)->update($data);
         return redirect('admin/cms/create');

   }
}
