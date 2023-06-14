<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\UserService;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
	public function __construct(){
	 $this->middleware('auth');
	}

	public function index(){
		return view('admin/user.index');
	}

  public function getUsers(Request $request){

    $draw = $request->get('draw');
    $start = $request->get("start");
    $rowperpage = $request->get("length");

    $columnIndex_arr = $request->get('order');
    $columnName_arr = $request->get('columns');
    $order_arr = $request->get('order');
    $search_arr = $request->get('search');

    $columnIndex = $columnIndex_arr[0]['column'];
    $columnName = $columnName_arr[$columnIndex]['data'];
    $sortOrder = $order_arr[0]['dir'];
    $searchValue = $search_arr['value'];

    // Total records
    $userData = new UserService();
    $totalRecords = $userData->userCount();

    $totalRecordsFilter = User::select('count(*) as allcount')
    ->where(DB::raw('CONCAT(name, " ", email)'),'LIKE','%'.$searchValue.'%')
    ->count();

    $records = User::orderBy($columnName,$sortOrder)
        ->where(DB::raw('CONCAT(name, " ", email)'),'LIKE','%'.$searchValue.'%')
        ->select('users.*')
        ->skip($start)
        ->take($rowperpage)
        ->get();

        $data = array();

        foreach ($records as $record)
        {
            $id = $record->id;
            $name = $record->name;
            $email = $record->email;
            $status = $record->status;

            $edit = route('editPostData', $record->id);
            $deleted = route('deleteRowPost', $record->id);

            $data[] = array(
                "id" => $id,
                "name" => $name,
                "email" => $email,
                "status" => $status,
            );
        }

    $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordsFilter,
        "aaData" => $data
    );
    return response()->json($response);
  }

}
