<x-app-layout>
  

    <div class=""> 
        <div class="view_btn_container">
            <div class="">
                <x-nav-link :href="route('Request_form.request_form_view')"  class="view_link"> 
                    {{ __('View All Form Request') }}
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
                            <x-input-label for="form_request_category" :value="__('Form Category')" />
                            <x-text-input id="form_request_category" class="block mt-1 w-full" type="text" name="form_request_category" value="" required autofocus  />
                            <x-input-error :messages="$errors->get('form_request_category')" class="mt-2" />
                        </div>
                
                        <!-- Field Name -->
                        <div id="fieldContainer" class="mt-4">
                            <x-input-label for="form_request_filed_name" :value="__('Field Name')" />
                            <div class="">
                                <x-text-input id="form_request_filed_name" class="block mt-1 w-[80%]"
                                                type="text"
                                                name="form_request_filed_name[]"
                                                required />
                                <button type="button" class="add-field-btn">
                                    Add More
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('form_request_filed_name')" class="mt-2" />
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

    <script>
     document.addEventListener('DOMContentLoaded', function () {
    const fieldContainer = document.getElementById('fieldContainer');
    const addButton = document.querySelector('button.add-field-btn'); // Corrected selector

    addButton.addEventListener('click', function () {
        const newInput = document.createElement('div');
        newInput.innerHTML = `
            <div class="">
                <input type="text" class="" name="form_request_filed_name[]" required>
                <button type="button" class="remove-field-btn">
                    Remove
                </button>
            </div>
        `;
        fieldContainer.appendChild(newInput);
    });

    fieldContainer.addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-field-btn')) {
            event.target.parentNode.remove(); // Changed to parentNode
        }
    });
});

    </script>
</x-app-layout>
