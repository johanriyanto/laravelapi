<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CandidateResource;
use Illuminate\Support\Facades\Validator;

class CandidateController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 
   public function index()
   {
       //get Candidate
       $candidate = Candidate::latest()->paginate(5);

       //return collection of Candidate as a resource
       return new CandidateResource(200, 'List Data Candidate', $candidate);
   }

    public function store(Request $request)
    {

         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'role' => 'required',
            'age' => 'required|integer'
        ]);

          //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }       
    
        //create 
        $candidate = Candidate::create([
            'name' => $request->name,
            'role' => $request->role,
            'age' => $request->age,
        ]);

        //return response
        return new CandidateResource(201, 'Data Candidate Berhasil Ditambahkan!', $candidate);

    }
}
