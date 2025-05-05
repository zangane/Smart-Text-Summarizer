# Smart Text Summarizer (PHP OOP)

Smart Text Summarizer is a lightweight, PHP-based tool that intelligently extracts the most important sentences from a large block of text using simple natural language processing techniques.

## Features

- Built with pure PHP and OOP
- Extracts key sentences based on word frequency
- Filters out common stop words
- Clean and simple UI
- Easy to use via web browser

## How It Works

1. Splits the text into individual sentences.
2. Tokenizes words and removes common stop words.
3. Scores remaining words based on frequency.
4. Ranks sentences by their total word scores.
5. Returns the top N sentences as a summary.

## 🧪 Example

**Input:**
Artificial Intelligence is transforming industries across the globe.
It helps machines learn from experience.
AI is used in healthcare, finance, and transportation.
The field of AI includes machine learning and deep learning.

**Output:**
Artificial Intelligence is transforming industries across the globe.

AI is used in healthcare, finance, and transportation.

The field of AI includes machine learning and deep learning.

## Requirements

- PHP 7.0 or higher
- No external dependencies required

## Tip

You can easily clone or fork this repository and use it directly from GitHub:

```bash
git clone https://github.com/zangane/Smart-Text-Summarizer.git
