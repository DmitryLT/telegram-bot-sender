# Telegram bot sender
Small symfony bundle to send messages via telegram bot

## Installation on existing symfony project

```composer require ltdsh/telegram-bot-sender```

Add bundle to `config/bundles.php`:
```
<?php

return [
    ...
    ltdsh\TelegramBotSender\TelegramBotSender::class => ['all' => true],
    ...
];
```

Configure `composer.json` in autoload configuration part:
```
    ...
    "autoload": {
        "psr-4": {
            ...
            "ltdsh\\TelegramBotSender\\": "vendor/ltdsh/telegram-bot-sender/src/"
            ...
        }
    },
    ...
```

If you want to use bundle as a service, add those lines to `config/services.yaml`:
```
services:
    ...
    ltdsh\TelegramBotSender\TelegramBotSender:
        class: ltdsh\TelegramBotSender\TelegramBotSender
    ...
```

Example(assuming you already have a telegram bot and tg chat with this bot):
```
class ExampleService
{
    public function __construct(
        private string $telegramBotToken,
        private TelegramBotSender $telegramBotSender
    )
    {
    }
    
    public function sendMessage(): string
    {
        return $this->telegramBotSender
            ->sendSimpleMessage(
                $this->telegramBotToken,
                -123,
                "test message"
            );
    }
}
```
By the way in this example you also need to configure telegramBotToken variable in services.yaml
