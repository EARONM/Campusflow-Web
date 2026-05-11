<h2>Create Resource Type</h2>

<form method="POST"
      action="{{ route('resource-types.store') }}">

    @csrf

    <label>Type Name</label>

    <input
        type="text"
        name="name"
        required
    >

    <br><br>

    <button type="submit">
        Save
    </button>

</form>