<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
public function index(){
//   $users =  DB::select('select * from users');

//   dd($users);
// $users = DB::table('USERS')->select(['name', 'email'])->whereNotNull('email')->orderBy('name')->get();
// dd($users);

// $students = Student::select(['name', 'email'])->whereNotNull('email')->orderBy('name')->get();
// dd($students);
// foreach($students as $student){
// echo $student->name. "<br>";
// }


$student = new Student();
$student->name = "New";
$student->email = "email@gmail.com";
$student->save();
}

}