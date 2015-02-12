<?php
namespace Omnipay\IdealLite\Rabobank;

use Omnipay\IdealLite\AbstractGateway;

class Gateway extends AbstractGateway {

    public function purchase (array $parameters = array()) {
        $parameters['merchantID'] = $this->getMerchantId();
        $parameters['subID'] = 0;

        $request = $this->createRequest('\Omnipay\IdealLite\Rabobank\PurchaseRequest', $parameters);
        if ($this->getTestMode()) {
            $request->setUrl('https://idealtest.rabobank.nl/ideal/mpiPayInitRabo.do');
        } else {
            $request->setUrl('https://ideal.rabobank.nl/ideal/mpiPayInitRabo.do');
        }
        $request->setCurrency('EUR');
        $request->setLanguage('nl_NL');
        $request->setValidUntil(new \DateInterval('PT1H'));
        $request->setPaymentMethod('ideal');
        return $request;
    }
}
