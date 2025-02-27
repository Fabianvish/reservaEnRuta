<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tours = Tour::all();
        $reservations = Reservation::all();
        return view('admin.tour.index', compact('tours', 'reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tour.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tour $tour)
    {
        $reservations = Reservation::where('tour_id', $tour->id)->get();
        $consumption = $tour->destination->kms / $tour->vehicle->consumption * 1300 * 2;
        $revenue = 0;
        foreach ($reservations as $key => $reservation) {
            $revenue = $reservation->currency + $revenue;
        }
        $total = $revenue - $tour->tour_guide_salary - $tour->chauffeur_salary - $consumption;

        return view('admin.tour.show', compact('tour','reservations','consumption', 'total', 'revenue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour $tour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour)
    {
        //
    }
}
