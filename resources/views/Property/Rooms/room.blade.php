<x-app-layout>
    <div class="">
        <div class="view_btn_container">
            <div class="">
                <x-nav-link :href="route('Property.Rooms.room_master_view')" class="view_link">
                    {{ __('View All Room details') }}
                </x-nav-link>
            </div>
        </div>
        <div class="">
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
            <div class="row_form_container">
                <form method="POST" action="{{ route('room_master_form_create') }}" style="margin-top: 30px;">
                    @csrf
                    <!-- Form Category -->
                    <div class="room_form_container">
                    <div class="" id="room_form_container_one">
                        <div>
                            <label for="" style="text-align: center; display:block;">Area Name</label>
                            <select class="select" id="area" name="area" class="">
                                <option value="">Select area</option>
                                @foreach ($area as $item)
                                    <option value="{{$item->id}}" class="{{$item->area_name}}">{{$item->area_name}}</option>
                                @endforeach
                            </select>

                            <x-input-error :messages="$errors->get('area')" />
                        </div>
                        <div>
                            {{-- <x-input-label for="building_name" :value="__('Building Name')" /> --}}
                            <label for="" style="text-align: center; display:block;">Building Name</label>

                            <select class="select" id="building_name" name="building_name" class="">
                                <option value="">Select Building</option>
                                @foreach ($buildings as $item)
                                    <option value="{{$item->id}}" class="{{$item->building_name}}">{{$item->building_name}}</option>
                                @endforeach
                            </select>

                            <x-input-error :messages="$errors->get('building_name')" />
                        </div>
                        <div id="title_of_showing_details_of_selected_buidling"></div>
                        <div id="loadingIndicator" class="loading-indicator">
                            <div class="loader"></div>
                          </div> 
                        <div id="showing_details_of_selected_buidling" class="showing_details_of_selected_buidling">
                                         
                        </div>

                    </div>
                    <div >
                        <div class="room_form_container_two">
                            <div id="fieldContainer">
                                <x-input-label for="room_number" :value="__('Room Number')" />
                                
                                <x-text-input id="room_number" class="room_number" type="text" name="room_number" required autofocus :value="old('room_number')" />
                              
                                <x-input-error :messages="$errors->get('room_number')" />
                            </div>
                        </div>
                        <div class="a" style="display: inline-block;">
                           
                            <div  id="addBtnBedContainer">
                                <div>
                                    <label style="font-size: 14px;">Add Slot Number</label>
                                    <input type="text" class="SlotNumber" name="slot_number" required style="" value="">
                                </div>
                               
                            </div>
                            <div id="SlotContainer" style="margin-bottom:10px;"> 
                                <div style="border: 1px solid gray; text-align: center; padding: 10px; border-radius: 8px;margin-btton:20px;    ">
                                    <p style="font-size: 16px">Slot Details</p>
                                    <div style="display: flex; justify-content: space-around; align-items: center;">
                                        <div style="width: 40%;">
                                            <label for="advance_amount_for_the_slot" style="font-size: 14px;">Advance amount for the Slot (average-year)</label>
                                            <input type="text" id="advance_amount_for_the_slot" name="advance_amount_for_the_slot">
                                        </div>
                                        <div style="width: 40%;">
                                            <label for="rent_for_the_slot" style="font-size: 14px;">Rent for the Slot (average-month)</label>
                                            <input type="text" id="rent_for_the_slot" name="rent_for_the_slot">
                                        </div>
                                    </div>
                                    <div style="display: flex; justify-content: space-around; align-items: center;">
                
                                        <div style="width: 80%; margin:auto;">
                                                <label for="eb_number" style="font-size: 14px;">Occupied Status</label>
                                                <div class="radio-container" style="
                                                padding-left: 50px;margin-top:10px;
                                                ">
                                            <div style="margin-top:2px;margin-bottom:8px;">
                                                <input type="radio" id="html" name="occupied_status" value="1">
                                                <label for="html" style="font-size:12px;">Occupied</label>
                                            </div>
                                            <div style="margin-top:8px;margin-bottom:2px;">
                                                <input type="radio" id="css" name="occupied_status" value="0">
                                                <label for="css">Not Occupied</label>
                                            </div>
                                        </div>
                
                                </div>
                                        <div style="width: 80%; margin:auto;">
                                            <label for="eb_number" style="font-size: 14px;">EB Number of the slot </label>
                                            <input type="text" id="eb_number"  name="eb_number_of_the_slot">
                                        </div>
                                </div>
                            </div>
                         
                        </div>
                    </div>
                </div>
                </div>
                   
                    
                        <x-primary-button class="ms-3">
                            {{ __('Submit') }}
                        </x-primary-button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Add an event listener for the change event on the building select element
        document.getElementById('building_name').addEventListener('change', function() {
            // Get the selected building value
            var buildingId = this.value;
    
    
       // Get the CSRF token value from the meta tag
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
            // Show the loading indicator
            var loadingIndicator = document.getElementById('loadingIndicator');
            loadingIndicator.style.display = 'block';
    
            // Make an AJAX call
            fetch('/room_and_slot_details_of_the_building', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers
                },
                body: JSON.stringify({ buildingId: buildingId })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Hide the loading indicator
                loadingIndicator.style.display = 'none';
    
                // Handle the response data here
                // Clear the existing content of the div
                var div = document.getElementById('showing_details_of_selected_buidling');
                div.innerHTML = '';
                var title_of_showing = document.getElementById("title_of_showing_details_of_selected_buidling");
                title_of_showing.textContent  = "Slot details of selected building ";
                // Append the received data into the div

                var previousRoomNumber = null; // Variable to store the previous room number
                var previousRoomNumber = null; // Variable to store the previous room number
var colors = {}; // Object to store generated colors for each room number

function getRandomColor() {
    // Generate a random color in hexadecimal format
    return '#' + Math.floor(Math.random()*16777215).toString(16);
}
var previousRoomNumber = null; // Variable to store the previous room number
var colors = {}; // Object to store generated colors for each room number



data.rooms.forEach(room => {
    var divInner = document.createElement('div'); // Create a new div for each room
    divInner.classList.add("individual_details");

    var p = document.createElement('p');
    var pa = document.createElement("p");
    var paa = document.createElement("p");

    p.textContent = "Slot Number : " + room.slot_number;
    pa.textContent = "Occupied Status: " + (room.occupied_status == 1 ? "Occupied" : "Not Occupied");
    pa.style.background = room.occupied_status == 1 ? "blue" : "green";
    paa.textContent = "Room Number : " + room.room_number;

    // Check if the current room number has already been assigned a color
    if (!colors[room.room_number]) {
        colors[room.room_number] = getRandomColor(); // Generate a random color for the room number if not already generated
    }
    paa.style.color = colors[room.room_number]; // Set color for room number based on generated color
    paa.style.fontWeight = "bold"; // Set font weight to bold
    paa.style.textDecoration = "underline";

    // Append all <p> tags to the inner div
    divInner.appendChild(paa);
    divInner.appendChild(p);
    divInner.appendChild(pa);

    // Append the inner div containing all <p> tags to the main container div
    div.appendChild(divInner);
});




            })
            .catch(error => {
                console.error('There was a problem with your fetch operation:', error);
            });
        });
    </script>
    
    
    
</x-app-layout>

