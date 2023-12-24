<?php

namespace App\Http\Controller\API 

use App\Http\Controllers\controller



class RepositoryController extends controller 
{
    public function index()
    {
        $repositories = Repository::all(); 
        return response()->json([
            "repositories" => $repositories
        ]);
    }
}
public function store(Request $request)
{
    $rules = [
        "author"         => ['required'],
        "title"          => ['required'],
        "description"    => ['required'],
        "year"           => ['required', 'numeric'],
    ];

    $validated = Validator::make($request->all(), $rules);

    if ($validated->fails()) {
        return response()->json([
            "errors" => $validated->errors()
        ], 401);
    }

    Repository::create($request->all());
    return response(->json([

    ]))



    public function show($id)
    {
        $repository = Repository::find($id);
        return response()->json([
            "repository" => $repository
        ]);
    }

    public function destroy($id)
    {
        $repository = Repository::find($id);
        $repository->delete();
        return response()->json([
            "message"   => "Reposiory deleted successfully"
        ]);
    }

    public function update(Request $request)
{
    $rules = [
        "author"         => ['required'],
        "title"          => ['required'],
        "description"    => ['required'],
        "year"           => ['required', 'numeric'],
    ];

    $validated = Validator::make($request->all(), $rules);
    if ($validated->fails()) {
        return response()->json([
            "errors" => $validated->errors()
        ], 401);

        Repository::where('id', $request->id)->update($request->all());
        return response()->json([
            "message"   => "Reposiory deleted successfully"
        ]);
}