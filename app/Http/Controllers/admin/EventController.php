<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Events;
use App\EventHotspot;
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
        $events = Events::with('event_hotspot')
        ->orderBy('events.id', 'desc')->get();
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

        $data['due_join_date_event'] = str_replace("T", " ", $request->due_join_date_event);
        $data['release_time_event'] = str_replace("T", " ", $request->release_time_event);

        $data['branch_event'] = "Umum";

        $extension = $request->file('logo_event')->extension();
        $img_name = 'logo-' . $data['name_event'] . '-' . date('dmyHis') . '.' . $extension;
        $this->validate($request, ['logo_event' => 'required|file|max:5000']);
        $path = Storage::putFileAs('public/image-logo', $request->file('logo_event'), $img_name);

        $data['logo_event'] = $img_name;

        $id_event = Events::create($data)->id;

        $hotspot = [];
        $hotspot['id_event'] = $id_event;
        $hotspot['release_time_hotspot'] = $data['release_time_event'];
        for ($i=0; $i < $data['hotspot_length_event']; $i++) { 
            EventHotspot::create($hotspot);
            $hotspot['release_time_hotspot'] = null;
        }

        return back()->with('Sukses','Berhasil menambahkan data!');
    }

    /**
     * Store a newly created hotspot in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addHotspot(Request $request)
    {
        $data = $request->all();

        if (isset($data['expired_time_hotspot'])) {
            $data['expired_time_hotspot'] = str_replace("T", " ", $request->expired_time_hotspot);
        }

        $data['release_time_hotspot'] = str_replace("T", " ", $request->release_time_hotspot);

        $hotspot['id_event'] = $data['id_event'];
        if (isset($data['expired_time_hotspot'])) {
            $hotspot['expired_time_hotspot'] = str_replace("T", " ", $data['expired_time_hotspot']);
        }
        $hotspot['release_time_hotspot'] = str_replace("T", " ", $data['release_time_hotspot']);
        EventHotspot::create($hotspot);

        // Tambah jumlah hotspot
        $event = Events::find($data['id_event']);

        $data['hotspot_length_event'] = $event->hotspot_length_event + 1;

        $event->update($data);

        return back()->with('Sukses','Berhasil mengubah data!');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateHotspot(Request $request)
    {
        $data = $request->all();

        if (isset($data['expired_time_hotspot'])) {
            $data['expired_time_hotspot'] = str_replace("T", " ", $request->expired_time_hotspot);
        }

        $data['release_time_hotspot'] = str_replace("T", " ", $request->release_time_hotspot);

        $hotspot = [];

        for ($i=0; $i < count($data['ids']); $i++) {
            $hotspot['id'] = $data['ids'][$i];
            if (isset($data['expired_time_hotspots'][$i])) {
                $hotspot['expired_time_hotspot'] = str_replace("T", " ", $data['expired_time_hotspots'][$i]);
            }
            $hotspot['release_time_hotspot'] = str_replace("T", " ", $data['release_time_hotspots'][$i]);
            EventHotspot::find($hotspot['id'])->update($hotspot);
        }

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyHotspot($id, $id_event)
    {
        EventHotspot::find($id)->delete();

        // Kurangi jumlah hotspot
        $event = Events::find($id_event);

        $data['hotspot_length_event'] = $event->hotspot_length_event - 1;

        $event->update($data);

        return back()->with('Sukses','Berhasil menghapus hotspot!');
    }

    public function formatDateLocal($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i:s');
    }
}
