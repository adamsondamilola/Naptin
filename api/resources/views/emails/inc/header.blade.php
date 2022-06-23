<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>{{ config('app.name') }} - Email</title>
    <style type="text/css">
        body{
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
        }
        .generah-mail-container {
            max-width: 500px;
            margin: 15px auto;
            border: 0.5px solid #1DA1F2;
            border-radius: 10px;
            display: flex column;
            background-color: #eeeeff;
        }
        .generah-mail-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            width: 120px;
            height: auto;
        }
        .center {
            display:flex;
            justify-content:space-around;
            align-items: center;
        }
        .center div {
            width: 100px;
            height: auto;
        }
        .i-text {
            font-style: italic;
            font-size: 12px;
        }
        .p-x-15 {
            padding-right: 15px;
            padding-left: 15px;
        }
        .p-y-15 {
            padding-top: 15px;
            padding-bottom: 15px;
        }
        .content {
            min-height: 200px;
            background-color: white;
        }
        .m-0 {
            margin: 0px;
        }
        .p-x-3 {
            padding-right: 3px;
            padding-left: 3px;
        }
        .btn{
            background-color: #1DA1F2;
            padding: 7px 18px;
            color: white;
            text-decoration: none;
            display: inline-block;
            margin: 10px 0px;
        }
        .link {
            color: #1DA1F2;
        }
        .wrap {
            word-wrap: break-word;
        }
    </style>
</head>
<body>
<main class="generah-mail-container">
    <header class="generah-mail-header p-x-15 p-y-15">
        {{-- <img class="m-0 logo" src="https://gifthub.ng/img/gift-hub-logo.ef2e4a07.png" alt="{{ config('app.name') }}"> --}}
        <span class="m-0 logo">{{ config('app.name') }}</span>
        <p class="i-text m-0">{{ config('app.slogan') }}</p>
    </header>
