<select
     {!! $attributes->merge(['class' => 'mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-gray-300']) !!}>

    {{$slot}}
</select>
