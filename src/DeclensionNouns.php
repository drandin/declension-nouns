<?php

namespace Drandin\DeclensionNouns;

/**
 * Class DeclensionNouns
 */
class DeclensionNouns
{
    /**
     * @var Dictionary
     */
    private $dictionary;

    /**
     * @var Core
     */
    private $core;

    /**
     * DeclensionNouns constructor.
     *
     * @param Dictionary $dictionary
     * @param Core $core
     */
    public function __construct(Dictionary $dictionary, Core $core)
    {
        $this->dictionary = $dictionary;
        $this->core = $core;
    }


    /**
     * @param int $number
     * @param string $word
     * @return string
     */
    public function make(int $number, string $word): string
    {
        return $number . ' '. $this->plural($number, $word);
    }

    /**
     * @param int $number
     * @param string $word
     * @return string
     */
    public function makeOnlyWord(int $number, string $word): string
    {
        return $this->plural($number, $word);
    }

    /**
     * @param string $wordOne
     * @param string $wordThee
     * @param string $wordFive
     * @return $this
     */
    public function addToDictionary(string $wordOne, string $wordThee, string $wordFive): self
    {
        if ($wordOne === '') {
            return $this;
        }

        $this->dictionary->addWord([$wordOne => [$wordThee, $wordFive]]);

        return $this;
    }

    /**
     * @return array
     */
    public function getWords(): array
    {
        return $this->dictionary->getWords();
    }

    /**
     * @param string $word
     * @return string
     */
    private function cleaner(string $word): string
    {
        return mb_strtolower(trim($word));
    }

    /**
     * @param int $number
     * @param string $word
     * @return string
     */
    private function plural(int $number, string $word): string
    {
        /**
         * Ищем слово $word в словаре,
         * формируем массив вариантов $options
         */
        $options = $this->dictionary->find($this->cleaner($word));

        return $this->core->plural($number, $options);

    }

}
