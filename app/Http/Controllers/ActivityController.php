<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $request_date = Carbon::parse($request->date_activity)->toDateTimeString();
        // dd($request_date, $request->date_activity);
        $check_date_act = Activity::where('date_activity',$request_date )->where('status','enable')->first();
        // dd($check_date_act);
        if(!empty($check_date_act)){
            Alert::warning('Gagal', 'Tanggal Kegiatan memiliki waktu yang sama dengan kegiatan '.$check_date_act->name_activity.' yang telah terdaftar pada sistem');
            return  back();
        }

        $newData = new Activity();
        $newData ->id = Str::uuid();
        $newData ->user_id = Auth::user()->id;
        $newData ->organization_id = Auth::user()->profil->organization_id;
        $newData ->date_activity =  $request->date_activity;
        $newData ->name_activity = $request->name_activity;
        $newData ->location = $request->location;
        $newData ->description = $request->description;
        $newData ->accompanying_officer = $request->accompanying_officer;
        $newData ->status = 'disable';
        $newData ->save();

        Alert::warning('Konfirmasi', 'Pastikan kegiatan tidak terbentur !');
        return redirect()->route('activity.show', $newData->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $act = Activity::find($id);
        $date_subhour = Carbon::parse($act->date_activity)->subHour();
        $date_addhour = Carbon::parse($act->date_activity)->addHour();
        $start_date = Carbon::parse($date_subhour)->toDateTimeString();
        $end_date = Carbon::parse($date_addhour)->toDateTimeString();
        $arround_act = Activity::whereBetween('date_activity',[$date_subhour,$date_addhour] )->where('status','enable')->get();
        // dd($date_subhour, $date_addhour,$start_date, $end_date);
        // dd($start_date, $end_date);
        return view('Admin.Agenda.show', compact('act', 'arround_act'));
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
        $request_date = Carbon::parse($request->date_activity)->toDateTimeString();
        // dd($request_date, $request->date_activity);
        $check_date_act = Activity::where('date_activity',$request_date )->where('status','enable')->first();
        // dd($check_date_act);
        if(!empty($check_date_act)){
            Alert::warning('Gagal', 'Tanggal Kegiatan memiliki waktu yang sama dengan kegiatan '.$check_date_act->name_activity.' yang telah terdaftar pada sistem');
            return  back();
        }
        // dd($request_date);
        $act = Activity::find($id);
        $act->date_activity = $request->date_activity;
        $act->name_activity = $request->name_activity;
        $act->location = $request->location;
        $act->description = $request->description;
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
        $act = Activity::find($id);
        $act->status = 'disable';
        $act->save();

        Alert::success('Berhasil', 'Kegiatan ('.$act->name_activity.') berhasil dihapus.');
        return  back();
    }

    public function cancel_activity($id)
    {
        $act = Activity::find($id);
        $act->status_activity = 'cancel';
        $act->save();

        Alert::success('Berhasil', 'Kegiatan ('.$act->name_activity.') berhasil dihapus.');
        return  back();
    }

    public function approve_activity(Request $request)
    {

        $request_date = Carbon::parse($request->date_activity)->toDateTimeString();
        // dd($request_date, $request->date_activity);
        $check_date_act = Activity::where('date_activity',$request_date )->where('status','enable')->first();
        // dd($check_date_act);
        if(!empty($check_date_act)){
            Alert::warning('Gagal', 'Tanggal Kegiatan memiliki waktu yang sama dengan kegiatan '.$check_date_act->name_activity.' yang telah terdaftar pada sistem');
            return  back();
        }

        $act = Activity::find($request->id);
        $act->status = 'enable';
        $act->save();

        Alert::success('Berhasil', 'Kegiatan ('.$act->name_activity.') berhasil didaftarkan.');
        return redirect()->route('activity.index');

    }
}
