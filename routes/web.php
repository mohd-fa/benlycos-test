<?php

use Illuminate\Support\Facades\Route;
use App\Models\Inventory;
use Illuminate\Http\Request;


Route::group(['prefix' => 'api'], function () {

    Route::get('inventory', function () {
        $inventory = Inventory::all();
        return response()->json($inventory);
    });

    Route::post('inventory', function (Request $request) {
        $request->validate(['name' => 'required', 'quantity' => 'required|numeric|gt:0']);

        Inventory::create($request->all());
        return 'Inventory created successfully';
    });

    Route::put('inventory/{id}', function (Request $request, Inventory $object) {
        $request->validate(['name' => 'required', 'quantity' => 'required|numeric|gt:0']);
        $object::update($request->all());
        return 'Inventory updated successfully';
    });

    Route::delete('inventory/{id}', function (Request $request, Inventory $object) {
        $object::delete();
        return 'Inventory deleted successfully';
    });

});