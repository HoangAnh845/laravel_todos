@aware([
'error',
])

@props([
'value',
'name',
'for',
])

<input 
{{ $attributes->class([ 
        'border-rose-600' => $error
    ]) }} @isset($name) name="{{ $name }}" @endif @isset($value) value="{{ $value }}" @endif {{ $attributes }} />