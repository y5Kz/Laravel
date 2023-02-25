$(function () {
    $('#fire').on('click', function (event) {
        //イベント発生時に実行したい処理
        event.preventDefault()
        var reply = $("#replyform").val();
        let element = document.getElementById('post_id');
        var postid = element.dataset.id

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST", //HTTP通信の種類
            url: '/contribution', //通信したいURL
            dataType: 'json',
            data: {
                'post': postid, //コントローラーに渡すパラメーター
                'reply': reply
            },
        })
            //通信が成功したとき
            .done((res) => {
                var html = ` 
                                    <tr>
                                    <td scope="col" class='text-center'>${res.commentData.user['name']}<br>${res.commentData['reply']}<br>${res.commentData['created_at']}</td>
                                    </tr>
                                `;

                $(".reply").append(html);

            })
            //通信が失敗したとき
            .fail((error) => {
                alert(JSON.stringify(data));
            })
    })
});
