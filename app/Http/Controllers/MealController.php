<?php

namespace App\Http\Controllers;
use Illuminate\App\Http\Request;
use App\Http\Requests\MealRequest;
use App\Models\Meal;




class MealController extends Controller
{
    
    public function index(Meal $meal)
    {
       
        
        $result = \DB::table('meals')
                ->select('user_id')
                ->selectRaw('SUM(calories) AS total_calories')
                ->groupBy('user_id')
                ->get();
                
         $mealsByDate = auth()->user()->meals->groupBy(function($date) {
                return $date->created_at->format('Y-m-d');
            });
                
        return view('meals.index')->with(['result' =>  $result ,'mealsByDate' => $mealsByDate]);
        
        
    }
    public function create(Meal $meal)
    {
        return view('meals.create')->with(['meals' => $meal->get()]);
    }
    public function store(Meal $meal, MealRequest $request)
    {
        $input = $request['meal'];
        $input['user_id']=auth()->user()->id;
        $meal->fill($input)->save();
        return redirect('/meals/' . $meal->id);
    }
    public function edit(Meal $meal)
    {
        return view('meals.edit')->with(['meal' => $meal]);
    }
    public function update(MealRequest $request, Meal $meal)
    {
        $input_meal = $request['meal'];
        $meal->fill($input_meal)->save();
    
        return redirect('/meals/' . $meal->id);
    }
    public function delete(Meal $meal)
    {
        $meal->delete();
        return redirect('/');
    }
    
  
}