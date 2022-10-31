<?php

namespace App\Http\Controllers\Api\V1\Webhook\Google\DialogFlow;

use App\Helpers\DialogFlowMenu as HelpersDialogFlowMenu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $response = [
            "fulfillmentResponse" => HelpersDialogFlowMenu::generateFulfillmentResponse(),
            // "pageInfo" => HelpersDialogFlow::generatePageInfo(),
            // "sessionInfo" => HelpersDialogFlow::generateSessionInfo(),
            // "payload" => HelpersDialogFlow::generatePayload(),

            // Union field transition can be only one of the following:
            // "targetPage" => string,
            // "targetFlow" => string
            // End of list of possible types for union field transition.
        ];

        info("Request: " . json_encode($request->all()));
        info("Response: " . json_encode($response));
        return $response;
    }
}
