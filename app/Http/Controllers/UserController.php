<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Bank;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserResource::collection(User::with('bank')->paginate());
        //
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
        $bank = Bank::find($request->bank_id);
        if (!$bank) {
            return response()->json(['message' => 'El banco especificado no existe'], 404);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'bank_id' => $bank->id,
        ]);
        return response()->json(['message' => 'Usuario creado exitosamente', 'user' => $user], 201);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
