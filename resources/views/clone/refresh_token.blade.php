<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Clone website</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>

    <body>
        <?php 
            ini_set('MAX_EXECUTION_TIME', '-1');
            set_time_limit(0);
            include_once("clone/simple_html_dom.php");
            libxml_use_internal_errors(true);


            // curl https://api.dropbox.com/oauth2/token \
            // -d grant_type=refresh_token \
            // -d refresh_token=LEIoQppcWZEAAAAAAAAAAUfaqlrOD0zqubu-G9Kkz0UhRezSkbC5ljlKlbW9KP4- \
            // -u 5jhxuvfzqzvdwi3:gs277omix25f7jb
            $app_key="5jhxuvfzqzvdwi3";
            $app_secret="gs277omix25f7jb";
            $headers = array("Authorization: Basic " . base64_encode($app_key . ":" . $app_secret),
                            "Content-Type: application/x-www-form-urlencoded");

            $params = array(
                        "grant_type" => "refresh_token",
                        "refresh_token" => "LEIoQppcWZEAAAAAAAAAAUfaqlrOD0zqubu-G9Kkz0UhRezSkbC5ljlKlbW9KP4-");

            $ch = curl_init('https://api.dropbox.com/oauth2/token');
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $a = json_decode($response);
            \DB::table('setting')->where('id',1)->update([
                'token' => $a->access_token,
            ]);
        ?>
    </body>
</html>
