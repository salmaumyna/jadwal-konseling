@props([
    'class' => null,
    'id' => null,
    'src' => null,
    'accept' => null,
    'name',
    'target',
])

<img src="{{ $src }}" class="w-100 mb-2 rounded" id="{{ $target }}">
<input 
    type="file" 
    name="{{ $name }}" 
    onchange="previewImageUpload(event, '{{ $target }}')" 
    class="{{ $class }}" 
    id="{{ $id }}"
    accept="{{ $accept }}"
>
