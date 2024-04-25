<nav x-data="{ open: false }" >
    <!-- Primary Navigation Menu -->
    <div class="topbar">
    <p class="company_title">spmnest</p>
    <div>
           
    
        <!-- Responsive Settings Options -->
        <div>
            <div>
                <div class="useName">{{ Auth::user()->name }}</div>
            </div>

            <div>
                <x-responsive-nav-link :href="route('profile.edit')" class="profile">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                        @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="logout">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
    </div>
    

    <!-- Responsive Navigation Menu -->
    
</nav>
