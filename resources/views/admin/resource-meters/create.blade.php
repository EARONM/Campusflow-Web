<h2>Create Resource Meter</h2>

<form method="POST"
      action="{{ route('resource-meters.store') }}">

    @csrf

    <label>Building</label>

    <select
        name="building_id"
        required>

        @foreach($buildings as $building)

            <option value="{{ $building->id }}">
                {{ $building->name }}
            </option>

        @endforeach

    </select>

    <br><br>

    <label>Resource Type</label>

    <select
        name="resource_type_id"
        required>

        @foreach($types as $type)

            <option value="{{ $type->id }}">
                {{ $type->name }}
            </option>

        @endforeach

    </select>

    <br><br>

    <label>Meter Code</label>

    <input
        type="text"
        name="meter_code"
        required>

    <br><br>

    <label>Location</label>

    <input
        type="text"
        name="location"
        required>

    <br><br>

    <label>Minimum Threshold</label>

    <input
        type="number"
        step="0.01"
        name="min_threshold">

    <br><br>

    <label>Maximum Threshold</label>

    <input
        type="number"
        step="0.01"
        name="max_threshold">

    <br><br>

    <button type="submit">
        Save
    </button>

</form>