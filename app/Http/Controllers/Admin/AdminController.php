<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Admin;
use App\Http\Requests\Admin\AdminUpdateRequest;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function show($id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json([
                'message' => 'admin not found',
            ], 404);
        }

        return response()->json([
            'admin' => $admin,
        ], 200);
    }

    public function update(AdminUpdateRequest $adminUpdateRequest, $id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json([
                'message' => 'admin not found',
            ], 404);
        }

        $admin->update([
            'name' => $adminUpdateRequest->name,
            'password' => Hash::make($adminUpdateRequest->password),
            'email' => $adminUpdateRequest->email,
        ]);

        return response()->json([
            'message' => 'successfull update admin'
        ], 200);
    }
}
