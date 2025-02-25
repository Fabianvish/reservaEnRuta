<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Tour;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations = Destination::all();

        return view('admin.destination.index', compact('destinations'));
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prefixSeparator = explode(' ', $request->name);
        $prefix = '';
        for ($i=0; $i < count($prefixSeparator); $i++) { 
            $prefix = $prefix . $prefixSeparator[$i][0];
        }
        $request['prefix'] = $prefix;

        Destination::create($request->all());

       return  redirect()->route('destination.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Destination $destination)
    {

        $tours = Tour::where('destination_id', $destination->id)->get();

        return view('admin.destination.show', compact('destination', 'tours'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destination $destination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destination $destination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        //
    }
}
