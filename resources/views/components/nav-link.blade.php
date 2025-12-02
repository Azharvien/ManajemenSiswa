@props(['active'=>false])

<a {{ $attributes->merge(['class' => $active ? 'text-teal-500 font-bold' : 'text-gray-500 transition hover:text-teal-500']) }}>{{ $slot }}</a>