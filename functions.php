function recurcia($count_img, $index_day, $images){
    if ($count_img < $index_day) {
        return recurcia($count_img, $index_day - $count_img, $images);
    }
    else {
        $part_url = explode('astra-child', $images[$index_day]);
        $current_img = '<img src="' . get_stylesheet_directory_uri() . $part_url[1]. '">';
        // var_dump($current_img);die();
        return $current_img;
    }
}

add_shortcode( 'slide_image', 'slide_image_func' );
function slide_image_func() {
    $base_dir = trailingslashit(get_stylesheet_directory());
    $dir      = 'img/';
    $images   = glob($base_dir.$dir.'*.jpg');
    $count    = count($images);
    $current_index_day = date('z');
//    var_dump($current_index_day = date('z'));
//    foreach($images as $key => $image) {
//        var_dump($key);
//        rename($image, $base_dir.$dir.$key.'.jpg');
//    }
    return recurcia($count, $current_index_day, $images);
    // var_dump(get_stylesheet_directory(), get_stylesheet_directory_uri()); die();
}
