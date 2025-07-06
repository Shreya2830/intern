@props(['disabled' => false])

<textarea @disabled($disabled) {{ $attributes->merge(
    ['class' => 'border-green-300 focus:border-green-700 focus:ring-green-700 rounded-md shadow-sm']) }}>
    {{ $slot }}
</textarea>
 
