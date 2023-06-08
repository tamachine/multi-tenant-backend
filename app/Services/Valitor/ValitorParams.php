<?php

namespace App\Services\Valitor;

use App\Models\Booking;
use App;

/**
 * This class returns the params that the valitor form needs
 * Documentation can be found here: https://specs.valitor.is/PaymentsPage/API/
 */
class ValitorParams {

    protected Booking $booking;

    protected array $valitorConfig;

    protected $merchantId;
    protected $language;
    protected $verificationCode;
    protected $currency;
    protected $authorizationOnly;
    protected $referenceNumber;
    protected $productDescription;
    protected $productQuantity;
    protected $productPrice;
    protected $productDiscount;
    protected $paymentSuccessfulURL;
    protected $paymentSuccessfulServerSideURL;
    protected $paymentSuccessfulURLText;
    protected $digitalSignature;
    protected $productXY;   

    public function __construct(Booking $booking) {
        $this->booking = $booking;

        $this->valitorConfig = config('valitor');

        $this->setParams();    
        
        $this->setDigitalSignature(); //must be set after params are set    
    }

    /**
     * Returns the params for the valitor form
     * @return array
     */
    public function getParams() {
        
        return [
            'MerchantID' => $this->merchantId,
            'Language' => $this->language,
            'Currency' => $this->currency,
            'AuthorizationOnly' => $this->authorizationOnly,
            'ReferenceNumber' => $this->referenceNumber,
            'Product_1_Description' => $this->productDescription,
            'Product_1_Quantity' => $this->productQuantity,
            'Product_1_Price' => $this->productPrice,
            'Product_1_Discount' => $this->productDiscount,
            'PaymentSuccessfulURL' => $this->paymentSuccessfulURL,
            'PaymentSuccessfulServerSideURL' => $this->paymentSuccessfulServerSideURL,
            'PaymentSuccessfulURLText' => $this->paymentSuccessfulURLText,
            'DigitalSignature' => $this->digitalSignature,            
        ];
    }

    /**
     * Sets all the params needed for valitor
     */
    protected function setParams() {        
        $this->setMerchantId();
        $this->setLanguage();
        $this->setCurrency();
        $this->setAUthorizationOnly();
        $this->setReferenceNumber();
        $this->setProductParams();
        $this->setPaymentSuccessfulURL();
        $this->setPaymentSuccessfulServerSideURL();
        $this->setPaymentSuccessfulURLText();
        $this->setVerificationCode();                   
    }   

    /**
     * Sets all the params related with the product
     */
    protected function setProductParams() {
        $this->setProductDescription();
        $this->setProductQuantity();
        $this->setProductPrice();
        $this->setProductDiscount();

        $this->setProductXY(); //must be the last one
    }

    protected function setMerchantId() {
        $this->merchantId = $this->valitorConfig['merchant_id'];
    }

    protected function setLanguage() {
        $availableValitorLanguages  = ['IS','EN','DA','DE'];
        $defaultValitorLanguage     = 'EN';
        
        if(in_array(strtoupper(App::getLocale()), $availableValitorLanguages)) {
            $this->language = strtoupper(App::getLocale());
        } else {
            $this->language = $defaultValitorLanguage;
        }        
    }

    protected function setCurrency() {
        $this->currency = $this->valitorConfig['currency'];
    }

    protected function setAUthorizationOnly() {
        $this->authorizationOnly = 0;
    }

    protected function setReferenceNumber() {
        $this->referenceNumber = $this->booking->order_id;
    }

    protected function setProductDescription() {
        $this->productDescription = $this->booking->order_id;
    }

    protected function setProductQuantity() {
        $this->productQuantity = "1";
    }

    protected function setProductPrice() {        
        $this->productPrice = $this->booking->pay_now_amount;        
    }

    protected function setProductDiscount() {
        $this->productDiscount = "0";
    }

    protected function setProductXY() {
        $this->productXY = $this->productQuantity .  $this->productPrice . $this->productDiscount;
    }

    protected function setPaymentSuccessfulURL() {
        $this->paymentSuccessfulURL = route('success');
    }

    protected function setPaymentSuccessfulURLText() {
        $this->paymentSuccessfulServerSideURL = 'successfulURLText';
    }

    protected function setPaymentSuccessfulServerSideURL() {
        $this->paymentSuccessfulServerSideURL = route('success');
    }

    protected function setVerificationCode() {        
        $this->verificationCode = $this->valitorConfig['verification_code'];
    }

    /**
     * Returns the digital signature param using all the params needed
     * @return string
     */
    protected function setDigitalSignature() {
        $params = 
            $this->verificationCode . 
            $this->authorizationOnly . 
            $this->productXY . 
            $this->merchantId . 
            $this->referenceNumber . 
            $this->paymentSuccessfulURL . 
            $this->paymentSuccessfulServerSideURL . 
            $this->currency
        ;        

        return hash('sha256', $params);
    }
}