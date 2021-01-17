<?php

namespace App;

use DB;
use File;
use Image;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getIsActiveAttribute($attribute)
    {
        return $this->activeOptions()[$attribute];
    }

    public function activeOptions()
    {
       return [
            1 => 'Active',
            0 => 'Inactive',
        ];
    }

    public function store_product($data)
    {
        $image = $data['image'];
        unset($data['old_image']);
        $response = array();
        try{
            $product = Product::create($data);
            unset($product->image);
            $id = $product->id;
            $slug_title = Str::slug($data['name'], '-').'-'.$id;
            DB::table('products')->where('id',$id)->update(['slug'=>$slug_title]);
            // Uploading image and making folder
            $this->uploadPic($image,$id);
            $response['status'] = 1;
        }catch(\Exception $e)
        {
            dd($e);
            $response['status'] = 2;
        }
        return $response;
    }

    public function update_product($data,$id)
    {
        $image = $data['old_image'];
        $data['old_image'] = 0;
        $imageValue = Product::select('image','id')->find($id);
        if(!empty($data['image']))
        {
            $path = public_path()."/images/product/".$id.'/'.$imageValue->image;
            File::delete($path);
            $image = $data['image'];
        }
        try{
            $data['slug'] = Str::slug($data['name'], '-').'-'.$id;
            unset($data['old_image']);
            $product = DB::table('products')->where('id',$id)->update($data);
            $this->uploadPic($image,$id);
            $response['status'] = 1;
        }catch(\Exception $e)
        {
            dd($e);
            $response['status'] = 2;
        }
        return $response;
    }

    public function uploadPic($image,$id)
    {
        // Uploading image and making folder
        if(!is_string($image))
        {
            if (! File::exists(public_path('images/product/'.$id))) {
                File::makeDirectory(public_path('images/product/'.$id));
            }
            $p_image = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/product/'.$id);
            $image->move($destinationPath, $p_image);
            DB::table('products')->where('id',$id)->update(['image'=>$p_image]);
        }
        else
        {
            DB::table('products')->where('id',$id)->update(['image'=>$image]);
        }
        
    }
}
