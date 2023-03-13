<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App; 

class OwnerController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

        $filter=$request->session()->get('filterOwners', (object)['name'=>null,'surname'=>null]);

        $owners=Owner::filter($filter)->orderBy("name")->get();

        // $owners=Owner::all();
        return view("owners.index",[
            "owners"=>$owners,
            "filter"=>$filter
            ]
        );
    }

    public function search(Request $request){
        $filterOwners=new \stdClass();
        $filterOwners->name=$request->name;
        $filterOwners->surname=$request->surname;

        $request->session()->put('filterOwners', $filterOwners);
        return redirect()->route('owners.index');
    }
}
