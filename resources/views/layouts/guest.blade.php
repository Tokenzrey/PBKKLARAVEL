<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
               <a href="/">
                    <img src="https://private-user-images.githubusercontent.com/93776769/374127645-c798ee62-ece5-429f-9442-2a897235a449.png?jwt=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTUiLCJleHAiOjE3Mjg3NTIwODMsIm5iZiI6MTcyODc1MTc4MywicGF0aCI6Ii85Mzc3Njc2OS8zNzQxMjc2NDUtYzc5OGVlNjItZWNlNS00MjlmLTk0NDItMmE4OTcyMzVhNDQ5LnBuZz9YLUFtei1BbGdvcml0aG09QVdTNC1ITUFDLVNIQTI1NiZYLUFtei1DcmVkZW50aWFsPUFLSUFWQ09EWUxTQTUzUFFLNFpBJTJGMjAyNDEwMTIlMkZ1cy1lYXN0LTElMkZzMyUyRmF3czRfcmVxdWVzdCZYLUFtei1EYXRlPTIwMjQxMDEyVDE2NDk0M1omWC1BbXotRXhwaXJlcz0zMDAmWC1BbXotU2lnbmF0dXJlPWNjOTJhNzc3MTY5ZTk1Y2JkYmY1MGExNjA3YjZiN2U0YjU2NTVhNjFlNTI3ZjhmNzY3MjI2MGJmZDliNzY4YTgmWC1BbXotU2lnbmVkSGVhZGVycz1ob3N0In0.onqnWf5KR3I43S3i4LW348vvhp7FdOeCOSjCetk4o0w" 
                         class="w-20 h-20" alt="Application Logo" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
