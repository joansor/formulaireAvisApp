@php
if (isset($approved) and $approved == true) {
    $comments = $model->approvedComments;
} else {
    $comments = $model->comments;
}
@endphp


@auth
    @include('comments::_form')
@elseif(Config::get('comments.guest_commenting') == true)
    @include('comments::_form', [
    'guest_commenting' => true
    ])
@else
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">@lang('comments::comments.authentication_required')</h5>
            <p class="card-text">@lang('comments::comments.you_must_login_to_post_a_comment')</p>
            <a href="{{ route('login') }}" class="btn btn-primary">@lang('comments::comments.log_in')</a>
        </div>
    </div>

@endauth
<form method="get" action="#">
    <select name="sort" id="sort">
        <option value="">Trier</option>
        <option value="noteDesc">Note Desc</option>
        <option value="noteAsc">Note Asc</option>
        <option value="dateDesc">Date Desc</option>
        <option value="dateAsc">Date Asc</option>
    </select>
</form>
<script>
    $("#sort").on('change', function(e) {
        console.log('change');
        let values = $(this).serialize();
        let token = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token
            }
        });
        $.ajax({
            url: '/product/{{ $product->id }}/sort/' + $('#sort').val(),
            type: 'GET',
            data: values,
            success: function(data) {
                $.each(data, function(key, value) {
                    let commentContainer = $('#comment-' + (key + 1));
                    commentContainer.html("");
                    let contentDiv = $('<div></div>');
                    contentDiv.html(
                        "<img class = 'mr-3' src ='https://www.gravatar.com/avatar/'" +
                        value.guest_email + ".jpg?s=64'alt =" + value.guest_name +
                        " Avatar'><div class = 'media-body' ><h5 class = 'mt-0 mb-1'>" +
                        value.guest_name + "<small class = 'text-muted' > -" +
                        convertDate(value.created_at) +"</small></h5 ><div><div class='rating'>"+processingStarRating(value.product_rating, (key+1))+"</div><div class='viewComment container col-12 col-sm-12 col-md-12 col-lg-12'>" + value.comment + "</div><br>");
                    commentContainer.append(contentDiv);
                })
            },
            error: function(e) {
                console.log(e.responseText);
            }
        });
    });

    function processingStarRating(value, key) {
        console.log(value);
        let divStarIcon = $("<div/>").attr('class','star-icon '+key);
        // let divStarIcon = $("<div class='star-icon '"+key+"></div>");
       
        switch (value) {
            case (1):
                 divStarIcon.html(
                    "<input type='radio' value='1' checked id='ratingStar1'><label for='ratingStar1' class='fa fa-star'></label><input type='radio' value='2' id='ratingStar2'><label for='ratingStar2' class='fa fa-star'></label><input  type='radio' value='3' id='ratingStar3'><label for='ratingStar3' class='fa fa-star'></label><input type='radio' value='4' id='ratingStar4'><label for='ratingStar4' class='fa fa-star'></label><input type='radio' value='5' id='ratingStar5'><label for='ratingStar5' class='fa fa-star'></label>"
                    );
                    return divStarIcon[0].innerHTML;
                break;
            case (2):
                 divStarIcon.html(
                    "<input type='radio' value='1' id='ratingStar1'><label for='ratingStar1' class='fa fa-star'></label><input type='radio' value='2'checked id='ratingStar2'><label for='ratingStar2' class='fa fa-star'></label><input  type='radio' value='3' id='ratingStar3'><label for='ratingStar3' class='fa fa-star'></label><input type='radio' value='4' id='ratingStar4'><label for='ratingStar4' class='fa fa-star'></label><input type='radio' value='5' id='ratingStar5'><label for='ratingStar5' class='fa fa-star'></label>"
                    );
                    return divStarIcon[0].innerHTML;
                break;
            case (3):
                 divStarIcon.html(
                    "<input type='radio' value='1' id='ratingStar1'><label for='ratingStar1' class='fa fa-star'></label><input type='radio' value='2' id='ratingStar2'><label for='ratingStar2' class='fa fa-star'></label><input type='radio' value='3' checked id='ratingStar3'><label for='ratingStar3' class='fa fa-star'></label><input type='radio' value='4' id='ratingStar4'><label for='ratingStar4' class='fa fa-star'></label><input type='radio' value='5' id='ratingStar5'><label for='ratingStar5' class='fa fa-star'></label>"
                    );
                    return divStarIcon[0].innerHTML;
                break;
            case (4):
                  divStarIcon.html(
                    "<input type='radio' value='1' id='ratingStar1'><label for='ratingStar1' class='fa fa-star'></label><input type='radio' value='2' id='ratingStar2'><label for='ratingStar2' class='fa fa-star'></label><input type='radio' value='3' id='ratingStar3'><label for='ratingStar3' class='fa fa-star'></label><input type='radio' value='4' checked id='ratingStar4'><label for='ratingStar4' class='fa fa-star'></label><input type='radio' value='5' id='ratingStar5'><label for='ratingStar5' class='fa fa-star'></label>"
                    );
                    return divStarIcon[0].innerHTML;
                break;
            case (5):
                 divStarIcon.html(
                    "<input type='radio' value='1' id='ratingStar1'><label for='ratingStar1' class='fa fa-star'></label><input type='radio' value='2' id='ratingStar2'><label for='ratingStar2' class='fa fa-star'></label><input type='radio' value='3' id='ratingStar3'><label for='ratingStar3' class='fa fa-star'></label><input type='radio' value='4' id='ratingStar4'><label for='ratingStar4' class='fa fa-star'></label><input type='radio' value='5' checked id='ratingStar5'><label for='ratingStar5' class='fa fa-star'></label>"
                    );
                    return divStarIcon[0].innerHTML;
                break;
            default:
                 divStarIcon.html(
                    "<input type='radio' value='1' id='ratingStar1'><label for='ratingStar1' class='fa fa-star'></label><input type='radio' value='2' id='ratingStar2'><label for='ratingStar2' class='fa fa-star'></label><input type='radio' value='3' checked id='ratingStar3'><label for='ratingStar3' class='fa fa-star'></label><input type='radio' value='4' id='ratingStar4'><label for='ratingStar4' class='fa fa-star'></label><input type='radio' value='5' id='ratingStar5'><label for='ratingStar5' class='fa fa-star'></label>"
                    );
                    return divStarIcon[0].innerHTML;
        }
    }

    function convertDate(date) {
        let convertDate = new Date(date);
        let formatDate = convertDate.toISOString().split('T')[0];
        let yearDate = formatDate.split('-')[0];
        let monthDate = formatDate.split('-')[1];
        let dayDate = formatDate.split('-')[2];
        let newDate = yearDate + monthDate + dayDate;
        return moment(newDate, "YYYYMMDD").fromNow();
    }
</script>
<div>
    <br>
    <h5>@lang('comments::comments.avis_client')</h5>
    <br>
    @if ($comments->count() < 1)
        <div class="alert alert-warning">@lang('comments::comments.there_are_no_comments')</div>
    @endif
    @php
        $comments = $comments->sortByDesc('created_at');
        
        if (isset($perPage)) {
            $page = request()->query('page', 1) - 1;
        
            $parentComments = $comments->where('child_id', '');
        
            $slicedParentComments = $parentComments->slice($page * $perPage, $perPage);
        
            $m = Config::get('comments.model'); // This has to be done like this, otherwise it will complain.
            $modelKeyName = (new $m())->getKeyName(); // This defaults to 'id' if not changed.
        
            $slicedParentCommentsIds = $slicedParentComments->pluck($modelKeyName)->toArray();
        
            // Remove parent Comments from comments.
            $comments = $comments->where('child_id', '!=', '');
        
            $grouped_comments = new \Illuminate\Pagination\LengthAwarePaginator($slicedParentComments->merge($comments)->groupBy('child_id'), $parentComments->count(), $perPage);
        
            $grouped_comments->withPath(request()->url());
        } else {
            $grouped_comments = $comments->groupBy('child_id');
        }
    @endphp
    @foreach ($grouped_comments as $comment_id => $comments)
        {{-- Process parent nodes --}}
        @if ($comment_id == '')
            @foreach ($comments as $comment)
                @include('comments::_comment', [
                'comment' => $comment,
                'grouped_comments' => $grouped_comments,
                'maxIndentationLevel' => $maxIndentationLevel ?? 3
                ])
            @endforeach
        @endif
    @endforeach
</div>

@isset($perPage)
    {{ $grouped_comments->links() }}
@endisset
