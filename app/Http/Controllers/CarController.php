<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $cars = Car::all();
    //     // $owners=Owner::all();
    //     return view('cars.index', [
    //         "cars"=>$cars
    //     ]);
    // }
    public function index(Request $request)
    {
        $carsQuery = Car::query();
    
        if ($request->filled('owner') && $request->input('owner') !== 'All') {
            $carsQuery->where('owner_id', $request->input('owner'));
        }
    
        if ($request->has('license_plate')) {
            $carsQuery->where('license_plate', 'like', '%' . $request->input('license_plate') . '%');
        }
    
        if ($request->has('manufacturer')) {
            $carsQuery->where('manufacturer', 'like', '%' . $request->input('manufacturer') . '%');
        }
    
        if ($request->has('model')) {
            $carsQuery->where('model', 'like', '%' . $request->input('model') . '%');
        }
    
        $cars = $carsQuery->get();
        $owners = Owner::all();
    
        return view('cars.index', compact('cars', 'owners'));
    }
    
}