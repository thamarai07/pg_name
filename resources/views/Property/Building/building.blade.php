<x-app-layout>
    <div class="">
        <div class="view_btn_container">
            <div class="">
                <x-nav-link :href="route('Property.Area.area_master_view')" class="view_link">
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
                <form method="POST" action="{{ route('area_master_form_create') }}" style="margin-top: 30px;">
                    @csrf
                    <!-- Form Category -->
                    <div class="form_row">
                        <div>
                            <x-input-label for="building_name" :value="__('Building Name')" />
                            <x-text-input id="building_name" class="" type="text" name="area_name" value="" required autofocus />
                            <x-input-error :messages="$errors->get('building_name')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="building_no" :value="__('Building Number')" />
                            <x-text-input id="building_no" class="" type="text" name="building_no" required />
                            <x-input-error :messages="$errors->get('building_no')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="building_street" :value="__('Building Street Name')" />
                            <x-text-input id="building_street" class="" type="text" name="building_street" value="" required autofocus />
                            <x-input-error :messages="$errors->get('building_street')" class="mt-2" />
                        </div>
                    </div>
                    <div class="form_row" style="margin-top: 10px;">
                        <div>
                            <x-input-label for="Area" :value="__('Area')" />
                            <select name="dropdown" class="select" id="Area" name="area_name">
                                <option value="">Select Area</option>
                                @foreach($dropdownData as $item)
                                <option value="{{ $item->id }}">{{ $item->area_name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('area_name')" class="mt-2" />
                        </div>
                    </div>
                    <!-- <div class="form_row" style="margin-top: 10px;">
                        <div>
                            <x-input-label for="building_street_name" :value="__('Building Street Name')" />
                            <x-text-input id="building_street_name" class="" type="text" name="building_street_name" required />
                            <x-input-error :messages="$errors->get('building_street_name')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="building_street_name" :value="__('Building Street Name')" />
                            <x-text-input id="building_street_name" class="" type="text" name="building_street_name" required />
                            <x-input-error :messages="$errors->get('building_street_name')" class="mt-2" />
                        </div>
                    </div> -->
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