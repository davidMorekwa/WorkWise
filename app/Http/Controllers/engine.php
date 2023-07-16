<?php

namespace App\Http\Controllers;

require_once '/Users/dave/WorkWise/WorkWise/vendor/autoload.php';

use Algenza\Cosinesimilarity\Cosine;
use Asika\Pdf2text;
use Illuminate\Support\Facades\Storage;
use Serafim\TFIDF\Vectorizer;
use Phpml\FeatureExtraction\TfIdfTransformer;
use Phpml\FeatureExtraction\TokenCountVectorizer;
use Phpml\Tokenization\WhitespaceTokenizer;
use Spatie\PdfToText\Pdf;

class engine
{
    function computeTfIdf()
    {
        $vectorizer = new Vectorizer();
        // $encoded_file_contents = Storage::get(asset('storage/resumes/DxMIFjM2EK0qydkNVz5Jhpy3phfxElwwHuGKvERC.pdf'));
        // $decodedContents = base64_decode($encoded_file_contents);
        // echo $decodedContents;
        $vectorizer->addFile('/Users/dave/WorkWise/WorkWise/storage/app/public/resumes/DxMIFjM2EK0qydkNVz5Jhpy3phfxElwwHuGKvERC.pdf');
        $vectorizer->addFile('/Users/dave/WorkWise/WorkWise/storage/app/public/resumes/GpapxsqkRCtlBcIva69q3fdfShWMhHJnrzv9UGdG.pdf');
        foreach ($vectorizer->compute() as $document => $entries){
            foreach ($entries as $entry) {
                echo $entry->term . " => " . $entry->tfidf . "<br>";
            }
        }
    }
}
