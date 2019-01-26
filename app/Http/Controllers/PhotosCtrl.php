<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use Illuminate\Support\Facades\DB;
class PhotosCtrl extends Controller
{
    //
    function View_photos(){

        
        $Id_event=request('id_event');


       $photos = DB::table('photos')
            ->join('events', 'events.Id_event', '=', 'photos.Id_event')
            ->select('*')
            ->where([
                ['photos.Id_event', $Id_event],
                ['public_photo', 1]
            ])
            ->get();
             

        $comments=Comments::all();

        

        return view('Photos',[
            'Photos'=>$photos,
            'Comments'=>$comments,
        ]);

    }

    function Create_comments(){

        if(session()->get('Status_user')){

        $Comment= Comments::create([
            'Comment_comment'=>request('comment_comment'),
            'Id_user'=>session()->get('Id_user'),
            'Id_photo'=>request('id_photo'),
            'Public_comment'=>1,
    
        ]);

        return back();
        }

        return redirect('/connexion')->withErrors([
            'email_user' => 'Veuillez vous authentifier'
            ]);

    }

    function Delete_comments(){
        
        if(session()->get('Status_user')=='Tuteur'){

            DB::table('comments')
            ->delete()
            ->where(request('id_comment'), 'Id_comment');


            //TO DO send mail notif
        }

    }

}
