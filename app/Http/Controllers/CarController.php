<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // GET /api/cars — saari cars dikhao
    public function index()
    {
        $cars = Car::all();
        return response()->json($cars);
    }

    // POST /api/cars — nayi car save karo
    public function store(Request $request)
    {
        $request->validate([
            'make'         => 'required|string',
            'model'        => 'required|string',
            'year'         => 'required|integer',
            'plate_number' => 'required|string|unique:cars',
        ]);

        $car = Car::create($request->all());
        return response()->json($car, 201);
    }

    // GET /api/cars/1 — ek specific car dikhao
    public function show($id)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        return response()->json($car);
    }

    // PUT /api/cars/1 — car update karo
    public function update(Request $request, $id)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        $car->update($request->all());
        return response()->json($car);
    }

    // DELETE /api/cars/1 — car delete karo
    public function destroy($id)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        $car->delete();
        return response()->json(['message' => 'Car deleted successfully']);
    }
}