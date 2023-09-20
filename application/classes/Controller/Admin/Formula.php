<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Admin_Formula extends Controller {
 
    public function action_index()
    {
	if ($this->request->method() == Request::POST)
	{
	    $data = Arr::extract($_POST, array('text', 'size', 'color', 'library'));
	}
	$formula = ORM::factory('Formula');
	
	$f = Formula::factory($data['text'], 90+30*$data['size'], $data['color']);
	//$f = Formula::factory($formulaText, array($data['size'], $size->size), array($data['color'], $color->color));
	
        $this->response->body($f->render());
	//$data['text'] = addslashes($data['text']);
	//$this->response->body($data['text']);
    }
    /*
    public function action_render()
    {
	if ($this->request->method() == Request::POST)
	{
	    $data = Arr::extract($_POST, array('text', 'size', 'color', 'library'));
	}
	
	$formulaText = preg_replace('/\s+/', ' ', $data['text']);
	$formulaHash = sha1($formulaText);
	$formula = ORM::factory('Formula')->where('hash', '=', $formulaHash)->find();
	
	
	
	//$formulaColor = ORM::factory('Formulacolor');
	//$formulaSize = ORM::factory('Formulasize');
	 
	 
	$color = ORM::factory('Formulacolor', $data['color']);
	$size = ORM::factory('Formulasize', $data['size']);
	$formula->values(
		array(
		    'text' => $formulaText,
		    'hash' => $formulaHash,
		    'library' => $data['library']
		));
	
	try {
	    $formula->save();
	    
	    $formulaColor = $formula->colors->where('color_id', '=', $data['color'])->find();

	    if (!$formulaColor->loaded())
	    {
		$formula->add('colors', $data['color']);
	    }
	    
	    $formulaSize = $formula->sizes->where('size_id', '=', $data['size'])->find();
	    if (!$formulaSize->loaded())
	    {
		$formula->add('sizes', $data['size']);
	    }
	}
	catch (ORM_Validation_Exception $e) {
	    $errors = $e->errors('validation');
	}
	$f = Formula::factory($formulaText, $size->size, $color->color);
	
        $this->response->body($f->render());
    }*/
    public function action_render()
    {
	if ($this->request->method() == Request::POST)
	{
	    $data = Arr::extract($_POST, array('text', 'size', 'color', 'library'));
	}
	
	$formulaText = trim(preg_replace('/\s+/', ' ', $data['text']));
	$formulaHash = sha1($formulaText);
	$formula = ORM::factory('Formula')->where('hash', '=', $formulaHash)->find();
	
	$formulaColor = $formula->colors->where('color_id', '=', $data['color'])->find();
	$formulaSize = $formula->sizes->where('size_id', '=', $data['size'])->find();
	
	$color = ORM::factory('Formulacolor', $data['color']);
	$size = ORM::factory('Formulasize', $data['size']);
	
	$f = Formula::factory($formulaText, array($data['size'], $size->size), array($data['color'], $color->color));
	
	if ($formula->loaded() && $formulaColor->loaded() && $formulaSize->loaded())
	{
        //echo $data['size'];
	    $this->response->body(
		    $f->get_html('/uploads/formulas/'.$formulaHash.'.'.$data['size'].'.'.$data['color'].'.png', $formulaText)
		);
	}
	else
	{
	    $formula->values(
		    array(
			'text' => $formulaText,
			'hash' => $formulaHash,
			'library' => $data['library']
		    ));

	    try {
		$formula->save();

		if (!$formulaColor->loaded())
		{
		    $formula->add('colors', $data['color']);
		}

		if (!$formulaSize->loaded())
		{
		    $formula->add('sizes', $data['size']);
		}
	    }
	    catch (ORM_Validation_Exception $e) {
		$errors = $e->errors('validation');
	    }
	    $this->response->body($f->render());
	}
    }
    
    public function action_delete()
    {
	$id = (int) $this->request->param('id');
	
	//!!TODO: handle removing physical
	$formula = ORM::factory('Formula')->where('id', '=', $id)->find();
	if ($formula->loaded())
	{
	    $formula->remove('colors');
	    $formula->remove('sizes');
	    /*
	    var_dump($formula->as_array());
	    var_dump($formula->colors->where('formula_id', '=', $id)->find()->as_array());
	   //var_dump($formula->sizes->as_array());
	     */
	    /*
	    foreach($formula->colors->find_all() as $color)
	    {
		$color->delete();
	    }
	    foreach($formula->sizes->find_all() as $size)
	    {
		$size->delete();
	    }
	     */
	    $formula->delete();
	     
	}
    }
    
}
