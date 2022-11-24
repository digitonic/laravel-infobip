<?php

use Illuminate\Support\Str;

dataset('strings', [[
    'domain' => Str::random(),
    'prefix' => Str::random(),
    'secret' => Str::random(),
]]);
