<?php
class templates
{
    var $templates = array();
    function set($name, $value)
    {
        $this->templates[$name] = $value;
    }
    function load($tmp   =  ' ',  $view =  ' ', $view_data =  array(),  $return  =   FALSE)
    {
        $this->CI = &get_instance();

        $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
        return $this->CI->load->view($tmp, $this->templates, $return);
    }
}