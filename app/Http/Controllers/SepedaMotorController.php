<?php

namespace App\Http\Controllers;

use App\Models\SepedaMotor;
use Illuminate\Http\Request;

class SepedaMotorController extends Controller
{
    public function index()
    {

        $data = SepedaMotor::all();
        return response()->json([
            'status' => 'success',
            'data'=> $data
        ], 200);
        
        // try {
        //     $sepedaMotors = SepedaMotor::all();
        //     return response()->json($sepedaMotors, 200);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => 'Failed to fetch data.'], 500);
        // }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'brand' => 'required',
                'tahun' => 'required',
                'kapasitas' => 'required',
                'warna' => 'required',
                'harga' => 'required',
                'gambar'=> 'required'
            ]);

            $sepedaMotor = SepedaMotor::create($validatedData);
            return response()->json($sepedaMotor, 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to create data.',
                'eror' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $sepedaMotor = SepedaMotor::findOrFail($id);
            return response()->json($sepedaMotor, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Data not found.'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'brand' => 'required',
                'tahun' => 'required',
                'kapasitas' => 'required',
                'warna' => 'required',
                'harga' => 'required',
                'gambar' => 'required',
            ]);

            $sepedaMotor = SepedaMotor::findOrFail($id);
            $sepedaMotor->update($validatedData);
            return response()->json($sepedaMotor, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to update data.',
                'pe' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $sepedaMotor = SepedaMotor::findOrFail($id);
            $sepedaMotor->delete();
            return response()->json(['message' => 'Data deleted successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete data.'], 500);
        }
    }
}
