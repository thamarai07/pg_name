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

                <h2>Form Request Details of <span style="text-decoration: underline; color: blue;"> {{$request->form_request_category}} </span>  Form</h2>
                <form method="POST" action="{{ route('requests_form_details_update.updateDetails', $request->id) }}">
                    @csrf
                    @method('PUT')
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Form Category</th>
                            <th>Form Field Name</th>
                        </tr>
                        <tr>
                            <td>{{ $request->id }}</td>
                            <td><input type="text" name="form_request_category" value="{{ $request->form_request_category }}"></td>
                            <td><input type="text" name="form_request_field_name" value="{{ $request->form_request_field_name }}"></td>
                        </tr>
                    </table>
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
