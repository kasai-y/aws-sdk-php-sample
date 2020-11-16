<?php

require_once 'vendor/autoload.php';

use Aws\Credentials\CredentialProvider;
use Aws\S3\S3Client;

// 環境変数 `AWS_PROFILE` で指定された認証情報が読み込まれる。
// 指定しない場合は `default` が選択される。
$provider = CredentialProvider::defaultProvider();

$s3Client = new S3Client([
    'region'      => 'ap-northeast-1',
    'version'     => 'latest',
    'credentials' => $provider,
]);

$buckets = $s3Client->listBuckets();

foreach ($buckets['Buckets'] as $bucket) {
    echo $bucket['Name'] . "\n";
}
