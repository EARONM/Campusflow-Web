<h2>Buildings</h2>

<a href="{{ route('buildings.create') }}">
    Add Building
</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Campus</th>
        <th>Name</th>
    </tr>

    @foreach($buildings as $building)

        <tr>
            <td>{{ $building->id }}</td>

            <td>
                {{ $building->campus->name }}
            </td>

            <td>{{ $building->name }}</td>

        </tr>

    @endforeach

</table>