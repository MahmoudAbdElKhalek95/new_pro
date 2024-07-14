<?php

require_once ((__DIR__ . '/../'.'arabic/Arabic.php'));

use App\Models\User;
use App\Models\Manager;
use App\Models\Trainer;

use App\Models\QuestionType;
use App\Models\ProjectManager;
use App\Models\TraingingTrainers;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;


function role_access(  )
{

   $role =  auth()->user()->roles()->first() ;
   return $role->access ;

}

function shipping_price( $total_quantity  )
{

     $shiping_price =  \App\Models\Shiping::where('quantity_from' , '<=' ,  $total_quantity )->where('quantity_to' , '>=' , $total_quantity ) ->first() ;
   
     if( $shiping_price )
     {
        return $shiping_price ->price ;

     }else{
          return null  ;

     }

}



 function upload(UploadedFile $file, $folder)
{


//    $date_path = date("Y") . '/' . date("m") . '/' . date("d") . '/';
    $path = public_path() . '/files/uploads/' . $folder . '/' ;

    if (!File::exists($path)) {
        File::makeDirectory($path, 0777, true);
    }


    $file_name = date('YmdHis') . mt_rand() . '_' . $folder . '.' . $file->getClientOriginalExtension();

    if ($file->move($path, $file_name)) {
        return $img = '/files/uploads/' . $folder . '/' . $file_name;
    }
}



 function print_certifcate_status( $training_id )
{


   // return  $training_id  ;
    if(  auth()->user()->role_id == 4   )
    {

      $trainer = Trainer :: where('user_id' , auth()->id() ) ->first() ;
      $trainer_id = $trainer->id ;
      $data = TraingingTrainers ::where('training_id' , $training_id )
                 ->where('trainer_id' , $trainer_id )
                 ->whereIn('status' , [ 'accepted' , 'completed' ] )
                 ->first()  ;

                 //return $data ;

      if(    $data   )
      {
             return 1 ;
      }else{
              return 0 ;

      }

    }

}


/**
 * This function to Delete file from director
 * @param $file_name
 * @return bool
 */
 function deleteFile($file_name)
{
    $file_path = public_path() . $file_name;
    if (File::exists($file_path)) {
        File::delete($file_path);
    }
    return true;
}




function sendResponse($message,$data,$status = null){
    empty($status) ? $status = 200 : $status;
    return response()->json([
        "status" => true,
        "message" => $message,
        "data"    => $data,
    ],$status);
}
/**
* [sendError description]
* @param  [string] $message [message error]
* @return [array]          [errors]
*/
function sendError($message,$status = null){
    empty($status) ? $status = 400 : $status;
    return response()->json([
        "status" => false,
        "message" => $message,
    ],$status);
}


function UploadImages($dir, $image)
{
    $saveImage = '';
    if (! File::exists(public_path('uploads').'/' . $dir)) { // if file or fiolder not exists

        File::makeDirectory(public_path('uploads') . '/' . $dir, 0775, true); // create the dir or the
    }
    if (File::isFile($image)) {
        $name       = $image->getClientOriginalName(); // get image name
        $extension  = $image->getClientOriginalExtension(); // get image extension
        $sha1       = sha1($name); // hash the image name
        $fileName   = rand(1, 1000000) . "_" . date("y-m-d-h-i-s") . "_" . $sha1 . "." . $extension; // create new name for the image
        // get the image realpath
        $uploadedImage = Image::make($image->getRealPath());
        $uploadedImage->save(public_path('uploads/' . $dir . '/' . $fileName), '100'); // save the image
        $saveImage = $dir . '/' . $fileName; // get the name of the image and the dir that uploaded in
    }
    return $saveImage;
}

/**
* [Gender]
*/
function gender($value)
{
    if ($value == "1") {
        return "Male";
    }else{
        return "Female";
    }
}

/*
    Load XML Blockly
 */
function loadXML($dir){
    $full_dir = $dir."/*";
    $array = [];
    foreach(glob($full_dir) as $file)
    {
        if(!is_dir($file)) {
            $full_file = file_get_contents($dir."/".basename($file));
            $array[] = [
                 "name"    => basename($file),
                 "details" => str_replace('\"', '', $full_file)
             ];
        }
    }
    return $array;
}
function loadXMLFile($dir,$file){
    $full_dir = $dir."/*";
    $array = [];
        if(!is_dir($file)) {
            $full_file = file_get_contents($dir."/".basename($file));
            $array[] = [
                 "name"    => basename($file),
                 "details" => str_replace('\"', '', $full_file)
             ];
        }
    return $array;
}

/*
    XML Format
*/
function formatXmlString($xml) {

    // add marker linefeeds to aid the pretty-tokeniser (adds a linefeed between all tag-end boundaries)
    $xml = preg_replace('/(>)(<)(\/*)/', "$1\n$2$3", $xml);

    // now indent the tags
    $token      = strtok($xml, "\n");
    $result     = ''; // holds formatted version as it is built
    $pad        = 0; // initial indent
    $matches    = array(); // returns from preg_matches()

    // scan each line and adjust indent based on opening/closing tags
    while ($token !== false) :

      // test for the various tag states

      // 1. open and closing tags on same line - no change
      if (preg_match('/.+<\/\w[^>]*>$/', $token, $matches)) :
        $indent=0;
      // 2. closing tag - outdent now
      elseif (preg_match('/^<\/\w/', $token, $matches)) :
        $pad--;
      // 3. opening tag - don't pad this one, only subsequent tags
      elseif (preg_match('/^<\w[^>]*[^\/]>.*$/', $token, $matches)) :
        $indent=1;
      // 4. no indentation needed
      else :
        $indent = 0;
      endif;

      // pad the line with the required number of leading spaces
      $line    = str_pad($token, strlen($token)+$pad, ' ', STR_PAD_LEFT);
      $result .= $line . "\n"; // add to the cumulative result, with linefeed
      $token   = strtok("\n"); // get the next token
      $pad    += $indent; // update the pad size for subsequent lines
    endwhile;

    return $result;
  }


  function arabic_utf8($string)
{
    global $Arabic;
    if($Arabic == null)
        $Arabic = new I18N_Arabic('Glyphs');
     //   $Arabic = new I18N_Arabic('Glyphs');


    return $Arabic->utf8Glyphs($string);
}


function arabic_w2e($str)
{
    $arabic_eastern = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
    $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    return str_replace($arabic_western, $arabic_eastern, $str);
}






function auth_survay_questions()
{


  $role =  auth()->user()->role_id ;

        switch ($role) {
            case 1 :

                 $question_types =   QuestionType ::pluck('id');
                break;
                case 2 :
                    $question_types =   QuestionType :: where('type' , 'manager' ) ->pluck('id');
                   break;
              case 3 :
                 $question_types =   QuestionType :: where('type' , 'company' ) ->pluck('id');
                 break;
              case 4 :
                 $question_types =   QuestionType :: where('type' , 'trainer' ) ->pluck('id');
                 break;
              case 5 :
                $question_types =   QuestionType :: where('type' , 'student' ) ->pluck('id');
                 break;


        }

        return  $question_types ;
}


function project_manager_city_id()
{


    $user = User::find( auth()->id() ) ;
    $city_id = null ;
    $manager = Manager::where('user_id' , $user->id )->first();
    if(  $manager  )
    {

        $city_id = $manager->city_id ;

    }else{

     $ProjectManager   =  ProjectManager::where('user_id' ,  $user->id )->first() ;

     if( $ProjectManager )
     {

        $city_id = $ProjectManager->city_id ;
     }

    }

    return $city_id ;

}
