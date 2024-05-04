<x-app-layout>
    <div class="">
        <div class="">
            <div class="">
               <table class="table-container">
                    <tr>
                        <th>No</th>
                        <th>Building Name</th>
                        <th>Room Number</th>
                        <th>Slot Number</th>
                        <th>Rooms</th>
                        <th>Action</th>
                        <th>Delete</th>
                    </tr>
                    @php $counter = 1; @endphp
                    @foreach ($requests as $request)
                        <tr>
                            <td>{{ $counter++ }}</td>

                            @foreach ($buildings as $item)
                            @if ($item->id == $request->building_name)
                            <td>{{  $item->building_name }}</td>
                            @endif
                            @endforeach
                            <td>{{ $request->room_number }}</td>
                            
                            <td>{{ $request->slot_number }}</td>
                            <td style="background-color: {{ $request->occupied_status == 1 ? "#3333fe" : "#50c750" }}; color : white;text-align:center;">{{ $request->occupied_status == 1 ? "Occupied" : "Not Occupied" }}</td>

                            <td><a href="{{ route('room_master_details.Viewdetails', $request->id) }}">View</a></td>
                            <td>
                                <form method="POST" action="{{ route('building_master_details_delete.deleteDetails', $request->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $request->id }}">
                                    <button type="submit" onclick="confirmDelete()" class="detelebtn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
               <div class="pagination-links">
                   {{ $requests->links() }} <!-- Display pagination links -->
               </div>
            </div>
        </div>
    </div>
    <style>

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
    .pagination-links svg {
        padding: 0; /* Remove padding */
        border: none; /* Remove border */
        background-color: transparent; /* Make background transparent */
        color: #000; /* Set color to black */
        width: 40px;
    }

    .pagination-links .pagination .page-link:hover {
        color: #000; /* Change color on hover if needed */
    }
</style>
<script>
    function confirmDelete() {
        if (confirm('Are you sure you want to delete this request?')) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>
</x-app-layout>
