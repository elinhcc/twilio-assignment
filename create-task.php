<?php
// Load the Twilio PHP SDK
require_once "vendor/autoload.php";
use Twilio\Rest\Client;

// Twilio API Credentials
$accountSid = "AC65c076ada2219e5737b65efa8cbde32b";
$authToken  = "3dc37aa983f07b17b10c7915abf921c8";

// Twilio TaskRouter Workspace & Workflow
$workspaceSid = "WS28be4fc1b1840ab6a5b89fba07ec86fd";
$workflowSid  = "WW0e98bb0dbb8eae878196fb78c1513fa3";

// Instantiate Twilio Client
$client = new Client($accountSid, $authToken);

// Define task attributes
$taskAttributes = [
    "full_name" => "Maria",
    "role" => "customer_service",
    "skills" => ["phone_support", "patient_questions", "appointment_scheduling", "billing_inquiries"],
    "availability" => "full_time",
    "language" => ["English"],
    "priority" => 1
];

// Create a new Task in TaskRouter
$task = $client->taskrouter
    ->workspaces($workspaceSid)
    ->tasks
    ->create([
        'attributes' => json_encode($taskAttributes),
        'workflowSid' => $workflowSid,
    ]);

// Display a confirmation message
echo "✅ Successfully created a new task for Maria!";
?>

