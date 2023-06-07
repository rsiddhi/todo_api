<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use http\Env\Response;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $todos = Todo::where('user_id',$request->user()->id);
        if($request->has('status') && $request->get('status') == 'completed') {
            $todos->where('is_completed', 1);
        }
        if($request->has('status') && $request->get('status') == 'active') {
            $todos->where('is_completed', 0);
        }
        if($request->has('search')) {
            $todos->where('title', 'like', '%'.$request->search.'%');
        }
        return $todos->orderBy('id','desc')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'title' => 'required'
        ]);
        try {

            $todo = Todo::create($request->only('title'));
            $todo->user_id = $request->user()->id;
            $todo->save();

            return $todo;
        }catch (\Exception $e) {
            return Response::json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->has('title')) {
            $request->validate([
                'title' => 'required'
            ]);
        }

        try {
            $todo = Todo::findOrFail($id);
            $todo = $todo->fill($request->all());
            $todo->save();

            return $todo;
        }catch (\Exception $e) {
            return Response::json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function markDone(Request $request, $id)
    {
        try {
            $todo = Todo::findOrFail($id);
            $todo->is_complete = $request->is_complete;
            $todo->save();

            return $todo;
        }catch (\Exception $e) {
            return Response::json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $todo = Todo::findOrFail($id);
            $todo->delete();
        }catch (\Exception $e) {
            return Response::json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
