<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;
use File;
use Log;

class Media extends Model
{   
    protected $table   = 'media';


    public function uploadImage($objUser,$file,$strType='profile',$isDefault=1){
        ini_set('memory_limit', '-1');
        $this->user_id              = $objUser->id;
        $this->picture_type         = $strType;
        $this->filename             = Self::generate().$file->getFilename().'.'.$file->guessClientExtension();
        $this->image_size           = $file->getClientSize();
        $this->IsDefault            = $isDefault;
        $this->created_by           = $objUser->id;
        $this->updated_by           = $objUser->id;
       
        Storage::disk('local')->put("images/".$this->filename, File::get($file));
        
        if(getimagesize(storage_path()."/app/images/".$this->filename)==false){
            Log::info('Image is not valid');
            return false;
        }
        $this->save();
        return true;
    }

    public static function generate($segments = 3, $chars = 5) {
        // Default tokens contain no "ambiguous" characters: 1,i,0,o
        $tokens = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
        $license_string = '';
        // Build Default License String
        for ($i = 0; $i < $segments; $i++) {
            $segment = '';
            for ($j = 0; $j < $chars; $j++) {
                $segment .= $tokens[rand(0, strlen($tokens)-1)];
            }
            $license_string .= $segment;
            if ($i < ($segments - 1)) {
                $license_string .= '-';
            }
        }
        return $license_string;
    }
}