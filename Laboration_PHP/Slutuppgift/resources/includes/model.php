<?php
require 'resources/includes/db_conn.php'; // Att dom behöver en connection till PHPmyAdmin

if ($pdo) {

    // En lista med alla inlägg och vem som gjort dom
    $sql = 'SELECT P.ID, P.Slug, P.Headline, CONCAT(U.Firstname, " ", U.Lastname) AS Name, P.Creation_time, P.Text FROM Posts AS P JOIN Users AS U ON U.ID = P.User_ID ORDER BY P.Creation_time DESC';

    // Sökrutan
    if (isset($_POST['search'])) {
        // Visar resultat genom What
        $data = $_POST['what'];

        /**********************************************************/
        /*********************** C-UPPGIFT 1 **********************/
        /*** Variabeln $data kan innehålla, som den är utformad, **/
        /********* information som kan skada vår databas. *********/
        /*** För betyget C så kräver jag att ni säkerställer att **/
        /***** $data inte innehåller någon form av skadlig kod ****/
        /**********************************************************/

        /**********************************************************/
        /*********************** C-UPPGIFT 2 **********************/
        /* I filen all-posts.php så skrivs det ut en kortare text */
        /* följt av en länk till berört inlägg. Vore det inte mer */
        /* passande att det istället skrivs ut ord från inlägget? */
        /* För betyget C så kräver jag att ni tar fram en lösning */
        /**** där 10 ord från inlägget skrivs ut före läs mer. ****/
        /************ Tänk implode och/eller explode! *************/
        /**********************************************************/

        /**********************************************************/
        /************************ A-UPPGIFT ***********************/
        /** Som det är just nu så tar vi bara in en variabel som **/
        /******* vi använder när vi söker igenom databasen. *******/
        /* Tittar man på sidor som exempelvis google och facebook */
        /**** så kan din sökning oftast innehålla flera sökord ****/
        /* För betyget A så kräver jag att ni tar fram en lösning */
        /** som gör det möjligt för användaren att kunna söka på **/
        /** flera separerade ord. Att man exempelvis kan söka på **/
        /***** texter som innehåller både "Lorum" och "Ipsum." ****/
        /**********************************************************/

        // Om resultatet ej är tomt så kommer det en lista med inlägg som skapats
        if (!empty($data)) {
            $sql = 'SELECT p.ID, p.Slug, p.Headline, CONCAT(u.Firstname, " ", u.Lastname) AS Name, p.Creation_time, p.Text FROM Posts AS p JOIN Users AS u ON U.ID = P.User_ID WHERE p.Text LIKE "%'.$data.'%" ORDER BY P.Creation_time DESC';
        }
    }

    // Skapar array
    $model = array();
    // Sorterar resutlat från PDO till Row
    foreach($pdo->query($sql) as $row) {
        // Strukturerar varje rad från foreach i en arrayq
        $model += array(
            $row['ID'] => array(
                'slug' => $row['Slug'],
                'title' => $row['Headline'],
                'author' => $row['Name'],
                'date' => $row['Creation_time'],
                'text' => $row['Text']
            )
        );
    }
}
else {
    print_r($pdo->errorInfo());
}
?>
