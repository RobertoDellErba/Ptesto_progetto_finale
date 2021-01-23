<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.revisor');
    }

    public function index(){

         $announcement=Announcement::where('is_accepted',null)->orderBy('created_at','desc')->get();
         return view('revisor.index',compact('announcement'));

    }

    private function setAccepted($announcement_id,$value){

        $announcement=Announcement::find($announcement_id);
        $announcement->is_accepted=$value;
        $announcement->save();
        return redirect(route('revisor.index'));

    }

    public function accept($announcement_id){

        return $this->setAccepted($announcement_id,true);

    }

    public function reject($announcement_id){

        return $this->setAccepted($announcement_id,false);

    }

    public function redo($announcement_id){

        return $this->setAccepted($announcement_id,null);

    }

    public function bin(){

        
        $announcement=Announcement::where('is_accepted',false)->orderBy('created_at','desc')->get();
        return view('revisor.bin',compact('announcement'));


    }

   


    

    public function destroy($id){

        $announcement = Announcement::find($id);

        $announcement->images()->delete();
        
        $announcement->delete();
        return redirect()->back()->with('deleted',"L'annuncio è stato eliminato definitivamente");


    }
}
