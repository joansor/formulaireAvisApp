@inject('markdown', 'Parsedown')
@php
    // TODO: There should be a better place for this.
    $markdown->setSafeMode(true);
@endphp

<div id="comment-{{ $comment->getKey() }}" class="media">
    <img class="mr-3" src="https://www.gravatar.com/avatar/{{ md5($comment->commenter->email ?? $comment->guest_email) }}.jpg?s=64" alt="{{ $comment->commenter->name ?? $comment->guest_name }} Avatar">
    <div class="media-body">
        <h5 class="mt-0 mb-1">{{ $comment->commenter->name ?? $comment->guest_name }} <small class="text-muted">- {{ $comment->created_at->diffForHumans() }}</small></h5>
        <div>
            <div class="rating">
                <div class="star-icon">
                    @switch($comment->product_rating)
                        @case(1)
                            <input type="radio" value="1" checked id="ratingStar1">
                            <label for="ratingStar1" class="fa fa-star"></label>
                            <input type="radio" value="2" id="ratingStar2">
                            <label for="ratingStar2" class="fa fa-star"></label>
                            <input type="radio" value="3" id="ratingStar3">
                            <label for="ratingStar3" class="fa fa-star"></label>
                            <input type="radio" value="4" id="ratingStar4">
                            <label for="ratingStar4" class="fa fa-star"></label>
                            <input type="radio" value="5" id="ratingStar5">
                            <label for="ratingStar5" class="fa fa-star"></label>
                        @break
                        @case(2)
                            <input type="radio" value="1" id="ratingStar1">
                            <label for="ratingStar1" class="fa fa-star"></label>
                            <input type="radio" value="2" checked id="ratingStar2">
                            <label for="ratingStar2" class="fa fa-star"></label>
                            <input type="radio" value="3" id="ratingStar3">
                            <label for="ratingStar3" class="fa fa-star"></label>
                            <input type="radio" value="4" id="ratingStar4">
                            <label for="ratingStar4" class="fa fa-star"></label>
                            <input type="radio" value="5" id="ratingStar5">
                            <label for="ratingStar5" class="fa fa-star"></label>
                        @break
                        @case(3)
                            <input type="radio" value="1" id="ratingStar1">
                            <label for="ratingStar1" class="fa fa-star"></label>
                            <input type="radio" value="2" id="ratingStar2">
                            <label for="ratingStar2" class="fa fa-star"></label>
                            <input type="radio" value="3" checked id="ratingStar3">
                            <label for="ratingStar3" class="fa fa-star"></label>
                            <input type="radio" value="4" id="ratingStar4">
                            <label for="ratingStar4" class="fa fa-star"></label>
                            <input type="radio" value="5" id="ratingStar5">
                            <label for="ratingStar5" class="fa fa-star"></label>
                        @break
                        @case(4)
                            <input type="radio" value="1" id="ratingStar1">
                            <label for="ratingStar1" class="fa fa-star"></label>
                            <input type="radio" value="2" id="ratingStar2">
                            <label for="ratingStar2" class="fa fa-star"></label>
                            <input type="radio" value="3" id="ratingStar3">
                            <label for="ratingStar3" class="fa fa-star"></label>
                            <input type="radio" value="4" checked id="ratingStar4">
                            <label for="ratingStar4" class="fa fa-star"></label>
                            <input type="radio" value="5" id="ratingStar5">
                            <label for="ratingStar5" class="fa fa-star"></label>
                        @break
                        @case(5)
                            <input type="radio" value="1" id="ratingStar1">
                            <label for="ratingStar1" class="fa fa-star"></label>
                            <input type="radio" value="2" id="ratingStar2">
                            <label for="ratingStar2" class="fa fa-star"></label>
                            <input type="radio" value="3" id="ratingStar3">
                            <label for="ratingStar3" class="fa fa-star"></label>
                            <input type="radio" value="4" id="ratingStar4">
                            <label for="ratingStar4" class="fa fa-star"></label>
                            <input type="radio" value="5" checked id="ratingStar5">
                            <label for="ratingStar5" class="fa fa-star"></label>
                        @break
                        @default
                            <input type="radio" value="1" id="ratingStar1">
                            <label for="ratingStar1" class="fa fa-star"></label>
                            <input type="radio" value="2" id="ratingStar2">
                            <label for="ratingStar2" class="fa fa-star"></label>
                            <input type="radio" value="3" checked id="ratingStar3">
                            <label for="ratingStar3" class="fa fa-star"></label>
                            <input type="radio" value="4" id="ratingStar4">
                            <label for="ratingStar4" class="fa fa-star"></label>
                            <input type="radio" value="5" id="ratingStar5">
                            <label for="ratingStar5" class="fa fa-star"></label>
                    @endswitch
                </div>
            </div>
        </div>
        <div class="viewComment container col-12 col-sm-12 col-md-12 col-lg-12">
            {!! $comment->comment !!}
            {{-- @livewire('trix',[$comment->comment]) --}}
        </div>
        {{-- <div style="white-space: pre-wrap;">{!! $markdown->line($comment->comment) !!}</div> --}}
        <div>
            @can('reply-to-comment', $comment)
                <button data-toggle="modal" data-target="#reply-modal-{{ $comment->getKey() }}" class="btn btn-sm btn-link text-uppercase">@lang('comments::comments.reply')</button>
            @endcan
            @can('edit-comment', $comment)
                <button data-toggle="modal" data-target="#comment-modal-{{ $comment->getKey() }}" class="btn btn-sm btn-link text-uppercase">@lang('comments::comments.edit')</button>
            @endcan
            @can('delete-comment', $comment)
                <a href="{{ route('comments.destroy', $comment->getKey()) }}" onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->getKey() }}').submit();" class="btn btn-sm btn-link text-danger text-uppercase">@lang('comments::comments.delete')</a>
                <form id="comment-delete-form-{{ $comment->getKey() }}" action="{{ route('comments.destroy', $comment->getKey()) }}" method="POST" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
            @endcan
        </div>

        @can('edit-comment', $comment)
            <div class="modal fade" id="comment-modal-{{ $comment->getKey() }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('comments.update', $comment->getKey()) }}">
                            @method('PUT')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">@lang('comments::comments.edit_comment')</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message">@lang('comments::comments.update_your_message_here')</label>
                                    <textarea required class="form-control" name="message" rows="3">{{ $comment->comment }}</textarea>
                                    <small class="form-text text-muted">@lang('comments::comments.markdown_cheatsheet', ['url' => 'https://help.github.com/articles/basic-writing-and-formatting-syntax'])</small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal">@lang('comments::comments.cancel')</button>
                                <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">@lang('comments::comments.update')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        @can('reply-to-comment', $comment)
            <div class="modal fade" id="reply-modal-{{ $comment->getKey() }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('comments.reply', $comment->getKey()) }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">@lang('comments::comments.reply_to_comment')</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message">@lang('comments::comments.enter_your_message_here')</label>
                                    <textarea required class="form-control" name="message" rows="3"></textarea>
                                    <small class="form-text text-muted">@lang('comments::comments.markdown_cheatsheet', ['url' => 'https://help.github.com/articles/basic-writing-and-formatting-syntax'])</small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal">@lang('comments::comments.cancel')</button>
                                <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">@lang('comments::comments.reply')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        <br />{{-- Margin bottom --}}

        <?php
            if (!isset($indentationLevel)) {
                $indentationLevel = 1;
            } else {
                $indentationLevel++;
            }
        ?>

        {{-- Recursion for children --}}
        @if($grouped_comments->has($comment->getKey()) && $indentationLevel <= $maxIndentationLevel)
            {{-- TODO: Don't repeat code. Extract to a new file and include it. --}}
            @foreach($grouped_comments[$comment->getKey()] as $child)
                @include('comments::_comment', [
                    'comment' => $child,
                    'grouped_comments' => $grouped_comments
                ])
            @endforeach
        @endif

    </div>
</div>

{{-- Recursion for children --}}
@if($grouped_comments->has($comment->getKey()) && $indentationLevel > $maxIndentationLevel)
    {{-- TODO: Don't repeat code. Extract to a new file and include it. --}}
    @foreach($grouped_comments[$comment->getKey()] as $child)
        @include('comments::_comment', [
            'comment' => $child,
            'grouped_comments' => $grouped_comments
        ])
    @endforeach
@endif