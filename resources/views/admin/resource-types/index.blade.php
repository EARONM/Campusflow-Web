<h2>Resource Types</h2>

<a href="{{ route('resource-types.create') }}">
    Add Resource Type
</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>

    @foreach($types as $type)

        <tr>

            <td>{{ $type->id }}</td>

            <td>{{ $type->name }}</td>

        </tr>

    @endforeach

</table>