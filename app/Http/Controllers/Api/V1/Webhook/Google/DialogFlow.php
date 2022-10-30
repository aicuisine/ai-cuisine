<?php

namespace App\Http\Controllers\Api\V1\Webhook\Google;

use App\Helpers\DialogFlow as HelpersDialogFlow;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DialogFlow extends Controller
{
    public function index(Request $request)
    {
        info($request->all());
        return [
            "fulfillmentResponse" => HelpersDialogFlow::generateFulfillmentResponse(),
            "pageInfo" => HelpersDialogFlow::generatePageInfo(),
            "sessionInfo" => HelpersDialogFlow::generateSessionInfo(),
            "payload" => HelpersDialogFlow::generatePayload(),

            // Union field transition can be only one of the following:
            // "targetPage" => string,
            // "targetFlow" => string
            // End of list of possible types for union field transition.
        ];
    }
}
