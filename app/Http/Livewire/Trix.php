<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\CommentController;


class Trix extends Component
{
    use WithFileUploads;

    const EVENT_VALUE_UPDATED = 'trix_value_updated';

    public $value;
    public $trixId;
    public $photos = [];

    public function mount($value = ''){
        $this->value = $value;
        $this->trixId = 'trix-' . uniqid();
    }

    public function updatedValue($value){
        $this->emit(self::EVENT_VALUE_UPDATED, $this->value);
    }

    public function completeUpload(string $uploadedUrl, string $trixUploadCompletedEvent){
      
            // $imgbinary = fread(fopen($filename, "r"), filesize($filename)); // open & read file
            // return 'data:' . $filetype . ';base64,' . base64_encode($imgbinary); // path binary complet
        


         foreach($this->photos as $photo){
            dd($photo);
            if($photo->getFilename() == $uploadedUrl) {
                //var_dump(readfile("public/photos/Capture.png"));
               //CommentController::testimg($photo);
                //store in the public/photos location
                $newFilename = $photo->store('public/photos');
              
                //get the public URL of the newly uploaded file
                $url = Storage::url($newFilename);

                $this->dispatchBrowserEvent($trixUploadCompletedEvent, [
                    'url' => $url,
                    'href' => $url,
                ]);
            }
         }
    }

    public function render()
    {
        return view('livewire.trix');
    }
}
