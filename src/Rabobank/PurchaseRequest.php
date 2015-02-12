<?php
namespace Omnipay\IdealLite\Rabobank;

use Omnipay\IdealLite\AbstractRequest;

class PurchaseRequest extends AbstractRequest {

    private $merchantKey;

    public function getMerchantKey ()
    {
        return $this->merchantKey;
    }

    public function setMerchantKey($value)
    {
        $this->merchantKey = $value;
    }

    public function getMerchantId ()
    {
        return $this->getParameter('merchantID');
    }

    public function setMerchantId($value)
    {
        return $this->setParameter('merchantID', $value);
    }

    public function getLanguage()
    {
        return $this->getParameter('language');
    }

    public function setLanguage($value)
    {
        return $this->setParameter('language', $value);
    }

    public function getDescription()
    {
        return $this->getParameter('description');
    }

    public function setDescription($value)
    {
        return $this->setParameter('description', $value);
    }
    public function getSubId()
    {
        return $this->getParameter('subID');
    }

    public function setSubId($value)
    {
        return $this->setParameter('subID', $value);
    }

    public function getTransactionId()
    {
        return $this->getParameter('purchaseID');
    }

    public function setTransactionId($value)
    {
        return $this->setParameter('purchaseID', $value);
    }

    public function getPaymentMethod()
    {
        return $this->getParameter('paymentType');
    }

    public function setValidUntil(\DateInterval $interval)
    {
        $dateTime = new \DateTime('now');
        $dateTime->add($interval);
        $this->setParameter('validUntil', $dateTime->format(\DateTime::ISO8601));
    }

    public function getValidUntil()
    {
        return $this->getParameter('validUntil');
    }

    /**
     * Set the payment method.
     *
     * This field is used by some European gateways, which support
     * multiple payment providers with a single API.
     */
    public function setPaymentMethod($value)
    {
        return $this->setParameter('paymentType', $value);
    }

    public function getReturnUrl()
    {
        return $this->getParameter('urlSuccess');
    }

    public function setReturnUrl($value)
    {
        return $this->setParameter('urlSuccess', $value);
    }

    public function getCancelUrl()
    {
        return $this->getParameter('urlCancel');
    }

    public function setCancelUrl($value)
    {
        return $this->setParameter('urlCancel', $value);
    }

    public function getNotifyUrl()
    {
        return null;
    }

    public function setNotifyUrl($value)
    {
        ;
    }

    public function getData ()
    {
        $data = parent::getData();
        $data['amount'] = $this->getAmountInteger();
        $data['itemNumber1'] = 1;
        $data['itemDescription1'] = $this->getDescription();
        $data['itemQuantity1'] = 1;
        $data['itemPrice1'] = $this->getAmountInteger();

        $data['hash'] = $this->generateHash([
            $this->getMerchantKey(),
            $this->getMerchantId(),
            $this->getSubId(),
            $this->getAmountInteger(),
            $this->getTransactionId(),
            $this->getPaymentMethod(),
            $this->getValidUntil(),
            $data['itemNumber1'],
            $data['itemDescription1'],
            $data['itemQuantity1'],
            $data['itemPrice1']
        ]);
        return $data;
    }

    private function generateHash ($listOfItems) {
        $concat = implode('', $listOfItems);
        $concat = html_entity_decode($concat);
        $not_allowed = array("\t", "\n", "\r", " ");
        $concat = str_replace($not_allowed, "",$concat);
        return sha1($concat);
    }

}