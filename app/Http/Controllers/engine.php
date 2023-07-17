<?php

namespace App\Http\Controllers;

// require_once '/Users/dave/WorkWise/WorkWise/vendor/autoload.php';

require_once  'A:\Coding Database\WorkWise\vendor\autoload.php';

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
        // Add job posts to corpus
        Artisan::call('app:export-data-command');
        $files = Storage::files('public/job_posts');
        foreach ($files as $file) {
            $vectorizer->addFile('A:/Coding Database/WorkWise/storage/app/' . $file);
        }
        $vectorizer->addText($profileText);
        $corpus = array();
        foreach ($vectorizer->compute() as $document => $entries) {
            foreach ($entries as $entry) {
                // echo $entry->term . " => " . $entry->tfidf . "<br>";
                $corpus[$entry->term] = $entry->idf;
            }
        }

        // vectorize user profile info
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
        // vectorize the files/jobposts
        $file_vector = array();
        $recommended = array();
        foreach ($files as $file) {
            $vectorizer3 = new Vectorizer();
            $vectorizer3->addFile('A:/Coding Database/WorkWise/storage/app/' . $file);
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

            // compute cosine similarity
            $similarity = Cosine::similarity($profile_vector, $file_vector);
            if($similarity > 0.5){
                // echo "Files: ".$file.". Score: ".$similarity."<br>";
                $tempFile = new File('A:/Coding Database/WorkWise/storage/app/'.$file);
                $fileNameWithoutExtension = pathinfo($tempFile->getFilename(), PATHINFO_FILENAME);
                array_push($recommended, $fileNameWithoutExtension);
            }
        }
        return $recommended;
        
    }
}
