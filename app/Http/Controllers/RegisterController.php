<?php


declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
	public function create()
	{
		return view('regist.register');
	}

	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required|string|max:255',
			'number' => 'required|string|max:255',
			'password' => 'required|string|confirmed|min:8',
		]);

		$user = User::create([
			'name' => $request->name,
			'number' => $request->number,
			'password' => Hash::make($request->password),
		]);

		return view('regist.complete', compact('user'));
	}
}
