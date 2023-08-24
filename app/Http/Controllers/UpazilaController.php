<?php

namespace App\Http\Controllers;

use App\Models\Upazila;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UpazilaController extends Controller
{
    public function index()
    {
        $upazilas = Upazila::paginate(10);

        return view('datatables.index',compact('upazilas'));
    }

    public function getData()
    {

        return DataTables::of(Upazila::query())->make(true);

    }
}
