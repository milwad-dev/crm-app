<select class="{{ $class }}" id="{{ $id }}" name="{{ $name }}" {{ $attributes }}>
    <option value="" selected>{{ $defaultText }}</option>
    {{ $slot }}
</select>
