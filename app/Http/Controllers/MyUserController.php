<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyUser;
use App\Services\MyUserQuery;

class MyUserController extends Controller {

    public function indexAll() {
        return MyUser::all();
    }

    public function index(Request $request) {
        $filter = new MyUserQuery();
        $queryItems = $filter->transform($request); // [['column, 'operator', 'value']]

        if (count($queryItems) == 0) {
            $data = MyUser::paginate(10);        
        } else {
            $data = MyUser::where($queryItems)->paginate(10);
        }
        return $data->appends($request->query());
    }
    public function show($id) {
        return MyUser::find($id);
    }
    public function store(Request $request) {
        $user = new MyUser();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->is_active = $request->is_active;
        $user->province_code = $request->province_code;
        $user->district_code = $request->district_code;
        $user->subdistrict_code = $request->subdistrict_code;
        $user->save();
        return $user;
    }
    public function update(Request $request, $id) {
        $user = MyUser::find($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->is_active = $request->is_active;
        $user->province_code = $request->province_code;
        $user->district_code = $request->district_code;
        $user->subdistrict_code = $request->subdistrict_code;
        $user->save();
        return $user;
    }
    public function destroy($id) {
        $user = MyUser::find($id);
        $user->delete();
        return $user;
    }
}