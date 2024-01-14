<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\PaymentMethodOfflineRequest;
use App\Models\PaymentCategory;
use App\Models\PaymentMethod;
use App\Models\PaymentMethodOffline;
use DateTimeImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class PaymentMethodOfflineController extends Controller
{ 

    public function index()
    {
        if(!auth()->user()->ability('admin','manage_payment_method_offlines , show_payment_method_offlines')){
            return redirect('admin/index');
        }

        $payment_method_offlines = PaymentMethodOffline::with('firstMedia')
        ->ActiveCategory()
        ->when(\request()->keyword != null , function($query){
            $query->search(\request()->keyword);
        })
        ->when(\request()->status != null , function($query){
            $query->where('status',\request()->status);
        })
        ->orderBy(\request()->sort_by ?? 'published_on' , \request()->order_by ?? 'desc')
        ->paginate(\request()->limit_by ?? 10);


        // $products = $products->ActiveCategory();
        
        return view('backend.payment_method_offlines.index',compact('payment_method_offlines'));
        
    }

    public function create()
    {
        if(!auth()->user()->ability('admin','create_payment_method_offlines')){
            return redirect('admin/index');
        }
        
        // get all categories that are active to choose one of them to be parent of payment method offline
        $categories =PaymentCategory::whereStatus(1)->get(['id','name_ar']);

        return view('backend.payment_method_offlines.create',compact('categories'));
    }

    public function store(PaymentMethodOfflineRequest $request)
    {
     
        if(!auth()->user()->ability('admin','create_payment_method_offlines')){
            return redirect('admin/index');
        }

        // get Input from create.blade.php form request using PaymentMethodOfflineRequest to validate fields
        

        $input['method_name']               =       $request->method_name ;
        $input['method_description']        =       $request->method_description ;
        $input['payment_category_id']       =       $request->payment_category_id ;

        $input['owner_account_name']        =       $request->owner_account_name ;
        $input['owner_account_number']      =       $request->owner_account_number ;
        $input['owner_account_country']     =       $request->owner_account_country ;
        $input['owner_account_phone']       =       $request->owner_account_phone ;

        $input['customer_account_name']     =       $request->customer_account_name ;
        $input['customer_account_number']   =       $request->customer_account_number ;
        $input['customer_account_country']  =       $request->customer_account_country ;
        $input['customer_account_phone']    =       $request->customer_account_phone ;


        $input['status']                    =       $request->status ;
        $input['created_by']                =       auth()->user()->full_name;
        

        $published_on = $request->published_on.' '.$request->published_on_time;
        $published_on = new DateTimeImmutable($published_on);
        $input['published_on'] = $published_on;

        //Add payment method  to db with save instance of it in $payment_method to use it later 
        $payment_method = PaymentMethodOffline::create($input);
        

        // add images to photos db and to path : public/assets/payment_methods
        if($request->images && count( $request->images) > 0){

            $i = 1; 

            foreach ($request->images as $image) {
                
                $file_name = $payment_method->slug. '_' . time() . $i . '.' . $image->getClientOriginalExtension(); // time() and $id used to avoid repeating image name 
                $file_size = $image->getSize();
                $file_type = $image->getMimeType();
                $path = public_path('assets/payment_method_offlines/' . $file_name);
                
                Image::make($image->getRealPath())->resize(500,null,function($constraint){
                    $constraint->aspectRatio();
                })->save($path,100);

                $payment_method->photos()->create([
                    'file_name' =>$file_name,
                    'file_size' =>$file_size,
                    'file_type' =>$file_type,
                    'file_status' => 'true',
                    'file_sort' =>$i,
                ]); 

                $i++; 
            }
        }

        return redirect()->route('admin.payment_method_offlines.index')->with([
            'message' => 'تمت الاضافة بنجاح',
            'alert-type' =>'success'
        ]);
    }

    public function show($id)
    {
        if(!auth()->user()->ability('admin','display_payment_method_offlines')){
            return redirect('admin/index');
        }

        return view('backend.payment_method_offlines.show');
    }

    public function edit(PaymentMethodOffline $paymentMethodOffline)
    {
        if(!auth()->user()->ability('admin','update_payment_method_offlines')){
            return redirect('admin/index');
        }

        // get all categories that are active to choose one of them to be parent of product
        $categories =PaymentCategory::whereStatus(1)->get(['id','name_ar']);
        
        return view('backend.payment_method_offlines.edit',compact('categories'  ,'paymentMethodOffline'));
    }

    public function update(PaymentMethodOfflineRequest $request, PaymentMethodOffline $paymentMethodOffline)
    {
        if(!auth()->user()->ability('admin','update_payment_method_offlines')){
            return redirect('admin/index');
        }


        $input['method_name']               =       $request->method_name ;
        $input['method_description']        =       $request->method_description ;
        $input['payment_category_id']       =       $request->payment_category_id ;

        $input['owner_account_name']        =       $request->owner_account_name ;
        $input['owner_account_number']      =       $request->owner_account_number ;
        $input['owner_account_country']     =       $request->owner_account_country ;
        $input['owner_account_phone']       =       $request->owner_account_phone ;

        $input['customer_account_name']     =       $request->customer_account_name ;
        $input['customer_account_number']   =       $request->customer_account_number ;
        $input['customer_account_country']  =       $request->customer_account_country ;
        $input['customer_account_phone']    =       $request->customer_account_phone ;


        $input['status']                    =       $request->status ;
        $input['updated_by']                =       auth()->user()->full_name;
        
        $published_on = $request->published_on.' '.$request->published_on_time;
        $published_on = new DateTimeImmutable($published_on);
        $input['published_on'] = $published_on;
 
        //Add product to db with save instance of it in $product to use it later 
        $paymentMethodOffline->update($input);
         
        if($request->images && count( $request->images) > 0){

            $i = $paymentMethodOffline->photos->count() + 1; 

            foreach ($request->images as $image) {
                
                $file_name = $paymentMethodOffline->slug. '_' . time() . $i . '.' . $image->getClientOriginalExtension(); // time() and $id used to avoid repeating image name 
                $file_size = $image->getSize();
                $file_type = $image->getMimeType();
                $path = public_path('assets/payment_method_offlines/' . $file_name);
                
                Image::make($image->getRealPath())->resize(500,null,function($constraint){
                    $constraint->aspectRatio();
                })->save($path,100);

                $paymentMethodOffline->photos()->create([
                    'file_name' =>$file_name,
                    'file_size' =>$file_size,
                    'file_type' =>$file_type,
                    'file_status' => 'true',
                    'file_sort' =>$i,
                ]); 

                $i++;  
            }
        }

        return redirect()->route('admin.payment_method_offlines.index')->with([
            'message' => 'تم التعديل بنجاح',
            'alert-type' =>'success'
        ]);

    }

    public function destroy(PaymentMethodOffline $paymentMethodOffline)
    {
        if(!auth()->user()->ability('admin','delete_payment_method_offlines')){
            return redirect('admin/index');
        }

        if($paymentMethodOffline->photos->count() > 0){
            foreach($paymentMethodOffline->photos as $photo){
                if(File::exists('assets/payment_method_offlines/' . $photo->file_name)){
                    unlink('assets/payment_method_offlines/' . $photo->file_name);
                }
                $photo->delete();
            }
        }

        $paymentMethodOffline->delete();

        return redirect()->route('admin.payment_method_offlines.index')->with([
            'message' => 'تم الحذف بنجاح',
            'alert-type' => 'success'
        ]);
    }

    public function remove_image(Request $request){

        if(!auth()->user()->ability('admin','delete_payment_method_offlines')){
            return redirect('admin/index');
        }

        //find product from product table 
         $PaymentMethodOffline = PaymentMethodOffline::findOrFail($request->payment_method_offline_id);

         //find photos image from photos table 
         $image = $PaymentMethodOffline->photos()->where('id',$request->image_id)->first();

         if(File::exists('assets/payment_method_offlines/' . $image->file_name)){
            // delete image from path 
             unlink('assets/payment_method_offlines/' . $image->file_name);
         }
            //delete image from db
            $image->delete();

         return true;

    }
}