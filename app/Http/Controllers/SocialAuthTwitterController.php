<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Socialite;
use TwitterStreamingApi;
use Twitter;
use Mail;


class SocialAuthTwitterController extends Controller
{
  /**
   * Create a redirect method to twitter api.
   *
   * @return void
   */
    public function redirect()
    {
        return Socialite::driver('twitter')->redirect();
//         // return 'working';

//         // return Socialite::with('twitter')->redirect();

//         // to turn off stateless
// // return Socialite::with('twitter')->stateless(false)->redirect();

// // to use stateless
// return Socialite::with('twitter')->stateless()->redirect();
    }
    /**
     * Return a callback method from twitter api.
     *
     * @return callback URL from twitter
     */
    public function callback()
    {
       
    }


    public function tweets(){


  return Twitter::getUserTimeline(['screen_name' => 'sudheerpal2', 'count' => 2, 'format' => 'json']);



      // return 'working';

// TwitterStreamingApi::userStream()
// ->onEvent(function(array $event) {
//     if ($event['event'] === 'favorite') {
//         echo "Our tweet {$event['target_object']['text']} got favorited by {$event['source']['screen_name']}";
//     }
// })
// ->startListening();




    }


    public function email(){

$data1= Twitter::getUserTimeline(['screen_name' => 'sudheerpal2', 'count' => 2, 'format' => 'array']);
// return $data1[0];
// return response()->json([
//             'token' => $data[0]
//         ], 201);
        // sending email 




// sending email 
        $data = array( 'email' => 'sudheerpal2@gmail.com', 'first_name' => 'sudheer', 'subject' =>'Tweet Alert');

        Mail::send( 'sendemail', $data, function( $message ) use ($data)
        {
            $message->to( $data['email'] )->subject( $data['subject'] );
        });



  return response()->json(['message' => 'Request completed']);



        // $data = array( 'email' => 'sudheerpal2@gmail.com', 'subject' =>'Tweet Alert', 'tweetdata' =>$data1);

        // Mail::send( 'sendemail', $data, function( $message ) use ($data)
        // {
        //     $message->to( $data['email'] )->subject( $data['subject'] );
        // });

        // return response()->json(['message' => 'Request completed']);

      // return view('email');
    }
}