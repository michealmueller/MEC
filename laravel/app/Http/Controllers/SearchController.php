<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function find(Request $request)
    {
        $orgs = new Organization;
        return $orgs->search($request->get('q'))->get();
    }
}
