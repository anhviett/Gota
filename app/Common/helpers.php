<?php
use App\Components\CategoriesRecursive;

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function getMenu($parent_id): string
{
    $data = \App\Models\Menu::all();
    $recursive = new CategoriesRecursive($data);
    return $recursive->categoriesRecursive($parent_id);
}

function getProductCategory($parent_id): string
{
    $data = \App\Models\ProductCategory::all();
    $recursive = new CategoriesRecursive($data);
    return $recursive->categoriesRecursive($parent_id);
}

function getPostCategory($parent_id): string
{
    $data = \App\Models\PostCategory::all();
    $recursive = new CategoriesRecursive($data);
    return $recursive->categoriesRecursive($parent_id);
}

function saveFile($file, $path)
{
    $base_path = public_path() . '/uploads/';
    $dir_name = $base_path . $path;
    if (!is_dir($dir_name)) {
        // Tạo thư mục của chúng tôi nếu nó không tồn tại
        mkdir($dir_name, 0755, true);
    }
    $file_name = $file->getClientOriginalName();
    $name = explode('.', $file_name);
    $file_name_insert = str_replace(end($name), '', $file_name) . end($name);
    $file->move(base_path() . '/public/uploads/' . $path, $file_name_insert);
    return $path . '/' . $file_name_insert;
}

function uploadFile($file, $path): string
{
    $base_folder = '/uploads/';

    //  Lấy tên file
    $name = explode('.', $file['name']);
    $file_name = explode('/', $file['name'])[count(explode('/', $file['name'])) - 1];
    $file_name_insert = str_replace(end($name), '', $file_name) . end($name);

    //  Lấy đường dẫn file
    $dir_name = $path . '/' . date('Y') . '/' . date('m') . '/' . date('d') ;

    //  Kiểm tra nếu mà folder chứa ảnh cho ngày hiện tại mà chưa có thì tạo mới
    if (!is_dir($base_folder . '/' . $dir_name)) {
        // Tạo thư mục của chúng tôi nếu nó không tồn tại
        mkdir($base_folder . '/' . $dir_name, 0755, true);
    }

    move_uploaded_file($file['tmp_name'], $base_folder . '/' . $dir_name . '/' . $file_name_insert);
    return $dir_name . '/' . $file_name_insert;
}
