<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;

class MealController extends Controller
{
    
}
publuc function index(Meal $meal)
{
    return view('meals.index')->with(['posts' => $meal->getByMeal()]);
}