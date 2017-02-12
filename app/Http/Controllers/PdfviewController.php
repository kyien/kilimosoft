<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class PdfviewController extends Controller
{
    //



    public function pdf_render_view(){

      $html = view('pdfs.example')->render();

      return PDF::load($html)->show();
  }

  public function pdf_force_download(){

  ;
    $html = view('pdfs.example')->render();

   return PDF::load($html)->download();

}
}
