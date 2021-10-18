<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;

class Trix extends Component
{
    use WithFileUploads;

    const EVENT_VALUE_UPDATED = 'trix_value_updated';

    public $value;
    public $trixId;
    public $photos = [];

    public function mount($value = '')
    {
        $this->value = $value;
        $this->trixId = 'trix-' . uniqid();
    }

    public function updatedValue($value)
    {
        $this->emit(self::EVENT_VALUE_UPDATED, $this->value);
    }

    public function completeUpload(string $uploadedUrl, string $trixUploadCompletedEvent)
    {

        foreach ($this->photos as $photo) {
           // dd($photo);
             
           CommentController::base64_encode_image($photo->getRealPath(), $photo->getClientMimeType());
           
            if ($photo->getFilename() == $uploadedUrl) {

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
