<x-app-layout>
    <div class="">
        <div class="view_btn_container">
            <div class="">
                <x-nav-link :href="route('Property.Building.building_master_view')" class="view_link">
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
                <form method="POST" action="{{ route('building_master_form_create') }}" style="margin-top: 30px;">
                    @csrf
                    <!-- Form Category -->
                    <div class="room_form_container">
                    <div class="form_row" id="room_form_container_one">
                        <div>
                            <x-input-label for="building_name" :value="__('Building Name')" />
                            <select class="select" id="building_name" name="building_name" class="">
                                <option value="">Select Building</option>
                                @foreach ($buildings as $item)
                                    <option value="{{$item->id}}" class="{{$item->building_name}}">{{$item->building_name}}</option>
                                @endforeach
                            </select>

                            <x-input-error :messages="$errors->get('building_name')" />
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
                                {{-- <button type="button" style="border-style: none; background-color: rgb(71, 71, 255); color: white; border-radius: 4px; inline-block; width: 100px; height: 40px; margin-top: 20px; padding:4px;font-size:14px;" class="add-field-btn-bed">Add  Slot Details</button> --}}
                            </div>
                            <div id="SlotContainer" style="margin-bottom:10px;"> 
                                <div style="border: 1px solid gray; text-align: center; padding: 10px; border-radius: 8px;margin-btton:20px;    ">
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
                                                <input type="radio" id="html" name="fav_language" value="1">
                                                <label for="html" style="font-size:12px;">Occupied</label>
                                            </div>
                                            <div style="margin-top:8px;margin-bottom:2px;">
                                                <input type="radio" id="css" name="fav_language" value="0">
                                                <label for="css">Not Occupied</label>
                                            </div>
                                        </div>
                
                                </div>
                                        <div style="width: 80%; margin:auto;">
                                            <label for="eb_number" style="font-size: 14px;">EB Number</label>
                                            <input type="text" id="eb_number" name="eb_number">
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

    {{-- <script>
   document.addEventListener('DOMContentLoaded', function () {
    const fieldContainer = document.getElementById('fieldContainer');
    const addButton = document.querySelector('button.add-field-btn'); // Corrected selector
    let selectedOptionClassName = ''; // Declare selectedOptionClassName outside the event listeners

    addButton.addEventListener('click', function () {
        const inputField = document.querySelector('.room_number');
        const selectedBuilding = document.querySelector('#building_name');
        const selectedOption = selectedBuilding.selectedOptions[0];
        const inputValue = inputField.value;
        selectedOptionClassName = selectedOption.className; // Update selectedOptionClassName

        const newInput = document.createElement('span');
        newInput.innerHTML = `
            <div style="border: 2px solid gray; text-align: center; padding: 10px; border-radius: 8px;">
                <p style="font-size: 14px;">Room Details of ${selectedOptionClassName}</p>
                <div class="a" style="display: inline-block;">
                    <label style="font-size: 14px;">Room Number</label>
                    <p style="text-align:center;">${inputValue}</p>
                    <div style="display: flex; gap: 30px; justify-content: center; align-items: center;" id="addBtnBedContainer">
                        <div>
                            <label style="font-size: 14px;">Add Slot Number</label>
                            <input type="text" class="SlotNumber" name="slot_number" required style="" value="">
                        </div>
                        <button type="button" style="border-style: none; background-color: rgb(71, 71, 255); color: white; border-radius: 4px; inline-block; width: 100px; height: 40px; margin-top: 20px; padding:4px;font-size:14px;" class="add-field-btn-bed">Add  Slot Details</button>
                    </div>
                    <div id="SlotContainer" style="margin-bottom:10px;"> </div>
                    <button style="color: white;marign-top:20px;" type="button" class="remove-field-btn">Remove</button>
                </div>
            </div>
        `;

        if (inputField.value !== "" && selectedOptionClassName !== "") {
            fieldContainer.appendChild(newInput);
            inputField.value = "";
        } else {
            alert("Please Select building and enter the room number");
        }
    });

    fieldContainer.addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-field-btn')) {
            event.target.parentNode.remove(); // Changed to parentNode
        } else if (event.target.classList.contains('add-field-btn-bed')) {
            const AddingSlotForRoom =  document.getElementById("SlotContainer")
            const NewSlotDetails = document.createElement("span");
            const NewSlotDetailsinputField = document.querySelector('.SlotNumber');

            const ValuseAtinputField = NewSlotDetailsinputField.value;
            const SlotNameForShow = 
            NewSlotDetails.innerHTML = `
                <div style="border: 1px solid gray; text-align: center; padding: 10px; border-radius: 8px;margin-btton:20px;    ">
                    <p style="font-size: 14px;">Slot Details of ${ValuseAtinputField}</p>
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
                                <input type="radio" id="html" name="fav_language" value="1">
                                <label for="html" style="font-size:12px;">Occupied</label>
                            </div>
                            <div style="margin-top:8px;margin-bottom:2px;">
                                <input type="radio" id="css" name="fav_language" value="0">
                                <label for="css">Not Occupied</label>
                            </div>
                        </div>

                </div>
                        <div style="width: 80%; margin:auto;">
                            <label for="eb_number" style="font-size: 14px;">EB Number</label>
                            <input type="text" id="eb_number" name="eb_number">
                        </div>
                </div>
            `;
            AddingSlotForRoom.appendChild(NewSlotDetails); // Append NewSlotDetails to fieldContainer
        }
    });
});


    </script> --}}
    
</x-app-layout>


{{-- <div style="display:flex;gap:10px;">
    <div style="width:50%;">
        <label style="font-size:14px;">Advance for the Room(average)</label>
        <input type="text" class="" name="form_request_filed_name[]" required style="" value="">
    </div>
    <div style="width:50%;">
        <label style="font-size:14px;">Rent for the Room(average)</label>
        <input type="text" class="" name="form_request_filed_name[]" required style="" value="">
    </div>
</div> --}}