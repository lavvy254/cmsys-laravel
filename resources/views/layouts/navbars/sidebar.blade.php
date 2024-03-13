<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('BD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Black Dashboard') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') z class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel"></i>
                    <span class="nav-link-text">{{ __('Member Management') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit') }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('User Profile') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('user.index') }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('User Management') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fa fa-object-group" aria-hidden="true"></i>
                    <span class="nav-link-text">{{ __('Group Management') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'groups') class="active " @endif>
                            <a href="{{ route('groups.view') }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('Groups') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'gmembers') class="active " @endif>
                            <a href="{{ route('gmembers.view') }}">
                                <i class="fa fa-users" aria-hidden="true"></i>

                                <p>{{ __('Group Memebers') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li @if ($pageSlug == 'giving') class="active " @endif>
                <a href="{{ route('giving.index') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ __('Giving') }}</p>
                </a>
            </li>
           
            <li @if ($pageSlug == 'announcement') class="active " @endif>
                <a href="{{ route('announcement.view') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ __('Announcement') }}</p>
                </a>
            </li>
             <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel"></i>
                    <span class="nav-link-text">{{ __('Sermon Management') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'sermons') class="active " @endif>
                            <a href="{{ route('sermon.view') }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('Sermon') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'snotes') class="active " @endif>
                            <a href="{{route('snote.view')}}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Sermon Notes') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li @if ($pageSlug == 'tables') class="active " @endif>
                <a href="{{ route('pages.tables') }}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ __('Prayer Management') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'tables') class="active " @endif>
                <a href="{{ route('pages.tables') }}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ __('Attendance') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'maps') class="active " @endif>
                <a href="{{ route('pages.maps') }}">
                    <i class="tim-icons icon-pin"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
