@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'custom-gray border-0 border-b-4 border-black rounded focus:ring-0 focus:border-black bg-transparent']) !!}>
