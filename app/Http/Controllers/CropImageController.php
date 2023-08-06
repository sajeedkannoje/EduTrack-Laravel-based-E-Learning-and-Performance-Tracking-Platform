<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CropImageController extends Controller
{
    public function __construct()
    {
    }

    public function cropImage($guard)
    {
        header('Content-Type: image/jpeg');

        $imgr = new imageResizing();

        if (request()->get('cp_img_path') != null) {
            $image = public_path("uploads/profile_image/{$guard}/".request()->get('cp_img_path')); // $_POST['cp_img_path'] = /assets/uploads/img_name.ext
            $imgr->load($image);

            $imgX = intval($_POST['ic_x']);
            $imgY = intval($_POST['ic_y']);
            $imgW = intval($_POST['ic_w']);
            $imgH = intval($_POST['ic_h']);

            $imgr->resize($imgW, $imgH, $imgX, $imgY);

            $imgr->save($image);
            $record = auth($guard)->user();
            $record->profile_image_path = request()->get('cp_img_path');
            $record->save();

            echo '<img src="'.auth()->user()->profileImage().'"
                 class="rounded-circle mr-50" alt="profile image" height="80"
                width="80" />
            <div class="media-body mt-75 ml-1 change-photo-btn-container">
                <input type="file" name="profile" class="d-none" accept="image/*" id="profile">
                <button type="button" class="btn btn-icon text-center" data-bs-toggle="modal" id="change-photo" data-bs-target="#modal_change_photo">
                    <i class="fi-br-camera"></i>
                </button>
            </div>';

            // echo '<img src="'. asset("uploads/profile_image/{$guard}/" . request()->get('cp_img_path') ) .'?t='.time().'"  class="rounded mr-50" alt="profile image" height="80"
            // width="80"/>';
        }

    }

    public function uploadImage(Request $request, $guard)
    {

        $id = Auth::guard($guard)->user()->id;
        $validator = Validator::make(
            $request->all(),
            ['file' => 'required|image|mimes:jpeg,png,jpg,png,ico|max:2048'],
            [
                'file.mimes' => 'Only jpg, jpeg, png files are allowed',
                'file.max' => 'Image size must be less than 2MB.',
            ]
        );

        if ($validator->fails()) {
            echo "<div class='text-left font-weight-bold'>You have following errors:</div>";
            echo "<div class='text-left text-danger'>";
            foreach ($validator->errors()->all() as $error) {
                echo '<p>'.$error.'</p>';
            }
            echo '</div>';
            exit;

            return response()->json([
                'success' => false,
                'error' => $validator->errors()->all(),
            ]);
        }

        $fileName = "{$guard}_".$id.'_'.time().'.'.$request->file('file')->getClientOriginalExtension();

        $request->file('file')->move(public_path('uploads/profile_image/'.$guard), $fileName);
        echo '<div style="height: 50vh;" class="cropping-image-wrap"><img data-filename="'.$fileName.'" src="'.asset("uploads/profile_image/{$guard}/".$fileName).'" class="img-thumbnail" id="crop_image"/></div>';
        exit;

    }
}

class imageResizing
{
    public $image;

    public $image_type;

    public $res;

    public function load($filename)
    {

        $image_info = getimagesize($filename);

        $this->image_type = $image_info[2];

        if ($this->image_type == IMAGETYPE_JPEG) {
            $this->image = imagecreatefromjpeg($filename);
            $this->res = '.jpg';
        } elseif ($this->image_type == IMAGETYPE_GIF) {
            $this->image = imagecreatefromgif($filename);
            $this->res = '.gif';
        } elseif ($this->image_type == IMAGETYPE_PNG) {
            $this->image = imagecreatefrompng($filename);
            $this->res = '.png';
        }
    }

    public function save($filename, $image_type = IMAGETYPE_JPEG, $compression = 100, $permissions = null)
    {

        if ($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image, $filename, $compression);
        } elseif ($image_type == IMAGETYPE_GIF) {
            imagegif($this->image, $filename);
        } elseif ($image_type == IMAGETYPE_PNG) {
            imagepng($this->image, $filename);
        }

        if ($permissions != null) {
            chmod($filename, $permissions);
        }
    }

    public function output($image_type = IMAGETYPE_JPEG)
    {

        if ($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image);
        } elseif ($image_type == IMAGETYPE_GIF) {
            imagegif($this->image);
        } elseif ($image_type == IMAGETYPE_PNG) {
            imagepng($this->image);
        }
    }

    public function getWidth()
    {
        return imagesx($this->image);
    }

    public function getHeight()
    {
        return imagesy($this->image);
    }

    public function resizeToHeight($height)
    {

        $ratio = $height / $this->getHeight();

        $width = $this->getWidth() * $ratio;

        $this->resize($width, $height);
    }

    public function resizeToWidth($width)
    {

        $ratio = $width / $this->getWidth();

        $height = $this->getheight() * $ratio;

        $this->resize($width, $height);
    }

    public function scale($scale)
    {

        $width = $this->getWidth() * $scale / 100;

        $height = $this->getheight() * $scale / 100;

        $this->resize($width, $height);
    }

    public function resize($width, $height, $x = 0, $y = 0)
    {

        $new_image = imagecreatetruecolor($width, $height);

        //imagecopyresampled($new_image, $this->image, $x, $y, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        imagecopy($new_image, $this->image, 0, 0, $x, $y, $width, $height);
        /*
       echo $x."<br/>";
       echo $y."<br/>";
       echo $width."<br/>";
       echo $height."<br/>";
       echo $this->getWidth()."<br/>";
       echo $this->getHeight();*/

        $this->image = $new_image;
    }
}
