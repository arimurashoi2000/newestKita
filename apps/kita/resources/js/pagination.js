$(document).ready(function() {
    // ページ読み込み時にセッションストレージから選択した記事IDとチェック状態を取得
    const selectedArticleIdsJSON = sessionStorage.getItem('selectedArticleIds');
    const selectedArticleIds = selectedArticleIdsJSON ? JSON.parse(selectedArticleIdsJSON) : [];
    const selectedCheckboxesJSON = sessionStorage.getItem('selectedCheckboxes');
    const selectedCheckboxes = selectedCheckboxesJSON ? JSON.parse(selectedCheckboxesJSON) : [];

    // チェックボックスの状態をセッションストレージから復元
    $('input[type="checkbox"]').each(function() {
        const key = $(this).data('key');
        if (selectedArticleIds.includes(key)) {
            $(this).prop('checked', true);
        }
    });

    // チェックボックスの状態が変更されたときにセッションストレージに保存
    $('input[type="checkbox"]').on('change', function() {
        const key = $(this).data('key');
        if ($(this).prop('checked')) {
            selectedArticleIds.push(key);
            selectedCheckboxes.push(key);
        } else {
            const index = selectedArticleIds.indexOf(key);
            if (index !== -1) {
                selectedArticleIds.splice(index, 1);
                selectedCheckboxes.splice(index, 1);
            }
        }
        sessionStorage.setItem('selectedArticleIds', JSON.stringify(selectedArticleIds));
        sessionStorage.setItem('selectedCheckboxes', JSON.stringify(selectedCheckboxes));
    });

    // ページネーションリンクがクリックされたとき
    $('#pagination-container a').on('click', function(e) {
        e.preventDefault(); // ページ遷移を防ぐ

        // ページネーションリンクのURLに記事IDを追加
        const nextPageUrl = $(this).attr('href'); // ページネーションリンクのURL
        const queryString = selectedArticleIds.length > 0 ? `selected_articles=${selectedArticleIds.join(',')}` : '';
        const separator = nextPageUrl.includes('?') ? '&' : '?';
        const fullUrl = nextPageUrl + separator + queryString;

        // 新しいページに遷移
        window.location.href = fullUrl;
    });
});
