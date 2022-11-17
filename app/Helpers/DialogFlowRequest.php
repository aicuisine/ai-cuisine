<?php

namespace App\Helpers;

use App\Models\DialogRequest;
use App\Models\DialogSession;

class DialogFlowRequest
{

    public static function storeRequest($request)
    {
        $dialogSession = DialogSession::firstOrCreate(['session_id' => $request->sessionInfo['session']]);
        $dialogRequest = DialogRequest::create([
            'dialog_session_id' => $dialogSession->id,
            'detectIntentResponseId' => $request->detectIntentResponseId,
            'lastMatchedIntent' => $request->intentInfo['lastMatchedIntent'],
            'intent_original_value' => $request->intentInfo['parameters']['rest_name']['originalValue'],
            'intent_resolved_value' => $request->intentInfo['parameters']['rest_name']['resolvedValue'],
            'currentPage' => $request->pageInfo['currentPage'],
            'session_rest_name' => $request->sessionInfo['parameters']['rest_name'],
            'text' => $request->text,
            'languageCode' => $request->languageCode,
        ]);
    }

}
