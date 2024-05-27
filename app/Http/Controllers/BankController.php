<?php

namespace App\Http\Controllers;

use App\Http\Resources\BankResource;
use App\Models\Bank;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banks = Bank::with('users')->paginate();

        return BankResource::collection($banks);
        //
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bank = Bank::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);
        return response()->json(['message' => 'banco creado exitosamente', 'banco' => $bank], 201);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):JsonResponse
    {
        $bank = Bank::with('users')->findOrFail($id);

        return response()->json(new BankResource($bank));
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
