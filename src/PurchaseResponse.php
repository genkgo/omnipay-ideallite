<?php

namespace Omnipay\IdealLite;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    
    /**
     * A ideal lite response is always succesfull, because there is
     * no real request being issued.
     *
     * {@inheritdoc}
     */
    public function isSuccessful()
    {
        return true;
    }

    public function isRedirect ()
    {
        return true;
    }

    public function getRedirectUrl()
    {
        $request = $this->request;
        /* @var $request AbstractRequest */
        return $request->getUrl();
    }
    
    public function getRedirectData()
    {
        return $this->request->getData();
    }
    
    public function getRedirectMethod() 
    {
        return 'POST';
    }
    
    public function getData()
    {
        return $this->data;
    }
}
