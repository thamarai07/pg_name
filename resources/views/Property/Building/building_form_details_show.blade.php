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

                <h2>Form Request Details of <span style="text-decoration: underline; color: blue;"> {{$request->area_name}} </span> Form</h2>
                <!-- <form method="POST" action="{{ route('requests_form_details_update.updateDetails', $request->id) }}"> -->
                <form method="POST" action="{{ route('area_master_form_details_update.updateDetails', $request->id) }}">
                    @csrf
                    @method('PUT')
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Building Name</th>
                            <th>Area Name</th>
                            <th>Owner Name</th>
                            <th>Rooms</th>
                            <th>Action</th>
                            <th>Delete</th>
                        </tr>
                        <tr>
                            <td>{{ $request->id }}</td>
                            <td><input type="text" name="area_name" value="{{ $request->area_name }}"></td>
                            <td><input type="text" name="area_pincode" value="{{ $request->area_pincode }}"></td>
                        </tr>
                    </table>
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>