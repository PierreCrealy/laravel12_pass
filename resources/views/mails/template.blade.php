@extends('mails.layout')

@section('title', 'Bienvenue !')
@section('header', 'Bienvenue sur ' . config('app.name') )
@section('content')

    <p>Bonjour {{ $user->name }},</p>
    <p>Merci de vous être inscrit. Cliquez ci-dessous pour confirmer votre email :</p>
    <p>
        <a href="{{ $link }}" style="background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px;">
            Confirmer mon email
        </a>
    </p>
@endsection
