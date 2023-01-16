<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Http\Requests\StoretestRequest;
use App\Http\Requests\UpdatetestRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tests = Test::all();
        $tests = Test::orderBy('id', 'desc')->paginate(5);
      
        return view('index',compact('tests'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretestRequest $request)
    {
        test::create($request->all());
        return view('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetestRequest  $request
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function update($test_id)
    {
          $test = Test::find($test_id);
          return view('edit',compact('test'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $Test =Test::find($request->test_id);

        $Test->delete();
        return Redirect::to('/');
    }

    public function editStore(StoretestRequest $request){

        $Test =Test::find($request->test_id);
        $Test->firstname = $request->firstname;
        $Test->lastname = $request->lastname;
        $Test->email = $request->email;
        $Test->save();
        return Redirect::to('/');
    }
}
