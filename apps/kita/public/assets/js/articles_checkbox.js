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
