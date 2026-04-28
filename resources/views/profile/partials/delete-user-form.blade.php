<section>

<form method="post" action="{{ route('profile.destroy') }}"
      onsubmit="return confirm('Delete your account permanently?')">

    @csrf
    @method('delete')

    <button type="submit"
        class="px-6 py-3 bg-red-600 text-white rounded-xl hover:bg-red-700 transition">
        Delete Account
    </button>

</form>

</section>