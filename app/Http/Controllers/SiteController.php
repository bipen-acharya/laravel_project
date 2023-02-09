<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function getService(){
        return view('service');
    }

    public function getDashboard(){
        return view('site.dashboard');
    }

    public function getManageProduct(){
        $data=[
            'products' => Product::all()
        ];
        return view('site.product', $data);
    }


    public function getCategory(){
        $data=[
            'categories' => Category::all()
        ];
        return view('site.category', $data);
        
    }

    public function getOrder(){
        return view('site.order');
    }

    public function getAddProducts(){
        return view('site.addProducts');
    }

    public function getAddCategory(){
        return view('site.addCategory');
    }

    public function postAddCategory(Request $request){
        $category= new Category;
        $category->categoryname= $request->input('categoryname');
        $category->save();
        return redirect()->route('getCategory')->with('status','Category added successfully!');
    } 

    

    public function postAddProducts(Request $request){
        $product_image=$request->file('product_image');
        $uniquename=md5(time());
        $extension=$product_image->getClientOriginalExtension();
        $imagename=$uniquename.'.'.$extension;
        $product_image->move('site/uploads/product/',$imagename);
        $product= New Product;
        $product->name= $request->input('productname');
        $product->category= $request->input('category');
        $product->image=$imagename;
        $product->cost= $request->input('cost');
        $product->save();
        return redirect()->route('getManageProduct')->with('status','Product added successfully!');
    } 

    public function getDeleteProduct(Product $product){
        $product->delete();
        return back()->with('deleteStatus', 'Product deleted successfully!');
    }

    public function getDelete(Product $product){
        if($product->image){
            unlink('site/uploads/product/'.$product->image);
        }
        $product->delete();
        return back()->with('deleteStatus', 'Product deleted successfully!');
    }

    public function getEditProduct(Product $product){
        $data=[
            'product' => $product  
        ];
        return view('site.editProduct', $data); 
    }

    public function postEditProduct(Product $product, Request $request){
        // $product= New Product;
        
        // dd($product_image->getClientOriginalName());
        // dd($product_image->getClientOriginalExtension());
        $product_image = $request->file('product_image');
        
        if($product_image != null){
            unlink('site/uploads/product/'.$product->image);
            $getUniqueProductName = md5(time());
            $getProductExtensionName = $product_image->getClientOriginalExtension();
            $realProductName = $getUniqueProductName.'.'. $getProductExtensionName;
            $product_image->move('site/uploads/product/',$realProductName);
            $product->name= $request->input('productname');
            $product->category= $request->input('category');
            $product->cost= $request->input('cost');
            
            $product->image = $realProductName;
            $product->save();

        }else{
            $product->name= $request->input('productname');
            $product->category= $request->input('category');
            $product->cost= $request->input('cost');
            $product->save();
        }
        return redirect()->route('getManageProduct')->with('status','Product edited successfully!');
    }

    public function getEditCategory(Category $category){
        $data=[
            'category' => $category 
        ];
        return view('site.editCategory', $data); 
    }

    public function postEditCategory(Category $category, Request $request){
        // $product= New Product;
        $category->categoryname= $request->input('categoryname');
        $category->save();
        return redirect()->route('getCategory')->with('status','Category edited successfully!');
    }

    

    public function getDeleteCategory(Category $category){
        $category->delete();
        return back()->with('deleteStatus', 'Category deleted successfully!');
    }

    public function getShowProduct(){
        return view('site.showProduct');
    }

    public function getajaxproduct(Request $request){
        $data = [
            'products'=> Product::all()
        ];
        dd($data);
    }
    
}