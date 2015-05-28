<?php namespace App\Http\Controllers;

use App\Food;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\FoodRequest;
use Illuminate\Http\Request;

class FoodsController extends Controller {

	/**
	 * Function run before all others
	 *
	 * void
	 */
	public function __construct(){
		$this->middleware('auth',['except'=>'index']);//check user login
		$this->middleware('check_admin',['except'=>'index']);//check user is admin
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (\Auth::guest()){//check user login
			$foods = Food::where('isShow', '=', true)->paginate(8);
		}else{
			if(\Auth::user()->isAdmin)//check user is admin
				$foods = Food::paginate(8);
			else
				$foods = Food::where('isShow', '=', true)->paginate(8);
		}
		return view("foods.index")->with('foods',$foods);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view("foods.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  FoodRequest $request
	 * @return Response
	 */
	public function store(FoodRequest $request)
	{
		$data = $request->all();
		Food::create($data);
		return redirect('foods/create');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$food = Food::find($id);
		if (!is_null($food)) {
			return view('foods.edit')->with('food',$food);
		}else{
			return redirect('/');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id, FoodRequest $request
	 * @return Response
	 */
	public function update($id,FoodRequest $request)
	{
		$food = Food::find($id);
		if (!is_null($food)) {
			$data = $request->all();
			$food->update($data);
			return redirect('foods/'.$id."/edit");
		}else{
			return redirect('/');
		}
		
	}
}
