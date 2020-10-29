<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Events;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::orderBy('events.id', 'desc')->get();
        $users = User::all();

        foreach ($events as $event) {
            $event->due_join_date_event = $this->formatDateLocal($event->due_join_date_event);
            $event->release_time_event = $this->formatDateLocal($event->release_time_event);
            if (!is_null($event->expired_time_event)) {
                $event->expired_time_event = $this->formatDateLocal($event->expired_time_event);
            }
        }

        return view('admin.pages.list-event', ['events' => $events, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if (isset($data['expired_time_event'])) {
            $data['expired_time_event'] = str_replace("T", " ", $request->expired_time_event);
        }

        $data['due_join_date_event'] = str_replace("T", " ", $request->due_join_date_event);
        $data['release_time_event'] = str_replace("T", " ", $request->release_time_event);

        $extension = $request->file('logo_event')->extension();
        $img_name = 'logo-' . $data['name_event'] . '-' . date('dmyHis') . '.' . $extension;
        $this->validate($request, ['logo_event' => 'required|file|max:5000']);
        $path = Storage::putFileAs('public/image-logo', $request->file('logo_event'), $img_name);

        $data['logo_event'] = $img_name;

        Events::create($data);

        return back()->with('Sukses','Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Events::find($id);
        $data = $request->all();

        if (isset($data['expired_time_event'])) {
            $data['expired_time_event'] = str_replace("T", " ", $request->expired_time_event);
        }

        $data['due_join_date_event'] = str_replace("T", " ", $request->due_join_date_event);
        $data['release_time_event'] = str_replace("T", " ", $request->release_time_event);

        if ($request->logo_event == null) {
            $data['logo_event'] = $event->logo_event;
        } else {
            $extension = $request->file('logo_event')->extension();
            $img_name = 'logo-' . $data['name_event'] . '-' . date('dmyHis') . '.' . $extension;
            $this->validate($request, ['logo_event' => 'required|file|max:5000']);
            $path = Storage::putFileAs('public/image-logo', $request->file('logo_event'), $img_name);

            $data['logo_event'] = $img_name;
        }

        $event->update($data);

        return back()->with('Sukses','Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Events::find($id)->delete();

        return back()->with('Sukses','Berhasil menghapus data!');
    }

    public function formatDateLocal($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }
}
