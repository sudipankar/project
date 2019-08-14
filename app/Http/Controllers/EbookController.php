<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Ebook;
use PDF;

class EbookController extends Controller
{
    //Get ebooks list
    public function getEbooks(Request $request) {
      $ebooks = DB::table('ebooks')->join('professions', 'ebooks.professions_id', '=', 'professions.id')->select('ebooks.*', 'professions.cat_name')->get();
      return view('auth.ebooks', ['ebooks' => $ebooks]);
    }

    //View add or edit Ebook form
    public function ebookForm(Request $request, $eid = null) {
      if ($eid) {
        $ebook = DB::table('ebooks')->where('id', $eid)->first();
      } else {
        $ebook = null;
      }
      $professions = DB::table('professions')->get();
      return view('auth.ebook_form', ['ebook' => $ebook, 'professions' => $professions]);
    }

    //Add or update Ebook detail
    public function ebookFormSubmit(Request $request) {
		//print_r($request);
		//die;
      $title = $request->input('title');
      $desc = $request->input('description');
      $price = $request->input('price');
      $prof_id = $request->input('profession');
     $ebook_type = $request->input('ebook_type');
      /*if ($ebook_id) {*/
        $filename = '';
        if ($ebook_type == "upload") {
			//echo $request->ebook_file;
         /* if ($request->hasFile('ebook_file')) {*/
           $file_pdf = $request->file('ebook_file');	
            // print_r($file_pdf);			
           $filename = time().'.'.$file_pdf->getClientOriginalExtension();
            $file_pdf->move(public_path('ebook_files/'), $filename);
          /*}*/
        } else {
          $content = $request->input('ebook_content');
          $pdf = PDF::loadHTML('dompdf.wrapper');
          $pdf->loadHTML($content);
          $filename = time().'.pdf';
          $pdf->save(public_path('ebook_files/') . $filename);
        }
		//die;
        $ebook_added = DB::table('ebooks')->insert([
          'ebook_title' => $title,
          'ebook_desc' => $desc,
          'ebook' => $filename,
          'professions_id' => $prof_id,
          'price' => $price,
          'ebook_pwd' => '123456',
          'status' => true
        ]
      );
    /*} else {
      $ebook = Ebook::where('id', $ebook_id)->first();
      $ebook->ebook_title = $title;
      $ebook->ebook_desc = $desc;
      $ebook->professions_id = $prof_id;
      $ebook->price = $price;
      $ebook->save();
    }*/
      return redirect()->route('ebooks');
	  
	 
    }
   public function ebookFormeditSubmit(Request $request ,$ebook_id) {
	  
      echo $ebook_id2=$request->input('ebook_id');  
	  $title = $request->input('title');
      $desc = $request->input('description');
      $price = $request->input('price');
      $prof_id = $request->input('profession');
      $ebook_type = $request->input('ebook_type');
	  
	  $ebook_type = $request->input('ebook_type');
      /*if ($ebook_id) {*/
        $filename = '';
        if ($ebook_type == "upload") {
			//echo $request->ebook_file;
         /* if ($request->hasFile('ebook_file')) {*/
           $file_pdf = $request->file('ebook_file');	
            // print_r($file_pdf);			
           $filename = time().'.'.$file_pdf->getClientOriginalExtension();
            $file_pdf->move(public_path('ebook_files/'), $filename);
          /*}*/
        } else {
          $content = $request->input('ebook_content');
          $pdf = PDF::loadHTML('dompdf.wrapper');
          $pdf->loadHTML($content);
          $filename = time().'.pdf';
          $pdf->save(public_path('ebook_files/') . $filename);
        }
	   //die;
	  $ebook = Ebook::where('id', $ebook_id2)->first();
	  //print_r($ebook);
	  //die;
      $ebook->ebook_title = $title;
      $ebook->ebook_desc = $desc;
      $ebook->professions_id = $prof_id;
      $ebook->price = $price;
	  $ebook->ebook = $filename;
      $ebook->save();
      return redirect()->route('ebooks');
	  
	 
    }

    public function changeStatus(Request $request, $eid)
    {
      //Change profession status => Enabled/Disabled
      $ebook = Ebook::where('id', $eid)->first();
      $ebook->status = !($ebook->status);
      $ebook->save();
      return response()->json(array('msg'=> "Status changed for ebook id: ". $eid), 200);
    }

    //Delete question
    public function deleteEbook(Request $request, $ebook_id)
    {
      //Delete question detail
      $deleted = Ebook::where('id', $ebook_id)->delete();
      return redirect()->route('ebooks');
    }
}
