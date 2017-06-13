@extends('layouts.main')

@section('content')
    <div class="container clearfix">
        @if(!$messages->isEmpty())
            <div class="chat">
                <div class="chat-history">
                    <ul class="chat-ul">
                        @foreach($messages as $message)
                            @if($message->user->role_id == 2)
                                <li>
                                    <div class="message-data">
                                        <span class="message-data-name"><i
                                                    class="fa fa-circle you"></i>{{$message->user->name}}</span>
                                    </div>
                                    <div class="message you-message">
                                        {{$message->content}}
                                    </div>
                                </li>
                            @else
                                <li class="clearfix">
                                    <div class="message-data align-right">
                                        <span class="message-data-name">{{$message->user->name}}</span> <i
                                                class="fa fa-circle me"></i>
                                    </div>
                                    <div class="message me-message float-right">
                                        {{$message->content}}
                                    </div>
                                </li>
                            @endif
                        @endforeach


                    </ul>

                </div> <!-- end chat-history -->

            </div> <!-- end chat -->

            <div class="row">
                <div class="col-sm-10 col-md-10 col-md-offset-1 col-sm-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form accept-charset="UTF-8" action="{{route('landlord.messages.store', $house->id)}}" method="POST">
                                {{ csrf_field() }}
                                <textarea class="form-control counted" name="content" placeholder="Type in your message"
                                      rows="3" style="margin-bottom:10px;"></textarea>
                                <input hidden name="house_id" value="{{$house->id}}">
                                <input hidden name="user_id" value="{{Auth::user()->id}}">
                                <h6 class="pull-right" id="counter">320 characters remaining</h6>
                                <button class="btn btn-info" type="submit">Post New Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-lg-4">
                <h3>House don't have messages</h3>
                <a href="#" class="btn btn-info tip" title=""><i
                            class="fa fa-address-book-o"></i> NewMessage</a>
            </div>
        @endif
    </div>
@endsection
