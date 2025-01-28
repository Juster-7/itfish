<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\bonusesWriteOffRequest;
use App\Http\Requests\bonusesAddRequest;
use App\Models\User;
use App\Models\Bonus;

class UserController extends Controller
{
	public function __construct(
		protected Bonus $bonus
	) {
		$this->middleware('auth');	
	}

    public function index()
    {
		if(Auth()->user()->isAdmin()) {
			$users = User::with(['bonus'])->orderBy('name')->get();
			return view('user.admin', compact('users'));
		}
		else {
			$user = User::with(['bonus'])->find(Auth()->user()->id);
			return view('user.user', compact('user'));
		}
    }

    public function user(User $user)
    {
		return view('user.user', compact('user'));
    }
	
	public function bonusesWriteOff(bonusesWriteOffRequest $request) {		
		$bonus = $this->bonus->firstOrNew(['user_id' => $request->validated('user_id')]);
		$bonus->amount -= $request->validated('amount');
		$bonus->save();
		
		return back();
    }
	
	public function bonusesAdd(bonusesAddRequest $request) {
		$bonus = $this->bonus->firstOrNew(['user_id' => $request->validated('user_id')]);
		$bonus->amount += $request->validated('amount');
		$bonus->save();
		
		return back();
    }
}
