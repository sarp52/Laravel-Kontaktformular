<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Kontaktformular Aufgabe</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
 
<body>
    <h2> Laravel Projektaufgabe</h2>

<form action="" method="post" action="{{ route('contact.store') }}">
    <h1> KONTAKTFORMULAR</h1> 
    @csrf
    <div class="form-group">
        <label>Vor- und Nachname</label>
        <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name">
 
        <!-- Error -->
        @if ($errors->has('name'))
        <div class="error">
            {{ $errors->first('name') }}
        </div>
        @endif
    </div>
 
    <div class="form-group">
        <label>Email-Adresse</label>
        <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" id="email">
 
        @if ($errors->has('email'))
        <div class="error">
            {{ $errors->first('email') }}
        </div>
        @endif
    </div>
 
    <div class="form-group">
        <label>Betreff</label>
        <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" name="subject"
            id="betreff">
 
        @if ($errors->has('subject'))
        <div class="error">
            {{ $errors->first('subject') }}
        </div>
        @endif
    </div>
 
    <div class="form-group">
        <label>Kommentar</label>
        <textarea class="form-control {{ $errors->has('comments') ? 'error' : '' }}" name="comments" id="comments"
            rows="4"></textarea>
 
        @if ($errors->has('comments'))
        <div class="error">
            {{ $errors->first('kommentar') }}
        </div>
        @endif
    </div>
 
    <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
</form>
</body>
 
</html>