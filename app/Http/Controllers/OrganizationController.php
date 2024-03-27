<?php

namespace App\Http\Controllers;


use App\Models\Organization;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $org = Organization::latest()->get();
        return view('SAdmin.Organization.index', compact('org'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('SAdmin.Organization.add');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Organization::create([
            'id' => Str::uuid(),
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);
        Alert::success('Berhasil', 'Organisasi berhasil didaftarkan');
        return redirect()->route('Organization.index');
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
        //
        $Organization = Organization::find($id);
        return view('SAdmin.Organization.edit', ['Organization' => $org]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $Organization = Organization::find($id);
        $Organization->nama = $request->nama;
        $Organization->alamat = $request->alamat;
        $Organization->longitude = $request->longitude;
        $Organization->latitude = $request->latitude;
        $Organization->save();

        Alert::success('Berhasil', 'Organisasi berhasil diperbaharui');
        return redirect()->route('Organization.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    // ======================== other function =======================


    public function disable($id)
    {
        $Organization = Organization::find($id);
        $Organization->status = 'disable';
        $Organization->save();

        Alert::success('Berhasil', 'Organisasi berhasil didaftarkan');
        return redirect()->route('organization.index');

    }
}
