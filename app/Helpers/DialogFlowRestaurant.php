<?php

namespace App\Helpers;

class DialogFlowRestaurant
{

    public static function generateFulfillmentResponse()
    {
        return [
            "messages" => self::generateResponseMessages(),
            // "mergeBehavior" => enum(MERGE_BEHAVIOR_UNSPECIFIED, APPEND, REPLACE)
            "mergeBehavior" => "APPEND"
        ];
    }

    public static function generatePageInfo()
    {
        return [
            [
                "currentPage" => "Page1",
                "displayName" => "Page One",
                "formInfo" => self::generateFormInfo()
            ]
        ];
    }


    public static function generateFormInfo()
    {
        return [
            [
                "parameterInfo" => self::generateParameterInfo()
            ]
        ];
    }

    public static function generateParameterInfo()
    {
        return [
            [
                "displayName" => 'Disp',
                "required" => true,
                // "state" => enum(PARAMETER_STATE_UNSPECIFIED, EMPTY, INVALID, FILLED),
                "state" => "PARAMETER_STATE_UNSPECIFIED",
                "value" => 1,
                "justCollected" => false
            ]
        ];
    }
    public static function generateSessionInfo()
    {
        return [
            // [
            //     "session" => string,
            //     "parameters" => [
            //         //   string: value,
            //         //   ...
            //     ]
            // ]
        ];
    }

    public static function generatePayload()
    {
        return [];
    }

    public static function generateResponseMessages()
    {
        return [
            [
                // Union field message can be only one of the following:
                "text" => self::generateResponseTexts(),
                // "payload" => [
                //     object
                // ],
                // "conversationSuccess" => [
                //     object(ConversationSuccess)
                // ],
                // "outputAudioText" => self::generateOutputAudioTexts(),
                // "liveAgentHandoff" => [
                //     object(LiveAgentHandoff)
                // ],
                // "endInteraction" => [
                //     object(EndInteraction)
                // ],
                // "playAudio" => [
                //     object(PlayAudio)
                // ],
                // "mixedAudio" => [
                //     object(MixedAudio)
                // ],
                // "telephonyTransferCall" => [
                //     object(TelephonyTransferCall)
                // ]
                // End of list of possible types for union field message.
            ]
        ];
    }

    public static function generateResponseTexts()
    {
        return [
            "text" => [
                "نارو وے پیزا پیزا کیسل سپر وے",
                // "پیزا کیسل",
                // "نارو وے پیزا",
                // "سپر وے",
            ],
            "allowPlaybackInterruption" => true
        ];
    }

    public static function generateOutputAudioTexts()
    {
        return [
            "text" => implode("\n", [
                " پیزا کیسل",
                " نارو وے پیزا",
                "سپر وے",
            ]),
            "allowPlaybackInterruption" => true
        ];
    }
}
