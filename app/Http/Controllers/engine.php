<?php
namespace App\Http\Controllers;
require_once '/Users/dave/WorkWise/WorkWise/vendor/autoload.php';

use Algenza\Cosinesimilarity\Cosine;
use Illuminate\Support\Facades\Storage;
use Serafim\TFIDF\Vectorizer;
use Phpml\FeatureExtraction\TfIdfTransformer;
use Phpml\FeatureExtraction\TokenCountVectorizer;
use Phpml\Tokenization\WhitespaceTokenizer;

class engine
{
    function calculateTF($document) {
        $tf = array();
        $totalTerms = str_word_count($document);
        $terms = str_word_count($document, 1);
    
        foreach ($terms as $term) {
            if (array_key_exists($term, $tf)) {
                $tf[$term]++;
            } else {
                $tf[$term] = 1;
            }
        }
    
        foreach ($tf as $term => $frequency) {
            $tf[$term] = $frequency / $totalTerms;
        }
    
        return $tf;
    }
    
    // // Function to calculate the inverse document frequency (IDF) of each term in a collection of documents
    function calculateIDF($documents) {
        $idf = array();
        $totalDocuments = count($documents);
    
        foreach ($documents as $document) {
            $terms = array_unique(str_word_count($document, 1));
    
            foreach ($terms as $term) {
                if (array_key_exists($term, $idf)) {
                    $idf[$term]++;
                } else {
                    $idf[$term] = 1;
                }
            }
        }
    
        foreach ($idf as $term => $frequency) {
            $idf[$term] = log($totalDocuments / ($frequency + 1));
        }
    
        return $idf;
    }
    
    // // Function to compute the TF-IDF values of each term in a document
    function calculateTFIDF($document, $idf) {
        $tfidf = array();
        $tf = $this->calculateTF($document);
    
        foreach ($tf as $term => $frequency) {
            $tfidf[$term] = $frequency * $idf[$term];
        }
    
        return $tfidf;
    }
    
    // // Function to calculate the cosine similarity between two vectors
    function calculateCosineSimilarity($vector1, $vector2) {
        $dotProduct = 0;
        $magnitude1 = 0;
        $magnitude2 = 0;
    
        foreach ($vector1 as $term => $value) {
            if (array_key_exists($term, $vector2)) {
                $dotProduct += $value * $vector2[$term];
            }
    
            $magnitude1 += pow($value, 2);
        }
    
        foreach ($vector2 as $term => $value) {
            $magnitude2 += pow($value, 2);
        }
    
        $magnitude1 = sqrt($magnitude1);
        $magnitude2 = sqrt($magnitude2);
    
        if ($magnitude1 != 0 && $magnitude2 != 0) {
            return $dotProduct / ($magnitude1 * $magnitude2);
        } else {
            return 0;
        }
    }
    
    function computeTfIdf($file1){
        // $file1 = '/Users/dave/WorkWise/WorkWise/storage/app/public/resumes/ZStLV4S9Yb4jpkzX9YddASXoYoNqkhKmnsQAMtF2.pdf';
        $filePath1 = Storage::disk('public')->path($file1);
        echo $filePath1;
        // $document1 = file_get_contents('');
        $document3 = file_get_contents('/Users/dave/WorkWise/WorkWise/storage/app/public/resumes/x2hh55vv2BItCBN6O8ZqqqMklgoX4mnUqkf7Yio5.pdf');
        $document2 = file_get_contents('/Users/dave/WorkWise/WorkWise/storage/app/public/job_posts/jobPost.md');
        
        // $documents = array($document1, $document2);
        
        // $idf = $this->calculateIDF($documents);
        // // dd($idf);
        // $tfidf1 = $this->calculateTFIDF($document1, $idf);
        // // dd($tfidf1);
        // $tfidf2 = $this->calculateTFIDF($document2, $idf);
        // dd($tfidf2);
    
        
        // $cosineSimilarity = calculateCosineSimilarity($tfidf1, $tfidf2);
        
        // echo "Cosine Similarity: " . $cosineSimilarity;
    }
}

// function computeTfIdf()
// {
    // $document1 = new Vectorizer();
    // $document1->addFile(__DIR__ . '/JobPost.md');
    // $vector1 = array();
    // $vectorizer = new TokenCountVectorizer(new WhitespaceTokenizer());
    // $samples = [
    //     'Lorem ipsum dolor sit amet dolor',
    //     'Mauris placerat ipsum dolor',
    //     'Mauris diam eros fringilla diam',
    // ];
    // foreach ($document1->compute() as $document => $entries) {
    //     foreach ($entries as $entry) {
    //         // var_dump($entry);
    //         // array_push($vector1, [$entry->term, $entry->tfidf]);
    //         // echo "term: ".$entry->term . " => " . $entry->occurrences ."<br>";
    //         $vector1[$entry->term] = $entry->occurrences;
    //     }
    // }

    // $vectorizer = new TokenCountVectorizer(new WhitespaceTokenizer());

    // Build the dictionary.
    // $vectorizer->fit($samples);

    // Transform the provided text samples into a vectorized list.
    // $vectorizer->transform($samples);
    // dd($samples);
// }
// function computeTfIdf(){
// $samples = [
//     [0 => 1, 1 => 1, 2 => 2, 3 => 1, 4 => 0, 5 => 0],
//     [0 => 1, 1 => 1, 2 => 0, 3 => 0, 4 => 2, 5 => 3],
// ];

// $transformer = new TfIdfTransformer($samples);
// $transformer->fit($samples);
// }


// function computeTfIdf($string)
// {
//     $document1 = new Vectorizer();
//     $document2 = new Vectorizer();
//     // $document1->addText($string);
//     $document1->addFile(__DIR__.'/JobPost.md');
//     // $document1->addFile(__DIR__.'/JobPost2.md');
//     // $document2->addFile(__DIR__.'/CV2.md');
//     $document2->addFile(__DIR__.'/CV.md');
//     // $document2->addText("This is the third document in php David. Daivd is proficient in php as well as javascript and android development");

//     $vector1 = array();
//     $vector2 = array();

//     foreach ($document1->compute() as $document => $entries) {
//         foreach ($entries as $entry) {
//             // var_dump($entry);
//             // array_push($vector1, [$entry->term, $entry->tfidf]);
//             // echo "term: ".$entry->term . " => " . $entry->occurrences ."<br>";
//             $vector1[$entry->term] = $entry->occurrences;
//         }
//     }
//     // $document1->computeFor(__DIR__.'/CV.md');
//     foreach ($document2->compute() as $document => $entries) {
//         foreach ($entries as $entry) {
//             // var_dump($entry);
//             // echo "term: ".$entry->term . " => " . $entry->tfidf ."<br>";
//             // array_push($vector2, [$entry->term => $entry->tfidf]);
//             $vector2[$entry->term] = $entry->occurrences;
//         }
//     }
//     $master_vector = array($vector1, $vector2);
//     // dd($master_vector);
//     $transformer = new TfIdfTransformer();
//     $transformer->transform($master_vector);
//     // dd($transformer);
//     // $transformer->transform($master_vector);

//     // dd($vector2);
//     // $s = computeScore($vector1, $vector2);
//     // echo $s;
// }
// function computeScore($vectorA, $vectorB)
// {
    // $similarity = Cosine::similarity($vector1, $vector2);
    // // return (int)($similarity*100);
    // return $similarity;
    // $vectorA = [
    //     'type' => 3,
    //     'code' => 1,
    //     'run' => 2,
    //     'david' => 2,
    //     ];

    //     $vectorB = [
    //     'type' => 3,
    //     'code' => 5,
    //     'run' => 1
    //     ];

    // $similarity = Cosine::similarity($vectorA, $vectorB);
    // return (int)($similarity * 100);
// }

// Function to calculate the term frequency (TF) of each term in a document

// Example usage
