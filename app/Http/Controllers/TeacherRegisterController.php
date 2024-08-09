<?php


declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Teacher;         //teacherテーブルを使えるようにしてる？
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherRegisterController extends Controller
{
	public function TeacherCreate()
	{
		return view('regist.TeacherRegister');
	}

	public function TeacherStore(Request $request)
	{
		$request->validate([
			'teacher_name' => 'required|string|max:255',
			'teacher_number' => 'required|string|max:255',
			'teacher_password' => 'required|string|confirmed|min:8',
		]);

		$teacher = Teacher::create([
			'teacher_name' => $request->teacher_name,
			'teacher_number' => $request->teacher_number,
			'teacher_password' => Hash::make($request->teacher_password),
		]);

		return view('regist.TeacherComplete', compact('teacher'));
	}
}