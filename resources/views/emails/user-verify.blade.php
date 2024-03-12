<!DOCTYPE html>
<html lang="ja">
        
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <p>
            ※このメールは、【成田高校付属小学校お弁当注文サイト】にご登録申請頂いたメールアドレス宛に自動的に送信しています。
        </p>
        <p>
            この度は、会員登録にお申込みいただきまして誠にありがとうございます。
        </p>
        <p>
            以下のリンクをクリックして会員登録をお進めください。
        </p>
        
        <a href="{{ $actionUrl }}" class="button">{{$actionText}}</a>

        <p>
            <hr>
            <span class="break-all">
            <p> <strong>【ご注意】</strong></p>
            <p>
                本メールにご返信いただいてもお応えできませんのでご了承ください。
            </p>
            <p>
                本メールに身に覚えの無い場合は、本メールを破棄していただきますようお願いいたします。
            </p>
            <strong>リンクをクリックできない場合は、以下の URL をコピーして Web ブラウザに貼り付けてください。</strong><br/>
            <em>{{$actionUrl}}</em>
        </p>

        
    </body>

</html>