<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CMSNews;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = CMSNews::all();
        return view('admin.pages.cms.cms-news', [
            'news' => $news, 
            ]);
    }
    public function news_edit($id)
    {
        $news = CMSNews::find($id);
        // dd($news);
        return view('admin.pages.cms.cms-news-edit', [
            'news' => $news, 
            ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'image_news' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $input['image_news'] = time().'.'.$request->image_news->getClientOriginalExtension();
        $request->image_news->move(public_path('image'), $input['image_news']);
        $input['title_news'] = $request->title_news;
        $input['desc_news'] = $request->desc_news;
        // $input['date_news'] = $request->date_news;
        CMSNews::create($input);
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
        $news = CMSNews::find($request->id);
        // dd($request->all());
        // if(isset($request->image_news)){
        //     $this->validate($request, [
        //         'image_news' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     ]);
    
    
        //     $input['image_news'] = time().'.'.$request->image_news->getClientOriginalExtension();
        //     $request->image_news->move(public_path('image'), $news['image_news']);
        //     $input['title_news'] = $request->title_news;
        //     $input['desc_news'] = $request->desc_news;
        //     $input['date_news'] = $request->date_news;
        //     $news->update($input);
        // } else {
            if($request->image_news != ''){        
                $path = public_path().'/image/';
      
                //code for remove old file
                if($news->image_news != ''  && $news->image_news != null){
                     $file_old = $path.$news->image_news;
                     unlink($file_old);
                }
      
                //upload new file
                $file = $request->image_news;
                $filename = $file->getClientOriginalName();
                $file->move($path, $filename);
                // dd($filename);
                $input['image_news'] = $filename;
                $input['title_news'] = $request->title_news;
                $input['desc_news'] = $request->desc_news;
                // $input['date_news'] = $request->date_news;
                $news->update($input);
           }else {
            $news->update($request->all());
           }
            
        // }
        
        return redirect('admin/news')->with('Sukses','Berhasil mengubah data!');
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
        CMSNews::find($id)->delete();

        
        return back()->with('Sukses','Berhasil menghapus data!');
    }
}
