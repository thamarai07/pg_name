<x-app-layout>
  

    <div class=""> 
        <div class="view_btn_container">
            <div class="">
                <x-nav-link :href="route('Request_form.request_form_view')"  class="view_link"> 
                    {{ __('View All Area') }}
                </x-nav-link>
            </div>
        </div>
        <div class="form_container">
                <x-auth-session-status class=" " :status="session('status')" />
                @if (session('success'))
              
                <div class="alert-success" role="alert-success">
                    {{ session('success') }}
                  </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger ">
                    <div class="" role="alert">
                        {{ session('error') }}

                      </div>
                      
                </div>
                @endif
               
                <div class="">
                   
                    <form method="POST" action="{{ route('request_form_create') }}">
                        @csrf
                
                        <!-- Form Category -->
                        <div>
                            <x-input-label for="area_name" :value="__('Area Name')" />
                            <x-text-input id="area_name" class="block mt-1 w-full" type="text" name="area_name" value="" required autofocus  />
                            <x-input-error :messages="$errors->get('area_name')" class="mt-2" />
                        </div>
                
                        <!-- Field Name -->
                        <div id="fieldContainer" class="mt-4">
                            <x-input-label for="area_pincode" :value="__('Area Pincode')" />
                            <div class="">
                                <x-text-input id="area_pincode" class="block mt-1 w-[80%]"
                                                type="text"
                                                name="area_pincode"
                                                required />
                            </div>
                            <x-input-error :messages="$errors->get('area_pincode')" class="mt-2" />
                        </div>
                
                        <!-- Submit Button -->
                        <div class="">
                            <x-primary-button class="ms-3">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
    </div>

   
</x-app-layout>
