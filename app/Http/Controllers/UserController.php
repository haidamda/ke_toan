<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {
//        if (request()->ajax()) {
            return $this->datatables();
//        }
    }

    public function datatables()
    {
        $users = User::select('id', 'name', 'email')->get();
        return DataTables::of($users)
            ->addColumn('action', function ($user) {
                $deletebtn = '<a class="btn btn-secondary btn-sm" href=""><i class="fa fa-trash-o"></i></a>';

                return $deletebtn;
            })
            ->removeColumn('id')
            ->rawColumns(['action'])
            ->make(true);
    }
}
