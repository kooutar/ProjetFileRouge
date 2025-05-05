@extends('layout.main')
@section('title', 'cours')
@section('content')

<div id="messages"  class="bg-gray-300  mt-6" style="padding: 10px; border: 1px solid #ccc; height: 400px; overflow-y: scroll;">
    <!-- Les messages apparaîtront ici -->
</div>

<form id="message-form">
    <input type="text" id="message-input" placeholder="Votre message..." style="width: 70%;">
    <button type="submit">Envoyer</button>
</form>

@endSection