<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Error extends Controller_Template {
    public $template = 'errors/index'; 
  public function before()
  {
    parent::before();
    // Internal request only!
    if (Request::$initial !== Request::$current)
    {
      if ($message = rawurldecode($this->request->param('message')))
      {
        $this->template->message = $message;
      }
    }
    else
    {
      $this->request->action(404);
    }
    $this->response->status((int) $this->request->action());
  }

  public function action_404()
  {
    $this->template->title = 'Not Found 404';
    $this->template->content = View::factory('errors/404' );
  }

  public function action_403()
  {
    $this->template->title = 'Permissin denied';
    $this->template->content = View::factory('errors/403' );
  }
  
  public function action_500()
  {
    $this->template->title = 'Internal Server Error';
    $this->template->content = View::factory('errors/500' );
  }

  public function action_503()
  {
    $this->template->title = 'Maintenance Mode';
    $this->template->content = View::factory('errors/503' );
  }

}
