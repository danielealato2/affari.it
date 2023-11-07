<form action="{{ route('set_language_locale', $lang) }}" method="POST">
    @csrf
    <button type="submit" class="bandiere" style="background-color: transparent:none;">
        <span class="flag-icon flag-icon-{{ $nation }}">

        </span>
    </button>

</form>
