<?php

return [

    /*
    |--------------------------------------------------------------------------
    | General Settings
    |--------------------------------------------------------------------------
    */

    'registration' => env('GENERAL_SETTINGS_REGISTRATION'),

    'email_verification' => env('GENERAL_SETTINGS_EMAIL_VERIFICATION'),

    'oauth_login' => env('GENERAL_SETTINGS_OAUTH_LOGIN'),

    'default_user' => env('GENERAL_SETTINGS_DEFAULT_USER_GROUP'),

    'default_country' => env('GENERAL_SETTINGS_DEFAULT_COUNTRY'),

    'support_email' => env('GENERAL_SETTINGS_SUPPORT_EMAIL'),

    'user_notification' => env('GENERAL_SETTINGS_USER_NOTIFICATION'),

    'user_support' => env('GENERAL_SETTINGS_USER_SUPPORT'),

    'live_chat' => env('GENERAL_SETTINGS_LIVE_CHAT'),

    'live_chat_link' => env('GENERAL_SETTINGS_LIVE_CHAT_LINK'),

    /*
    |--------------------------------------------------------------------------
    | Davinchi Settings
    |--------------------------------------------------------------------------
    */

    'default_model_admin' => env('DAVINCI_SETTINGS_DEFAULT_MODEL_ADMIN'),
    'default_model_user' => env('DAVINCI_SETTINGS_DEFAULT_MODEL_USER'),
    'default_embedding_model' => env('DAVINCI_SETTINGS_DEFAULT_EMBEDDING_MODEL'),

    'default_language' => env('DAVINCI_SETTINGS_DEFAULT_LANGUAGE'),
    'tone_default_state' => env('DAVINCI_SETTINGS_TONE_DEFAULT_STATE'),
    'creativity_default_state' => env('DAVINCI_SETTINGS_CREATIVITY_DEFAULT_STATE'),

    'templates_access_admin' => env('DAVINCI_SETTINGS_TEMPLATES_ACCESS_ADMIN'),
    'templates_access_user' => env('DAVINCI_SETTINGS_TEMPLATES_ACCESS_USER'),

    'chats_access_user' => env('DAVINCI_SETTINGS_CHATS_ACCESS_USER'),
    'vision_access_user' => env('DAVINCI_SETTINGS_VISION_ACCESS_FREE_TIER_USER'),
    'wizard_access_user' => env('DAVINCI_SETTINGS_WIZARD_ACCESS_FREE_TIER_USER'),
    'chat_pdf_user_access' => env('DAVINCI_SETTINGS_CHAT_PDF_ACCESS_FREE_TIER_USER'),
    'chat_image_user_access' => env('DAVINCI_SETTINGS_CHAT_IMAGE_ACCESS_FREE_TIER_USER'),
    'internet_user_access' => env('DAVINCI_SETTINGS_INTERNET_ACCESS_FREE_TIER_USER'),
    'chat_web_user_access' => env('DAVINCI_SETTINGS_CHAT_WEB_ACCESS_FREE_TIER_USER'),
    'chat_csv_user_access' => env('DAVINCI_SETTINGS_CHAT_CSV_ACCESS_FREE_TIER_USER'),

    'free_tier_words' => env('DAVINCI_SETTINGS_FREE_TIER_WORDS'),
    'free_tier_images' => env('DAVINCI_SETTINGS_FREE_TIER_IMAGES'),
    'image_feature_user' =>env('DAVINCI_SETTINGS_IMAGE_FEATURE_USER'),
    'image_vendor' =>env('DAVINCI_SETTINGS_IMAGE_SERVICE_VENDOR'),
    'image_stable_diffusion_engine' =>env('DAVINCI_SETTINGS_IMAGE_STABLE_DIFFUSION_ENGINE'),
    'image_dalle_engine' =>env('DAVINCI_SETTINGS_IMAGE_DALLE_ENGINE'),
    'code_feature_user' =>env('DAVINCI_SETTINGS_CODE_FEATURE_USER'),
    'chat_feature_user' =>env('DAVINCI_SETTINGS_CHAT_FEATURE_USER'),
    'chat_default_voice' => env('DAVINCI_SETTINGS_CHAT_DEFAULT_VOICE'),
    'chat_real_time_data' => env('DAVINCI_SETTINGS_CHAT_REAL_TIME_DATA'),
    'chat_pdf_feature_user' => env('DAVINCI_SETTINGS_CHAT_PDF_FEATURE_USER'),
    'chat_image_feature_user' => env('DAVINCI_SETTINGS_CHAT_IMAGE_FEATURE_USER'),
    'chat_web_feature_user' => env('DAVINCI_SETTINGS_CHAT_WEB_FEATURE_USER'),
    'chat_csv_feature_user' => env('DAVINCI_SETTINGS_CHAT_CSV_FEATURE_USER'), 
    'chat_pdf_file_size_user' => env('DAVINCI_SETTINGS_CHAT_PDF_FILE_SIZE_USER'), 
    'chat_csv_file_size_user' => env('DAVINCI_SETTINGS_CHAT_CSV_FILE_SIZE_USER'), 

    'voiceover_feature_user' =>env('DAVINCI_SETTINGS_VOICEOVER_FEATURE_USER'),
    'whisper_feature_user' =>env('DAVINCI_SETTINGS_WHISPER_FEATURE_USER'),
    'vision_feature_user' =>env('DAVINCI_SETTINGS_VISION_FEATURE_USER'),
    'vision_for_chat_feature_user' =>env('DAVINCI_SETTINGS_VISION_FOR_CHAT_FEATURE_USER'),
    'wizard_feature_user' =>env('DAVINCI_SETTINGS_WIZARD_FEATURE_USER'),
    'wizard_image_vendor' =>env('DAVINCI_SETTINGS_WIZARD_IMAGE_VENDOR'),

    'max_results_limit_admin' => env('DAVINCI_SETTINGS_MAX_RESULTS_LIMIT_ADMIN'),
    'max_results_limit_user' => env('DAVINCI_SETTINGS_MAX_RESULTS_LIMIT_USER'),

    'default_storage' => env('DAVINCI_SETTINGS_DEFAULT_STORAGE'),
    'default_duration' => env('DAVINCI_SETTINGS_DEFAULT_DURATION'),

    'sd_key_usage' => env('DAVINCI_SETTINGS_SD_KEY_USAGE', 'main'),
    'openai_key_usage' => env('DAVINCI_SETTINGS_OPENAI_KEY_USAGE', 'main'),

    'team_members_feature' => env('DAVINCI_SETTINGS_TEAM_MEMBERS_FEATURE'),
    'team_members_quantity_user' => env('DAVINCI_SETTINGS_TEAM_MEMBERS_QUANTITY'),

    'personal_openai_api' => env('DAVINCI_SETTINGS_PERSONAL_OPENAI_API_KEY'),
    'personal_sd_api' => env('DAVINCI_SETTINGS_PERSONAL_SD_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Voiceover Settings
    |--------------------------------------------------------------------------
    */

    'enable' => [
        'azure' => env('DAVINCI_SETTINGS_VOICEOVER_ENABLE_AZURE'),
        'gcp' => env('DAVINCI_SETTINGS_VOICEOVER_ENABLE_GCP'),   
        'elevenlabs' => env('DAVINCI_SETTINGS_VOICEOVER_ENABLE_ELEVENLABS'),   
        'openai_std' => env('DAVINCI_SETTINGS_VOICEOVER_ENABLE_OPENAI_STANDARD'),   
        'openai_nrl' => env('DAVINCI_SETTINGS_VOICEOVER_ENABLE_OPENAI_NEURAL'),   
    ],

    'voiceover_default_language' => env('DAVINCI_SETTINGS_VOICEOVER_DEFAULT_LANGUAGE'),
    'voiceover_default_voice' => env('DAVINCI_SETTINGS_VOICEOVER_DEFAULT_VOICE'),
    'voiceover_ssml_effect' => env('DAVINCI_SETTINGS_VOICEOVER_SSML_EFFECT', 'enable'),
    'voiceover_max_chars_limit' => env('DAVINCI_SETTINGS_VOICEOVER_MAX_CHAR_LIMIT', 5000),
    'voiceover_max_voice_limit' => env('DAVINCI_SETTINGS_VOICEOVER_MAX_VOICE_LIMIT', 5),
    'voiceover_default_storage' => env('DAVINCI_SETTINGS_VOICEOVER_DEFAULT_STORAGE', 'local'),
    'voiceover_default_duration' => env('DAVINCI_SETTINGS_VOICEOVER_DEFAULT_DURATION', 0),
    'voiceover_welcome_chars' => env('DAVINCI_SETTINGS_VOICEOVER_FREE_TIER_WELCOME_CHARS', 0),
    'voiceover_windows_ffmpeg_path' => env('DAVINCI_SETTINGS_WINDOWS_FFMPEG_PATH'),

    /*
    |--------------------------------------------------------------------------
    | Whisper Settings
    |--------------------------------------------------------------------------
    */

    'whisper_max_audio_size' => env('DAVINCI_SETTINGS_WHISPER_MAX_AUDIO_SIZE', 25),
    'whisper_default_storage' => env('DAVINCI_SETTINGS_WHISPER_DEFAULT_STORAGE', 'local'),
    'whisper_default_duration' => env('DAVINCI_SETTINGS_WHISPER_DEFAULT_DURATION', 0),
    'whisper_welcome_minutes' => env('DAVINCI_SETTINGS_WHISPER_FREE_TIER_WELCOME_MINUTES', 0),
];
