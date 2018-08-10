<?php

namespace kristijorgji\PhpJsonBender;

use kristijorgji\PhpJsonBender\Support\TextBuffer;

class JsonBender
{
    /**
     * @param string $json
     * @return string
     */
    public function toArrayDeclaration(string $json) : string
    {
        $asArray = json_decode($json, true);
        $output = new TextBuffer();
        $output->addLine('<?php');
        $output->addLine('$array = [');
        $this->arrayToArrayDeclaration($asArray, $output);
        $output->addLine('];');
        return $output->get();
    }

    /**
     * @param array $arr
     * @param $output
     * @param int $depth
     * @return void
     */
    protected function arrayToArrayDeclaration(array $arr, TextBuffer &$output, int $depth = 0)
    {
        $identationPerLevel = 4;
        $i = 0;
        $length = count(array_keys($arr));

        foreach ($arr as $key => $value) {
            if (is_array($value)) {
                if (empty($value)) {
                    $output->addLine(
                        sprintf('\'%s\' => [],', $key),
                        $depth * $identationPerLevel + 4
                    );
                } else {
                    $output->addLine(
                        sprintf('\'%s\' => [', $key),
                        $depth * $identationPerLevel + 4
                    );
                    $this->arrayToArrayDeclaration($value, $output, $depth + 1);
                }
            } else {
                $output->addLine(
                    sprintf('\'%s\' => %s,', $key, $this->parseValueForJson($value)),
                    $depth * $identationPerLevel + 4
                );
            }

            if ($depth !== 0 && $i === $length - 1) {
                $output->addLine(
                    '],',
                    $depth * $identationPerLevel
                );
            }

            $i++;
        }
    }

    /**
     * @param $value
     * @return string
     */
    protected function parseValueForJson($value) : string
    {
        if (is_int($value) || is_float($value)) {
            return $value;
        }

        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }

        return sprintf('\'%s\'', str_replace('\'', '\\\'', $value));
    }
}
