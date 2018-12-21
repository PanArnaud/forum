<div class="panel panel-default">
    <div class="panel-heading">
        <div class="level">
            <h5 class="flex">
                <a href="#">{{ $reply->owner->name }}</a> said {{ $reply->created_at->diffForHumans() }}
            </h5>

            <div>
                <form method="POST" action="/replies/{{ $reply->id }}/favorites">
                    {{ csrf_field() }}
                    <button class="btn btn-default" type="submit" {{ $reply->isFavorited() ? 'disabled' : '' }}>
                        {{ $reply->favorites()->count() }} {{ str_plural('Favorite', $reply->favorites()->count()) }}
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="panel-body">
        {{ $reply->body }}
    </div>
</div>