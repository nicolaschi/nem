<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use DB;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{

    public function welcome(){

        return view('welcome');

    }

    public function dashboard(){

        return view('individual.dashboard');

    }
    
    public function profile(){

        return view('individual.profile');

    }

    public function changepass(){

        return view('individual.changepass');

    }



    public function update_profile(Request $request){


        $name= $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images/' ,$name);

        $unique = IdGenerator::generate(['table' => 'users', 'field' => 'unique_id', 'length' => 10, 'prefix' => 'NEMSA-']); /** Generate id */



        $data = User::find(Auth::user()->id);

               
               $data->image=$name;
               $data->unique_id=$unique;
               $data->name=$request->name;
               $data->cac=$request->cac;
               $data->address=$request->address;
               $data->contact_person=$request->contact_person;
               $data->contact_phone=$request->contact_phone;
               $data->contact_email=$request->contact_email;
               $data->manpower=$request->manpower;
    
               $data->save();
           
               return redirect()->back()->with('success', 'Profile updated Sucessfully');
               
    }

    /* MANUFACTURER */


    public function mdashboard(){

        return view('manufacturer.mdashboard');

    }
    
    public function mprofile(){

        return view('manufacturer.mprofile');

    }

    public function mchangepass(){

        return view('manufacturer.mchangepass');

    }

    public function products(){

        $data = DB::table('products')->simplePaginate(5);


        return view('manufacturer.products', ['data'=>$data]);

    }

    public function pending_product(){

        $data = DB::table('products')->where('status', '=', 'pending')->get();


        return view('manufacturer.pending_products', ['data'=>$data]);

    }

    public function active_product(){

        $data = DB::table('products')->where('status', '=', 'active')->get();


        return view('manufacturer.active_products', ['data'=>$data]);

    }

    public function cancled_product(){

        $data = DB::table('products')->where('status', '=', 'cancled')->get();


        return view('manufacturer.cancled_products', ['data'=>$data]);

    }

    public function new_product(){

        $data= category::all();

        return view('manufacturer.new_product', ['data'=>$data]);

    }

    public function upload_product(){

        return view('manufacturer.upload_product');

    }

    public function save_product(Request $request){

        $name= $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images' ,$name);


        $data = new product;

               
               $data->name=$request->name;
               $data->category=$request->category;
               $data->image=$name;
               $data->serial=$request->serial;
               $data->model=$request->model;
               $data->model_name=$request->model_name;
               $data->certification=$request->certification;
               $data->description=$request->description;
    
               $data->save();
           
               return redirect()->back()->with('success', 'Product Added Sucessfully');
    }

    /* MANUFACTURER */



    /* ADMIN */

    public function adashboard(){

        return view('admin.adashboard');

    }

    public function achangepass(){

        return view('admin.achangepass');

    }

    public function engineers(){

        $data = DB::table('users')->where('role', '=', 'engineer')->get();


        return view('admin.engineers', ['data'=>$data]);

    }


    public function aproducts(){

        $data = DB::table('products')->simplePaginate(5);


        return view('manufacturer.products', ['data'=>$data]);

    }

    public function apending_product(){

        $data = DB::table('products')->where('status', '=', 'pending')->get();


        return view('admin.apending_products', ['data'=>$data]);

    }

    public function aactive_product(){

        $data = DB::table('products')->where('status', '=', 'active')->get();


        return view('admin.aactive_products', ['data'=>$data]);

    }

    public function acancled_product(){

        $data = DB::table('products')->where('status', '=', 'cancled')->get();


        return view('admin.acancled_products', ['data'=>$data]);

    }


    public function individuals(){

        $data = DB::table('users')->where('role', '=', 'individual')->get();


        return view('admin.individuals', ['data'=>$data]);

    }

    public function manufacturers(){

        $data = DB::table('users')->where('role', '=', 'manufacturer')->get();


        return view('admin.manufacturers', ['data'=>$data]);

    }

    public function viewuser($id){
       
        $data=user::find($id);
        return view('admin.viewuser', ['data'=>$data]);
        }

        public function add_category(){

            return view('admin.add_category');
    
        }
    
        public function save_category(Request $request){
    
           
    
            $data = new category;
    
                   
                   $data->name=$request->name;
                   $data->fee=$request->fee;
                   
                   $data->save();
               
                   return redirect()->back()->with('success', 'Categorys Added Sucessfully');
        }

        public function adduser(){
    
            return view('admin.addusers');
    
        }
    

        public function add_user(){

        $request->validate([
            'name'=>'required|string',
            'state'=>'required|string',
            'address'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'password'=>'required'
                ]);
    
        $dat=new User;
    
        $dat->name=$request->name;
        $dat->email=$request->email;
        $dat->state=$request->state;
        $dat->address=$request->address;
        $dat->phone=$request->phone;
        $dat->role=$request->role;
        $dat->password=bcrypt ($request->password);
    
        $dat->save();
    
         return redirect()->back()->with('message', 'User successfully added');
    
        }


    /* ADMIN */


/* ENGINEER */

public function edashboard(){

    return view('engineer.edashboard');

}

public function eprofile(){

    return view('engineer.eprofile');

}

public function echangepass(){

    return view('engineer.echangepass');

}

/* ENGINEER */

}
