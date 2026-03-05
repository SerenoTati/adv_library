<?php

declare(strict_types=1);

namespace AdvClientAPI\Tests;

use PHPUnit\Framework\TestCase;
use AdvClientAPI\Core\AdvClient;
use AdvClientAPI\Exceptions\OracleException;

// use Exception;

// use function PHPUnit\Framework\assertFalse;
// use function PHPUnit\Framework\assertTrue;

class AdvClientTest extends TestCase
{

    // public function testAdvanceCarePharmaAct(): void
    // {
    //     try {
    //         $client = AdvClient::testInstance();
    //         $data = [
    //             "buID" => "ESA",
    //             "currencyCode" => "AOA",
    //             "dos" => date('c'), // Generates ISO 8601 format
    //             "pharmaServiceValuesList" => [
    //                 [
    //                     "amtClaimed" => "263.16",
    //                     "procCode" => "99999990",
    //                     "iva" => "2.00",
    //                     "unit" => 4
    //                 ],
    //                 [
    //                     "amtClaimed" => "441.18",
    //                     "procCode" => "99999991",
    //                     "iva" => "2.00",
    //                     "unit" => 1
    //                 ]
    //             ],
    //             "memID" => "900",
    //             "practiceSeq" => 1,
    //             "providerID" => "5000078271",
    //             "username" =>   "AVA0265",
    //             "password" => "sdas21ad"
    //         ];
    //         $response = $client->performPharmaAct($data);
    //         assertTrue($response['success']);
    //         assertTrue($response['returnCode'] == 0);
    //     } catch (SoapException $e) {
    //         // print('Error');
    //         print($e->getSoapFault());
    //         // print($e->getMessage());
    //         // print($e->getRequestBody());
    //         // print($e->getFile());
    //         // print($e->getLine());
    //         // print($e->getAction());
    //         // print($e->getTrace());
    //         // print($e->getTraceAsString());
    //         // print($e->getCode());

    //     } catch (Exception $e) {
    //         // print($e->getMessage());
    //         print('Error ecp');
    //     }
    // }

    // public function testAdvanceCarePharmaActError(): void
    // {
    //     try {
    //         $client = AdvClient::testInstance();
    //         $data = [
    //             "buID" => "ESA",
    //             "currencyCode" => "AOA",
    //             "dos" => date('c'), // Generates ISO 8601 format
    //             "pharmaServiceValuesList" => [
    //                 [
    //                     "amtClaimed" => "263.16",
    //                     "procCode" => "99999990",
    //                     "iva" => "2.00",
    //                     "unit" => 4
    //                 ],
    //                 [
    //                     "amtClaimed" => "441.18",
    //                     "procCode" => "99999991",
    //                     "iva" => "2.00",
    //                     "unit" => 1
    //                 ]
    //             ],
    //             "memID" => "900",
    //             "practiceSeq" => 1,
    //             "providerID" => "5000078271",
    //             "username" =>   "AVA0265",
    //             "password" => "sdas21ad"
    //         ];
    //         $response = $client->performPharmaAct($data);
    //         assertFalse($response['success']);
    //         assertTrue($response['returnCode'] == 1);
    //     } catch (SoapException $e) {
    //         // print('Error');
    //         print($e->getSoapFault());
    //         // print($e->getMessage());
    //         // print($e->getRequestBody());
    //         // print($e->getFile());
    //         // print($e->getLine());
    //         // print($e->getAction());
    //         // print($e->getTrace());
    //         // print($e->getTraceAsString());
    //         // print($e->getCode());

    //     } catch (Exception $e) {
    //         // print($e->getMessage());
    //         print('Error ecp');
    //     }
    // }
    public function testOraclePharmaAct(): void
    {
        $providerId = '45C2ADA676EE3698E0639F18000A69B5';
        $clientId = '00258a15399a4936a5743bfdeaffd38e';
        $clientScret = 'idcscs-dc8c4eef-d7aa-4870-96cc-c1d31cbfe748';
        $scope = 'https://adva-test-ohi.oracleindustry.com/test/urn::ohi-components-apis';

        try {
            $payload = [
                "auth" =>
                [
                    "clientId" => $clientId,
                    "clientSecret" => $clientScret,
                    "providerId" => $providerId,
                    "scope" => $scope
                ],
                "requestData" =>
                [
                    "payerCode" => "VIV",
                    "insuranceType" => "S",
                    "userName" => "Provideruserone",
                    "memberCode" => "99999993000202",
                    "localCode" => "AO5000078271-2",
                    // "providerReference" => "",
                    "locationType" => "FARMA",
                    // "invoiceDate" => "2026-02-01",
                       "memberPhoneNo"=> "925334548",
                    "emergency" => "false",
                    // "invoiceAmount" => ["value" => "25000", "currency" => "AOA"],
                    "claimDiagnosisList" => [
                        [
                            "sequence" => 1,
                            "diagnosisType" => "P",
                            "diagnosisDate" => "2026-02-13",
                            "symptomsDate" => "2026-02-13",
                            "diagnosisCode" => "B50",
                            "classification" => "CID10"
                        ],
                        // [
                        //     "sequence" => 2,
                        //     "diagnosisType" => "A",
                        //     "diagnosisDate" => "2026-02-01",
                        //     "symptomsDate" => "2026-02-01",
                        //     "diagnosisCode" => "B000",
                        //     "classification" => "CID10"
                        // ]
                    ],
                    "claimLineList" => [
                        [
                            "sequence" => "1",
                            "medicalActCode" => "P-0010325",
                            "startDate" => "2026-02-13",
                            "endDate" => "2026-02-13",
                            "requestedUnits" => 1,
                            "requestedAmount" => ["value" => "5325", "currency" => "AOA"],
                            // "ivaPercentage" => 14,
                            // "toothNumber" => "11",
                            // "dioptersRightEye" => "+1.25",
                            // "dioptersLeftEye" => "-1.75",
                            // "lineNotes" => ["noteText" => "test note", "noteDate" => "2026-01-11", "noteType" => "PROVIDER"]
                        ],
                        [
                            "sequence" => "2",
                            "medicalActCode" => "P-0046625",
                            "startDate" => "2026-02-13",
                            "endDate" => "2026-02-13",
                            "requestedUnits" => 1,
                            "requestedAmount" => 
                            ["value" => "5325",
                             "currency" => "AOA"
                             
                             ]
                        ]
                    ]
                ]
            ];

            $client = AdvClient::testInstance();

            $response = $client->oraclePerformPharmaAct($payload);
            print('Getting the results....');
            var_dump($response);
        } catch (OracleException $ex) {
            // print('Oracle Exception in the Test: ');
            print($ex->getMessage());
        }
    }

function testPharmaActCancellation():void{
      $providerId = '45C2ADA676EE3698E0639F18000A69B5';
        $clientId = '00258a15399a4936a5743bfdeaffd38e';
        $clientScret = 'idcscs-dc8c4eef-d7aa-4870-96cc-c1d31cbfe748';
        $scope = 'https://adva-test-ohi.oracleindustry.com/test/urn::ohi-components-apis';

    $client = AdvClient::testInstance();
    //   "requestData":{ "payerCode": "VIV",
    //         "memberCode": "99999993000202",
    //         "localCode": "AO5000078271-2",
    //         "providerReference": "",
    //         "claimCode": "49334494912",
    //         "cancellationReasonCode": "CAN_DUP",
    //         "userName": "Provideruserone"
    //         }
    $payload = [
          "auth" =>
                [
                    "clientId" => $clientId,
                    "clientSecret" => $clientScret,
                    "providerId" => $providerId,
                    "scope" => $scope
                ],
                "requestData" =>[
                    "payerCode" => "VIV",
                "localCode" => "AO5000078271-2",
                "providerReference" => "",
                "claimCode" => "49334494912",
                "cancellationReasonCode" => "CAN_DUP",
                "userName" => "Provideruserone"
                ]
                
    ];
    $client->oracleCreateEligibility($payload);

}
}
