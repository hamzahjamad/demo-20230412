<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDataRequest;
use App\Http\Requests\UpdateDataRequest;
use App\Models\Data;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Data::all();
        return view('data.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDataRequest $request)
    {
        $attributes = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'amount' => $request->input('amount'),
            'email' => $request->input('email')
        ];

        $data = Data::create($attributes);

        return redirect('/data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Data $data)
    {
        return view('data.show', ['item' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Data $data)
    {
        return view('data.edit', ['item' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataRequest $request, Data $data)
    {
        $data->name = $request->input('name');
        $data->description = $request->input('description');
        $data->amount = $request->input('amount');
        $data->email = $request->input('email');

        $data->save();

        return redirect('/data/' . $data->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Data $data)
    {
        $data->delete();
        return redirect('/data');
    }
}
