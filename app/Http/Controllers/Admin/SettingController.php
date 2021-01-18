<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Setting;

class SettingController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function index(){
        $settings = [];
        
        $dbSettins = Setting::get();

        foreach($dbSettins as $setting){
            $settings[ $setting['name'] ] = $setting['content'];
        }

        return view('admin.settings.index',[
            'settings' => $settings
        ]);
    }

    public function save(Request $request){
        $data = $request->only([
            'title','subtitle','email','bgColor','textColor'
        ]);

        $validator = $this->validator($data);

        if ($validator->fails()){
            return redirect()->route('settings')
                ->withErrors($validator);
        } 

        foreach($data as $item => $value){

            Setting::where('name', $item)->update([
                'content' => $value
            ]);

            return redirect()
                    -> route('settings')
                    ->with('warning','Informações alteradas com sucesso.');;

        }        

        return redirect()->route('settings');
    }

    protected function validator($data) {
        return Validator::make($data,[
            'title' => ['string','max:100'],
            'subtitle' => ['string','max:100'],
            'email' => ['string','email'],
            'gbColor' => ['string','regex:/#[A-Z0-9]{6}/i'],
            'textColor' => ['string','regex:/#[A-Z0-9]{6}/i']
        ]);
    }
}
