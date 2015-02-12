<?php
namespace Omnipay\IdealLite\Ing;

class Gateway extends \Omnipay\IdealLite\Rabobank\Gateway {

    public function purchase (array $parameters = array()) {
        $request = parent::purchase($parameters);
        if ($this->getTestMode()) {
            $request->setUrl('https://idealtest.secure-ing.com/ideal/mpiPayInitIng.do');
        } else {
            $request->setUrl('https://ideal.secure-ing.com/ideal/mpiPayInitIng.do');
        }
        return $request;
    }
}
