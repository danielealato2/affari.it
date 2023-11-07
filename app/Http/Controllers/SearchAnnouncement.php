<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class SearchAnnouncement extends Controller
{
    public function searchAnnouncements(Request $request)
    {
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(10);



        return view('announcement.index', compact('announcements'));
    }
}
