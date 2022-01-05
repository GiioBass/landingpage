<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use App\Models\CarType;
use App\Models\Department;
use App\Models\Municipality;
use App\Models\Quote;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : View
    {
        $car_types = CarType::all();
        $departments = Department::all();
        $municipalities = Municipality::all();
        return view('landing-page.index', compact('car_types', 'departments', 'municipalities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\QuoteRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(QuoteRequest $request)
    {
        try {

        Quote::create([
            'car_type_id' => $request->car_type,
            'name' => $request->name,
            'email' => $request->email,
            'number_phone' => $request->number_phone,
            'department_id' => $request->department,
            'municipality_id' => $request->municipality,
            'policies' => $request->policies
        ]);
        toast('Su solicitud fue enviada correctamente','success');
        return back();
        }catch (\Throwable $th){
            toast('Ocurrio un error intentelo de nuevo','warning');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuoteRequest  $request
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuoteRequest $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        //
    }
}
