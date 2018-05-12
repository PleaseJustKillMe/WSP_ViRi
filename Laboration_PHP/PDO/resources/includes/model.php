<?php
//Anslutningsuppgifter till databasen
$host = 'localhost';
$dbname = 'blogg';
$user = 'admin';
$password = 'kaka123!';

//Skapar attributet
$attr = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

//Skapar PDO-Objekt
$pdo = new PDO("mysql:dbname=$dbname;host=$host", $user, $password, $attr);

//Testar vår Anslutningsuppgifter
if($pdo) {
  echo "Database connected!";

  echo "<pre>";
    foreach($pdo->query('SELECT * FROM Posts') as $row) {
    print_r($row); }
  echo "</pre>";

} else {
  print_r($pdo->errorInfo());
}


$model = array(
    '0' => array(
        'slug' => 'forsta-inlagget',
        'title' => 'Första inlägget',
        'author' => 'Gugge',
        'date' => '2015-01-01',
        'text' => 'Här kommer det första inlägget i sin helhet. Välkommen till Labb 3! Här övar vi på PHP för att bli duktiga webbserverprogrammerare. Detta är tredje labben och andra labben i en serie labbar som tillsammans bygger ihop detta projekt. Ett enkelt PHP-projekt men väl strukturerat och genomtänkt konstruerat.'
    ),
    '1' => array(
        'slug' => 'snart-ar-det-var',
        'title' => 'Snart är det vår',
        'author' => 'Gugge',
        'date' => '2015-02-24',
        'text' => 'Snart är det vår! Då övar vi på PHP för att bli duktiga webbserverprogrammerare. Detta är tredje labben och andra labben i en serie labbar som tillsammans bygger ihop detta projekt. Ett enkelt PHP-projekt men väl strukturerat och genomtänkt konstruerat.'
    ),
    '2' => array(
        'slug' => 'robin-presenterar-sig',
        'title' => 'Robin presenterar sig',
        'author' => 'Robin',
        'date' => '2015-02-25',
        'text' => 'Robin är en trevlig prick som gärna övar på PHP för att som du bli en duktig webbserverprogrammerare. Detta är tredje labben och andra labben i en serie labbar som tillsammans bygger ihop detta projekt. Ett enkelt PHP-projekt men väl strukturerat och genomtänkt konstruerat.'
    ),
    '3' => array(
        'slug' => 'senaste-inlagget',
        'title' => 'Senaste inlägget',
        'author' => 'Robin',
        'date' => '2015-02-26',
        'text' => 'Här kommer senaste inlägget i sin helhet. Välkommen till Labb 3! Här övar vi på PHP för att bli duktiga webbserverprogrammerare. Detta är tredje labben och andra labben i en serie labbar som tillsammans bygger ihop detta projekt. Ett enkelt PHP-projekt men väl strukturerat och genomtänkt konstruerat.'
    )
);
echo "<pre>";
foreach($model as $row) {
  print_r($row);
}
echo "</pre>";
?>
