<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
     public function setGoal(UserRequest $request)
    {
        $user = Auth::user();
        $user->goal = $request->input('goal');
        $user->save();
        
        session()->put('goal', $request->input('goal'));
        
        
        return redirect()->route('index');
    }
    
     public function getGoal()
    {
        $user = Auth::user();
        $goal = $user->goal;

        return view('index');
    }
}
