<?php

class ImageController extends BaseController {

//	public $restful = true;

	
	public function getIndex()
	{
		//Let's load the form view
		return View::make('tpl.index');
	}

	
public function getprofileImage()
	{
		//Let's load the form view
		return View::make('tpl.index');
	}



public function profileImage($id)
	{	
		
		//validate profile image
		$validation = Validator::make(Input::all(), Photo::$upload_rules);

		if($validation->fails()) {
			return Redirect::to('upload/users/' . $id)
				->withInput()
				->withErrors($validation)
				->with('error', 'Could not validate');
		} else {
			//image is uploaded
			$image = Input::file('image');

			//original client name of image
			$filename = $image->getClientOriginalName();
			$filename = pathinfo($filename, PATHINFO_FILENAME);

			//Salt and make url friendly
			$fullname = Str::slug(Str::random(8).$filename).'.'.
			$image->getClientOriginalExtension();

			$upload = $image->move('public/'. Config::get('image.upload_folder'),$fullname);
			
			Image::make('public/' . Config::get('image.upload_folder').'/'.$fullname)
				->resize(Config::get('image.thumb_width'), null, true)
				->save('public/' . Config::get('image.thumb_folder').'/'.$fullname);


			if($upload) {
				$info = array(
					'image' => $fullname
					);
				$pictureTo = User::find($id);
				$pictureTo->update(array('image'=>$fullname));

				//Now we redirect to the image's permalink
				return Redirect::to(URL::to('users/'.$id))
					->with('success','Your image is uploaded successfully!');
			} else {
				//image cannot be uploaded
				return Redirect::to('upload/users/' . $id)
					->withInput()
					->with('error','Sorry, the image could not be uploaded, please try again later');
			}
		}
	}
}