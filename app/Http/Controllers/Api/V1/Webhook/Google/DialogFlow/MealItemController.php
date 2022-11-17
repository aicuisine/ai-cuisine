<?php

namespace App\Http\Controllers\Api\V1\Webhook\Google\DialogFlow;

use App\Helpers\DialogFlowMealItem as HelpersDialogFlowMealItem;
use App\Http\Controllers\Controller;
use App\Helpers\DialogFlowRequest;
use Illuminate\Http\Request;

class MealItemController extends Controller
{
    public function index(Request $request)
    {
        DialogFlowRequest::storeRequest($request);

        $response = [
            "fulfillmentResponse" => HelpersDialogFlowMealItem::generateFulfillmentResponse($request->sessionInfo['parameters']['rest_name'], $request->text),
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
