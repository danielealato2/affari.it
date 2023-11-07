<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

class BasicController extends Controller
{
    public function homepage()
    {
        $categories = Category::all();

        $announcements = Announcement::where('is_accepted', true)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $itOnly = Announcement::where('is_accepted', true)->where('category_id', '=', 2)->inRandomOrder()->limit(6)->get();
        //la variabile $itOnly mi manda i dati nella homepage per poter creare la section con card per categorie in questo caso ho nella view della homepage una section che mi renderizza 10 card con annunci di solo informatica.

        $motorsOnly = Announcement::where('is_accepted', true)->where('category_id', '=', 1)->inRandomOrder()->limit(6)->get();
        //la variabile  $motorsOnly mi manda i dati nella homepage per poter creare la section con card per categorie in questo caso ho nella view della homepage una section che mi renderizza 10 card con annunci di solo motori.

        $smartphoneMinors = Announcement::where('is_accepted', true)->where('category_id', '=', 8)->where('price', '<', 600)->inRandomOrder()->limit(6)->get();
        //la variabile   $smartphoneMinors mi manda i dati nella homepage per poter creare la section con card per categorie in questo caso ho nella view della homepage una section che mi renderizza 10 card con annunci di solo smartphone < di 600€.
        
        $productMinorsThirty =  Announcement::where('is_accepted', true)->where('price' , '<' , 30)->inRandomOrder()->limit(6)->get();
        //$productMinorsThirty prodotti minori di 30€

        $elettrodomestici = Announcement::where('is_accepted', true)->where('category_id', '=', 3)->inRandomOrder()->limit(6)->get();

        $immobili = Announcement::where('is_accepted', true)->where('category_id', '=', 7)->inRandomOrder()->limit(6)->get();

        $libri = Announcement::where('is_accepted', true)->where('category_id', '=', 4)->inRandomOrder()->limit(6)->get();

        $arredamento = Announcement::where('is_accepted', true)->where('category_id', '=', 9)->inRandomOrder()->limit(6)->get();
        
        $sports =  Announcement::where('is_accepted', true)->where('category_id', '=', 6)->inRandomOrder()->limit(6)->get();

        $giochi =  Announcement::where('is_accepted', true)->where('category_id', '=', 5)->inRandomOrder()->limit(6)->get();
        
        $minors = Announcement::where('price', '<', 50)->inRandomOrder()->limit(12)->get();

        return view('homepage', compact('announcements', 'categories', 'itOnly', 'motorsOnly', 'smartphoneMinors','productMinorsThirty','elettrodomestici','immobili','libri','arredamento','sports','giochi','minors'));
    }


    public function categoryShow(Category $category)

    {
        $announcements = $category->announcements->where('is_accepted', true);
        return view('categoryShow', compact(['category', 'announcements']));
    }

    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function filtraProdotti(Category $category, Request $request)
    {

        $announcements = $category->announcements->where('is_accepted', true)->where('price', '<', $request->prezzo);


        //dd($request->all());
        return view('categoryShow', compact(['category', 'announcements']));
    }
}
