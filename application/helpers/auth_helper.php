<?php

function is_logged_in()
{
	$ci = get_instance();
	if (!$ci->session->userdata('username')) {
		redirect('auth');
	}
}

function dd($data)
{
	var_dump($data);
	die();
}
