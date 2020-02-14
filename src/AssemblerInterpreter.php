<?php


namespace App;


class AssemblerInterpreter
{
    function simple_assembler($instructions)
    {
        $registers = [];

        foreach ($instructions as $instruction) {

            $explodedInstruction = explode(' ', $instruction);
            $instructionType = $explodedInstruction[0];

            if ('mov' === $instructionType) {
                if (is_numeric($explodedInstruction[2])) {
                    $registers[$explodedInstruction[1]] = (int) $explodedInstruction[2];
                } else {
                    $registers[$explodedInstruction[1]] = $registers[$explodedInstruction[2]];
                }
            } elseif ('inc' === $instructionType) {
                $registers[$explodedInstruction[1]]++;
            } elseif ('dec' === $instructionType) {
                $registers[$explodedInstruction[1]]--;
            }
        }

        return $registers;
    }
}
