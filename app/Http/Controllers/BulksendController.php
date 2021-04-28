<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;
use App\Models\CorporateTempUsers;
use App\Customer;
use App\Corporatesubscriptiongroups;

class BulksendController extends Controller
{
    public function index(){
        $users = CorporateTempUsers::all();
        $groups = Corporatesubscriptiongroups::all();
        return view('bulksms.index', compact('users','groups'));
        // sendGroupSms($PhoneNumber, $referenceCode, $message);
    }

    public function sendMessage(Request $request){
       $userGroup = $request->input('groupName');
       switch ($userGroup) {
            case $userGroup == 'all':
              $this->TextAllUsers();
                break;
            default:
             $this->TextGrubSubs($userGroup);
        }

        // return redirec()->back()->with('message', 'Sending sms Successfully!');
    }

    // Send text to all grub customers
    Private function TextAllUsers(){
        //$appLink  = "https://play.google.com/store/apps/details?id=com.grub.customer";
        $appLink  = "http://bit.ly/grubappke";
        $message  = "Order your lunch in advance for 4 consecutive days and get your 5th meal FREE for that week! Promotion ends 12/03/20. Like & rate Grub Kenya on play store  (".$appLink.") and our Insta page @grub_kenya to WIN 1 MONTH OF FREE LUNCH";

        $users = Customer::all();
        foreach ($users as $key => $value) {
           $PhoneNumber   = '+254'.ltrim(str_replace(' ', '', $value['vPhone']), '+0');
           sendGroupSms($PhoneNumber, $message);
        }
    }

       // Send text to all grub customers
    public function singleUser(){
        $message  = "Hi Eugenio, regarding the issue we have received on your order. Safaricom has taken a while to carry out the refund therefore one of our accountants will manually refund you within 30 minutes. For the inconvenience, we have also left the same sum on your Virtual wallet in the App so you can have a free meal on us! Please order before 5pm as restaurants are closing earlier. Thank you, Grub Team";
        $PhoneNumber = '254724365003';
        //$PhoneNumber   = '+254'.ltrim(str_replace(' ', '', $phone), '+0');

        //sendGroupSms($PhoneNumber, $message);

        $username = env('AFARICASTALKING_USERNAME'); // use 'sandbox' for development in the test environment
        $apiKey   = env('AFARICASTALKING_APIKEY');  // use your sandbox app API key for development in the test environment
        $AT       = new AfricasTalking($username, $apiKey);
        $sms      = $AT->sms();
        $senderId = env('AFARICASTALKING_SENDERID'); //GRUB';

        // Use the service
        $result   = $sms->send([
            'from'    => $senderId,
            'to'      => $PhoneNumber,
            'message' => $message
        ]);
        return $result;

    }

    // Send text to GRUB Sub individual group
    Private function TextGrubSubs($userGroup){
        //$fullMassage = "Hi (name)! Welcome to Grub Kenya, your Reference Code is (code), use this code to join Grub Sub and enjoy great meal offers! STOP*456*9*5#";
        $startText  = 'Welcome to Grub Kenya, your Group Code is';
        $endText    = "use this code to join Grub Sub and enjoy great meal offers at work! TO STOP*456*9*5#";
         $SubUsers  = CorporateTempUsers::select('fname','phoneNumber','reference_code')->where('reference_code',$userGroup)->get();

         foreach($SubUsers as $user){
            $referenceCode = $user['reference_code'];
            $message       = 'Hi'.' '.$user['fname'].'!'.' '.$startText .' '.$user['reference_code'].','.' '.$endText;
            $PhoneNumber   = '+254'.ltrim(str_replace(' ', '', $user['phoneNumber']), '+0');
            sendGroupSms($PhoneNumber, $message);

        }

    }






}
