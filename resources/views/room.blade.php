@extends('layouts.app')

@section('content')
    <style>
        #show-chat-message {
            height: 400px;
            overflow: hidden;
            overflow-y: auto;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form>
                    <div class="form-group">
                        <label for="">Chat</label>
                        <div class="form-control" id="show-chat-message">
                            @foreach($messages as $message)
                                <div>
                                    <span>{{ $message->user->name }}</span><br>
                                    <span>{{ $message->message }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <form>
                    <div class="form-group">
                        <textarea class="form-control" name="message" id="" rows="3"></textarea>
                    </div>
                    <button type="button" class="btn btn-sm btn-success mt-2" id="send-chat-message">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).on('click', '#send-chat-message', function () {
            let message = $('textarea[name=message]').val();
            $.ajax({
                type: 'POST',
                url: '/message',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: {
                    message:message,
                },
                success: function (data) {
                },
                error: function () {
                }
            })
        })
    </script>
@endsection
