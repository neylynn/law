<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Law;

class LawController extends Controller
{
    public function index() {
    	$laws = Law::all();
    	return $laws;
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
    	Law::create($request->all());
    	return response()->json('The law successfully added');
    }

    public function edit($id) {
    	$law = Law::find($id);
    	return response()->json($law);
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);
        $law = Law::find($id)->update($request->all());
        return response()->json('The law successfully updated');
    } 

    public function delete($id) {
        $law = Law::find($id);
        $law->delete();
        return response()->json('The law successfully deleted');
    }

}
