<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Notification')</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
<table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; overflow: hidden;">
    <tr>
        <td style="padding: 20px; background-color: #007bff; color: white; text-align: center;">
            <h1>@yield('header', 'Titre de l\'email')</h1>
        </td>
    </tr>
    <tr>
        <td style="padding: 30px;">
            @yield('content')
        </td>
    </tr>
    <tr>
        <td style="padding: 20px; text-align: center; font-size: 12px; color: #888;">
            © {{ date('Y') }} {{ config('app.name') }}. Tous droits réservés.
        </td>
    </tr>
</table>
</body>
</html>

