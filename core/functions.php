<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

function connect () {
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);

    mysqli_set_charset($conn, "utf8");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function insertData ($conn) {
    $data = file_get_contents('php://input');
    $data = json_decode($data, true);
    $name = $data['name'];
    $lastname = $data['lastname'];
    $age = $data['age'];


    $sql = "INSERT INTO users (name, lastname, age) VALUES ('".$name."', '".$lastname."', '".$age."')";

    if (mysqli_query($conn, $sql)) {
        echo 1;
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
}

function googleSheets ($conn) {
    //require_once(__DIR__ . '/vendor/autoload.php');
    $client = new Google_Client();
    $client->setApplicationName('Google Sheets API PHP Quickstart');
    $client->setScopes(Google_Service_Sheets::SPREADSHEETS);
    $client->setAuthConfig('secret.json');
    $client->setAccessType('offline');
    $client->setRedirectUri( 'https://' . basename( __FILE__, '.php' ) );

    // -------------------------------------------------------------------














    // ----------------------------------------------------------------


    if (isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    }


    $service = new Google_Service_Sheets($client);

    $spreadsheetId = "1shzNjUC3EO4Fl0QcbAI813zHTvJ-A3zH0_YBIUJGago";

    $range = "A1:E5";
    $values = [
        //json_encode($a, JSON_FORCE_OBJECT), "\n\n"
        //$a
        ['Мистер робот', 'Jack', 'Sophy']
    ];

    $body = new Google_Service_Sheets_ValueRange([
        'values' => $values
    ]);

    $params = [
        'valueInputOption' => 'RAW'
    ];

    $result = $service->spreadsheets_values->update(
        $spreadsheetId,
        $range,
        $body,
        $params
    );
}

function closeConn ($conn) {
    mysqli_close($conn);
}

