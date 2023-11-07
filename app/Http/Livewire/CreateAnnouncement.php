<?php

namespace App\Http\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Jobs\ResizeImage;
use Illuminate\Support\Facades\File;

class CreateAnnouncement extends Component
{
    use WithFileUploads;

    public $title, $description, $price, $category, $temporary_images, $images = [], $image, $validated, $form_id, $announcement;
    //START VALIDAZIONE DATI
    protected $rules = [
        'title' => 'required|min:8',
        'description' => 'required',
        'price' => 'required|numeric',
        'category' => 'required',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024',
    ];
    //END VALIDAZIONE DATI
    protected $messages = [
        'required' => 'il campo:attribute è richiesto',
        'min' => 'il campo:attribute è troppo corto',
        'temporary_images.required' => 'L\'immagine è richiesta',
        'temporary_images.*.image' => 'I file devono essere immagini',
        'temporary_images.*.max' => 'L\'immagine deve essere massimo di 1 mb',
        'images.image' => 'L\'immagine deve essere un\'immagine',
        'images.max' => 'L\'immagine deve essere massimo 1 mb',
    ];

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function store()
    {

        $this->validate(); //Se i dai sono validati OK procedi alla creazione.
        //$category = Category::find($this->category);

        //$this->announcement = $category->announcements()->create([
        //'title' => $this->title,
        //'description' => $this->description,
        //'price' => $this->price,
        //'image' => $this->image,
        //]);
        $this->announcement = Category::find($this->category)->announcements()->create($this->validate());
        if (count($this->images)) {
            foreach ($this->images as $image) {
                //$announcement->images()->create(['path' => $image->store('images', 'public')]);
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path' => $image->store($newFileName, 'public')]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 400, 300),  // job resize img 400*300
                    new ResizeImage($newImage->path, 600, 300),  // job resize img 600*300
                    new ResizeImage($newImage->path, 215, 230),  // job resize img 600*400
                    new ResizeImage($newImage->path, 80, 120),  // job resize img 215*120
                    new ResizeImage($newImage->path, 740, 560),  // job resize img 740*560
                    new GoogleVisionSafeSearch($newImage->id), // job GoogleVisionSafeSearch
                    new GoogleVisionLabelImage($newImage->id), // job GoogleVisionLabelImage

                ])->dispatch($newImage->id);
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }



        $this->announcement->user()->associate(Auth::user());
        $this->announcement->save();


        session()->flash('announcement', 'Annuncio creato correttamente, sarà pubblicato dopo la revisione.');

        $this->reset('title', 'description', 'price', 'category', 'image', 'images', 'temporary_images'); //Al submit pulisci i campi del form.


    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
