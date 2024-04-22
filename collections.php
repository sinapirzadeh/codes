<?php

use Illuminate\Support\Facades\Route;

Route::get('map', function () {
    $allINOne = collect(['sian', 'amir', 'ali', '', null])->map(fn($name) => strtoupper($name))
        ->reject(fn($name) => empty($name));

    dd($allINOne);
});



Route::get('macro', function () {
   Illuminate\Support\Collection::macro(name: 'toUpper', macro: function (string $str = '') {
       return $this->map(fn($name) => $str.strtoupper($name));
   });

   $names = collect(['sina', 'reza', 'amir', 'mahdi'])->toUpper(str: '#');

   dd($names);
});


Route::get('method/all', fn() => collect(['sina', 'amir', 'ali', 'reza'])->all());

Route::get('method/avg', fn() => collect([
    ['name' => 'sina', 'age' => 19],
    ['name' => 'reza', 'age' => 20],
    ['name' => 'amir', 'age' => 21],
])->avg('age'));

Route::get('method/chunk', fn() => collect(['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'])->chunk(2));

Route::get('method/combine', fn() => collect(['name', 'family', 'age', 'avg'])->combine(['sina', 'pirzadeh', 19, (2+2+2)/3]));

Route::get('method/concat', fn() => collect(['sina', 'pir'])->concat(['amir', 'ali']));

Route::get('method/count', fn() => collect(['sina', 1, 2, 3, 'amir', true])->count());

Route::get('method/countBy', fn() => collect(['sina', 'sina', 'amir', 'mahdi', 'sina'])->countBy());

