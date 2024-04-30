<x-app-layout>
    <div class="">
        <div class="">
            <div class="">
                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <h2>Building Details of <span style="text-decoration: underline; color: blue;"> 
                 {{$request->building_name}}</span></h2>
               
                <form method="POST" action="{{ route('building_master_form_details_update.updateDetails', $request->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form_row">
                    <div>
                        <label for="">Building Name</label>
                        <input type="text" value={{$request->building_name}} name="building_name">
                    </div>
                    <div>
                        <label for="">Building Number</label>
                        <input type="text" value={{$request->building_no}} name="building_no">
                    </div>
                    <div>
                        <label for="">Building street</label>
                        <input type="text" value={{$request->building_street}} name="building_street">
                    </div>
                    </div>

                    <div class="form_row" style="margin-top: 10px;">
                        <div>
                            <label for="">Area Name</label>
                            
                            <select class="select" id="Area" name="area_name">
                                <option value="">Select Area</option>
                                @foreach($areaData as $item)
                                <option value="{{ $item->id }}" {{ $request->area_name == $item->id ? 'selected' : '' }}>{{ $item->area_name }}</option>
                                @endforeach
                            </select>
                        
                            
                        </div>
                        <div>
                            <label for="">Building Owner Name</label>
                            <input type="text" value={{$request->building_owner_name}} name="building_owner_name">
                        </div>
                        <div>
                            <label for="">Building Owner Contact Number</label>
                            <input type="text" value={{$request->building_owner_contact_number}} name="building_owner_contact_number">
                        </div>
                        </div>

                        <div class="form_row">
                            <div>
                                <label for="">No of contract year</label>
                                <input type="text" value={{$request->no_of_contract_year}} name="no_of_contract_year">
                            </div>
                            <div style="width: 25%;">
                                <x-input-label for="contract_year_from" :value="__('Contract Year From ')" />
                                <div class="calendar-wrapper">
                                    <input id="contract_year_from" class="calendar" type="date" name="contract_year_from" required autofocus value="{{ $request->contract_year_from ?? '' }}" />
                                </div>
                            </div>
                            
                            <div style="width: 25%;">
                                <x-input-label for="contract_year_to" :value="__('Contract year to ')" />
                                <div class="calendar-wrapper">
                                    <input id="contract_year_to" class="calendar" type="date" name="contract_year_to" required autofocus value="{{ $request->contract_year_to ?? '' }}" />
                                </div>
                            </div>
                            </div>



                            <div class="form_row">
                                <div>
                                    <label for="">Number Of Rooms in Building</label>
                                    <input type="text" value={{$request->number_of_rooms_in_building}} name="number_of_rooms_in_building">
                                </div>
                                <div style="width: 25%;">
                                    <x-input-label for="eb_number" :value="__('Eb Number')" />
                                        <input id="eb_number"  type="text" name="eb_number" required autofocus value="{{ $request->eb_number  }}" />
                                </div>
                                
                                <div style="width: 25%;">
                                    <x-input-label for="monthly_rent_of_building" :value="__('Monthly Rent Of Building ')" />
                                    
                                        <input id="monthly_rent_of_building"  type="text" name="monthly_rent_of_building" required autofocus value="{{ $request->monthly_rent_of_building }}" />
                                </div>
                                </div>



                                <div class="form_row">
                                    <div>
                                        <label for="">Advance Amount For Building</label>
                                        <input type="text" value={{$request->advance_amount_for_building}} name="advance_amount_for_building">
                                    </div>
                                    <div style="width: 25%;">
                                        <x-input-label for="due_in_advance_from_us_to_building_owner" :value="__('Due In Advance From Us To Building Owner')" />
                                            <input id="due_in_advance_from_us_to_building_owner"  type="text" name="due_in_advance_from_us_to_building_owner" required autofocus value="{{ $request->due_in_advance_from_us_to_building_owner  }}" />
                                    </div>
                                    
                                    <div style="width: 25%;">
                                        <x-input-label for="building_contact_number" :value="__('Building Contact Number ')" />
                                        
                                            <input id="building_contact_number"  type="text" name="building_contact_number" required autofocus value="{{ $request->building_contact_number }}" />
                                    </div>
                                    </div>
                    
                                    <div class="form_row">

                                        <div style="width: 25%;">
                                            <x-input-label for="date_for_pay_rent_to_owner" :value="__('Date for pay rent to owner')" />
                                            <div class="calendar-wrapper">
                                                <input id="date_for_pay_rent_to_owner" class="calendar" type="date" name="date_for_pay_rent_to_owner" required autofocus value="{{ $request->date_for_pay_rent_to_owner ?? '' }}" />
                                            </div>
                                        </div>
                                        <div style="width: 25%;">
                                        
                                        </div>
                                        
                                        <div style="width: 25%;">
                                           
                                        </div>
                                        </div>
                  
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>