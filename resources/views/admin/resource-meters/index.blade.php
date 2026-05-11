<h2>Resource Meters</h2>

<a href="{{ route('resource-meters.create') }}">
    Add Meter
</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Building</th>
        <th>Type</th>
        <th>Meter Code</th>
        <th>Location</th>
    </tr>

    @foreach($meters as $meter)

        <tr>

            <td>{{ $meter->id }}</td>

            <td>
                {{ $meter->building->name }}
            </td>

            <td>
                {{ $meter->resourceType->name }}
            </td>

            <td>
                {{ $meter->meter_code }}
            </td>

            <td>
                {{ $meter->location }}
            </td>

        </tr>

    @endforeach

</table>