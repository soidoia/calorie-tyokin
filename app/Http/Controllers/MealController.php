<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\MealRequest;
use App\Models\Meal;
use Carbon\Carbon;



class MealController extends Controller
{
    
    public function index(Meal $meal, Request $request)
    {
    
    $date = $request->input('date')? $request->input('date'):Carbon::today();
    $result = $meal->where('user_id',auth()->user()->id)
                ->whereDate('created_at', $date)
                ->sum('calo');
    
    $meals = auth()->user()->meals()->whereDate('created_at', $date)->get();
        
        
        return view('meals.index')->with(['result' => $result, 'meals' => $meals]);
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
    public function delete(Meal $meal, Request $request)
    {
        $meal->delete();
        return redirect('/');
    }
    
  
}