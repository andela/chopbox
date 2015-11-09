<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Scripts -->
<script src="{!! asset('js/jquery.min.js') !!}"></script>
<script src="{!! asset('js/expanding.js') !!}"></script>
<script src="{!! asset('js/chart.js') !!}"></script>
<script src="{!! asset('js/toolkit.js') !!}"></script>
<script src="{!! asset('js/application.js') !!}"></script>

<script>
    // execute/clear BS loaders for docs
    $(function(){
        if (window.BS&&window.BS.loader&&window.BS.loader.length) {
            while(BS.loader.length){(BS.loader.pop())()}
        }
    })
</script>

<script>
    function updateModal(response) {
        var htmlResponse = '';

        for(var followee in response) {
            htmlResponse += '<li class="b">' +
            '<div class="qg">' +
            '<a class="qk" href="#">' +
            '<img class="qi cu" src="' + response[followee].image_uri + '">' +
            '</a>' +
            '<div class="qh">' +
            '<button class="cg fm fx eg">' +
            '<span class="c aok"></span> Follow' +
            '</button>' +
            '<strong>' + response[followee].firstname + ' ' + response[followee].lastname + '</strong>' + '<p>' + '@' + response[followee].username.toLowerCase() + ' - ' + response[followee].location + '</p>' +
            '</div>' +
            '</div>' +
            '</li>';
        }

        return htmlResponse;
    }

    function checkFollowStatus(field) {
        return
    }

    $('#following').on('click', function() {
        $.ajax({
            url: 'followees'
        }).done(function(response) {
            $('#followingList').html(updateModal(response));
            var modalTag = $('#userModal');
            modalTag.find('.modal-title').text('Following');
            modalTag.modal('handleUpdate');
            modalTag.modal('show');
        });
    });


    $('#followers').on('click', function() {
        $.ajax({
            url: 'followers'
        }).done(function(response) {
            $('#followingList').html(updateModal(response));
            var modalTag = $('#userModal');
            modalTag.find('.modal-title').text('Followers');
            modalTag.modal('handleUpdate');
            modalTag.modal('show');
        });
    });

    $(document).ready(function() {
        $('.pop').popover({
            html: true,
            trigger: "hover",
            content: function() {
                
                var test = "jh";
                $.ajax({
                    url: "follow_status",
                    data: {'followee_id': $(this).next('input').val()}
                }).done(function(response) {
                    test = response;
                    console.log(test);
                });

                return "<span class='follow' style='cursor: pointer' id='" + $(this).next('input').val() + "'>" + (test == "NO") ? 'Follow' : 'Unfollow' + "</span>";
            },
            placement: "top",
            delay: {"hide": 700},
            animation: "true"});

        $('.pop-left').popover({
            html: true,
            trigger: "hover",
            content: function() {
                var test = checkFollowStatus(this).done(function(response){
                   return response;
                });
                console.log(test);
                return "<span class='follow' style='cursor: pointer' id='" + $(this).next('input').val() + "'>" + (checkFollowStatus(this) == "NO") ? 'Follow' : 'Unfollow' + "</span>";
            },
            placement: "left",
            delay: {"hide": 700},
            animation: "true"});
    });

    $('.pop-left').on('shown.bs.popover', function() {
        $('.follow').on('click',function() {
            $.ajax({
                url: 'follow',
                data: {'followee_id': $(this).prop('id')}
            }).done(function(response) {
                $('.followings_count').empty();
                $('.followings_count').append(response);
            });
        });
    });

    $('.unfollow').click(function(evt) {
        evt.preventDefault();
        $.ajax({
            url: 'unfollow',
            type: 'get',
            data: {'followee_id': $(this).prop('id')},
            success: function(response) {
                var followee_id = response['followee_id'];
                $('#' + followee_id).remove();
                $('.followings_count').empty();
                $('.followings_count').append(response['followings']);
            }
        });
    });

    $('#camera').click(function() {
        $( "#file" ).click();
    });
</script>