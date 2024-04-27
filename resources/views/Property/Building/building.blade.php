<x-app-layout>
    <div class="">
        <div class="view_btn_container">
            <div class="">
                <x-nav-link :href="route('Property.Building.building_master_view')" class="view_link">
                    {{ __('View All building details') }}
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
                <!-- <form method="POST" action="{{ route('request_form_create') }}"> -->
                <form method="POST" action="{{ route('building_master_form_create') }}" style="margin-top: 30px;">
                    @csrf
                    <!-- Form Category -->
                    <div class="form_row">
                        <div>
                            <x-input-label for="building_name" :value="__('Building Name')" />
                            <x-text-input id="building_name" class="" type="text" name="building_name" required autofocus :value="old('building_name')" />

                            <x-input-error :messages="$errors->get('building_name')" />
                        </div>
                        <div>
                            <x-input-label for="building_no" :value="__('Building Number')" />
                            <x-text-input id="building_no" class="" type="text" name="building_no" required :value="old('building_no')" />
                            <x-input-error :messages="$errors->get('building_no')" />
                        </div>
                        <div>
                            <x-input-label for="building_street" :value="__('Building Street Name')" />
                            <x-text-input id="building_street" class="" type="text" name="building_street" required autofocus :value="old('building_street')" />
                            <x-input-error :messages="$errors->get('building_street')" />
                        </div>
                    </div>
                    <div class="form_row" style="margin-top: 10px;">
                        <div>
                            <x-input-label for="Area" :value="__('Area')" />
                            <select class="select" id="Area" name="area_name">
                                <option value="">Select Area</option>
                                @foreach($dropdownData as $item)
                                <option value="{{ $item->id }}" {{ old('area_name') == $item->id ? 'selected' : '' }}>{{ $item->area_name }}</option>
                                @endforeach
                            </select>

                            <x-input-error :messages="$errors->get('area_name')" />
                        </div>
                        <div>
                            <x-input-label for="building_owner_name" :value="__('Building Owner Name')" />
                            <x-text-input id="building_owner_name" class="" type="text" name="building_owner_name" required autofocus :value="old('building_owner_name')" />
                            <x-input-error :messages="$errors->get('building_owner_name')" />
                        </div>
                        <div>
                            <x-input-label for="building_owner_contact_number" :value="__('Building Owner Contact Number')" />
                            <x-text-input id="building_owner_contact_number" class="" type="text" name="building_owner_contact_number" required autofocus :value="old('building_owner_contact_number')" />
                            <x-input-error :messages="$errors->get('building_owner_contact_number')" />
                        </div>

                    </div>
                    <div class="form_row" style="margin-top: 10px; ">
                        <div>
                            <x-input-label for="no_of_contract_year" :value="__('No of Contract Year')" />
                            <x-text-input id="no_of_contract_year" class="" type="text" name="no_of_contract_year" required autofocus :value="old('no_of_contract_year')" />
                            <x-input-error :messages="$errors->get('no_of_contract_year')" />
                        </div>
                        <div style="width: 25%;">
                            <x-input-label for="contract_year_from" :value="__('Contract Year From ')" />
                            <div class="calendar-wrapper">
                                <input id="contract_year_from" class="calendar" type="date" name="contract_year_from" required autofocus :value="old('contract_year_from')" />
                            </div>
                            <x-input-error :messages="$errors->get('contract_year_from')" class="mt-2" />
                        </div>
                        <div style="width: 25%;">
                            <x-input-label for="contract_year_to" :value="__('Contract Year To ')" />
                            <div class="calendar-wrapper">
                                <input id="contract_year_to" class="calendar" type="date" name="contract_year_to" required autofocus :value="old('contract_year_to')" />
                            </div>
                            <x-input-error :messages="$errors->get('contract_year_to')" class="mt-2" />
                        </div>
                    </div>
                    <div class="form_row" style="margin-top: 10px; ">
                        <div>
                            <x-input-label for="number_of_rooms_in_building" :value="__('Number of Rooms In Building')" />
                            <x-text-input id="number_of_rooms_in_building" class="" type="text" name="number_of_rooms_in_building" required autofocus :value="old('number_of_rooms_in_building')" />
                            <x-input-error :messages="$errors->get('number_of_rooms_in_building')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="eb_number" :value="__('EB number')" />
                            <x-text-input id="eb_number" class="" type="text" name="eb_number" required autofocus :value="old('eb_number')" />
                            <x-input-error :messages="$errors->get('eb_number')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="monthly_rent_of_building" :value="__('Monthly Rent Of Building')" />
                            <x-text-input id="monthly_rent_of_building" class="" type="text" name="monthly_rent_of_building" required autofocus :value="old('monthly_rent_of_building')" />
                            <x-input-error :messages="$errors->get('monthly_rent_of_building')" />
                        </div>
                    </div>
                    <div class="form_row" style="margin-top: 10px; ">
                        <div>
                            <x-input-label for="advance_amount_for_building" :value="__('Advance Amount for Building')" />
                            <x-text-input id="advance_amount_for_building" class="" type="text" name="advance_amount_for_building" required autofocus :value="old('advance_amount_for_building')" />
                            <x-input-error :messages="$errors->get('advance_amount_for_building')" />
                        </div>
                        <div>
                            <x-input-label for="due_in_advance_from_us_to_building_owner" :value="__('Due in Advance from Us to Building owner')"  />
                            <x-text-input id="due_in_advance_from_us_to_building_owner" class="" type="text" name="due_in_advance_from_us_to_building_owner" required autofocus :value="old('due_in_advance_from_us_to_building_owner')"/>
                            <x-input-error :messages="$errors->get('due_in_advance_from_us_to_building_owner')" />
                        </div>
                        <div>
                            <x-input-label for="building_contact_number" :value="__('Building Contact Number')" />
                            <x-text-input id="building_contact_number" class="" type="text" name="building_contact_number" required autofocus :value="old('building_contact_number')" />
                            <x-input-error :messages="$errors->get('building_contact_number')" class="mt-2" />
                        </div>
                    </div>

                    <div class="form_row" style="margin-top: 10px; ">
                        <div style="width: 25%;">
                            <x-input-label for="date_for_pay_rent_to_owner" :value="__('Date for pay rent to owner ')" />
                            <div class="calendar-wrapper">
                                <input id="date_for_pay_rent_to_owner" class="calendar" type="date" name="date_for_pay_rent_to_owner" required autofocus :value="old('date_for_pay_rent_to_owner')">
                            </div>
                            <x-input-error :messages="$errors->get('date_for_pay_rent_to_owner')" class="mt-2" />
                        </div>

                    </div>
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