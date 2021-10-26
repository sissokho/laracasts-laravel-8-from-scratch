@props(['active'])

<a {{ $attributes->class(['bg-blue-500 text-white' => $active])
                ->merge(['class' => 'block text-left px-3 text-sm leading-6
                                    hover:bg-blue-500 focus:bg-blue-500
                                    hover:text-white focus:text-white']) }}>
    {{ $slot }}
</a>
