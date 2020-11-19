<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Judgement;

class JudgementController extends Controller
{
    public function index() {
    	$judgements = Judgement::all();
        \Log::info($judgements);
    	return $judgements;
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
    	Judgement::create($request->all());
    	return response()->json('The judgement successfully added');
    }

    public function edit($id) {
    	$judgement = Judgement::find($id);
    	return response()->json($judgement);
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
        $judgement = Judgement::find($id)->update($request->all());
        return response()->json('The judgement successfully updated');
    } 

    public function delete($id) {
        $judgement = Judgement::find($id);
        $judgement->delete();
        return response()->json('The judgement successfully deleted');
    }
}
