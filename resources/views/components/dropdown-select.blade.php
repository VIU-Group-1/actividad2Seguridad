@props(['values' => [], 'text' => ''])

<select {!! $attributes->merge(['class' => 'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm appearance-none focus:outline-none focus:ring focus:border-blue-300 dark:focus:border-blue-600 transition duration-150 ease-in-out']) !!}>
    <option value="" disabled selected>{{$text}}</option>
    @foreach ($values as $code => $name)
        <option value="{{$code}}">{{$name}}</option>
    @endforeach
</select>
