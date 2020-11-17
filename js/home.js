$(document).ready(function () {

    var userId = $("#user-id-field").val();
    var friendInfo = null;

    var  message_con = document.getElementById("mes_con");
    let height = ($(window).height() - 100);
    /* code for adjust height the page */
    function adjustHeight() {
        console.log('run');
        $(".chatApp .main-section .left-side").height(height);
        $(".chatApp .main-section .right-side").height(height);

        $(window).resize(function () {
            $(".chatApp .main-section .left-side").height(height);
            $(".chatApp .main-section .right-side").height(height);
        });
    }
    adjustHeight();
    /* code for adjust hight the page */

    /* get user's friends */
    function getFriends() {

        $.ajax({
            type: "get",
            url: `/myChat/scripts/getfriends.php?userId=${userId}`,
            success: function (response) {

                response = JSON.parse(response);

                // console.log(response);
                let friend = null;
                let status = null;
                for (let i = 0; i < response.length; i++) {

                    friend = response[i];

                    status = friend.log_in == "offline" ? `<i class="fa fa-circle-o"></i><span>${friend.log_in}</span>` : `<i class="fa fa-circle" style="color:green;"></i><span>${friend.log_in}</span>`;

                    $("#friends_con").append(`
               
                <div class="friend-box">
               
                    <img src="images/${friend.picture}" alt="image">

                     <div class="info">
                        <p><a href="home.php?friendId=${friend.id}">${friend.name}</a></p>
                         ${status}
                     </div>
               
               </div>`);

                }

            }
        });

    }
    getFriends();
    /* get user's friends */





    /* get the messages of the friend */

    let paramsearch = new URLSearchParams(window.location.search);

    function getMessages() {
        console.log("activate");


        /* get friends info */

        if (paramsearch.has("friendId")) {

            let friendId = paramsearch.get("friendId");
            friendInfo = null;
            $.get(`/myChat/scripts/getfriendinfo.php?friendId=${friendId}`, data => {

                friendInfo = JSON.parse(data)[0];
                // console.log(friendInfo);
            });


            /* get friends info */




            $.ajax({
                type: "get",
                url: `/myChat/scripts/getmessages.php?firendId=${friendId}&userId=${userId}`,
                success: function (response) {
                    let messages = JSON.parse(response)
                    // console.log(messages);
                    if (friendInfo != null) {
                        $(".chatApp .bar .right-side").empty();
                        $(".chatApp .bar .right-side").append(`
                            <img src="images/${friendInfo.picture}" alt="image">
                            <span>${friendInfo.name}</span>
                            <input type="hidden" name="user-id" value="${userId}" id="user-id-field">
                            <a href="logout.php" class="btn btn-danger">logout</a>
                       `);
                    }
                    if (messages.length) {
                        let messageAlign = null;
                        $("#mes_con").empty();
                        for (let index in messages) {
                            if (messages[index].sender_id == userId) {
                                $("#mes_con").append(`

                                    <div class="messageRow  yourmessage">
                                        <div class="message-content">
                                            <div class="message-text">${messages[index].content}</div>
                                            <div class="message-date">${messages[index].date}</div>
                                        </div>
                                </div>
                            `);
                            } else {
                                $("#mes_con").append(`

                                    <div class="messageRow  othermessage">
                                        <div class="message-content">
                                            <img src="images/${messages[index].picture}" alt="image">
                                            <div class="message-text">${messages[index].content}</div>
                                            <div class="message-date">${messages[index].date}</div>
                                        </div>
                                </div>
                            `);
                            }
                        }

                    } else {

                    }
                }
            });
        }
    }
    getMessages();


    setInterval(function () {
        getMessages();
    }, 1000);

    /* get the messages of the friend */

    /*  make event for send message */

    $("#send_message").click(function () {

        console.log("clicked");
        let message = $("#message_field").val()

        if (message) {
            $.ajax({
                type: "post",
                url: "/myChat/scripts/send_message.php",
                data: {
                    senderId: userId,
                    recieverId: friendInfo.id,
                    message: message
                },
                success: function (response) {
                    console.log(response);
                    $("#message_field").val("");
                }
            });
        }

    });

    /*  make event for send message */

    /* trigger nicescroll */

    $("#mes_con").niceScroll({
        cursorcolor: "black",
    });
    $("#friends_con").niceScroll({
        cursorcolor: "red",
    });

    $("body").niceScroll({
        cursorcolor: "red",
    });

    /* trigger nicescroll */
});