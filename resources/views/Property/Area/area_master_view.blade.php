<x-app-layout>
    <div class="">
        <div class="">
            <div class="">

               <table class="table-container">
                <tr>
                    <th>No</th>
                    <th>Area Name</th>
                    <th>Area Pincode</th>
                    <th>Action</th>
                    <th>Delete</th>
                </tr>
                @php
                    $counter = 1;
                @endphp
                @foreach ($requests as $request)
                <tr>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $request->area_name }}</td>
                    <td>{{ $request->area_pincode }}</td>
                    <td><a href="{{ route('area_master_details.Viewdetails', $request->id) }}">View</a></td>
                    <td>
                        <form method="POST" action="{{ route('area_master_details_delete.deleteDetails', $request->id) }}">
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
</x-app-layout>

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