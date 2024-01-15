<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminApplicationsController extends Controller
{
    public function index(Request $request)
    {
        $statuses = Status::all();
        $applications = Application::all();

        return view('admin-applications', compact(['applications', 'statuses']));
    }

    public function update(Application $application, Request $request): RedirectResponse
    {
        if ($application->status->name === 'Новая') {
            $status = Status::query()->find($request->status_id);
            if ($status->name !== 'Ремонтируется') {
                return redirect()->back()->withErrors(['message' => 'Со статуса "Новая" можно менять только на "Ремонтируется"']);
            }

            $v = Validator::make($request->all(), [
                'status_id' => 'required|integer|exists:statuses,id',
                'agreed_price' => 'required|integer',
            ]);

            if ($v->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($v->errors());
            }

            $application->update([
                'status_id' => $request->status_id,
                'agreed_price' => $request->agreed_price,
            ]);

            return redirect()->back();
        }

        if ($application->status->name === 'Ремонтируется') {
            $status = Status::query()->find($request->status_id);

            if ($status->name !== 'Отремонтировано') {
                return redirect()->back()->withErrors(['message' => 'Со статуса "Ремонтируется" можно менять только на "Отремонтировано"']);
            }

            $v = Validator::make($request->all(), [
                'status_id' => 'required|integer|exists:statuses,id',
                'completed_image' => 'required|image|max:2048|mimes:jpg,jpeg,png,bmp',
            ]);

            if ($v->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($v->errors());
            }

            // enctype="multipart/form-data"
            // public/images/applications folder

            $imageName = '/images/applications/' . time() . '.' . $request->completed_image->extension();
            $request->completed_image->move(public_path('images/applications'), $imageName);

            $application->update([
                'status_id' => $request->status_id,
                'completed_image' => $imageName,
            ]);

            return redirect()->back();
        }

        return redirect()->back();
    }
}
