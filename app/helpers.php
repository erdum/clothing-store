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
        imagewebp($decoded_image, storage_path('app/' . $link), 75);
        array_push($links, $link);
    }
    return $links;
}

function save_img_to_webp($image, $extension)
{
    $decoded_image = null;
    if ($extension == 'webp') {
        $decoded_image = imagecreatefromwebp($image);
    } elseif ($extension == 'jpeg' || $extension == 'jpg') {
        $decoded_image = imagecreatefromjpeg($image);
    } elseif ($extension == 'gif') {
        $decoded_image = imagecreatefromgif($image);
    } elseif ($extension == 'png') {
        $decoded_image = imagecreatefrompng($image);
    }
    
    if ($decoded_image == null) return response()->json(['message' => 'File type not supported'], 422);

    if (!file_exists(storage_path('app/site-logos'))) {
        mkdir(storage_path('app/site-logos'));
    }
    $link = 'site-logos/' . Str::random(15) . '.webp';
    
    imagewebp($decoded_image, storage_path('app/' . $link), 75);

    return $link;
}
