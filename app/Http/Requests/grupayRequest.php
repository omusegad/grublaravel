<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phoneNumber'       => 'required|max:12',
            'iOrderId'          => 'required',
            'iUserId'           => 'required',
            'amount'            => 'required',
            'iCompanyId'        => 'required',
            'CheckUserWallet'   => 'required',
            'GeneralUserType'   => 'required',
            'GeneralDeviceType' => 'required',
            'vPaymentMethod'    => 'required',

            //add money to wallet
            'action'             => 'required', //WALLET_DEPOSIT
            'type'               => 'required', //addMoneyUserWallet
            'addMoneyUserWallet' => 'required',
            'addMoneyUserWallet' => 'required',
            'eUserType'          => 'required',
        ];
    }
}
