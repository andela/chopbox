
$(document).ready(function(){
	$('#message-div').hide();
		
		$('#msg-btn').click(function(e){
			e.preventDefault();
			var id = $(this).data(id);
			displayDialog(id);
		});



    $('#msgModal').on('show.bs.modal', function(){
        fetchMessages(function(response){
            console.log(response);
            var imageUrl = fetchSenderImage(1, function(imageUrl){
                return imageUrl;
            });
            var senderImage = "<img class='cu qi' src='"+imageUrl+"'>"
            $('span#sender-image').empty();
            $('span#sender-image').append(senderImage);
        });
    });
});

function displayDialog(id) {
	BootstrapDialog.show({
		title: "New message",
		message: $("<div class='form-group'>"+
			"<textarea class='form-control' name='message' required='required'></textarea>"+
			"</div><div class='aob' id='messages-area'></div>"),
		draggable:true,
		buttons:[
		{
			id: 'btn-close',
			label: 'Close',
			cssClass: 'btn-primary',
			action: function(dialog) {
				dialog.close();
			}

		},
		{
			id: 'btn-send',
			label: 'Send',
			cssClass: 'btn-primary',
			hotkey: 13,
			action: function(dialog) {
				var message = dialog.getModalBody().find("textarea[name='message']").val();

				if (!(message.trim() === '')){
					sendMessage(message, id, function(status){
						if (status === "success") {
							dialog.getModalBody().find("textarea[name='message']").val('');
							dialog.getModalBody().find("textarea[name='message']").focus();
							dialog.getModalBody().find("div[id='messages-area']").append(message+"<br/>");

							$.toaster({
								priority:'success',
								title: 'Success',
								message: 'Message sent'
							});
						}
				    });
				}
			}
		}]
	});
}

function sendMessage(message, id, callback) {
	$.ajax({
		data: {
			message: message, 
			receiverId: id.id
		},
		url: '/message',
		type: 'post',

		success: function(response,status, xhr) {
			res = response;
			callback(status);
		},

		error: function(response, status, xhr) {
			callback(status);
		}
	});
}



function fetchMessages(callback) {
    $.ajax({
        url:'/messages',
        type:'get',
        success: function(response, status, xhr) {
            callback(response);
        }
    })
}

function fetchSenderImage(id, callback) {
    $.ajax({
        url: '/messages/image',
        type:'get',
        data: {id: id},
        success: function(response, status, xhr) {
            callback(response);
        }
    })
}