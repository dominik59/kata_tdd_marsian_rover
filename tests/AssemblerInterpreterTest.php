<?php


namespace Test;


use App\AssemblerInterpreter;
use PHPUnit\Framework\TestCase;

class AssemblerInterpreterTest extends TestCase
{
    public function testEmptyInstructionSetReturnEmptyResult()
    {
        //given
        $assemblerInterpreter = new AssemblerInterpreter();

        //when
        $programResult = $assemblerInterpreter->simple_assembler([]);

        //then
        $this->assertSame([], $programResult);
    }

    /**
     * @dataProvider dataProviderForTestSettingValueInRegister
     */
    public function testSettingValueInRegister($input, $output)
    {
        //given
        $assemblerInterpreter = new AssemblerInterpreter();

        //when
        $programResult = $assemblerInterpreter->simple_assembler($input);

        //then
        $this->assertSame($output, $programResult);
    }

    public function dataProviderForTestSettingValueInRegister()
    {
        yield[
            ['mov a 5'],
            ['a' => 5],
        ];
        yield[
            ['mov a 5', 'mov b 10'],
            ['a' => 5, 'b' => 10],
        ];
        yield[
            ['mov a 5', 'mov b a'],
            ['a' => 5, 'b' => 5],
        ];
        yield[
            ['mov a 5', 'mov b 10', 'mov c a'],
            ['a' => 5, 'b' => 10, 'c' => 5],
        ];
    }

    /**
     * @dataProvider dataProviderForTestIncrementationOfRegister
     */
    public function testIncrementationOfRegister($input, $output)
    {
        //given
        $assemblerInterpreter = new AssemblerInterpreter();

        //when
        $programResult = $assemblerInterpreter->simple_assembler($input);

        //then
        $this->assertSame($output, $programResult);
    }

    public function dataProviderForTestIncrementationOfRegister()
    {
        yield [
            ['mov a 1', 'inc a'],
            ['a' => 2],
        ];
        yield [
            ['mov a 1', 'inc a', 'inc a'],
            ['a' => 3],
        ];
        yield [
            ['mov a 1', 'mov b 3', 'inc a', 'inc b'],
            ['a' => 2, 'b' => 4],
        ];
    }

    /**
     * @dataProvider dataProviderForTestDecrementalOfRegister
     */
    public function testDecrementalOfRegister($input, $output)
    {
        //given
        $assemblerInterpreter = new AssemblerInterpreter();

        //when
        $programResult = $assemblerInterpreter->simple_assembler($input);

        //then
        $this->assertSame($output, $programResult);
    }

    public function dataProviderForTestDecrementalOfRegister()
    {
        yield [
            ['mov a 1', 'dec a'],
            ['a' => 0],
        ];
        yield [
            ['mov a 1', 'dec a', 'dec a'],
            ['a' => -1],
        ];
        yield [
            ['mov a 1', 'mov b 3', 'dec a', 'dec b'],
            ['a' => 0, 'b' => 2],
        ];
    }

    /**
     * @dataProvider dataProviderForTestJnzInstruction
     */
    public function testJnzInstruction($input, $output)
    {
        //given
        $assemblerInterpreter = new AssemblerInterpreter();

        //when
        $programResult = $assemblerInterpreter->simple_assembler($input);

        //then
        $this->assertSame($output, $programResult);
    }

    public function dataProviderForTestJnzInstruction()
    {
        yield [
            ['mov a 0', 'jnz a 2', 'mov b 1', 'mov c 1'],
            ['a' => 0, 'b' => 1, 'c' => 1],
        ];
        yield [
            ['mov a 1', 'jnz a 2', 'mov b 1', 'mov c 1'],
            ['a' => 1, 'c' => 1],
        ];
        yield [
            ['mov a -2', 'inc a', 'inc a', 'jnz a 2', 'mov b 1', 'mov c 1'],
            ['a' => 0, 'b' => 1, 'c' => 1],
        ];
        yield [
            ['jnz a 1'],
            [],
        ];
    }


}
