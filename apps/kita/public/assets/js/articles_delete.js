$(function() {
    $('#delete').click(
        function() {
            var selectedArticles = [];

            // 選択された記事のチェックボックスを検索し、その記事IDを配列に追加
            $('input[name="selected_articles[]"]:checked').each(function() {
                selectedArticles.push($(this).data('article-id'));
            });

            // 選択された記事IDをカンマ区切りの文字列に変換
            var myArticle = selectedArticles.join(',');

            var csrfToken = $('meta[name="csrf-token"]').attr('content'); // CSRFトークンを取得
            $.ajax({
                url: '/mypage',
                type: 'DELETE',
                data: {
                    _token: csrfToken, // CSRF トークンを送信
                    myArticle: myArticle
                },
                dataType: 'JSON',
            }).done(function(response) {
                alert('記事削除に成功しました');
                // 選択された記事IDに基づいて行を削除
                selectedArticles.forEach(function(id) {
                    $('#row_' + id).remove();
                });
            }).fail(function() {
                alert('記事削除に失敗しました');
            });
        }
    );
});
