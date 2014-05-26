<?php
class AnnotateController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Annotate Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'AnnotateController@showWelcome');
	|
	*/

   public function getIndex()
   {
		return View::make('annotate');
   }

	public function postSave()
	{
		$img = Input::get('img');
		$crops = Input::get('scraps');

		$annotation = Annotation::firstOrNew(array('img' => $img));
		$annotation->points = json_encode($crops);

		$ret = $annotation->save();

		return (int)$ret;
	}
}
