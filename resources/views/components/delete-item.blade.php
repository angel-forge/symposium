<form method="POST" action="{{ $route }}">
    @method('delete')
    @csrf

    <a href="#"
       onclick="event.preventDefault(); this.closest('form').submit();"
       class="text-sm text-gray-700 underline">
        {{ $text }}
    </a>
</form>
