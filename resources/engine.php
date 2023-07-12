<?php
require_once '/Users/dave/WorkWise/WorkWise/vendor/autoload.php';

use Serafim\TFIDF\Vectorizer;
function computeTfIdf($string){
    $vectorize = new Vectorizer();
    $vectorize->addText($string);
    $vectorize->addText("This is the third document in php David");
    foreach ($vectorize->compute() as $document => $entries) {
        // var_dump($document);
    
        foreach ($entries as $entry) {
            // var_dump($entry);
            echo "term: ".$entry->term . " => tfidf: " . $entry->tfidf . "<br>";
        }
    }
    dd($vectorize->getDocuments());
}
?>