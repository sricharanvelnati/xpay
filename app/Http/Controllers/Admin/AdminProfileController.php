<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Auth;
use Hash;
use File;
use Validator;

class AdminProfileController extends Controller
{
   public function create(){

     $user = User::where('id',Auth::user()->id)->first();

     return view('Admin.adminProfile',compact('user'));

    }

    public function store(Request $request){
      $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email,'.Auth::user()->id
        ];
         $validator = Validator::make($request->all(), $rules);

       if($validator->fails()) {
           return redirect()->back()
           ->withInput()
           ->withErrors($validator);
       }

        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['contactNumber'] = $request->contactNumber;

        $update = User::where('id',Auth::user()->id)->update($data);
        return redirect('admin/dashboard');
    }

    public function indexAdmin(){
        $getAllAdmins = User::join('role_user','users.id','=','role_user.user_id')
                            ->where('role_user.role_id','=',1)
                            ->whereNotIn('users.id',[Auth::user()->id])
                            ->select('users.*')
                            ->get();

        return view('Admin.User.Admin.index',compact('getAllAdmins'));
    }

    public function createAdmin(){

      return view('Admin.User.Admin.create');

    }

   public function storeAdmin(Request $request){

     $this->validate($request,[
       'first_name' => ['required', 'string', 'max:255'],
       'last_name' => ['required', 'string', 'max:255'],
       'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
       'password' => ['required', 'string', 'min:8', 'confirmed'],
       'contactNumber' => ['required','numeric'],
       'countryCode' => ['required','numeric'],
       'countryName' => ['required']
       ]);

       $data = $request->all();
       $data['password'] = Hash::make($request->password);
       $insert = new User();
       $insert->fill($data);

       if($insert->save()){
         $setRole = DB::table('role_user')->insert(['user_id' => $insert->id,'role_id' => 1]);
          return redirect('admin/root');
       }
   }

   public function editAdmin(Request $request,$id){

      $getAdmin = User::where('id',$id)->first();

      return view('Admin.User.Admin.edit',compact('getAdmin'));
   }

  public function updateAdmin(Request $request,$id){

    $this->validate($request,[
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
      'contactNumber' => ['required','numeric'],
      'countryCode' => ['required','numeric'],
      'countryName' => ['required']
      ]);

      $data = $request->all();
      $data = $request->except('_token', '_method');

      $update = User::where('id',$id)->update($data);

      if($update){
        return redirect('admin/root');
      }
  }

  public function deleteAdmin(Request $request){

      $delete = User::where('id',$request->adminId)->delete();
      $status = 'deactive';
      return response()->json($status);

  }

  public function updateAdminStatus(Request $request){

    $getStatus = User::where('id',$request->adminId)->first();
    $status = $getStatus->status == 'deactive' ? 'active' : 'deactive';
    $data['status'] = $status;
    $updateStatus = User::where('id',$request->adminId)->update($data);
    return response()->json($status);
  }
}
