<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\BecomeRevisor;

class RevisorController extends Controller
{
    public function index()
    {
        $announcement_to_check = Announcement::where('is_accepted', null)->first();

        return view('revisor.index', compact('announcement_to_check'));
    }


    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->update(['is_accepted' => true]);
        return redirect()->back()->with('message', 'Complimenti, hai accettato l\'annuncio');
    }

    public function rejectAnnouncement(Announcement $announcement)
    {
        $announcement->update(['is_accepted' => false]);
        return redirect()->back()->with('message', 'Complimenti, hai rifiutato l\'annuncio');
    }

    public function becomeRevisor()
    {
        $user = Auth::user();
        Mail::to('admin@presto.it')->send(new BecomeRevisor($user));
        return view('mail.become_revisor', compact('user'))->with('message', 'Complimenti! Hai richiesto di diventare revisore correttamente.');
    }


    public function makeRevisor(User $user)
    {
        Artisan::call('presto:makeUserRevisor', ["email" => $user->email]);
        return redirect('/')->with('message', 'Complimenti! L\'utente è diventato revisore');
    }
}
