<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $result['data']=Product::all();
        return view('admin/product',$result);
    }

    
    public function manage_product(Request $request,$id='')
    {
        if($id>0){
            $arr=Product::where(['id'=>$id])->get(); 

            $result['category_id']=$arr['0']->category_id;
            $result['name']=$arr['0']->name;
            $result['image']=$arr['0']->image;
            $result['mrp']=$arr['0']->mrp;
            $result['price']=$arr['0']->price;
            $result['qty']=$arr['0']->qty;
            $result['lead_time']=$arr['0']->lead_time;
            $result['short_desc']=$arr['0']->short_desc;
            $result['desc']=$arr['0']->desc;
            $result['keywords']=$arr['0']->keywords;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;
        }else{
            $result['category_id']='';
            $result['name']='';
            $result['image']='';
            $result['mrp']='';
            $result['price']='';
            $result['qty']='';
            $result['lead_time']='';
            $result['short_desc']='';
            $result['desc']='';
            $result['keywords']='';
            $result['status']='';
            $result['id']=0;
        }

        $result['category']=DB::table('categories')->where(['status'=>1])->get();
        return view('admin/manage_product',$result);
    }

    public function manage_product_process(Request $request)
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
            $model=Product::find($request->post('id'));
            $msg="Product updated";
        }else{
            $model=new Product();
            $msg="Product inserted";
        }

        if($request->hasfile('image')){
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media',$image_name);
            $model->image=$image_name;
        }

        $model->category_id=$request->post('category_id');;
        $model->name=$request->post('name');
        $model->mrp=$request->post('mrp');
        $model->price=$request->post('price');
        $model->qty=$request->post('qty');
        $model->lead_time=$request->post('lead_time');
        $model->short_desc=$request->post('short_desc');
        $model->desc=$request->post('desc');
        $model->keywords=$request->post('keywords');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/product');
        
    }

    public function delete(Request $request,$id){
        $model=Product::find($id);
        $model->delete();
        $request->session()->flash('message','Product deleted');
        return redirect('admin/product');
    }

    public function status(Request $request,$status,$id){
        $model=Product::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Product status updated');
        return redirect('admin/product');
    }
}
