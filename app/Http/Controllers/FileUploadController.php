<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;

class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = \File::allFiles(public_path('uploads'));
        return view('imageViews')->with(compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation goes here
        $this->validate($request, [
            'file' => 'required|image',
        ]);

        if($request->hasFile('file')){
            foreach($request->file as $file){
                // $ext = $file->getClientOriginalExtension();

                $fileName = $file->getClientOriginalName();
                $file->move(public_path('/uploads'),$fileName);
            }
        }
        return redirect()->route('upload.index')->with('success','Images Uploaded');
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
    public function edit($id)
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
        //
    }

    public function generateAndSend(Request $request){

        try{
            $images = \File::allFiles(public_path('uploads'));

            $pdf = PDF::loadView('example',['inames' => $images]);

            $pdfPath = public_path('pdf/'.uniqid().'.pdf');
            $pdf->save($pdfPath);

            // $pdf->stream('image.pdf');

            \Mail::send('email.imagepdf', [] ,function ($message) use($pdfPath, $request){
                $message->to($request->email);
                $message->from('xxx@apps.com');
                $message->attach($pdfPath, ['as' => 'image.pdf', 'mime' => 'application/pdf']);
            });

            \File::deleteDirectory(public_path('uploads'));     //deletes the public directory.
            return redirect()->route('home')->with('success','PDF has been sent!');

        }catch(Exception $e){
            \File::deleteDirectory(public_path('uploads'));     //deletes the public directory.
            return redirect()->route('home')->with('error','Opps! Something went wrong.');
        }

    }
}
