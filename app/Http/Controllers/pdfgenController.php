<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PdoGsb;
use MyDate;
use PDF;
class pdfGenController extends Controller
{
    function show_pdf_button(){
        if(session('visiteur') != null){
        

            $fichefraisderniermois = PdoGsb::getFicheFraisDernierMois();

            return      view('V_pdfgenerate')
                        ->with('fichefraisderniermois', $fichefraisderniermois);
        }
        else{
            return view('connexion')->with('erreurs',null);
        }

    }
    function dl(){

            $fichefraisderniermois = PdoGsb::getFicheFraisDernierMois();
            $pdf = PDF::loadView('V_pdfgenerate',compact('fichefraisderniermois'));
            return $pdf->download('pdf_file.pdf');

            return      view('V_pdfgenerate')
            ->with('fichefraisderniermois', $fichefraisderniermois);
    }


   
}