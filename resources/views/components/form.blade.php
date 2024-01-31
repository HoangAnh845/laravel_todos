<!-- /resources/views/components/form/index.blade.php -->

@props([
    'method' => 'POST',
    'action',
])

<form
    method="{{ $method }}"
    action="{{ $action }}"
    {{ $attributes->except(['method', 'action']) }}
>
    @csrf
    {{ $slot }}
</form>