<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
   

    public function welcome(){
        $announcements = Announcement::orderBy('created_at', 'desc')->where('is_accepted',true)->take(5)->get();
        return view('welcome', compact('announcements'));
    }

    public function filterCategory($title, $category_id){

       

        $category=Category::find($category_id);
       
        $announcements=$category->announcements()->orderBy('created_at', 'desc')->where('is_accepted',true)->paginate(5);
        return view('announcements.categoryindex', compact('category', 'announcements'));

    }

    public function search(Request $request){

        //aggiungere input per select category
        //aggiungere where(category , value)
        $category = $request->input('category');

        $location = $request->input('location');
        
        $q = $request->input('q');

        // dd($q);

        //id della categoria
        // dd(announcement::find($category));
        //1 caso -> query + category + location
        //2 caso -> query null , category + luogo
        //3 caso -> solo categoria
        //4 caso -> solo luogo
       

        if($q && $category && $location){
            
            $announcements = Announcement::search($q)->where('is_accepted',true)->where('category_id',$category)->where('location_id', $location)->paginate(5);
            
            // ->where('is_accepted',true)->where('category_id',$category)->paginate(5);

        }elseif($q == null && $category && $location){
           
            $announcements = Announcement::where('category_id', $category)->where('is_accepted',true)->where('location_id', $location)->paginate(5);
        
            
        }elseif($q == null && $category && $location == "0"){
           
            $announcements = Announcement::where('category_id', $category)->where('is_accepted',true)->paginate(5);

        
        }elseif($q == null && $category == "0" && $location){
           
            $announcements = Announcement::where('is_accepted',true)->where('location_id', $location)->paginate(5);    

        }elseif($q && $category == "0" && $location){
           
            $announcements = Announcement::search($q)->where('is_accepted',true)->where('location_id', $location)->paginate(5);
            
        }elseif($q && $category  && $location == "0"){
           
            $announcements = Announcement::search($q)->where('is_accepted',true)->where('category_id', $category)->paginate(5);    

            
        }else{

            $announcements = Announcement::search($q)->where('is_accepted',true)->paginate(5);
        }


        return view('search_results',compact('q','category','announcements'));


    }

    public function locale($locale){

        session()->put('locale', $locale);
        return redirect()->back();



    }
}
