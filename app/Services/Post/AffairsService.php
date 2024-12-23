<?php

namespace App\Services\Post;

use App\Models\AffairsFamily;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TelegramBot\Api\BotApi;
class AffairsService
{

    private BotApi $telegramApi;
    private string $chatId;

    public function __construct()
    {
        $this->telegramApi = new BotApi(env('TELEGRAM_BOT_TOKEN'));
        $this->chatId = env('TELEGRAM_CHAT_ID');
    }


    public function add(Request $request)
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $dateAppointment = new \DateTime($request->dateAppointment);
        $dateFinish = $dateAppointment->format('Y-m-d H:i:s');

        $currentUsersId = Auth::id();

        $arAdd = [
            'name' => $request->name,
            'description' => $request->description,
            'date_create' => $currentDateTime,
            'date_finish' => $dateFinish,
            'user_id_created' => $currentUsersId,
            'user_id_working' => 0,
            'status' => 'wait'
        ];

        $save = AffairsFamily::create($arAdd);

        $userName = Auth::getUser()['name'];

        if ($save->id > 0) {
            $utf8emoji = "\u{1F4A9}\u{1F4A9}\u{1F4A9}";
            $message = 'Добавлено новое дело! ' . $utf8emoji .  "\n" .
                'ID: ' . $save->id . "\n" .
                'Кто добавил: ' . $userName . "\n" .
                'Дата начала: ' . $currentDateTime . "\n" .
                'Дата просрочки: ' . $dateFinish . "\n" .
                'Название: ' . $save->name . "\n" .
                'Описание:' . "\n" .
                $save->description;

            $this->telegramApi->sendMessage($this->chatId, $message);

            return $save->id;
        }
    }

    public function getModal(Request $request)
    {
        return AffairsFamily::getAffairs($request->id);
    }

    public function editModal(Request $request) :void
    {
        $currentUsersId = Auth::id();
        $userName = Auth::getUser()['name'];
        if ($request->assign) {
            $emodji = "\u{1F49A}\u{1F49A}";
            $message = $userName . 'взял на себя обязанность выполнить дело c ID' . $request->id . $emodji;
            $arUpdate = [
                'user_id_working' => $currentUsersId,
                'status' => 'assign'
            ];
        } else if ($request->finish) {
            $emodji = "\u{1F92A}\u{1F92A}";
            $message = $userName . ' выполнил дело с ID ' . $request->id . $emodji;
            $arUpdate = [
                'status' => 'finish'
            ];
        } else {
            $message = $userName . ' отредактировал дело с ID ' . $request->id;
            $arUpdate = [
                'name' => $request->name,
                'description' => $request->description,
            ];
        }

        AffairsFamily::where('id', $request->id)->update(
            $arUpdate
        );

        $this->telegramApi->sendMessage($this->chatId, $message);
    }
}
