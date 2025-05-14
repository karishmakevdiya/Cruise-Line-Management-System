<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Resources\CruiseCollection;
use App\Http\Controllers\Controller;
use App\Models\Cruise;


class CruiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CruiseCollection(Cruise::paginate());
        // $data['view'] = 'admin.pages';
        // return view('admin.app', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required',
            'ship_id' => 'required|exists:ships,id',
            'duration' => 'required|integer|min:1',
            'price_tiers' => 'required|array',
            'price_tiers.*' => 'numeric|min:0',
            'departure_date' => 'required|date',
            'embarkation_port_id' => 'required|exists:ports,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $cruise = Cruise::create($request->only([
            'name',
            'description',
            'ship_id',
            'duration',
            'price_tiers',
            'departure_date',
            'embarkation_port_id',
        ]));

        return new CruiseResource($cruise);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
