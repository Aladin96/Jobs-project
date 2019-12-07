<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Recruteur;
use Auth;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;
use PayPal\Api\ExecutePayment;

class PaypalController extends Controller
{
    private $apiContext;
    private $secret;
    private $clientId;

    public function __construct(){

      if(config('paypal.settings.mode') == 'live'){

        $this->clientId = config('paypal.live_client_id');
        $this->secret = config('paypal.live_secret');

      }else{

        $this->clientId = config('paypal.sandbox_client_id');
        $this->secret = config('paypal.sandbox_secret');
      }

      $this->apiContext = new ApiContext(new OAuthTokenCredential($this->clientId, $this->secret));
      $this->apiContext->setConfig(config('paypal.settings'));

    }

    public function payWithPaypal(Request $request){

      //payer
      $payer = new Payer();
      $payer->setPaymentMethod("paypal");


      //item
      $item = new Item();
      $item->setName('Favorite candidat illimite')
          ->setCurrency('USD')
          ->setQuantity(1)
          ->setPrice(20);


      //itemList
      $itemList = new ItemList();
      $itemList->setItems([$item]);


      //Amount
      $amount = new Amount();
      $amount->setCurrency("USD")
          ->setTotal(20);

      //Transaction
      $transaction = new Transaction();
      $transaction->setAmount($amount)
          ->setItemList($itemList)
          ->setDescription("You can add more than 3 candidats in your favorite list");

      // RedirectUrls

      $redirectUrls = new RedirectUrls();
      $redirectUrls->setReturnUrl("http://127.0.0.1:8000/status")
          ->setCancelUrl("http://127.0.0.1:8000/cancel");

    //Payment
    $payment = new Payment();
    $payment->setIntent("sale")
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions(array($transaction));
        $request = clone $payment;

        try {
          $payment->create($this->apiContext);
        } catch (Exception $ex){
          die('Payment failed');
        }

        $approvalUrl = $payment->getApprovalLink();

        return redirect($approvalUrl);

    }

    public function status(Request $request){
      if( empty($request->input('PayerID')) || empty($request->input('token')) )
        die('Payment failed');

        $paymentId = $request->get('paymentId');
        $payment = Payment::get($paymentId, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));
        $result = $payment->execute($execution, $this->apiContext);

        if($result->getState() == 'approved'){

          $id = Auth::guard('recruteur')->id();

          $recruteur = Recruteur::find($id);

          $recruteur->payFavorite = true;

          $recruteur->save();

          session()->flash('payment-success', 'Congratulations ! Your payment is approved enjoy with the new option :)');

          return redirect('/favoris');

        }else{
          echo 'Failed oops';
          die($result);
        }

    }

    public function canceled(){

      if( request('success') == 'false'){
        return 'Payment Canceled';
      }

    }


}
