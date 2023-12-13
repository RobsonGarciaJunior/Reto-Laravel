<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::orderBy('created_at')->get();
        return response()->json(['departments' => $departments])
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //TODO VERIFICAR CUANDO LOS DATOS NO SON VALIDOS, QUE HACER
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $department = new Department();
        $department->name  = $validatedData['name'];
        $result = $department->save();
        return response()->json(['department' => $result])
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $result = Department::find($id);

        if ($result != null) {
            return response()->json(['department' => $result])
                ->setStatusCode(Response::HTTP_OK);
        }
        return response()->json()
            ->setStatusCode(Response::HTTP_NOT_FOUND);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //TODO VERIFICAR CUANDO LOS DATOS NO SON VALIDOS, QUE HACER
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        $department = Department::find($id);
        if ($department != null) {
            $department->name = $validatedData['name'];
            $result = $department->save();
            return response()->json(['department' => $result])
                ->setStatusCode(Response::HTTP_OK);
        }
        return response()->json()
            ->setStatusCode(Response::HTTP_NOT_FOUND);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        if ($department != null) {
            $department->delete();
            return response()->json()
                ->setStatusCode(Response::HTTP_NO_CONTENT);
        }
        return response()->json()
            ->setStatusCode(Response::HTTP_NOT_FOUND);
    }
}
