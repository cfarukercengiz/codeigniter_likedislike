$(document).ready(function () {

    $(".post_list").on("click", ".likeBtn", function () {
        var data_id = $(this).attr("data-id");
        var t = $(this);
        $.post("http://localhost/codeigniter_like_dislike/oyla", {post_id: data_id, vote_status: 1}, function (resp) {
            //Tüm içeriği Render Page ile çekmek için alttaki kod.
            //$(".post_list").html(resp);
            //Tek içeriği Render Page ile çekmek için alttaki kod.
            t.parent().parent().html(resp);
        });

    });

    $(".post_list").on("click", ".dislikeBtn", function () {
        var data_id = $(this).attr("data-id");
        var t = $(this);
        $.post("http://localhost/codeigniter_like_dislike/oyla", {post_id: data_id, vote_status: -1}, function (resp) {
            //Tüm içeriği Render Page ile çekmek için alttaki kod.
            //$(".post_list").html(resp);
            //Tek içeriği Render Page ile çekmek için alttaki kod.
            t.parent().parent().html(resp);
        });
    });

});