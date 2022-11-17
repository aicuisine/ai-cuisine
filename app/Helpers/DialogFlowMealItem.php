<?php

namespace App\Helpers;

use App\Models\DialogRequest;
use App\Models\DialogSession;
use App\Models\MealCategory;
use App\Models\MealItem;
use App\Models\Restaurant;

class DialogFlowMealItem
{

    public static function generateFulfillmentResponse($restaurantName, $categoryName)
    {

        $restaurant = Restaurant::where('name', $restaurantName)->firstOrFail();
        $mealCategory = MealCategory::where('restaurant_id', $restaurant->id)->where('name', $categoryName)->firstOrFail();

        return [
            "messages" => self::generateResponseMessages($restaurant, $mealCategory),
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

    public static function generateResponseMessages($restaurant, $mealCategory)
    {
        return [
            [
                // Union field message can be only one of the following:
                "text" => self::generateResponseTexts($restaurant, $mealCategory),
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

    public static function generateResponseTexts($restaurant, $mealCategory)
    {
        return [
            "text" => [
                implode(', ', MealItem::where('restaurant_id', $restaurant->id)->where('meal_category_id', $mealCategory->id)->get()->pluck('name')->toArray())
            ],
            "allowPlaybackInterruption" => true
        ];
    }

    public static function generateOutputAudioTexts($restaurant, $mealCategory)
    {
        return [
            implode(', ', MealItem::where('restaurant_id', $restaurant->id)->where('meal_category_id', $mealCategory->id)->get()->pluck('name')->toArray()),
            "allowPlaybackInterruption" => true
        ];
    }
}
