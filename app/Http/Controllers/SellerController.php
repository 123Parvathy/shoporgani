<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        $result['data']=Seller::all();
        return view('admin/seller',$result);
    }
    public function manage_seller(Request $request,$id='')
    {
        if($id>0){
            $arr=Seller::where(['id'=>$id])->get(); 

            $result['name']=$arr['0']->name;
            $result['address']=$arr['0']->address;
            $result['phone']=$arr['0']->phone;
            $result['city']=$arr['0']->city;
            $result['email']=$arr['0']->email;
            $result['id']=$arr['0']->id;

            $result['seller']=DB::table('sellers')->where(['status'=>1])->where('id','!=',$id)->get();
        }else{
            $result['name']='';
            $result['address']='';
            $result['phone']='';
            $result['city']='';
            $result['email']='';
            $result['id']=0;

            $result['seller']=DB::table('sellers')->where(['status'=>1])->get();
            
        }

        return view('admin/manage_seller',$result);
    }

    public function manage_seller_process(Request $request)
    {
        //return $request->post();
        if($request->post('id')>0){
            $image_validation="mimes:jpeg,jpg,png";
        }else{
            $image_validation="required|mimes:jpeg,jpg,png";
        }
        
        $request->validate([
            'name'=>'required',
            'image'=>$image_validation,
  
        ]);

        if($request->post('id')>0){
            $model=Seller::find($request->post('id'));
            $msg="Seller updated";
        }else{
            $model=new Seller();
            $msg="Seller inserted";
        }

        if($request->hasfile('image')){
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media/seller',$image_name);
            $model->image=$image_name;
        }
        $model->name=$request->post('name');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/seller');
        
    }

    public function delete(Request $request,$id){
        $model=Seller::find($id);
        $model->delete();
        $request->session()->flash('message','Seller deleted');
        return redirect('admin/seller');
    }

    public function status(Request $request,$status,$id){
        $model=Seller::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Seller status updated');
        return redirect('admin/seller');
    }

    

    
}
