<input class="hidden" type="radio" name="academy_id" id="{{ str_replace([' ', '/'], '', $academy->name) }}"
    value="{{ $academy->id }}">
<label role="button" for="{{ str_replace([' ', '/'], '', $academy->name) }}"
    class="w-32 h-24 mt-1 mr-1 text-center text-xs grid place-items-center font-semibold bg-white rounded-xl">
    {{ $academy->name }}
</label>
