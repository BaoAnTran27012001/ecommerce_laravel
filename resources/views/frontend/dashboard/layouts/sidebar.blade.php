<div class="dashboard_sidebar">
    <span class="close_icon">
        <i class="far fa-bars dash_bar"></i>
        <i class="far fa-times dash_close"></i>
    </span>
    <ul class="dashboard_link">
        <li><a class="active" href="dsahboard.html"><i class="fas fa-tachometer"></i>{{ __('user.Dashboard') }}</a></li>
        <li><a href="dsahboard_order.html"><i class="fas fa-list-ul"></i> {{ __('user.Orders') }}</a></li>
        <li><a href="dsahboard_download.html"><i class="far fa-cloud-download-alt"></i> {{ __('user.Downloads') }}</a>
        </li>
        <li><a href="dsahboard_review.html"><i class="far fa-star"></i> {{ __('user.Reviews') }}</a></li>
        <li><a href="dsahboard_wishlist.html"><i class="far fa-heart"></i>{{ __('user.Wishlist') }}</a></li>
        <li><a href="{{ route('user.profile') }}"><i class="far fa-user"></i>{{ __('user.My Profile') }}</a></li>
        <li><a href="dsahboard_address.html"><i class="fal fa-gift-card"></i> {{ __('user.Addresses') }}</a></li>

        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                this.closest('form').submit();"><i
                        class="far fa-sign-out-alt"></i> {{ __('user.Logout') }}</a>
            </form>
        </li>

    </ul>
</div>