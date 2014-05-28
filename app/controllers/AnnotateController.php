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

   protected $crop_img_dir = '/crop-img/stash/';

   public function getIndex()
   {
		return View::make('annotate');
   }

	public function postSave()
	{
		$img = Input::get('img');
		$crops = Input::get('scraps');

		// ファイル移動してから、保存かける
		$fileMan = App::make('MyFileManager');

		$img_path = $fileMan->croppedImageProcess($this->crop_img_dir, $img, "../watched/");

		$annotation = Annotation::firstOrNew(array('img' => $img_path));
		$annotation->points = json_encode($crops);

		$ret = $annotation->save();

		return (int)$ret;
	}

	public function postRemove()
	{
		$img = Input::get('img');

		// ファイル移動してから、保存かける
		$fileMan = App::make('MyFileManager');
		$img_path = $fileMan->croppedImageProcess($this->crop_img_dir, $img, "../destroy/");

		return (int)$ret;
	}

	public function getImg()
	{
		$ret = array();

		$dir_path = public_path() . $this->crop_img_dir;
		$handle = opendir($dir_path);

		while (false !== ($entry = readdir($handle))) {
			// 拡張子でフィルタ
			if(!preg_match('/\.jpg|\.gif|\.jpeg|\.png/', $entry, $match)) continue;
			$file_path = $dir_path . $entry;

			// 1->gif, 2->jpeg, 3->png, 0->another
			if(exif_imagetype($file_path) > 0) {
				$ret['img'] = $this->crop_img_dir.$entry;
				break;
			}
		}

		// TODO: 画像のパスがついてきたら、crop情報を付与する
		//
		return json_encode($ret);
	}
}

class MyFileManager {
	public function __construct() {
	}

	public function croppedImageProcess($crop_img_dir, $img, $moved_dir) {

		$old = public_path() . $img;
		$new = public_path() . $crop_img_dir . $moved_dir . basename($img);

		if (file_exists($old)) {
			rename($old, $new);
		}

		$new_path = '/crop-img/watched/' . basename($img);

		return $new_path;
	}
}
