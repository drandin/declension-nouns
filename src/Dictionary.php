<?php

namespace Drandin\DeclensionNouns;

/**
 * Class Dictionary
 *
 * @package Drandin\DeclensionNouns
 */
final class Dictionary
{
    /**
     * @var string[][]
     */
    private $words;

    /**
     * Dictionary constructor.
     */
    public function __construct()
    {
        $this->words = $this->wordsBase();
    }

    /**
     * Массив с вариантами написания для количества 1, 2 и 5
     *
     * @return array
     */
    private function wordsBase(): array
    {
        $this->words = config('declension-nouns.dictionary', []);
        return $this->words;
    }


    /**
     * Ищем слово в словаре, если его нет,
     * то возвращает массив [$word, $word, $word]
     *
     * @param string $word
     * @return array
     */
    public function find(string $word): array
    {
        $wordList = $this->getWords();

        $words[] = $word;
        $words[] = $wordList[$word][0] ?? $word;
        $words[] = $wordList[$word][1] ?? $word;

        return $words;
    }


    /**
     * Возвращает все слова в словаре
     *
     * @return array
     */
    public function getWords(): array
    {
        return $this->words;
    }

    /**
     * Добавляет одно слово в словарь
     *
     * $item = ['слово' => ['слова', 'слов']]
     *
     * @param array $item
     * @return $this
     */
    public function addWord(array $item): self
    {
        if (!empty($item) && count($item) === 1) {
            $this->words = array_merge($this->words, $item);
        }

        return $this;
    }


}
