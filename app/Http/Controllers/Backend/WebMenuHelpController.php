<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\WebMenuHelpRequest;
use App\Models\WebMenu;
use Illuminate\Http\Request;
use illuminate\support\Str;
use Intervention\Image\Facades\Image;
use DateTimeImmutable;
use Illuminate\Support\Facades\File;

class WebMenuHelpController extends Controller
{
   
    public function index()
    { 
        if(!auth()->user()->ability('admin','manage_web_menu_helps , show_web_menu_helps')){
            return redirect('admin/index');
        }

        $menus = WebMenu::query()->where('section',2)
        ->when(\request()->keyword != null , function($query){
            $query->search(\request()->keyword);
        })
        ->when(\request()->status != null , function($query){
            $query->where('status',\request()->status);
        })
        ->orderBy(\request()->sort_by ?? 'published_on' , \request()->order_by ?? 'desc')
        ->paginate(\request()->limit_by ?? 10);
        
        return view('backend.web_menu_helps.index',compact('menus'));
    }

    public function create()
    {
        if(!auth()->user()->ability('admin','create_web_menu_helps')){
            return redirect('admin/index');
        }

        // $main_menus =WebMenu::whereNull('parent_id')->where('section',1)->get(['id','name_ar']);
        // return view('backend.web_menu_helps.create',compact('main_menus'));
        return view('backend.web_menu_helps.create');
    }

    public function store(WebMenuHelpRequest $request)
    {
        if(!auth()->user()->ability('admin','create_web_menu_helps')){
            return redirect('admin/index');
        }

        $input['name_ar'] = $request->name_ar;
        $input['name_en'] = $request->name_en;

        $input['link'] = $request->link;

        // $input['parent_id'] = $request->parent_id;

        $input['section']    = 2; // main menu 

        $input['status']     =   $request->status;
        $input['created_by'] = auth()->user()->full_name;

        $published_on = $request->published_on.' '.$request->published_on_time;
        $published_on = new DateTimeImmutable($published_on);
        $input['published_on'] = $published_on;

        $productCategory = WebMenu::create($input);

       
        return redirect()->route('admin.web_menu_helps.index')->with([
            'message' => 'تم الانشاء بنجاح',
            'alert-type' => 'success'
        ]);
    }
    
    
    public function show($id)
    {
        if(!auth()->user()->ability('admin','display_web_menu_helps')){
            return redirect('admin/index');
        }
        return view('backend.web_menu_helps.show');
    }


    public function edit(WebMenu $webMenuHelp)
    {
        if(!auth()->user()->ability('admin','update_web_menu_helps')){
            return redirect('admin/index');
        }
        
        return view('backend.web_menu_helps.edit',compact('webMenuHelp'));
    }
    
    public function update(WebMenuHelpRequest $request, WebMenu $webMenuHelp)
    {
        if(!auth()->user()->ability('admin','update_web_menu_helps')){
            return redirect('admin/index');
        }

        
        $input['name_ar']   = $request->name_ar;
        $input['name_en']   = $request->name_en;

        $input['link']      = $request->link;


        $input['status']    =   $request->status;
        $input['updated_by']=   auth()->user()->full_name;

        $published_on = $request->published_on.' '.$request->published_on_time;
        $published_on = new DateTimeImmutable($published_on);
        $input['published_on'] = $published_on;

        $webMenuHelp->update($input);
       

        return redirect()->route('admin.web_menu_helps.index')->with([
            'message' => 'تم التعديل بنجاح',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(WebMenu $webMenuHelp)
    {
        if(!auth()->user()->ability('admin','delete_web_menu_helps')){
            return redirect('admin/index');
        }

      
        $webMenuHelp->deleted_by = auth()->user()->full_name;
        $webMenuHelp->save();
        $webMenuHelp->delete();

        return redirect()->route('admin.web_menu_helps.index')->with([
            'message' => 'تم الحذف بنجاح',
            'alert-type' => 'success'
        ]);
    }
}