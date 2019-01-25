<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
class PhotosCtrl extends Controller
{
    //
    function View_photos(){

        $Id_event=request('Id_event');

       $Photos = DB::table('photos')
            ->join('events', 'events.Id_event', '=', 'photos.Id_event')
            ->select('*')
            ->where([
                ['photos.Id_event', $Id_event],
                ['Public_photos', 1]
            ])
            ->get();
             

        $comments=App\Comments::all();

        return view('Photos',[
            'Photos'=>$photos,
            'Comments'=>$comments,
        ]);






    }

}
