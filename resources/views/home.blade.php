@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chatroom</div>

                <div class="panel-body" id="app">
                	@if($messages)
	                    <div class="messages">
	                        @foreach($messages as $key => $message)
	                            @if($key>0)
	                                @if($messages[$key-1]->user->name != $message->user->name)
	                                    <h3 class="username">{{ $message->user->name }}</h3>
	                                    <p>{{ $message->message }}</p>
	                                @else
	                                    <p>{{ $message->message }}</p>
	                                @endif
	                            @else
	                            	<h3 class="username">{{ $messages[0]->user->name }}</h3>
	                        		<p>{{ $messages[0]->message }}</p>
	                            @endif
	                        @endforeach
	                    </div>
                    @endif
                    <new-message></new-message>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
