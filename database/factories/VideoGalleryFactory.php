<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\VideoGallery;
use Faker\Generator as Faker;

$factory->define(VideoGallery::class, function (Faker $faker) {
    return [
        'sourceCode'=>"   <div id=\"87239543224\" class=\"col-5 \">
            <script type=\"text/JavaScript\"
                    src=\"https://www.aparat.com/embed/sxX7Q?data[rnddiv]=87239543224&data[responsive]=yes\"></script>
        </div>",
        'name'=>"test"
    ];
});
