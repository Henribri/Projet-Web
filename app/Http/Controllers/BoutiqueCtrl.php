<?php

namespace App\Http\Controllers;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Product;
use App\Image;
use App\State;
use App\Category;

use Illuminate\Support\Facades\DB;
class BoutiqueCtrl extends Controller
{
    //--DISPLAY VIEW CREATE PRODUCT

    public function View_create_product(){

        if(session()->get('Status_user')=='BDE'){

            return view('add_product');



        }
    }


    //--FUNCTION CREATE A PRODUCT

    public function Create_product(request $request){
        if(session()->get('Status_user')=='BDE'){

            request()->validate([
                'name_product'=>['required','unique:_product,Name_product'],
                'description_product'=>['required'],
                'price_product'=>['required'],
                'category'=>['required'],
                'image_product'=>['required'],
                ]);


                $extension=$request->image_product->extension();
        
                //--VERIFY EXTENSION

                if($extension!='png'&&$extension!='jpg'&&$extension!='jpeg'){
        
                    return "mauvais format d'image";
                }

                //--CREATE IMAGE 
        
                $imagetraitement=$request->file('image_product');
                $input['imagename']= time().'.'.$extension;
                $path=public_path('Images');
                $imagetraitement->move($path, $input['imagename']);

                $pathimage='/Images'.'/'.$input['imagename'];
        

                $Image= Image::create([
                    'Image'=>$pathimage
                ]);

                $Category = Category::select('Id_category')
                ->where('Category', request('category'))
                ->first();

              
                //--CREATE A PRODUCT

            DB::transaction(function () use($Category, $Image) {
            $products= Product::create([
                'Name_product'=>request('name_product'),
                'Description_product'=>request('description_product'),
                'Price_product'=>request('price_product'),
                'Id_category'=>$Category->Id_category,
                'Id_image'=>$Image->Id_image,
            ]);
        });

        //--RETURN ALL IS OK

        return back()->withErrors([
            'name_product' => 'Produit créé'
            ]);
            }
            
            //--RETURN AN ERROR

            return back()->withErrors([
                'name_product' => 'Vous devez être authentifier en tant que BDE'
                ]);

    }   


            //--FUNCTION DELETE PRODUCT
            
    public function Delete_product(){
        if(session()->get('Status_user')=='BDE'){

                    $id_product = request("id_product");
                    Product::where('Id_product',$id_product)->delete();
                    return "Votre article à bien été supprimé";
                }
                else
                {
                return "Vous n'appartez pas au BDE";
                }
            

        }

    }

