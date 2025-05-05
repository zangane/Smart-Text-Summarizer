<?php

class TextSummarizer
{
    private $text;
    private $sentences = [];
    private $wordScores = [];

    public function __construct($text)
    {
        $this->text = $text;
        $this->sentences = $this->splitIntoSentences($text);
    }

    public function summarize($sentenceCount = 3)
    {
        $this->calculateWordScores();

        $sentenceScores = [];
        foreach ($this->sentences as $sentence) {
            $score = 0;
            $words = $this->tokenize($sentence);
            foreach ($words as $word) {
                if (isset($this->wordScores[$word])) {
                    $score += $this->wordScores[$word];
                }
            }
            $sentenceScores[$sentence] = $score;
        }

        arsort($sentenceScores);
        return array_slice(array_keys($sentenceScores), 0, $sentenceCount);
    }

    private function calculateWordScores()
    {
        require_once "stopwords.php";
        $allWords = [];

        foreach ($this->sentences as $sentence) {
            $words = $this->tokenize($sentence);
            foreach ($words as $word) {
                if (!in_array($word, $stopWords)) {
                    if (!isset($allWords[$word])) {
                        $allWords[$word] = 1;
                    } else {
                        $allWords[$word]++;
                    }
                }
            }
        }

        $this->wordScores = $allWords;
    }

    private function tokenize($sentence)
    {
        $sentence = strtolower($sentence);
        $sentence = preg_replace("/[^a-zA-Z0-9\s]/", "", $sentence);
        return explode(" ", $sentence);
    }

    private function splitIntoSentences($text)
    {
        $text = preg_replace("/\r|\n/", " ", $text);
        return preg_split("/(?<=[.!?])\s+/", $text, -1, PREG_SPLIT_NO_EMPTY);
    }
}
