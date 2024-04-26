<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\User;
use App\Models\Organization;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activity = Activity::with('organization','user')->where('status','enable')->where('organization_id',Auth::user()->profil->organization_id)->latest()->get();
        return view('Admin.Agenda.index', compact('activity'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Agenda.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $newData = new Activity();
        $newData ->id = Str::uuid();
        $newData ->user_id = Auth::user()->id;
        $newData ->organization_id = Auth::user()->profil->organization_id;
        $newData ->date_activity =  $request->date_activity;
        $newData ->name_activity = $request->name_activity;
        $newData ->location = $request->location;
        $newData ->description = $request->description;
        $newData ->accompanying_officer = $request->accompanying_officer;
        $newData ->save();

        Alert::success('Berhasil', 'Kegiatan berhasil didaftarkan');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $act = Activity::find($id);
        return view('Admin.Agenda.edit', compact('act'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $act = Activity::find($id);
        $act->date_activity = $request->date_activity;
        $act->name_activity = $request->name_activity;
        $act->location = $request->location;
        $act->location = $request->location;
        $act->accompanying_officer = $request->accompanying_officer;
        $act->save();

        Alert::success('Berhasil', 'Data kegiatan berhasil diperbaharui');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
