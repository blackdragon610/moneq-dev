<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => false,

    'http' => [
        'server_key' => env('FCM_SERVER_KEY', 'AAAAbt5pVtw:APA91bGGwauRHA5m9btkOLyeGhGjSSfKaVrOHVeYAkgnZU2zjK1arXmkCiafnnMV2NyN0wOzxFN4wHnwp03LgM7H72TEeMtvyvOx_NPbcmICDdzBz-5mUdKt4sfgsQSyKYatTnJ6l_kd'),
        'sender_id' => env('FCM_SENDER_ID', '476177848028'),
        'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout' => 30.0, // in second
    ],
];
