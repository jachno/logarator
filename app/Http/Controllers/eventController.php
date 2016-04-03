<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as httpRequest;
//use Request;
use Illuminate\Support\Facades\Request;

use App\Http\Requests;

use \App\Events\EventName;
use \App\Events\Event;
use Response;

class eventController extends Controller
{
    
    
    public function fireEvent(httpRequest $request)
    {
     
     
     if(Request::IsJson())
     {
         
          $input = Request::json()->all();
     }
     else
     {
         $input =  $request->all();
     }
     
     
     

    
$error = '';
    if(empty($input['logFile']))
    {
           $error = 'logFile is missing or null';
    }
  
  
  
    if(empty($input['timeStamp']))
    {
           $error .= ' / timeStamp is missing or null';


    }
  
  
    if(empty($input['message']))
    {
           $error .= ' / message is missing or null';
    }
  
 
 
 

 if($error != '')
 {
  return   response($error,400);
 }


     event(new EventName($input));
    
 
    }

    
    
}
