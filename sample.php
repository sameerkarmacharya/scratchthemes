

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>test</title>
  </head>
  <body>
    <form class="" action="action.php" method="post" enctype="multipart/form-data">
      <input type="file" name="flname[]" multiple>
      <button type="submit" name="button">Upload</button>
    </form>
  </body>
</html>

<?php
$photos = $request['flUploadPhotos'];
foreach ($photos as $photo) {
	$destination = public_path() . "/assets/img/photos";
	$fileName = $photo->getClientOriginalName();
	$uploadImages = $photo->move($destination, $fileName);
	if ($uploadImages) {
		Picture::insert([
			'buss_user_id' => Session::get('userId'),
			'img_path' => "/img/photos/" . $fileName,
		]);

	}
}
?>