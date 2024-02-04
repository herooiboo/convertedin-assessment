<?php


namespace App\Traits;

use Illuminate\Http\Request;

trait Searchable
{
    public function search(Request $request)
    {

        $users = $this->configurations['model']::search($request->q)
            ->limit(50)
            ->get(['id', 'name']);

        return response()->json($users);
    }
}