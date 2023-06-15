<?php

function save_base64_to_webp($images)
{
    $links = [];
    foreach ($images as $image) {
        $data_string = explode(',', $image)[1];
        $data = base64_decode($data_string);
        $decoded_image = imagecreatefromstring($data);
        $link = 'products-images/' . Str::random(15) . '.webp';

        if (!file_exists(storage_path('app/products-images'))) {
            mkdir(storage_path('app/products-images'));
        }
        imagewebp($decoded_image, storage_path('app/products-images/' . $link), 75);
        array_push($links, $link);
    }
    return $links;
}
