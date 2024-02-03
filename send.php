<?php

use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;

require __DIR__ . "/vendor/autoload.php";

$message = $_POST['message'];
$phonenumber = $_POST['phonenumber'];

$apiUrl = "ppennl.api.infobip.com";
$apiKey = "9cc79ca783a8a1ac107d7ffc97762319-4c77270e-d769-42e3-bb55-955ec6b83467";

$configuration = new Configuration(host: $apiUrl, apiKey: $apiKey);
$api = new SmsApi(config: $configuration);

$destination = new SmsDestination(to: $phonenumber);

$theMessage = new SmsTextualMessage(
    destinations: [$destination],
    text: $message,
    from: "GAMCO"
);

$request = new SmsAdvancedTextualRequest(messages: [$theMessage]);

try {
    $response = $api->sendSmsMessage($request);
    echo '<script>
            swal({
                title: "Success",
                text: "Message Successfully Sent",
                icon: "success"
            }).then(function() {
                window.location = "index.php";
            });
        </script>';
        
        exit;
} catch (Infobip\ApiException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
