<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->only('announcement.create'); //solo per la rotta create.announcemet
    }




    public function create()  // creazione annuncio
    {
        return view('announcement.create');
    }

    public function index()
    {
        $categories = Category::all(); // index annunci
        $announcements = Announcement::where('is_accepted', true)
            ->orderBy('created_at', 'desc')
            ->get(); //->paginate(6)
        return view('announcement.index', compact('announcements', 'categories'));
    }

    public function showAnnouncement(Announcement $announcement)
    {
        $consigliati = Announcement::where('is_accepted', true)->inRandomOrder()->limit(12)->get();
        //take obbliga 

        // $consigliatiTwo = Announcement::inRandomOrder()->limit(6)->get();

        $ineferioridicianquanta = Announcement::where('is_accepted', true)->where('price', '<', 50)->inRandomOrder()->limit(12)->get();

        return view('announcement.show', compact('announcement', 'consigliati', 'ineferioridicianquanta')); // vedi annuncio
    }

    public function show(Announcement $announcement)
    {
        return view('announcement.show', compact('announcement'));
    }
}
