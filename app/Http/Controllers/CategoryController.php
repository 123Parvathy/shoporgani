<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $result['data']=Category::all();
        return view('admin/category',$result);
    }

    
    public function manage_category(Request $request,$id='')
    {
        if($id>0){
            $arr=Category::where(['id'=>$id])->get(); 

            $result['category_name']=$arr['0']->category_name;
            $result['category_image']=$arr['0']->category_image;
            $result['id']=$arr['0']->id;

            $result['category']=DB::table('categories')->where(['status'=>1])->where('id','!=',$id)->get();
        }else{
            $result['category_name']='';
            $result['category_image']='';
            $result['id']=0;

            $result['category']=DB::table('categories')->where(['status'=>1])->get();
            
        }

        return view('admin/manage_category',$result);
    }

    public function manage_category_process(Request $request)
    {
        //return $request->post();
        if($request->post('id')>0){
            $image_validation="mimes:jpeg,jpg,png";
        }else{
            $image_validation="required|mimes:jpeg,jpg,png";
        }
        
        $request->validate([
            'category_name'=>'required',
            'category_image'=>$image_validation,
  
        ]);

        if($request->post('id')>0){
            $model=Category::find($request->post('id'));
            $msg="Category updated";
        }else{
            $model=new Category();
            $msg="Category inserted";
        }

        if($request->hasfile('category_image')){
            $image=$request->file('category_image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media/category',$image_name);
            $model->category_image=$image_name;
        }
        $model->category_name=$request->post('category_name');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/category');
        
    }

    public function delete(Request $request,$id){
        $model=Category::find($id);
        $model->delete();
        $request->session()->flash('message','Category deleted');
        return redirect('admin/category');
    }

    public function status(Request $request,$status,$id){
        $model=Category::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Category status updated');
        return redirect('admin/category');
    }

    

    
}
