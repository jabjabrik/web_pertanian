<?php

function upload_file($file_upload)
{
    $CI = get_instance();
    $image_type = pathinfo($_FILES[$file_upload]['name'], PATHINFO_EXTENSION);
    $id = sprintf("%04d", rand(0, 9999));

    $config['upload_path'] = "./uploads/";
    $config['file_name'] = "sppt_" . $id . "." . $image_type;
    $config['allowed_types'] = 'jpg|png|jpeg|webp';
    $config['max_size'] = 2048;

    $CI->load->library('upload', $config);

    if (!$CI->upload->do_upload($file_upload)) {
        var_dump($CI->upload->display_errors());
        die();
    } else {
        return $CI->upload->data()['file_name'];
    }
}

function set_alert($message, $color)
{
    $CI = get_instance();
    $params = array(
        'message' => $message,
        'color' => $color
    );
    $CI->session->set_flashdata('alert', $params);
}
