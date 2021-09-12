@extends('layouts.chat')
@section('title','Chat User')
@section('content')

    <section class="p-0">
    <div class="box-wrapper">
        <div class="box-sidebar">
            <div class="d-flex justify-content-between mb-4 px-4">
              <h1 class="f-600">Messages</h1>
              <div>
                <!-- <div class="box-amount bg-dark d-lg-flex d-none">
                  <i class="far fa-envelope text-white"></i>
                  <div class="badge-rounded f-700">
                    2
                  </div>
                </div> -->
                <button type="button" class="btn btn-dark d-lg-none d-flex box-btn-close">
                  <i class="fas fa-times-circle"></i>
                </button>
              </div>
            </div>

            @if($users->count())
            @foreach($users as $key => $user)
                <?php
                    $unreadMessageCounter = unreadMessageCounter(Auth::user()->id, $user->id);
                    
                ?>
                <div class="box-item {{$user->id == $userId ? 'active' : ''}}">
                  <a href="{{ url('/chat?user_id='.  \Illuminate\Support\Facades\Crypt::encrypt($user->id)) }}" class="py-3 d-flex align-items-start text-decoration-none text-dark">
                    <img class="avatar-sm me-3" src="{{url($user->profile_pic)}}" alt="">
                    <div>
                      <div class="d-flex mb-1 align-items-center">
                        <h6 class="fw-bold text-16 mb-0 me-2">{{ $user->full_name }} <span class="userUnreadCount1_{{$user->id}}">
                                    <!-- @if(isset($userId) && $user->id != $userId)
                                        {{ $unreadMessageCounter != 0 ? $unreadMessageCounter : '' }}
                                    @endif -->
                            </span></h6>

                        <i class="fas fa-circle text-10 {{ $user->login_status == 1 ? 'text-success' : 'text-secondary' }}"></i>
                      </div>

                      @php
                        $userIds = array(Auth::user()->id, $user->id);

                        sort($userIds);

                        $implode = implode('-', $userIds);
                    @endphp
                 
                      
                    </div>
                  </a>
                </div>
            @endforeach
            @endif
        </div>

        @if(isset($userId))
        <input type="hidden" name="senderId" id="senderId" value="{{Auth::user()->id}}">
        <input type="hidden" name="recieverId" id="recieverId" value="{{isset($userId) ? $userId : ''}}">
        <input type="hidden" name="" id="username" value="{{ Auth::user()->first_name }}">
        <input type="hidden" name="" id="last_username" value="{{ Auth::user()->last_name }}">
        <input type="hidden" name="" id="current_date_time" value="{{ date('h:s:A') }} | {{ date('d M Y') }}">
        <input type="hidden" name="" id="sender_profile_pic" value="{{ asset('/') . Auth::user()->profile_pic }}">
        <input type="hidden" name="" id="receiver_profile_pic" value="{{ $receiver_profile_pic }}">
        <input type="hidden" name="" value="{{ $implodeId }}" id="implodeId">

        <div class="box-container pt-4">
            <button type="button" class="btn btn--primary ms-3 mt-3 d-lg-none d-flex box-open-btn">
              <i class="fas fa-bars"></i>
            </button>
            
            <div id="chat-box">
                @if(isset($messages) && count($messages) > 0)
                @foreach($messages as $message)
                @if($message['sender_id'] == Auth::user()->id && $message['receiver_id'] == $userId)
                <div class="box-container-item d-flex align-items-start px-4 mb-5">
                
                  <img class="avatar-sm me-3" src="{{$message['sender_name']['profile_img']}}" alt="">
                  <div>
                    <h6 class="mb-0 fw-bold">{{$message['sender_name']['full_name']}}</h6>
                    <p class="text-muted text-12 mb-0">{{ date('h:s:A', strtotime($message['created_at'])) }} | {{ date('d M Y', strtotime($message['created_at'])) }}</p>
                    <div class="mt-3 col-lg-12 bg-chat p-3 br-12 text-15">
                      {{ @$message['message'] }}
                    </div>
                  </div>        
                </div>
                @elseif($message['sender_id'] == $userId && $message['receiver_id'] == Auth::user()->id)
                <div class="box-container-item d-flex align-items-start px-4 mb-5">
                
                  <img class="avatar-sm me-3" src="{{$message['sender_name']['profile_img']}}" alt="">
                  <div>
                    <h6 class="mb-0 fw-bold">{{$message['sender_name']['full_name']}}</h6>
                    <p class="text-muted text-12 mb-0">{{ date('h:s:A', strtotime($message['created_at'])) }} | {{ date('d M Y', strtotime($message['created_at'])) }}</p>
                    <div class="mt-3 col-lg-12 bg-chat p-3 br-12 text-15">
                      {{ @$message['message'] }}
                    </div>
                  </div>        
                </div>
                @endif
                @endforeach
                @else
                <div class="mt-3  p-3 br-12 text-15">
                    <h3 class="text--primary">There’s nothing here. Start a conversation.</h3>
                </div>
                @endif
            </div>


            <div class="box-footer px-5">
              <div class="form-floating">
                <textarea class="form-control message" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Write Message</label>
                <span class="description-error error" style="display: none;">This filed is required</span>
              </div>
              <div class="d-flex justify-content-end">
                <button type="button" class="btn btn--primary mt-3" id="sendMessage">Send Message</button>
              </div>
            </div>
        </div>
      @else
        <div class="box-container pt-4">
            <div class="mt-3  p-3 br-12 text-15">
                <h3 class="text--primary">There’s nothing here. Start a conversation with Users.</h3>
            </div>
        </div>
      @endif
    </div>
  </section>

@endsection

@section('scripts')
    <script src="https://cdn.socket.io/4.1.1/socket.io.min.js" integrity="sha384-cdrFIqe3RasCMNE0jeFG9xJHog/tgOVC1E9Lzve8LQN1g5WUHo0Kvk1mawWjxX7a" crossorigin="anonymous"></script>

        <script type="text/javascript">
            // $(function()
            // {
                let ip_address = socketURL ;
                let socket = io(ip_address);

                var socketId = '';
                socket.on('connect', () => {
                    socketId = socket.id;
                    // console.log(socketId);
                });
                
                let recieverId = $("#recieverId").val();
                let senderId = $("#senderId").val();
                let username = $('#username').val();
                let last_username = $('#last_username').val();
                let current_date_time = $('#current_date_time').val();
                let sender_profile_pic = $('#sender_profile_pic').val();
                let receiver_profile_pic = $('#receiver_profile_pic').val();
                let implodeId = $('#implodeId').val();

                var timeout;

                function timeoutFunction() {
                    typing = false;
                    socket.emit("typing", false);
                }

                $('.message').keyup(function() {
                    console.log('happening');
                    typing = true;
                    socket.emit('typing', 'typing...');
                    clearTimeout(timeout);
                    timeout = setTimeout(timeoutFunction, 2000);
                });

                socket.on('display', function(data) {
                    if (data) {
                        $('.message').html(data);
                    } else {
                        $('.message').html("");
                    }
                });

                $('#sendMessage').click(function(e)
                {
                    let message = $('.message').val(); 

                    if(message == '')
                    {
                        $('.description-error').show();
                    }
                    else
                    {
                        $('.description-error').hide();

                        socket.emit('sendChatToServer', {
                            message: message,
                            username: username,
                            last_username: last_username,
                            current_date_time: current_date_time,
                            receiver_profile_pic: receiver_profile_pic,
                            sender_profile_pic: sender_profile_pic,
                            sender:senderId,
                            receiver:recieverId,
                            implodeId:implodeId
                        });

                        $.ajax({
                            type: "GET",
                            url: baseUrl + "/saveChat",
                            data: {recieverId: recieverId, senderId: senderId, message: message, implodeId: implodeId},
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (response) {
                                // $('.chatform').load('.chatform');
                            }
                        });

                        $('.last_message_'+recieverId).html(message);  

                        var html = '';

                        html+= '<div class="box-container-item d-flex align-items-start px-4 mb-5"><img class="avatar-sm me-3" src="'+sender_profile_pic+'" alt="">'+
                              '<div>'+
                                '<h6 class="mb-0 fw-bold">'+ username +' '+last_username +'</h6>'+
                                '<p class="text-muted text-12 mb-0">'+ current_date_time +'</p>'+
                                '<div class="mt-3 col-lg-12 bg-chat p-3 br-12 text-15">'+  message +
                                '</div>'+
                              '</div></div>';

                        document.getElementById('chat-box').innerHTML += html;

                        $('.message').val('');
                        return false;
                    }
                        
                    
                });
          

                socket.emit('adduser', senderId);

                socket.on('adduser', function(senderId)
                {
                    //console.log(senderId + ' recieverId');
                });

                // listen from server
                socket.on('sendChatToClient', function(data) {

                    // console.log(data);

                    $('.last_message_'+data.sender).html(data.message);                   

                    var html = '';

                    if(data.receiver == senderId && data.sender == recieverId)
                    {
                        html+= '<div class="box-container-item d-flex align-items-start px-4 mb-5"><img class="avatar-sm me-3" src="'+data.sender_profile_pic+'" alt="">'+
                              '<div>'+
                                '<h6 class="mb-0 fw-bold">'+ data.username +' '+ data.last_username +'</h6>'+
                                '<p class="text-muted text-12 mb-0">'+ data.current_date_time +'</p>'+
                                '<div class="mt-3 col-lg-12 bg-chat p-3 br-12 text-15">'+  data.message +
                                '</div>'+
                              '</div></div>';
                        document.getElementById('chat-box').innerHTML += html;
                    }
                    else
                    {
                        var unreadMessage = '';

                        $.ajax({
                            type: "GET",
                            url: baseUrl + "/unreadMessage",
                            data: {recieverId: data.receiver, senderId: data.sender, unique_code: data.implodeId},
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (response) {

                                if(response != 0)
                                {
                                    unreadMessage = response;
                                }

                                $('.user_list').find('li').each(function() {
                                    var user_id = $(this).val();
                                    console.log(user_id + 'user_id');

                                    if(user_id == data.sender)
                                    {
                                        $('.userUnreadCount_'+data.sender).html(unreadMessage);
                                        
                                        $('.last_message_'+data.sender).html(response.last_message.last_message)
                                    }
                                });
                            }
                        });                        
                    }
                    
                });
            // });
        </script>
@endsection