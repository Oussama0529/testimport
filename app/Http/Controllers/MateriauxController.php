<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\materiaux;
use Illuminate\Support\Facades\Mail;


class MateriauxController extends Controller
{
    public function index(){
        return view('index');
    }
    
    public function importFile (Request $request)
    {
        if($request->input('submit') != null ) {
            $file = $request->file('file');

            //Details of the file :
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();

            // Valid File Extensions
            $valid_extension = array("csv");
            // 2MB max size in Bytes
            $maxFileSize = 2097152; 
            //Checking the file exetension 
            if(in_array(strtolower($extension),$valid_extension))
            {
                if($fileSize <= $maxFileSize)
                {   
                    //File storage location
                    $location = 'storage';
                    $file->move($location,$filename);
                    // Import CSV to Database
                    $filepath = public_path($location."/".$filename);
                    // Reading file
                    $file=fopen($filepath,"r");

                    $importData_arr = array();
                    $i = 0;
                    while(($filedata=fgetcsv($file,2000,";")) !== FALSE ) {
                        $num=count($filedata);
                        //skip the first row 
                        if($i == 0){
                            $i++;
                            continue; 
                        }
                        for($j=0;$c<$num;$j++) {
                            $importData_arr[$i][]=$filedata[j];
                        }
                        $i++;
                    }
                    fclose($file);
                    //Insert To DB
                    foreach($importData_arr as $importData){

                        $insertData = array(
                        "ref"=>$importData[1],
                        "detail_dechet"=>$importData[2],
                        "masse_volumique"=>$importData[3],
                        "longeur"=>$importData[5],
                        "largeur"=>$importData[6],
                        "epaisseur"=>$importData[7],
                        "volume"=>$importData[8],
                        "code_dechet"=>$importData[9],
                        "id_lot"=>$importData[10],
                        "id_niv1"=>$importData[11]);
                        materiaux::insertData($insertData);
                    }   
                    Session::flash('message','Import Successful.');
                }
                else {
                    Session::flash('message','File too large.');
                }
            }
            else{
                Session::flash('message','Invalid File Extension.');
            }
        }
        return redirect()->action('MateriauxController@index');
    }
}