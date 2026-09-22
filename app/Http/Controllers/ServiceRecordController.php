<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\ServiceRecord;
use Illuminate\Http\Request;

class ServiceRecordController extends Controller
{
    // GET /api/cars/1/services — is car ki saari services
    public function index($car_id)
    {
        $car = Car::find($car_id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        return response()->json($car->serviceRecords);
    }

    // POST /api/cars/1/services — nayi service add karo
    public function store(Request $request, $car_id)
    {
        $car = Car::find($car_id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        $request->validate([
            'service_date' => 'required|date',
            'mileage'      => 'required|integer',
            'service_type' => 'required|string',
            'notes'        => 'nullable|string'
        ]);

        $service = $car->serviceRecords()->create($request->all());
        return response()->json($service, 201);
    }

    // GET /api/cars/1/services/2 — ek specific service
    public function show($car_id, $id)
    {
        $service = ServiceRecord::where('car_id', $car_id)->find($id);

        if (!$service) {
            return response()->json(['message' => 'Service record not found'], 404);
        }

        return response()->json($service);
    }

    // PUT /api/cars/1/services/2 — service update karo
    public function update(Request $request, $car_id, $id)
    {
        $service = ServiceRecord::where('car_id', $car_id)->find($id);

        if (!$service) {
            return response()->json(['message' => 'Service record not found'], 404);
        }

        $service->update($request->all());
        return response()->json($service);
    }

    // DELETE /api/cars/1/services/2 — service delete karo
    public function destroy($car_id, $id)
    {
        $service = ServiceRecord::where('car_id', $car_id)->find($id);

        if (!$service) {
            return response()->json(['message' => 'Service record not found'], 404);
        }

        $service->delete();
        return response()->json(['message' => 'Service record deleted']);
    }
}