require('./bootstrap');

Echo.private('notifications') // Tên channel ở đây
    .listen('UserLoginEvent', (e) => {
        let notiElement = document.getElementById('notifications');
        notiElement.innerText = e.message;
    });
Echo.channel('messageChange') // Tên channel ở đây
    .listen('MessageChanged', (e) => {
        $('#show-chat-message').append(
            '<div>'+
            '<span>'+e.user.name+'</span>'+
            '<br/>'+
            '<span>'+e.message+'</span>'+
            '</div>'
        );
        console.log(e.message)
    });
