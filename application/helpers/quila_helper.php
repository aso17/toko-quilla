<?php

function ceklog()
{
    $ci = get_instance();
    $login = $ci->session->userdata('id_user');
    if ($login == null) {
        redirect('loginPortal');
    }
}
function cek_log()
{
    $ci = get_instance();
    $login1 = $ci->session->userdata('id_user');
    if ($login1) {
        redirect('dashboard');
    }
}