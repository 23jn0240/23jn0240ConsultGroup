<?php
// CSVファイル名を指定
$csv_file = 'contacts.csv';

// フォームが送信された場合
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 入力データを取得
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
    $date = date('Y-m-d H:i:s');

    // CSVに保存するデータ
    $data = [$date, $name, $email, $message];

    // CSVファイルに追記
    $file = fopen($csv_file, 'a');
    fputcsv($file, $data);
    fclose($file);

    echo "お問い合わせを受け付けました。";
} else {
    echo "フォームが送信されていません。";
}
?>
