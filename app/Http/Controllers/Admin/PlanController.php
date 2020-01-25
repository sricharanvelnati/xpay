<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Plan;
use File;

class PlanController extends Controller
{
  public function index(){

  $getPlan = Plan::all();
  return view('Admin.Plan.index',compact('getPlan'));

}

public function create(){

  return view('Admin.Plan.create');

}

public function store(Request $request){

    $rules = [
          'planName' => 'required|unique:plan',
          'price' => 'required|numeric',
          'year' => 'required|numeric',
          'planImage' => 'required|image|mimes:jpeg,png,jpg,svg',
          'eLearning' => 'required|numeric|min:0.5|max:6',
          'rewardPoint' => 'required|numeric|min:0.5|max:6',
          'mangoCoinEarn' => 'required|numeric',
          'referralFee' => 'required|numeric|min:0.5|max:6',
      ];

    $validator = Validator::make($request->all(), $rules);

    if($validator->fails()) {
        return redirect()->back()
        ->withInput()
        ->withErrors($validator);
    }

    if($request->hasFile('planImage')){
        $file = $request->file('planImage');
        $filename = 'Plan'. '-' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('img/plan/'), $filename);
        }

    $data = $request->all();
    $data['planImage'] = $filename;

    $banner = new Plan();
    $banner->fill($data);
    if($banner->save()){

      return redirect('admin/plan');

    }

}

public function edit($id){

  $getPlan = Plan::where('id',$id)->first();

  return view('Admin.Plan.edit',compact('getPlan'));

}

public function update(Request $request,$id){

  $rules = [
        'planName' => 'required|unique:plan,planName,'.$id,
        'planImage' => 'mimes:jpeg,png,jpg,svg',
        'price' => 'required|numeric',
        'year' => 'required|numeric',
        'eLearning' => 'required|numeric|min:0.5|max:5',
        'rewardPoint' => 'required|numeric|min:0.5|max:5',
        'mangoCoinEarn' => 'required|numeric',
        'referralFee' => 'required|numeric|min:0.5|max:5',
    ];

    $validator = Validator::make($request->all(), $rules);

    if($validator->fails()) {
        return redirect()->back()
        ->withInput()
        ->withErrors($validator);
    }

    $data = $request->all();
    $data = request()->except(['_token']);

    if($request->hasFile('planImage')) {

        $oldimage = Plan::where('id', $id)->value('planImage');
          if (!empty($oldimage)) {
              File::delete(public_path().'/img/plan/'. $oldimage);
          }

          $file = $request->file('planImage');
          $filename = 'Plan'. '-' . uniqid() . '.' . $file->getClientOriginalExtension();
          $file->move(public_path('img/plan/'), $filename);
          $data['planImage'] = $filename;
       }

    $update = Plan::where('id',$id)->update($data);

    return redirect('admin/plan');
}

public function delete($id){

  $delete = Plan::where('id',$id)->delete();

  return redirect('admin/plan');

}
public function updatePlanStatus(Request $request){

 $getStatus = Plan::where('id',$request->planId)->first();
 $status = $getStatus->status == 'deactive' ? 'active' : 'deactive';
 $data['status'] = $status;
 $updateStatus = Plan::where('id',$request->planId)->update($data);
 return response()->json($status);
 }
}
