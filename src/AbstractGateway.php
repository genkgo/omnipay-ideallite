<?php
namespace Omnipay\IdealLite;

use Omnipay\Common\AbstractGateway as OmnipayAbstractGateway;

/**
 * iDeal Lite (Rabobank) Gateway
 *
 */
abstract class AbstractGateway extends OmnipayAbstractGateway
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Ideal Lite';
    }

    /**
     * @return string
     */
    public function getMerchantKey()
    {
        return $this->getParameter('merchantKey');
    }
    
    /**
     * @param string $value
     * @return $this
     */
    public function setMerchantKey($value)
    {
        return $this->setParameter('merchantKey', $value);
    }
    
    /**
     * @return string
     */
    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }
    
    /**
     * @param string $value
     * @return $this
     */
    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId', $value);
    }
    
    /**
     * @param  array $parameters
     * @return \Omnipay\IdealLite\Message\PurchaseRequest
     */
    abstract public function purchase(array $parameters = array());
}
