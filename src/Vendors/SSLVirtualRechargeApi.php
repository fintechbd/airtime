<?php

namespace Fintech\Airtime\Vendors;

use Illuminate\Support\Facades\Log;

class SSLVirtualRechargeApi
{
    public function test()
    {
        return 'test';
    }

    private $web_service_url = 'http://vrapi.sslwireless.com/?wsdl';

    private $ClientId = '';

    private $ClientPass = '';

    /**
     * SSLVRApiService constructor.
     */
    public function __construct() {}

    /**
     * @return mixed
     */
    public function connectionCheck($input)
    {
        $soap_exception_occured = false;
        $data['soap_exception_occured'] = $soap_exception_occured;
        $response = '';
        $wsdl_path = $this->web_service_url;
        ini_set('soap.wsdl_cache_enabled', '0'); // disabling WSDL cache
        $opts = [
            'http' => [
                'user_agent' => 'PHPSoapClient',
            ],
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ],
        ];
        $context = stream_context_create($opts);
        $soapClientOptions = [
            'stream_context' => $context,
            'cache_wsdl' => WSDL_CACHE_NONE,
        ];
        libxml_disable_entity_loader(false);
        try {
            $this->client = new \SoapClient($wsdl_path, $soapClientOptions);
        } catch (SoapFault $exception) {
            Log::warning($exception);
            $soap_exception_occured = true;
            $data['soap_exception_occured'] = $soap_exception_occured;
            $response .= "\nError occoured when connecting to the SMS SOAP Server!";
            $response .= "\nSoap Exception: ".$exception;
            $response .= "\nSOAP Fault: (faultcode: {$exception->faultcode}, faultstring: {$exception->faultstring})";
            $data['response']['faultcode'] = $exception->faultcode;
            $data['response']['faultstring'] = $exception->faultstring;
            Log::error($response);
        }
        $data['response']['message'] = 'Error occoured when connecting to the SMS SOAP Server!';
        $data['ClientId'] = $this->ClientId;
        $data['ClientPass'] = $this->ClientPass;

        return $data;
    }

    /**
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function getClientInfo()
    {
        $jsonReturn = '';
        $connection = $this->connectionCheck([]);
        if ($connection['soap_exception_occured'] == false) {
            $soap_exception_occured = $connection['soap_exception_occured'];
            $response = '';
            $create_response = new \stdClass();
            try {
                $create_response = $this->client->getClientInfo(
                    $connection['ClientId']
                );
            } catch (SoapFault $exception) {
                Log::warning($exception);
                $soap_exception_occured = true;
                $response .= "\nError occoured at method getClientInfo(".$connection['ClientId'].')';
                $response .= "\nSoap Exception: ".$exception;
                $response .= "\nSOAP Fault: (faultcode: {$exception->faultcode}, faultstring: {$exception->faultstring})";
                Log::error($response);
            }
            /* Do something or print results */
            if ($soap_exception_occured || $create_response == null) {
                $jsonReturn = response()->json(['status' => false, 'message' => $connection['response']['message'], 'faultcode' => $connection['response']['faultcode'], 'faultstring' => $connection['response']['faultstring']], 200);
            } else {
                Log::info(json_encode($create_response));
                $jsonReturn = $create_response;
            }
        }

        return $jsonReturn;
    }

    /**
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function getBalanceInfo()
    {
        $jsonReturn = '';
        $connection = $this->connectionCheck([]);
        if ($connection['soap_exception_occured'] == false) {
            $soap_exception_occured = $connection['soap_exception_occured'];
            $response = '';
            $create_response = new \stdClass();
            try {
                $create_response = $this->client->GetBalanceInfo(
                    $connection['ClientId']
                );
            } catch (SoapFault $exception) {
                Log::warning($exception);
                $soap_exception_occured = true;
                $response .= "\nError occoured at method GetBalanceInfo(".$connection['ClientId'].')';
                $response .= "\nSoap Exception: ".$exception;
                $response .= "\nSOAP Fault: (faultcode: {$exception->faultcode}, faultstring: {$exception->faultstring})";
                Log::error($response);
            }
            /* Do something or print results */
            if ($soap_exception_occured || $create_response == null) {
                $jsonReturn = response()->json(['status' => false, 'message' => $connection['response']['message'], 'faultcode' => $connection['response']['faultcode'], 'faultstring' => $connection['response']['faultstring']], 200);
            } else {
                Log::info(json_encode($create_response));
                $jsonReturn = ($create_response);
            }
        }

        return $jsonReturn;
    }

    /**
     * @param  array  $input
     *                        ['MobileNumber'] Phone Number (MSISDN) for Topup
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function findOperatorInfo($input)
    {
        $jsonReturn = '';
        $connection = $this->connectionCheck($input);
        if ($connection['soap_exception_occured'] == false) {
            $soap_exception_occured = $connection['soap_exception_occured'];
            $response = '';
            $create_response = new \stdClass();
            try {
                $create_response = $this->client->FindOperatorInfo(
                    $connection['ClientId'], $connection['MobileNumber']
                );
            } catch (SoapFault $exception) {
                Log::warning($exception);
                $soap_exception_occured = true;
                $response .= "\nError occoured at method FindOperatorInfo(".$connection['ClientId'].', '.$connection['MobileNumber'].')';
                $response .= "\nSoap Exception: ".$exception;
                $response .= "\nSOAP Fault: (faultcode: {$exception->faultcode}, faultstring: {$exception->faultstring})";
                Log::error($response);
            }
            /* Do something or print results */
            if ($soap_exception_occured || $create_response == null) {
                Log::warning(json_encode($soap_exception_occured));
                Log::warning(json_encode($create_response));
                $jsonReturn = response()->json(['status' => false, 'message' => $connection['response']['message'], 'faultcode' => $connection['response']['faultcode'], 'faultstring' => $connection['response']['faultstring']], 200);
            } else {
                Log::info(json_encode($create_response));
                $jsonReturn = $create_response;
            }
        }

        return $jsonReturn;
    }

    /**
     * @param  array  $input
     *                        ['OperatorID'] Mobile Operator Identifier (MSISDN) for Topup
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function getOperatorInfo($input)
    {
        $jsonReturn = '';
        $connection = $this->connectionCheck($input);
        if ($connection['soap_exception_occured'] == false) {
            $soap_exception_occured = $connection['soap_exception_occured'];
            $response = '';
            $create_response = new \stdClass();
            try {
                $create_response = $this->client->GetOperatorInfo(
                    $connection['ClientId'], $connection['OperatorID']
                );
            } catch (SoapFault $exception) {
                Log::warning($exception);
                $soap_exception_occured = true;
                $response .= "\nError occoured at method GetOperatorInfo(".$connection['ClientId'].', '.$connection['MobileNumber'].')';
                $response .= "\nSoap Exception: ".$exception;
                $response .= "\nSOAP Fault: (faultcode: {$exception->faultcode}, faultstring: {$exception->faultstring})";
                Log::error($response);
            }
            /* Do something or print results */
            if ($soap_exception_occured || $create_response == null) {
                Log::warning(json_encode($soap_exception_occured));
                Log::warning(json_encode($create_response));
                $jsonReturn = response()->json(['status' => false, 'message' => $connection['response']['message'], 'faultcode' => $connection['response']['faultcode'], 'faultstring' => $connection['response']['faultstring']], 200);
            } else {
                Log::info(json_encode($create_response));
                $jsonReturn = $create_response;
            }
        }

        return $jsonReturn;
    }

    /**
     * @param  array  $input
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function getAllOperatorInfo($input)
    {
        $jsonReturn = '';
        $connection = $this->connectionCheck($input);
        if ($connection['soap_exception_occured'] == false) {
            $soap_exception_occured = $connection['soap_exception_occured'];
            $response = '';
            $create_response = new \stdClass();
            try {
                $create_response = $this->client->GetAllOperatorInfo(
                    $connection['ClientId'], 1
                );
            } catch (SoapFault $exception) {
                Log::warning($exception);
                $soap_exception_occured = true;
                $response .= "\nError occoured at method GetAllOperatorInfo(".$connection['ClientId'].', '.$connection['MobileNumber'].')';
                $response .= "\nSoap Exception: ".$exception;
                $response .= "\nSOAP Fault: (faultcode: {$exception->faultcode}, faultstring: {$exception->faultstring})";
                Log::error($response);
            }
            /* Do something or print results */
            if ($soap_exception_occured || $create_response == null) {
                Log::warning(json_encode($soap_exception_occured));
                Log::warning(json_encode($create_response));
                $jsonReturn = response()->json(['status' => false, 'message' => $connection['response']['message'], 'faultcode' => $connection['response']['faultcode'], 'faultstring' => $connection['response']['faultstring']], 200);
            } else {
                Log::info(json_encode($create_response));
                $jsonReturn = $create_response;
            }
        }

        return $jsonReturn;
    }

    /**
     * @param  array  $input
     *                        ['MobileNumber'] Phone Number (MSISDN) for Topup
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function verifyMsisdn($input)
    {
        $jsonReturn = '';
        $connection = $this->connectionCheck($input);
        if ($connection['soap_exception_occured'] == false) {
            $soap_exception_occured = $connection['soap_exception_occured'];
            $response = '';
            $create_response = new \stdClass();
            try {
                $create_response = $this->client->VerifyMSISDN(
                    $connection['ClientId'], $connection['MobileNumber']
                );
            } catch (SoapFault $exception) {
                Log::warning($exception);
                $soap_exception_occured = true;
                $response .= "\nError occoured at method VerifyMSISDN(".$connection['ClientId'].', '.$connection['MobileNumber'].')';
                $response .= "\nSoap Exception: ".$exception;
                $response .= "\nSOAP Fault: (faultcode: {$exception->faultcode}, faultstring: {$exception->faultstring})";
                Log::error($response);
            }
            /* Do something or print results */
            if ($soap_exception_occured || $create_response == null) {
                Log::warning(json_encode($soap_exception_occured));
                Log::warning(json_encode($create_response));
                $jsonReturn = ['status' => false, 'message' => $connection['response']['message'], 'faultcode' => isset($connection['response']['faultcode']) ? $connection['response']['faultcode'] : null, 'faultstring' => isset($connection['response']['faultstring']) ? $connection['response']['faultstring'] : null];
            } else {
                Log::info(json_encode($create_response));
                $jsonReturn = ['status' => true, 'valid_operator_number' => $create_response];
            }
        }

        return $jsonReturn;
    }

    /**
     * @param  array  $input
     *                        ['Operator'] Operators (operator_id) short code like (1 = GP, 3 = RB, 2 = BL, 5 = TT, 6 = AT),
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function getOperatorLimits($input)
    {
        $jsonReturn = '';
        $connection = $this->connectionCheck($input);
        if ($connection['soap_exception_occured'] == false) {
            $soap_exception_occured = $connection['soap_exception_occured'];
            $response = '';
            $create_response = new \stdClass();
            try {
                $create_response = $this->client->GetOperatorLimits(
                    $connection['ClientId'], $connection['OperatorID']
                );
            } catch (SoapFault $exception) {
                Log::warning($exception);
                $soap_exception_occured = true;
                $response .= "\nError occoured at method GetOperatorLimits(".$connection['ClientId'].', '.$connection['OperatorID'].')';
                $response .= "\nSoap Exception: ".$exception;
                $response .= "\nSOAP Fault: (faultcode: {$exception->faultcode}, faultstring: {$exception->faultstring})";
                Log::error($response);
            }
            /* Do something or print results */
            if ($soap_exception_occured || $create_response == null) {
                Log::warning(json_encode($soap_exception_occured));
                Log::warning(json_encode($create_response));
                $jsonReturn = response()->json(['status' => false, 'message' => $connection['response']['message'], 'faultcode' => $connection['response']['faultcode'], 'faultstring' => $connection['response']['faultstring']], 200);
            } else {
                Log::info(json_encode($create_response));
                $jsonReturn = $create_response;
            }
        }

        return $jsonReturn;
    }

    /**
     * @param  array  $input
     *                        ['SystemUniqueID'] Unique Transaction ID (guid) from External Entity,
     *                        ['OperatorID'] Operators (operator_id) short code like (1 = GP, 3 = RB, 2 = BL, 5 = TT, 6 = AT),
     *                        ['MobileNumber'] Phone Number (recipient_msisdn) for Topup or Recharge,
     *                        ['Amount'] Amount to be recharged, ['Connection'] prepaid/postpaid (connection_type),
     *                        ['sender_id'] MSISDN or Email address (Requirement optional)
     *                        ['priority'] Client application can set the priority of the recharge through this field. (Requirement optional)
     *                        ['success_url'] Client application can set the success URL for the recharge request through this field. After the recharge is
     *                        processed and completed, if successful, this URL will be accessed by the VR gateway to send the recharge status as a notice. If not set,
     *                        no notice will be provided. Some additional parameters will be sent with this URL described below. (Requirement optional)
     *                        ['failure_url'] Client application can set the failure URL for the recharge request through this field. After the recharge is
     *                        processed and completed, if failed for any reason, this URL will be accessed by the VR gateway to send the recharge status as a notice. If not set,
     *                        no notice will be provided. Some additional parameters will be sent with this URL described below. These will primarily include the failure code and
     *                        reason. (Requirement optional)
     *                        ['calling_method'] Client application can set the Reply URLs calling method to either GET or POST through this field. (Requirement optional)
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function createRecharge($input)
    {
        $jsonReturn = '';
        $connection = $this->connectionCheck($input);
        if ($connection['soap_exception_occured'] == false) {
            $soap_exception_occured = $connection['soap_exception_occured'];
            $response = '';
            $create_response = new \stdClass();
            try {
                $create_response = $this->client->CreateRecharge(
                    $connection['ClientId'], $connection['ClientPass'], $connection['SystemUniqueID'], $connection['OperatorID'], $connection['MobileNumber'],
                    $connection['Amount'], $connection['Connection'], $connection['sender_id'], $connection['priority'], $connection['success_url'],
                    $connection['failed_url'], $connection['calling_method']
                );
            } catch (SoapFault $exception) {
                Log::warning($exception);
                $soap_exception_occured = true;
                $response .= "\nError occoured at method createRechargeRequest(".$connection['ClientId'].', '.$connection['ClientPass']
                    .', '.$connection['SystemUniqueID'].', '.$connection['OperatorID'].', '.$connection['MobileNumber']
                    .', '.$connection['Amount'].', '.$connection['Connection'].', '.$connection['sender_id'].', '.$connection['priority']
                    .', '.$connection['success_url'].', '.$connection['failed_url'].', '.$connection['calling_method'].')';
                $response .= "\nSoap Exception: ".$exception;
                $response .= "\nSOAP Fault: (faultcode: {$exception->faultcode}, faultstring: {$exception->faultstring})";
                Log::error($response);
            }
            /* Do something or print results */
            if ($soap_exception_occured || $create_response == null) {
                Log::warning(json_encode($soap_exception_occured));
                Log::warning(json_encode($create_response));
                $jsonReturn = response()->json(['status' => false, 'message' => $connection['response']['message'], 'faultcode' => $connection['response']['faultcode'], 'faultstring' => $connection['response']['faultstring']], 200);
            } else {
                Log::info(json_encode($create_response));
                $jsonReturn = $create_response;
            }
        }

        return $jsonReturn;
    }

    /**
     * @param  array  $input
     *                        ['SystemUniqueID'] Unique Transaction ID (guid) from External Entity,
     *                        ['OperatorUniqueID'] Unique Transaction ID from VR Tech,
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function initiateRecharge($input)
    {
        $jsonReturn = '';
        $connection = $this->connectionCheck($input);
        if ($connection['soap_exception_occured'] == false) {
            $soap_exception_occured = $connection['soap_exception_occured'];
            $response = '';
            $create_response = new \stdClass();
            try {
                $create_response = $this->client->InitRecharge(
                    $connection['ClientId'], $connection['ClientPass'], $connection['SystemUniqueID'], $connection['OperatorUniqueID'],
                    $connection['success_url'], $connection['failed_url'], $connection['calling_method']
                );
            } catch (SoapFault $exception) {
                Log::warning($exception);
                $soap_exception_occured = true;
                $response .= "\nError occoured at method InitRecharge(".$connection['ClientId'].', '.$connection['ClientPass']
                    .', '.$connection['SystemUniqueID'].', '.$connection['OperatorUniqueID']
                    .', '.$connection['success_url'].', '.$connection['failed_url'].', '.$connection['calling_method'].')';
                $response .= "\nSoap Exception: ".$exception;
                $response .= "\nSOAP Fault: (faultcode: {$exception->faultcode}, faultstring: {$exception->faultstring})";
                Log::error($response);
            }
            /* Do something or print results */
            if ($soap_exception_occured || $create_response == null) {
                Log::warning(json_encode($soap_exception_occured));
                Log::warning(json_encode($create_response));
                $jsonReturn = response()->json(['status' => false, 'message' => $connection['response']['message'], 'faultcode' => $connection['response']['faultcode'], 'faultstring' => $connection['response']['faultstring']], 200);
            } else {
                Log::info(json_encode($create_response));
                $jsonReturn = $create_response;
            }
        }

        return $jsonReturn;
    }

    /**
     * @param  array  $input
     *                        ['SystemUniqueID'] Unique Transaction ID (guid) from External Entity,
     *                        ['OperatorUniqueID'] Unique Transaction ID from VR Tech,
     *                        ['CancelReason'] Cancel Reason,
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function CancelRecharge($input)
    {
        $jsonReturn = '';
        $connection = $this->connectionCheck($input);
        if ($connection['soap_exception_occured'] == false) {
            $soap_exception_occured = $connection['soap_exception_occured'];
            $response = '';
            $create_response = new \stdClass();
            try {
                $create_response = $this->client->CancelRecharge(
                    $connection['ClientId'], $connection['ClientPass'], $connection['SystemUniqueID'],
                    $connection['OperatorUniqueID'], $connection['CancelReason']
                );
            } catch (SoapFault $exception) {
                Log::warning($exception);
                $soap_exception_occured = true;
                $response .= "\nError occoured at method CancelRecharge(".$connection['ClientId'].', '.$connection['ClientPass']
                    .', '.$connection['SystemUniqueID'].', '.$connection['OperatorUniqueID'].', '.$connection['CancelReason'].')';
                $response .= "\nSoap Exception: ".$exception;
                $response .= "\nSOAP Fault: (faultcode: {$exception->faultcode}, faultstring: {$exception->faultstring})";
                Log::error($response);
            }
            /* Do something or print results */
            if ($soap_exception_occured || $create_response == null) {
                Log::warning(json_encode($soap_exception_occured));
                Log::warning(json_encode($create_response));
                $jsonReturn = response()->json(['status' => false, 'message' => $connection['response']['message'], 'faultcode' => $connection['response']['faultcode'], 'faultstring' => $connection['response']['faultstring']], 200);
            } else {
                Log::info(json_encode($create_response));
                $jsonReturn = $create_response;
            }
        }

        return $jsonReturn;
    }

    /**
     * @param  array  $input
     *                        ['SystemUniqueID'] Unique Transaction ID (guid) from External Entity,
     *                        ['OperatorUniqueID'] Unique Transaction ID from VR Tech,
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function queryRecharge($input)
    {
        $jsonReturn = '';
        $connection = $this->connectionCheck($input);
        if ($connection['soap_exception_occured'] == false) {
            $soap_exception_occured = $connection['soap_exception_occured'];
            $response = '';
            $create_response = new \stdClass();
            try {
                $create_response = $this->client->QueryRechargeStatus(
                    $connection['ClientId'], $connection['SystemUniqueID'], $connection['OperatorUniqueID']
                );
            } catch (SoapFault $exception) {
                Log::warning($exception);
                $soap_exception_occured = true;
                $response .= "\nError occoured at method QueryRechargeStatus(".$connection['ClientId']
                    .', '.$connection['SystemUniqueID'].', '.$connection['OperatorUniqueID'].')';
                $response .= "\nSoap Exception: ".$exception;
                $response .= "\nSOAP Fault: (faultcode: {$exception->faultcode}, faultstring: {$exception->faultstring})";
                Log::error('sslvr response log: '.$response);
            }
            /* Do something or print results */
            if ($soap_exception_occured || $create_response == null) {
                $jsonReturn = response()->json(['status' => false, 'message' => $connection['response']['message'], 'faultcode' => $connection['response']['faultcode'], 'faultstring' => $connection['response']['faultstring']], 200);
            } else {
                Log::info(json_encode($soap_exception_occured));
                Log::info(json_encode($create_response));
                Log::info(json_encode($create_response));
                $jsonReturn = $create_response;
            }
        }

        return $jsonReturn;
    }

    /**
     * @param  array  $input
     *                        ['MobileNumber'] Phone Number (recipient_msisdn) for Topup or Recharge,
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function getLastRechargeTime($input)
    {
        $jsonReturn = '';
        $connection = $this->connectionCheck($input);
        if ($connection['soap_exception_occured'] == false) {
            $soap_exception_occured = $connection['soap_exception_occured'];
            $response = '';
            $create_response = new \stdClass();
            try {
                $create_response = $this->client->GetLastRechargeTime(
                    $connection['ClientId'], $connection['OperatorID'], $connection['MobileNumber']
                );
            } catch (SoapFault $exception) {
                Log::warning($exception);
                $soap_exception_occured = true;
                $response .= "\nError occoured at method GetLastRechargeTime(".$connection['ClientId']
                    .', '.$connection['OperatorID'].', '.$connection['MobileNumber'].')';
                $response .= "\nSoap Exception: ".$exception;
                $response .= "\nSOAP Fault: (faultcode: {$exception->faultcode}, faultstring: {$exception->faultstring})";
                Log::error($response);
            }
            /* Do something or print results */
            if ($soap_exception_occured || $create_response == null) {
                Log::warning(json_encode($soap_exception_occured));
                Log::warning(json_encode($create_response));
                $jsonReturn = response()->json(['status' => false, 'message' => $connection['response']['message'], 'faultcode' => $connection['response']['faultcode'], 'faultstring' => $connection['response']['faultstring']], 200);
            } else {
                Log::info(json_encode($create_response));
                $jsonReturn = $create_response;
            }
        }

        return $jsonReturn;
    }

    /**
     * @return \Illuminate\Http\JsonResponse|\stdClass|string
     */
    public function topUp($input)
    {
        $returnValue = [];
        $operator_id = $this->findOperatorInfo($input);
        $input['OperatorID'] = isset($operator_id->operator_id) ? $operator_id->operator_id : 1;
        $input['OperatorName'] = UtilityService::$bdMobileOperatorType[$input['OperatorID']];
        $createRecharge = $this->createRecharge($input);
        if ($createRecharge->recharge_status == 100) {
            $input['OperatorUniqueID'] = $createRecharge->vr_guid;
            $returnValue = $this->initiateRecharge($input);
            $returnValue->recharge_status = 201;
        } else {
            $returnValue = $createRecharge;
        }

        return $returnValue;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function mbChargesPackages($input)
    {
        $request = file_get_contents(base_path().'/public/bdmb-package.txt');
        //$request = file_get_contents('http://vrapi.sslwireless.com/rest/specialAmount/?client_id=myCashOnline');
        $packages = json_decode($request, true);
        $packages = $this->mdRechargePackageList($input);
        $data = [];
        $gp = [];
        $gpint = [];
        $gpCombo = [];
        $airtel = [];
        $airtelint = [];
        $airtelCombo = [];
        $banglalink = [];
        $banglalinkint = [];
        $banglalinkCombo = [];
        $robi = [];
        $robiint = [];
        $robiCombo = [];
        $teletalk = [];
        $teletalkint = [];
        $teletalkCombo = [];

        foreach ($packages['data'] as $package) {
            $data[$package['shortcut']][] = $package;
            /*    if(isset($package['operator_id']) && $package['operator_id'] == 1){
                    if($package['offer_type'] == 'voice'){
                        $package['short_code'] = 'grameenphone';
                        $gp[] = $package;
                    }elseif($package['offer_type'] == 'combo'){
                        $package['short_code'] = 'grameenphone';
                        $gpCombo[] = $package;
                    }else{
                        $package['short_code'] = 'grameenphone';
                        $gpint[] = $package;
                    }

                }
                elseif(isset($package['operator_id']) && $package['operator_id'] == 2){
                    if($package['offer_type'] == 'voice'){
                        $package['short_code'] = 'banglalink';
                        $banglalink[] = $package;
                    }elseif($package['offer_type'] == 'combo'){
                        $package['short_code'] = 'banglalink';
                        $banglalinkCombo[] = $package;
                    }else{
                        $package['short_code'] = 'banglalink';
                        $banglalinkint[] = $package;
                    }

                }
                elseif(isset($package['operator_id']) && $package['operator_id'] == 3){
                    if($package['offer_type'] == 'voice'){
                        $package['short_code'] = 'robi';
                        $robi[] = $package;
                    }elseif($package['offer_type'] == 'combo'){
                        $package['short_code'] = 'robi';
                        $robiCombo[] = $package;
                    }else{
                        $package['short_code'] = 'robi';
                        $robiint[] = $package;
                    }

                }
                elseif(isset($package['operator_id']) && $package['operator_id'] == 6){
                    if($package['offer_type'] == 'voice'){
                        $package['short_code'] = 'airtel';
                        $airtel[] = $package;
                    }elseif($package['offer_type'] == 'combo'){
                        $package['short_code'] = 'airtel';
                        $airteCombol[] = $package;
                    }else{
                        $package['short_code'] = 'airtel';
                        $airtelint[] = $package;
                    }

                }
                elseif(isset($package['operator_id']) && $package['operator_id'] == 5){
                    if($package['offer_type'] == 'voice'){
                        $package['short_code'] = 'teletalk';
                        $teletalk[] = $package;
                    }elseif($package['offer_type'] == 'combo'){
                        $package['short_code'] = 'teletalk';
                        $teletalkCombo[] = $package;
                    }else{
                        $package['short_code'] = 'teletalk';
                        $teletalkint[] = $package;
                    }

                }
            */
        }

        /*        $data['gp_voice'] = $gp;
                $data['gp_internet'] = $gpint;
                $data['gp_combo'] = $gpCombo;
                $data['banglalink_voice'] = $banglalink;
                $data['banglalink_internet'] = $banglalinkint;
                $data['banglalink_combo'] = $banglalinkCombo;
                $data['robi_voice'] = $robi;
                $data['robi_internet'] = $robiint;
                $data['robi_combo'] = $robiCombo;
                $data['airtel_voice'] = $airtel;
                $data['airtel_internet'] = $airtelint;
                $data['airtel_combo'] = $airtelCombo;
                $data['teletalk_voice'] = $teletalk;
                $data['teletalk_internet'] = $teletalkint;
                $data['teletalk_combo'] = $teletalkCombo;*/
        //dd($data);
        return response()->json($data);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function mdRechargePackageList($input)
    {
        $AllPackageList = [];
        //$mbRechargePackageList = file_get_contents('http://vrapi.sslwireless.com/rest/specialAmount/?client_id=myCashOnline');
        $mbRechargePackageList = file_get_contents(base_path().'/public/bdmb-package.txt');
        $packages = json_decode($mbRechargePackageList, true);
        foreach ($packages['data'] as $package) {
            $thisPackageArray = $this->generateArrayKey($package);
            //$systemTopChart = $this->systemTopChartService->ShowAllSystemTopChart(array('system_top_chart_keyword'=>$package['offer_type'], 'system_top_chart_status'=>'ACTIVE'))->get()->toArray();
            $systemTopChart = [];

            /*if($package['offer_type'] == 'internet'):
                if(!empty($this->datatypeInternet(array('package'=>$package, 'packageArray'=>$thisPackageArray, 'packageTopChart'=>$systemTopChart)))):
                    $AllPackageList[] = $this->datatypeInternet(array('package'=>$package, 'packageArray'=>$thisPackageArray, 'packageTopChart'=>$systemTopChart, 'requestData'=>$input));
                endif;
            elseif($package['offer_type'] == 'combo'):
                if(!empty($this->datatypeInternet(array('package'=>$package, 'packageArray'=>$thisPackageArray, 'packageTopChart'=>$systemTopChart)))):
                    $AllPackageList[] = $this->datatypeInternet(array('package'=>$package, 'packageArray'=>$thisPackageArray, 'packageTopChart'=>$systemTopChart, 'requestData'=>$input));
                endif;
            elseif($package['offer_type'] == 'voice'):
                //if(!empty($this->datatypeInternet(array('package'=>$package, 'packageArray'=>$thisPackageArray, 'packageTopChart'=>$systemTopChart)))):
                $AllPackageList[] = $this->datatypeVoice(array('package'=>$package, 'packageArray'=>$thisPackageArray, 'packageTopChart'=>$systemTopChart, 'requestData'=>$input));
                //endif;
            */

            $AllPackageList[] = $this->datatypeOneForAll(['package' => $package, 'packageArray' => $thisPackageArray, 'packageTopChart' => $systemTopChart, 'requestData' => $input]);
            //$AllPackageList[] = $package;
            //endif;

        }
        $data['status'] = $packages['status'];
        $data['message'] = count($AllPackageList).' Data Found';
        $data['data'] = $AllPackageList;
        $data['counter'] = $this->countType($AllPackageList);

        return $data;
    }

    /**
     * @return array
     */
    public function generateArrayKey($package)
    {
        //Replace special characters to space
        $packageExplode = preg_replace('/[^a-zA-Z0-9\/.\']/', ' ', str_replace('local ', '', $package['offer_title']));

        //Separate alphanumeric word with space in string
        $packageExplode = preg_replace('#(?<=\d)(?=[a-z])#i', ' ', $packageExplode);
        $packageExplode = trim(str_replace('  ', ' ', strtolower($packageExplode)));
        $generateKey = [];
        foreach (explode(' ', $packageExplode) as $key => $input) {
            if (strcmp('p/sec', trim($input)) == 0) {
                $generateKey[$key] = 'paisa/sec';
            } elseif (strcmp('p/min', trim($input)) == 0) {
                $generateKey[$key] = 'paisa/minute';
            } elseif (strcmp('mins', trim($input)) == 0) {
                $generateKey[$key] = 'minutes';
            } elseif (strcmp('days.', trim($input)) == 0) {
                $generateKey[$key] = 'days';
            } else {
                $generateKey[$key] = trim($input);
            }
        }

        return $generateKey;
    }

    /**
     * @return array
     */
    public function datatypeInternet(array $data)
    {
        $internetPackageList = [];
        $package = $data['package'];
        $thisPackageArray = $data['packageArray'];
        $packageTopChart = $data['packageTopChart'];

        $topChart = 'no';
        if (in_array($package['offer_title'], array_column($packageTopChart, 'system_top_chart_title'))) {
            $topChart = 'yes';
        }

        $dataPackGB = array_search('gb', $thisPackageArray);
        $dataPackMB = array_search('mb', $thisPackageArray);
        $dataPackTK = array_search('tk', $thisPackageArray);
        $dataPackMIN = array_search('min', $thisPackageArray);
        $dataPackPaisaPerSec = array_search('paisa/sec', $thisPackageArray);
        $dataPackMinutes = array_search('minutes', $thisPackageArray);

        $dataPackDays = array_search('days', $thisPackageArray);
        $dataPackHRS = array_search('hrs', $thisPackageArray);
        $dataPackMIN = array_search('min', $thisPackageArray);

        if (! empty($dataPackGB)) {
            $data_pack_limit = $dataPackGB;
        } elseif (! empty($dataPackMB)) {
            $data_pack_limit = $dataPackMB;
        } elseif (! empty($dataPackTK)) {
            $data_pack_limit = $dataPackTK;
        } elseif (! empty($dataPackMIN)) {
            $data_pack_limit = $dataPackMIN;
        } elseif (! empty($dataPackPaisaPerSec)) {
            $data_pack_limit = $dataPackPaisaPerSec;
        } elseif (! empty($dataPackMinutes)) {
            $data_pack_limit = $dataPackMinutes;
        } else {
            $data_pack_limit = 9999;
        }
        if (! empty($dataPackDays)) {
            $data_pack_time = $dataPackDays;
        } elseif (! empty($dataPackHRS)) {
            $data_pack_time = $dataPackHRS;
        } elseif (! empty($dataPackMIN)) {
            $data_pack_time = $dataPackMIN;
        } else {
            $data_pack_time = 9999;
        }
        if ($data_pack_time == 9999 || $data_pack_limit == 9999) {
        } else {
            $operator_id = ['GrameenPhone' => 16, 'AirtelBangladesh' => 17, 'Banglalink' => 18, 'RobiTelecom' => 19, 'Teletalk' => 20];
            $toData['currency_currency'] = 'BDT';
            $toData['service_id'] = $operator_id[str_replace(' ', '', $package['operator_name'])];
            $toData['default_country_id'] = isset($data['requestData']['default_country_id']) ? $data['requestData']['default_country_id'] : session('default_country_id');
            $to_rate = $this->currencyRateService->getCurrencyRate($toData);

            $internetPackageList = [
                'operator_id' => $package['operator_id'],
                'operator_name' => $package['operator_name'],
                'amount' => $package['amount'],
                'convert_amount_display' => CustomHtmlService::numberFormat(($package['amount'] / $to_rate)),
                'default_currency' => isset($data['requestData']['default_currency']) ? $data['requestData']['default_currency'] : 'MYR',
                'to_rate' => CustomHtmlService::numberFormat($to_rate, 2),
                'connection_type' => $package['connection_type'],
                'offer_type' => $package['offer_type'],
                'offer_title' => $package['offer_title'],
                'offer_description' => $package['offer_description'],
                'is_featured' => $topChart,
                'data_pack_limit' => trim(last(array_slice($thisPackageArray, 0, array_search($data_pack_limit, array_keys($thisPackageArray), true))).' '.strtoupper($thisPackageArray[$data_pack_limit])),
                'data_pack_time' => trim(last(array_slice($thisPackageArray, 0, array_search($data_pack_time, array_keys($thisPackageArray)), true)).' '.ucfirst($thisPackageArray[$data_pack_time])),
                'packageData' => $thisPackageArray,
            ];
        }

        return $internetPackageList;
    }

    /**
     * @return array
     */
    public function datatypeVoice(array $data)
    {
        $voicePackageList = [];
        $package = $data['package'];
        $thisPackageArray = $data['packageArray'];
        $packageTopChart = $data['packageTopChart'];

        $topChart = 'no';
        if (in_array($package['offer_title'], array_column($packageTopChart, 'system_top_chart_title'))) {
            $topChart = 'yes';
        }

        $dataPackPaisaPerSec = array_search('paisa/sec', $thisPackageArray);
        $dataPackMinutes = array_search('minutes', $thisPackageArray);
        $dataPackPaisaPerMinute = array_search('paisa/minute', $thisPackageArray);
        $dataPackMIN = array_search('min', $thisPackageArray);

        $dataPackDays = array_search('days', $thisPackageArray);
        $dataPackHRS = array_search('hrs', $thisPackageArray);
        $dataPackMIN = array_search('min', $thisPackageArray);
        $dataPackHours = array_search('hours', $thisPackageArray);

        if (! empty($dataPackPaisaPerSec)) {
            $data_pack_limit = $dataPackPaisaPerSec;
        } elseif (! empty($dataPackMinutes)) {
            $data_pack_limit = $dataPackMinutes;
        } elseif (! empty($dataPackPaisaPerMinute)) {
            $data_pack_limit = $dataPackPaisaPerMinute;
        } elseif (! empty($dataPackMIN)) {
            $data_pack_limit = $dataPackMIN;
        } else {
            $data_pack_limit = 9999;
        }
        if (! empty($dataPackDays)) {
            $data_pack_time = $dataPackDays;
        } elseif (! empty($dataPackHRS)) {
            $data_pack_time = $dataPackHRS;
        } elseif (! empty($dataPackHours)) {
            $data_pack_time = $dataPackHours;
        } elseif (! empty($dataPackMIN)) {
            $data_pack_time = $dataPackMIN;
        } else {
            $data_pack_time = 9999;
        }
        if ($data_pack_time == 9999 || $data_pack_limit == 9999) {
        } else {
            $operator_id = ['GrameenPhone' => 16, 'AirtelBangladesh' => 17, 'Banglalink' => 18, 'RobiTelecom' => 19, 'Teletalk' => 20];
            $toData['currency_currency'] = 'BDT';
            $toData['service_id'] = $operator_id[str_replace(' ', '', $package['operator_name'])];
            $toData['default_country_id'] = isset($data['requestData']['default_country_id']) ? $data['requestData']['default_country_id'] : session('default_country_id');
            $to_rate = $this->currencyRateService->getCurrencyRate($toData);

            $voicePackageList = [
                'operator_id' => $package['operator_id'],
                'operator_name' => $package['operator_name'],
                'amount' => $package['amount'],
                'convert_amount_display' => CustomHtmlService::numberFormat(($package['amount'] / $to_rate)),
                'default_currency' => isset($data['requestData']['default_currency']) ? $data['requestData']['default_currency'] : 'MYR',
                'to_rate' => CustomHtmlService::numberFormat($to_rate, 2),
                'connection_type' => $package['connection_type'],
                'offer_type' => $package['offer_type'],
                'offer_title' => $package['offer_title'],
                'offer_description' => $package['offer_description'],
                'is_featured' => $topChart,
                'data_pack_limit' => trim(last(array_slice($thisPackageArray, 0, array_search($data_pack_limit, array_keys($thisPackageArray), true))).' '.strtoupper($thisPackageArray[$data_pack_limit])),
                'data_pack_time' => trim(last(array_slice($thisPackageArray, 0, array_search($data_pack_time, array_keys($thisPackageArray)), true)).' '.ucfirst($thisPackageArray[$data_pack_time])),
                'packageData' => $thisPackageArray,
            ];
        }

        return $voicePackageList;
    }

    public function countType(array $data): array
    {
        $counter = [];

        foreach ($data as $datum) {
            if (isset($counter[$datum['offer_type']])) {
                $counter[$datum['offer_type']]++;
            } else {
                $counter[$datum['offer_type']] = 1;
            }

            if (isset($counter[$datum['operator_name']])) {
                $counter[$datum['operator_name']]++;
            } else {
                $counter[$datum['operator_name']] = 1;
            }

        }

        return $counter;
    }

    /**
     * @return array
     */
    public function datatypeOneForAll(array $data)
    {
        $comboPackageList = [];
        $package = $data['package'];
        $thisPackageArray = $data['packageArray'];
        $packageTopChart = $data['packageTopChart'];

        $topChart = 'no';
        if (in_array($package['offer_title'], array_column($packageTopChart, 'system_top_chart_title'))) {
            $topChart = 'yes';
        }

        /**
         * Regex Parse
         */
        $packagePackLimit = '9999';
        $packagePackLDuration = '9999';

        $offer = trim(strtolower($package['offer_title']));
        $testString = str_replace(['hrs', '(', ')', 'postpaid', 'prepaid', 'for oporajita', 'for agami', 'for bornomala'],
            ['hours', '', '', '', '', '', ''], $offer);

        //Split Offer Title to fragments
        preg_match('/(.+)(,|for|validity)[\s]?(.+)/i', $testString, $matches);

        //look for duration
        preg_match('/([\d]+\s?(days|hours))/', trim($testString), $durationMatches);

        //get package limit for unmatched section
        if (isset($matches[1]) && isset($matches[3])) {
            $packagePackLimit = $matches[1];
        } elseif (isset($matches[1]) && empty($matches[3])) {
            if (isset($durationMatches[1])) {
                $packagePackLimit = trim(str_replace($durationMatches[1], '', $testString));
                $packagePackLDuration = $durationMatches[1];
            }
        }

        //get pack time from matched section
        if (isset($matches[3])) {
            //for days
            if (preg_match('/([\d]+)[\s]?days/i', trim($matches[3]), $dayMatches) > 0) {
                $packagePackLDuration = $dayMatches[1].' days';
            } elseif (preg_match('/([\d]+)[\s]?hours/i', trim($matches[3]), $hourMatches) > 0) {
                $packagePackLDuration = $hourMatches[1].' hours';
            }
        }

        $operator_id = ['GrameenPhone' => 16, 'AirtelBangladesh' => 17, 'Banglalink' => 18, 'RobiTelecom' => 19, 'Teletalk' => 20];
        $toData['currency_currency'] = 'BDT';
        $toData['country_id'] = 18;
        $toData['service_id'] = $operator_id[str_replace(' ', '', $package['operator_name'])];
        $toData['default_country_id'] = isset($data['requestData']['default_country_id']) ? $data['requestData']['default_country_id'] : session('default_country_id');
        //$toData['default_country_id'] = 192;
        Log::info('SSLR rate request data:'.json_encode($toData));
        $to_rate = $this->currencyRateService->getCurrencyRate($toData);
        Log::info('SSLR rate response:'.$to_rate);

        /**
         * Data Format
         */
        $comboPackageList = [
            'convert_amount_display' => CustomHtmlService::numberFormat(($package['amount'] / $to_rate)),
            'default_currency' => isset($data['requestData']['default_currency']) ? $data['requestData']['default_currency'] : 'SGD',
            'to_rate' => CustomHtmlService::numberFormat($to_rate, 2),
            'operator_id' => $package['operator_id'],
            'operator_name' => $package['operator_name'],
            'amount' => $package['amount'],
            'connection_type' => $package['connection_type'],
            'offer_title' => $data['package']['offer_title'],
            'offer_description' => $data['package']['offer_description'],
            'is_featured' => $topChart,
            'data_pack_limit' => $packagePackLimit,
            'data_pack_time' => $packagePackLDuration,
            //'packageData' => $thisPackageArray,
            'input_offer_type' => $data['package']['offer_type'],
        ];

        if ((stripos($package['offer_type'], '+') !== false) || ($package['offer_type'] == 'combo')) {
            $comboPackageList['offer_type'] = 'combo';
        } elseif ($package['offer_type'] == 'voive') {
            $comboPackageList['offer_type'] = 'voice';
        } else {
            $comboPackageList['offer_type'] = strtolower($package['offer_type']);
        }

        $comboPackageList['shortcut'] = $this->getCompositeType($comboPackageList['operator_name'], $comboPackageList['offer_type']);

        return $comboPackageList;
    }

    /**
     * @return string
     */
    public function getCompositeType($operator, $type)
    {
        $keyword = '';

        switch ($operator) {
            case 'GrameenPhone': $keyword = 'gp_';
                break;

            case 'Banglalink': $keyword = 'banglalink_';
                break;

            case 'Robi Telecom': $keyword = 'robi_';
                break;
            case 'Teletalk': $keyword = 'teletalk_';
                break;
            case 'Airtel Bangladesh': $keyword = 'airtel_';
                break;
            default: $keyword = 'other_';
        }

        return $keyword.$type;
    }
}
