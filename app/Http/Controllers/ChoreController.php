<?php

namespace App\Http\Controllers;

use App\Chore;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChoreController extends Controller{

	public function createChore(Request $request){

		$chore = Chore::create($request->all());

		return response()->json($chore);

	}

	public function getChore(Request $request, $id) {
		$chore = Chore::find($id);
		return response()->json($chore);
	}

	public function updateChore(Request $request, $id){

		$chore  = Chore::find($id);
		$chore->name = $request->input('name');
		$chore->recurrence = $request->input('recurrence');
		$chore->save();

		return response()->json($chore);
	}

	public function deleteChore($id){
		$chore  = Chore::find($id);
		$chore->delete();

		return response()->json('Removed successfully.');
	}

	public function index(){

		$chores  = Chore::all();
//		$this->success($chores, 200);
		return response()->json($chores);

	}
}
?>