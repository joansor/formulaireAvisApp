<div class="card">
    <div class="card-body">
        @if ($errors->has('commentable_type'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->first('commentable_type') }}
            </div>
        @endif
        @if ($errors->has('commentable_id'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->first('commentable_id') }}
            </div>
        @endif
        <form method="POST" action="{{ route('comments.store') }}" enctype="multipart/form-data">
            @csrf
            @honeypot
            <input type="hidden" name="commentable_type" value="\{{ get_class($model) }}" />
            <input type="hidden" name="commentable_id" value="{{ $model->getKey() }}" />

            {{-- Guest commenting --}}
            @if (isset($guest_commenting) and $guest_commenting == true)
                <div class="form-group">
                    <label for="message">@lang('comments::comments.entrer_votre_pseudo')</label>
                    <input type="text" class="form-control @if ($errors->has('guest_name')) is-invalid @endif" name="guest_name" />
                    @error('guest_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="message">@lang('comments::comments.entrer_votre_email')</label>
                    <input type="email" class="form-control @if ($errors->has('guest_email')) is-invalid @endif" name="guest_email" />
                    @error('guest_email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            @endif
            <div class="form-group">
                <label for="file">@lang('comments::comments.ajouter_une_image')</label>
                <input type="file" name="guest_file" id="guest_file" accept="image/png, image/jpeg">
            </div>
            <div class="form-group">
                <label for="message">@lang('comments::comments.entrer_votre_commentaire')</label>
                <textarea class="form-control @if ($errors->has('message')) is-invalid @endif" name="message" rows="3"></textarea>
                <div class="invalid-feedback">
                    @lang('comments::comments.your_message_is_required')
                </div>
                <small class="form-text text-muted">@lang('comments::comments.markdown_cheatsheet', ['url' =>
                    'https://help.github.com/articles/basic-writing-and-formatting-syntax'])</small>
            </div>
            <button type="submit"
                class="btn btn-sm btn-outline-success text-uppercase">@lang('comments::comments.submit')</button>
        </form>
    </div>
</div>
<br />
