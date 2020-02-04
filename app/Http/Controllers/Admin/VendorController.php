<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
	public function index() {
		$vendors = User::whereHas('roles', function($q){ return $q->where('name', 'vendor');})->get();
		return view('Admin.Vendor.index',compact('vendors'));
	}
	   
	public function create(){
		return view('Admin.Vendor.create');
	}

	public function store(Request $request){

		$this->validate($request,[
			'first_name' => ['required', 'string', 'max:255'],
			'last_name' => ['required', 'string', 'max:255'],
			'company_name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
			'contactNumber' => ['required','numeric'],
			'countryCode' => ['required','numeric'],
			'countryName' => ['required']
		]);

		$data = $request->all();
		   
		$data['password'] = Hash::make($request->password);
		 
		$data['api_token'] = bin2hex(openssl_random_pseudo_bytes(10));
		$vendor = new User();
		$vendor->fill($data);
		 
		if($vendor->save()){
			$vendor->roles()->attach(3);
			return redirect('admin/vendors');
		}
	}
	
	public function updateStatus(Request $request){
		$getStatus = User::where('id',$request->vendorId)->first();
		$status = $getStatus->status == 'deactive' ? 'active' : 'deactive';
		$data['status'] = $status;
		$updateStatus = User::where('id',$request->vendorId)->update($data);
		return response()->json($status);
	}
	 
	public function delete(Request $request){
		$delete = User::where('id',$request->vendorId)->update(['status' => 'deactive']);
	  	$status = 'deactive';
	  	return response()->json($status);
	}

	public function edit(Request $request, $id){
		$vendor = User::where('id',$id)->first();
	  	return view('Admin.Vendor.edit',compact('vendor'));
   }

  	public function update(Request $request,$id){
		$this->validate($request,[
			'first_name' => ['required', 'string', 'max:255'],
			'last_name' => ['required', 'string', 'max:255'],
			'company_name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
			'contactNumber' => ['required','numeric'],
			'countryCode' => ['required','numeric'],
			'countryName' => ['required']
		]);

		$data = $request->except('_token', '_method');
		$update = User::where('id',$id)->update($data);
		if($update){
			return redirect('admin/vendors/');
		}
	}

}
