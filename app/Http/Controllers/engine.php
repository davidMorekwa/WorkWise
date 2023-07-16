<?php

namespace App\Http\Controllers;

require_once '/Users/dave/WorkWise/WorkWise/vendor/autoload.php';

use Algenza\Cosinesimilarity\Cosine;
use App\Models\jobseekers;
use Asika\Pdf2text;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Serafim\TFIDF\Vectorizer;
use Phpml\FeatureExtraction\TfIdfTransformer;
use Phpml\FeatureExtraction\TokenCountVectorizer;
use Phpml\Tokenization\WhitespaceTokenizer;
use Spatie\PdfToText\Pdf;

use function Termwind\terminal;

class engine
{
    function computeTfIdf()
    {
        $profile = jobseekers::where('userId', Auth::user()->id)->first();
        $profileText = $profile->self_desription . "\n" . $profile->education . "\n" . $profile->experience . "\n" . $profile->skills . "\n" . $profile->achievements . "\n" . $profile->certifications . "\n" . $profile->hobbies . "\n";
        $vectorizer = new Vectorizer();
        Artisan::call('app:export-data-command');
        $files = Storage::files('public/job_posts');
        // echo $files;
        foreach ($files as $file) {
            $vectorizer->addFile('/Users/dave/WorkWise/WorkWise/storage/app/' . $file);
        }
        $vectorizer->addText($profileText);
        $corpus = array();
        foreach ($vectorizer->compute() as $document => $entries) {
            foreach ($entries as $entry) {
                // echo $entry->term . " => " . $entry->tfidf . "<br>";
                $corpus[$entry->term] = $entry->idf;
            }
        }
        $vectorizer2 = new Vectorizer();
        $vectorizer2->addText($profileText);
        $profile_vector = array();
        foreach ($vectorizer2->compute() as $document => $entries) {
            foreach ($entries as $entry) {
                // echo $entry->term . " => " . $entry->tf . "<br>";
                $profile_vector[$entry->term] = $entry->tf;
            }
        }
        foreach ($profile_vector as $term => $tf) {
            // echo "TF:".$tf."<br>";
            if (isset($corpus[$term])) {
                $tfidf = $tf * $corpus[$term];
                $profile_vector[$term] = $tfidf;
            }
        }

        $file_vector = array();
        $recommended = array();
        foreach ($files as $file) {
            $vectorizer3 = new Vectorizer();
            $vectorizer3->addFile('/Users/dave/WorkWise/WorkWise/storage/app/' . $file);
            foreach ($vectorizer3->compute() as $document => $entries) {
                foreach ($entries as $entry) {
                    // echo $entry->term . " => " . $entry->tf . "<br>";
                    $file_vector[$entry->term] = $entry->tf;
                }
            }
            foreach ($file_vector as $term => $tf) {
                if(isset($corpus[$term])){
                    $tfidf = $tf * $corpus[$term];
                    $profile_vector[$term] = $tfidf;
                }
            }
            $similarity = Cosine::similarity($profile_vector, $file_vector);
            if($similarity > 0.5){
                // echo "Files: ".$file.". Score: ".$similarity."<br>";
                $tempFile = new File('/Users/dave/WorkWise/WorkWise/storage/app/'.$file);
                $fileNameWithoutExtension = pathinfo($tempFile->getFilename(), PATHINFO_FILENAME);
                echo $fileNameWithoutExtension;
                array_push($recommended, $fileNameWithoutExtension);
            }
        }
        return $recommended;
        
    }
}
