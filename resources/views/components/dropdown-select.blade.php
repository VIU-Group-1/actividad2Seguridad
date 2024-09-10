@props(['values' => [], 'text' => ''])

<select {!! $attributes->merge(['class' => 'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out']) !!}>
    <option value="" disabled selected>{{$text}}</option>
    @foreach ($values as $code => $name)
        <option value="{{$code}}">{{$name}}</option>
    @endforeach
</select>
