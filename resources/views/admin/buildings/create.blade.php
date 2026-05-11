<h2>Create Building</h2>

<form method="POST"
      action="{{ route('buildings.store') }}">

    @csrf

    <label>Campus</label>

    <select name="campus_id" required>

        @foreach($campuses as $campus)

            <option value="{{ $campus->id }}">
                {{ $campus->name }}
            </option>

        @endforeach

    </select>

    <br><br>

    <label>Building Name</label>

    <input
        type="text"
        name="name"
        required
    >

    <br><br>

    <br><br>

    <button type="submit">
        Save
    </button>

</form>