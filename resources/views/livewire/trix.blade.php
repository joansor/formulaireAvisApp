<div wire:ignore>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />

    <input id="{{ $trixId }}" type="hidden" name="message" value="{{ $value }}">
    <trix-editor class="trix-content" wire:ignore input="{{ $trixId }}"></trix-editor>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    <script>
        var trixEditor = document.getElementById("{{ $trixId }}")
        var mimeTypes = ["image/png", "image/jpeg", "image/jpg"];

        addEventListener("trix-blur", function(event) {
            @this.set('value', trixEditor.getAttribute('value'))
        });

        addEventListener("trix-file-accept", function(event) {
            console.log("trix-file-accept : "+event.file);
            if (! mimeTypes.includes(event.file.type) ) {
                // file type not allowed, prevent default upload
                return event.preventDefault();
            }
        });

        addEventListener("trix-attachment-add", function(event){
            console.log(event);
            // console.log("trix-attachment-add : "+event.attachment);
            uploadTrixImage(event.attachment);
        });

        function uploadTrixImage(attachment){
            // upload with livewire
            console.log('attachement :' + attachment);
            @this.upload(
                'photos',
                attachment.file,
                function (uploadedURL) {
                        console.log(uploadedURL);
                    // We need to create a custom event.
                    // This event will create a pause in thread execution until we get the Response URL from the Trix Component @completeUpload
                    const trixUploadCompletedEvent = `trix-upload-completed:${btoa(uploadedURL)}`;
                    const trixUploadCompletedListener = function(event) {
                        attachment.setAttributes(event.detail);
                        window.removeEventListener(trixUploadCompletedEvent, trixUploadCompletedListener);
                    }
                    window.addEventListener(trixUploadCompletedEvent, trixUploadCompletedListener);

                    // call the Trix Component @completeUpload below
                    @this.call('completeUpload', uploadedURL, trixUploadCompletedEvent);
                },
                function() {},
                function(event){
                    attachment.setUploadProgress(event.detail.progress);
                },
             )
            // complete the upload and get the actual file URL
        }
        
    </script>
</div>
