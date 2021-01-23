<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Visitor;
use App\Models\Page;
use App\Models\User;


class HomeController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $visitsCount = Visitor::count();

        $dateLimit = date('Y-m-d H:i:s',strtotime('-5 minutes'));
        
        $onlineList = Visitor::select('ip')
                        ->where('date_access','>=',$dateLimit)
                        ->groupBy('ip')
                        ->get();
        $onlineCount = count($onlineList);
        
        $pageCount   = Page::count();
        $userCount   = User::count();

        $pagePai = [
            'Teste1' => 101,
            'Teste2' => 300,
            'Teste3' => 205,
        ];

        $pageLabels = json_encode(array_keys($pagePai));
        $pageValues = json_encode(array_values($pagePai));

        return view('admin.home',[
            'visitsCount' => $visitsCount,
            'onlineCount' => $onlineCount,
            'pageCount' => $pageCount,
            'userCount' => $userCount,
            'pageLabels' => $pageLabels,
            'pageValues' => $pageValues
        ]);
    }
}
