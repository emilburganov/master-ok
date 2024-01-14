<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $statuses = Status::all();

        $status_id = $request->status_id;

        if (!$status_id) {
            $applications = $user
                ->applications()
                ->orderBy("created_at", "desc")
                ->get();

            return view('applications', compact(['applications', 'statuses']));
        }

        $applications = $user
            ->applications()
            ->where("status_id", $status_id)
            ->orderBy("created_at", "desc")
            ->get();


        return view('applications', compact(['applications', 'statuses', 'status_id']));
    }

    public function create()
    {
        $categories = Category::all();

        return view('applications-create', compact(['categories']));
    }

    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'room_address' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'max_price' => 'required|integer',
            'image' => 'required|image|mimes:jpg,jpeg,png,bmp|max:2048',
        ]);

        if ($v->fails()) {
            return redirect()
                ->back()
                ->withErrors($v->errors())
                ->withInput();
        }

        // enctype="multipart/form-data"
        // public/images/applications folder

        $imageName = 'public/images/applications/' . time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/applications'), $imageName);

        $application = Application::query()->create($request->except(['image']));

        $application->update([
            'user_id' => Auth::id(),
            'status_id' => 1,
            'image' => $imageName
        ]);

        return redirect()->route('applications.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Application $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Application $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Application $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Application $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {

        return redirect()->back();
    }
}
