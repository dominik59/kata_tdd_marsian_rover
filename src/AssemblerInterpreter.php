<?php


namespace App;


class AssemblerInterpreter
{
    function simple_assembler($instructions)
    {
        $registers = [];

        for ($i = 0; $i < count($instructions);) {
            $instruction = $instructions[$i];
            $explodedInstruction = explode(' ', $instruction);
            $instructionType = $explodedInstruction[0];

            if ('mov' === $instructionType) {
                if (is_numeric($explodedInstruction[2])) {
                    $registers[$explodedInstruction[1]] = (int) $explodedInstruction[2];
                } else {
                    $registers[$explodedInstruction[1]] = $registers[$explodedInstruction[2]];
                }
                $i++;
            } elseif ('inc' === $instructionType) {
                $registers[$explodedInstruction[1]]++;
                $i++;
            } elseif ('dec' === $instructionType) {
                $registers[$explodedInstruction[1]]--;
                $i++;
            } elseif ('jnz' === $instructionType) {
                if ($registers[$explodedInstruction[1]] > 0) {
                    $i += $explodedInstruction[2];
                } else {
                    $i++;
                }
            }
        }

        return $registers;
    }
}
