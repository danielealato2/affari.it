<?php

namespace App\Jobs;

use App\Models\Image;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GoogleVisionSafeSearch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $announcement_image_id;
    /**
     * Create a new job instance.
     */
    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id = $announcement_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void  //funzione che verra applicata a tutte le immagini 
    {
        $i = Image::find($this->announcement_image_id); //catturiamo l immagine
        if (!$i) { //se non esiste facciamo un return e terminiamo l esecuzione
            return;
        }
        $image = file_get_contents(storage_path('app/public/' . $i->path));
        //dobbbiamo impostare le variabili d ambiente Google_application_credential
        //incollato file json su progetto google_credential.json
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));
        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->safeSearchDetection($image);
        $imageAnnotator->close();

        $safe = $response->getSafeSearchAnnotation(); //salviamo ogni valore  dentro le variabili sotto

        $adult = $safe->getAdult();
        $medical = $safe->getMedical();
        $spoof = $safe->getSpoof();
        $violence = $safe->getViolence();
        $racy = $safe->getRacy();
        // semaforo,dizionario /aggiunta cdn di fontawesome su layout
        $likelihoodName = [
            'text-secondary fas fa-circle',   'text-success fas fa-circle',  'text-success fas fa-circle',  'text-warning fas fa-circle', 'text-warning fas fa-circle',  'text-danger fas fa-circle'
        ];
        $i->adult = $likelihoodName[$adult]; //salviamo ognuna di queste etichette dentro  likelihood
        $i->medical = $likelihoodName[$medical];
        $i->spoof = $likelihoodName[$spoof];
        $i->violence = $likelihoodName[$violence];
        $i->racy = $likelihoodName[$racy];
        $i->save();
    }
}
