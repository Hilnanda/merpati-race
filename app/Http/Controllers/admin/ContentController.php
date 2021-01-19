<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Content;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = Content::all();
        return view('admin.pages.cms.cms-content', [
            'content' => $content, 
            ]);
    }

    public function content_edit($id)
    {
        $content = Content::find($id);
        // dd($content);
        return view('admin.pages.cms.cms-content-edit', [
            'content' => $content, 
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'image_content' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input['image_content'] = time().'.'.$request->image_content->getClientOriginalExtension();
        $request->image_content->move(public_path('image'), $input['image_content']);
        $input['title_content'] = $request->title_content;
        // $input['desc_content'] = $request->desc_content;
        // $input['date_news'] = $request->date_news;
        Content::create($input);
        return back()->with('Sukses','Berhasil menambahkan data!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $content = Content::find($request->id);
        if($request->image_content != ''){        
            $path = public_path().'/image/';
  
            //code for remove old file
            if($content->image_content != ''  && $content->image_content != null){
                 $file_old = $path.$content->image_content;
                 unlink($file_old);
            }
  
            //upload new file
            $file = $request->image_content;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            // dd($filename);
            $input['image_content'] = $filename;
            $input['title_content'] = $request->title_content;
            // $input['desc_content'] = $request->desc_content;
            // $input['date_content'] = $request->date_content;
            $content->update($input);
       }else {
        $content->update($request->all());
       }
        
    // }
    
    return redirect('admin/cms/cms-content')->with('Sukses','Berhasil mengubah data!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Content::find($id)->delete();

        return back()->with('Sukses','Berhasil menghapus data!');
    }
}
