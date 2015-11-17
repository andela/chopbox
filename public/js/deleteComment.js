/**
 * Created by Verem on 17/11/15.
 */
$(document).ready(function(){
   $('.delete-comment').on('click', function(e){
       e.preventDefault();
       var id = $(this).data('id');

       deleteComment(id);
   });

    $('.edit-comment').on('click', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        editComment(id);
    });


    function deleteComment(id)
    {
        BootstrapDialog.show({
            title: 'Confirm',
            message: 'Delete Comment ?',
            buttons: [
                {
                    label: 'Nah',
                    cssClass: 'btn-primary',
                    action: function(dialog){
                        dialog.close();
                    }
                },
                {
                    label: "Yep",
                    cssClass: 'btn-primary',
                    action: function(dialog){
                        $.ajax({
                            url: 'comment/delete/'+id,
                            type: 'post',
                            data: {id: id},
                            success: function(){
                                $('#comment-'+id).empty();
                                dialog.close();

                                $.toaster({
                                    priority : 'success',
                                    title : 'Sucess',
                                    message : 'comment deleted'
                                })

                            },
                            error: function(){
                                dialog.close();
                                $.toaster({
                                    priority : 'danger',
                                    title : 'Error',
                                    message : 'unable to delete comment. please try again.'
                                });
                            }
                    });
                }
            }]
        });
    }

    function editComment(id)
    {
        findComment(id, function(comment){
            var text = comment.comment;
            BootstrapDialog.show({
                title : 'Edit Comment',
                message: function(dialog){
                    var content = $("<div class='form-group'>" +
                    "<input type='text' class='form-control' name='comment' value='"+text+"'>" +
                    "</div>");

                    dialog.getButton('edit-button');

                    return content;
                },
                buttons: [
                    {
                        label: 'Cancel',
                        cssClass: 'btn-primary',
                        action: function(dialog){
                            dialog.close();
                        }
                    },
                    {
                        label: 'Done',
                        cssClass: 'btn-primary',
                        id: 'edit-button',
                        action: function(dialog){
                            var comment = dialog.getModalBody()
                                .find('input').val();
                            updateComment(comment, id, dialog);
                        }
                    }
                ]
            });
        });

    }

    function findComment(id, callback)
    {
        $.ajax({
            'url': '/comment/'+id,
            type: 'get',
            success: function(response){
               callback(response);
            }
        });
    }

    function updateComment(comment, id, dialog)
    {
        $.ajax({
            url: '/comment/edit/'+id,
            type: 'post',
            data: {comment: comment},
            success: function(response){
                $('comment#comment-body-'+id).empty()
                    .append(response.comment.comment);
                dialog.close();
            }
        });
    }

});