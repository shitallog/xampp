<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    
public function index()
{
    if (request()->ajax()) {
        $data = Service::all();
        return datatables()->of($data)
            ->addColumn('action', function($row) {
                return '
                    <button class="btn btn-sm btn-warning editService" data-id="'.$row->id.'">Edit</button>
                    <button class="btn btn-sm btn-danger deleteService" data-id="'.$row->id.'">Delete</button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    return view('services.index');
}

public function store(Request $request)
{
    Service::create($request->only('name'));
    return response()->json(['message' => 'Service added successfully!']);
}

public function edit(Request $request)
{
    $service = Service::findOrFail($request->id);
    return response()->json($service);
}

public function update(Request $request)
{
    $service = Service::findOrFail($request->id);
    $service->update($request->only('name'));
    return response()->json(['message' => 'Service updated successfully!']);
}

public function destroy(Request $request)
{
    $service = Service::findOrFail($request->id);
    $service->delete();
    return response()->json(['message' => 'Service deleted successfully!']);
}


}