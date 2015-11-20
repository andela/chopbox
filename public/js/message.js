
$(document).ready(function(){
	$('#message-div').hide();
		
		$('#msg-btn').click(function(e){
			e.preventDefault();
			var id = $(this).data(id);
			displayDialog(id);
		});
});

function displayDialog(id) {
	BootstrapDialog.show({
		title: "New message",
		message: $("<div class='form-group'>"+
			"<textarea class='form-control' name='message' required='required'></textarea>"+
			"</div>"),
		draggable:true,
		buttons:[
		{
			id: 'btn-close',
			label: 'Close',
			action: function(dialog) {
				dialog.close();
			},

		},
		{
			id: 'btn-send',
			label: 'Send',
			hotKey: 13,
			action: function(dialog) {
				var message = dialog.getModalBody().find("textarea[name='message']").val();

				if (!(message.trim() === '')){
					sendMessage(message, id, function(status){
						if (status === "success") {
							dialog.close();
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
			 console.log(status);
			callback(status);
		},

		error: function(response, status, xhr) {
			callback(status);
		}
	});
}