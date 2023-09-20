<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Admin_Image extends Controller {
 
    public function action_index()
    {
        $this->response->body('hello');
    }
 
    public function action_upload()
    {
        //$view = View::factory('avatar/upload');
        $error_message = NULL;
        $filename = NULL;
 
        if ($this->request->method() == Request::POST)
        {
            if (isset($_FILES['image']))
            {
                $filename = $this->_save_image($_FILES['image']);
            }
        }
 
        if ( ! $filename)
        {
            $error_message = 'There was a problem while uploading the image.
                Make sure it is uploaded and must be JPG/PNG/GIF file.';
        }
	
	$src = 'uploads/images/'.$filename;
	$alt = 'some alt test';
	
	$response = View::factory('admin/image/v_image_return')
		->bind('src', $src)
		->bind('alt', $alt);
 /*
        $view->uploaded_file = $filename;
        $view->error_message = $error_message;
  * */
	
        //$this->response->body($filename.' '.$error_message.' '.APPPATH.' '.MODPATH." ".SYSPATH);
	$this->response->body($response);
    }
 
    protected function _save_image($image)
    {
        if (
            ! Upload::valid($image) OR
            ! Upload::not_empty($image) OR
            ! Upload::type($image, array('jpg', 'jpeg', 'png', 'gif')))
        {
            return FALSE;
        }
 
        $directory = DOCROOT.'uploads/images/';
	$filename = strtolower(Text::random('alnum', 20)).'.'.pathinfo($image['name'], PATHINFO_EXTENSION);
 
        if ($file = Upload::save($image, $filename, $directory))
        {
            return $filename;
        }
 
        return FALSE;
    }
 
}