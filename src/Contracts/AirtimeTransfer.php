<?php

namespace Fintech\Airtime\Contracts;

use ErrorException;
use Fintech\Core\Abstracts\BaseModel;
use Fintech\Core\Supports\AssignVendorVerdict;

interface AirtimeTransfer
{
    /**
     * Method to make a request to the topup service provider
     * for a quotation of the order. that include charge, fee,
     * commission and other information related to order.
     *
     * @throws ErrorException
     */
    public function requestQuote(BaseModel $order): AssignVendorVerdict;

    /**
     * Method to make a request to the topup service provider
     * for an execution of the order.
     *
     * @throws ErrorException
     */
    public function executeOrder(BaseModel $order): mixed;

    /**
     * Method to make a request to the topup service provider
     * for the progress status of the order.
     *
     * @throws ErrorException
     */
    public function orderStatus(BaseModel $order): AssignVendorVerdict;

    /**
     * Method to make a request to the topup service provider
     * for the cancellation of the order.
     *
     * @throws ErrorException
     */
    public function cancelOrder(BaseModel $order): mixed;

    /**
     * Method to request all the service packages available through
     * this service vendor
     */
    public function servicePackages(): array;
}
