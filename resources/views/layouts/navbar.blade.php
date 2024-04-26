<div class="master_container">
        
    <div class="">
            
            
            <!-- Navigation Links -->
            <div class="nav_link_container">
            <div class="side_bar_items">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="side_bar_item">
                    {{ __('Dashboard') }}
                </x-nav-link>
            </div>
            <div class="side_bar_items">
                <x-nav-link :href="route('Request_form.request_form')" :active="request()->routeIs('request_form')" class="side_bar_item"> 
                    {{ __('Form request') }}
                </x-nav-link>
            </div>
            <div class="side_bar_items">
                <button  class="side_bar_item" onclick="toggleSubMenu()">
                        Property Master
                </button>
                <div class="submenu" id="submenu">
                    <x-nav-link :href="route('area_master_form.request_form')" :active="request()->routeIs('area_master_form')" class="side_bar_sub_menu_one"> 
                        {{ __('Area Master') }}
                    </x-nav-link>
                    <x-nav-link :href="route('building_master_form.request_form')" :active="request()->routeIs('building_master_form')" class="side_bar_sub_menu"> 
                        {{ __('Building Master') }}
                    </x-nav-link>
                    
                    {{-- <div class="side_bar_sub_menu">Building Master </div> --}}
                </div>
            </div>
            
            </div>
      

    </div>
   
</div>

<script>
    function toggleSubMenu() {
    var submenu = document.getElementById("submenu");
    submenu.style.display = (submenu.style.display === "block") ? "none" : "block";
}
</script>