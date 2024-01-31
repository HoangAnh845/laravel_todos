@props([
'label',
'for',
'errors'
])

<label for="{{ $for }}">
    <span {{ $attributes->class(['block']) }}>{{ $label ?? '' }}</span>
    <div class="mt-1">
        {{ $slot }}
    </div>

    {{--
        @error("{{ $for }}")
    <div class="alert alert-danger text-rose-500 mt-2 text-xs">{{ $message }}</div>
    @enderror
    --}}
</label>