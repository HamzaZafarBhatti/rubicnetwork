@if (!$is_shared)
    <a type="button" class="button button--effect button--last" href="{{ route('user.viral_shares.earn', $post->id) }}" id="viral_earn">
        CLICK TO EARN <i class="fas fa-share"></i>
    </a>
@endif
