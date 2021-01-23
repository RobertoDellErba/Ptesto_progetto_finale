<?php

namespace App\Http\Controllers;


use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\AnnouncementImage;
use App\Jobs\GoogleVisionWatermark;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Jobs\GoogleVisionRemoveFaces;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAnnouncement;
use App\Http\Requests\UpdateAnnouncement;
use App\Jobs\GoogleVisionSafeSearchImage;

class AnnouncementController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }
    
    
    
    public function index()
    {   
        
        $announcements = Announcement::orderBy('created_at', 'desc')->where('is_accepted',true)->paginate(10);
        
        
        
        return view('announcements.index', compact('announcements'));
        
        
        
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    
    public function create(Request $request)
    {
        $uniqueSecret =$request->old('uniqueSecret',base_convert(sha1(uniqid(mt_rand())),16, 36));

        return view('announcements.create', compact('uniqueSecret'));
        
    }
    
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(StoreAnnouncement $request)
    {
        
        $user=Auth::user();
        $user->announcements()->create([  
            
            'title'=>$request->title,
            'body'=>$request->body,  
            'category_id'=>$request->category,
            'location_id'=>$request->location,
            'price'=>$request->price, 
            
            ]); 

            $uniqueSecret = $request->uniqueSecret;
            
            $images = session()->get("images.{$uniqueSecret}", []);
            $removedImages = session()->get("removedimages.{$uniqueSecret}", []);
            
            $images = array_diff($images, $removedImages);
            // dd($uniqueSecret);
            foreach($images as $image)
            {
                // dd($user->announcements->title);
                $i = new AnnouncementImage();
                $fileName = basename($image);
                $newFileName = "public/announcements/{$user->announcements->last()->id}/{$fileName}"; 
                Storage::move($image, $newFileName);

                              

                $i->file = $newFileName;
                $i->announcement_id = $user->announcements->last()->id;
                $i->save();

                            

                GoogleVisionSafeSearchImage::withChain([

                    new GoogleVisionLabelImage($i->id),
                    new GoogleVisionRemoveFaces($i->id),
                    
                    
                    new ResizeImage(
                        
                        $i->file, 300 , 200 
                        
                    ),
                    
                    new ResizeImage(
                        
                        $i->file, 200 , 300
                        
                    ),

                    new ResizeImage(
                        
                        $i->file, 600 , 400
                        
                    ),
                    
                  

                ])->dispatch($i->id);


            }

            File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));           
           
            
            
            
            return redirect()->back()->with('message','Annuncio creato');
        }




        
        public function uploadImage(Request $request)
        {   
            
            $uniqueSecret = $request->uniqueSecret;
            $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");
            
            dispatch(new ResizeImage(

                $fileName, 120 , 120 

            ));

            

            session()->push("images.{$uniqueSecret}", $fileName);
            // dd(session()->get("images.{$uniqueSecret}"));
            
            
            return response()->json(
                ['id'=>$fileName,]
            );
        }

        public function removeImage(Request $request)
        {

            $uniqueSecret = $request->uniqueSecret;
            $fileName = $request->id;   
            session()->push("removedimages.{$uniqueSecret}", $fileName);
            Storage::delete($fileName);
            return response()->json('ok');



        }

        public function getImage(Request $request)
        {
            $uniqueSecret = $request->uniqueSecret;

            $images = session()->get("images.{$uniqueSecret}", []);
            $removedImages = session()->get("removedimages.{$uniqueSecret}", []);
            
            $images = array_diff($images, $removedImages);

            $data = [];

            foreach($images as $image)
            {
                $data[] = [
                    'id'=>$image,
                    'src'=>AnnouncementImage::getUrlByFilePath($image, 120, 120),

                ];           
                     
            };

            return response()->json($data);
        }



        
        /**
        * Display the specified resource.
        *
        * @param  \App\Models\Announcement  $announcement
        * @return \Illuminate\Http\Response
        */
        public function show(Announcement $announcement)
        {
            return view('announcements.show', compact('announcement'));
        }
        
        /**
        * Show the form for editing the specified resource.
        *
        * @param  \App\Models\Announcement  $announcement
        * @return \Illuminate\Http\Response
        */
        public function edit(Announcement $announcement)
        {
            return view('announcements.edit', compact('announcement'));
        }
        
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \App\Models\Announcement  $announcement
        * @return \Illuminate\Http\Response
        */
        public function update( Announcement $announcement, UpdateAnnouncement $request)
        {
           $announcement->update([
               
                'title'=>$request->title,
                'body'=>$request->body,
                'price'=>$request->price,                
            
            ]);       
          
           
            $announcement->is_accepted=null;
            $announcement->save();
             
            return redirect()->back()->with('message','Annuncio modificato');
    
        }
        
        /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Models\Announcement  $announcement
        * @return \Illuminate\Http\Response
        */
        public function destroy($id)
        {
            $announcement = Announcement::find($id);
            $announcement->images()->delete(); 
            $announcement->delete();
           return redirect(route('announcements.index'))->with('message','Annuncio eliminato');
        }
    }
    