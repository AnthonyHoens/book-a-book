<?php

namespace App\Traits;

use Spatie\Image\Image;
use Spatie\Image\Manipulations;

trait CreatingImage {

    function saveUser($request)
    {
        $url = $request->user()->slug .'.'. $request->file('file')->extension();

        Image::load($request->file('file')->storePubliclyAs('/images/users/small/', $url))
            ->fit(Manipulations::FIT_CROP, 50,50)
            ->optimize()
            ->save();
        Image::load($request->file('file')->storePubliclyAs('/images/users/full/', $url))
            ->fit(Manipulations::FIT_CROP, 150,150)
            ->optimize()
            ->save();
    }

    function saveBook()
    {

    }
}
