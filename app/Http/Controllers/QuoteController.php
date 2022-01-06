<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use App\Models\CarType;
use App\Models\Department;
use App\Models\Municipality;
use App\Models\Quote;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
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
     * @param \App\Http\Requests\QuoteRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(QuoteRequest $request)
    {
        try {

            $result = DB::table('quotes')
                ->where('email', $request->email)
                ->whereBetween('created_at', [Carbon::now()->toDateString() . ' 00:00:00', Carbon::now()->toDateString() . ' 23:59:59'])->exists();

            if ($result) {
                toast('Hace poco se solicito una cotización, espere 24 horas para realizar una nueva.', 'warning');
                return back();
            }
            $quote = Quote::create([
                'car_type_id' => $request->car_type,
                'name' => $request->name,
                'email' => $request->email,
                'number_phone' => $request->number_phone,
                'department_id' => $request->department,
                'municipality_id' => $request->municipality,
                'policies' => $request->policies
            ]);

            $emails = [
                'jaguilar@processot.com.co',
                'jcastro@processot.com.co',
                'mahernandez@processot.com.co'
            ];


            foreach ($emails as $email){
                Mail::to($email)->send(new \App\Mail\Quote($quote));
            }

            toast('Su solicitud fue enviada correctamente', 'success');
            return back();
        } catch (\Throwable $th) {
            toast('Ocurrio un error intentelo de nuevo' . $th, 'warning');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Quote $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Quote $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateQuoteRequest $request
     * @param \App\Models\Quote $quote
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuoteRequest $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Quote $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        //
    }
}
