<?php

namespace Pixelpeter\IsoCodesValidation;

use Validator;

class IsoCodesValidatorTest extends TestCase
{
    /**
     * Test the correct error messages ist returned
     * with all pace holder replaced
     *
     * @test
     *
     * @dataProvider invalidDataProvider
     */
    public function validator_returns_correct_error_message($payload, $rules, $expected)
    {
        $validator = Validator::make($payload, $rules);

        $this->assertEquals($expected, $validator->errors()->first());
    }

    /**
     * Test each validator returns true for valid data
     *
     * @test
     *
     * @dataProvider validDataProvider
     *
     * @param  $payload
     * @param  $rules
     */
    public function it_validates_correctly($field, $value)
    {
        $validator = Validator::make([$field => $value], [$field => $field]);

        $this->assertTrue($validator->passes());
    }

    /**
     * Test each validator with a reference value returns true for valid data
     *
     * @test
     *
     * @dataProvider validDataWithReferencesProvider
     *
     * @param  $payload
     * @param  $rules
     */
    public function it_validates_correctly_with_references($field, $value, $referenceField = '', $referenceValue = '')
    {
        $payload = [
            $field => $value,
            $referenceField => $referenceValue,
        ];

        $rules = [
            $field => "{$field}:{$referenceField}",
        ];

        $validator = Validator::make($payload, $rules);

        $this->assertTrue($validator->passes());
    }

    /**
     * DataProvider for simple rules
     *
     * @return array
     */
    public function validDataProvider()
    {
        return include_once __DIR__.'/fixtures/valid.php';
    }

    /**
     * DataProvider for failing tests
     *
     * @return array
     */
    public function invalidDataProvider()
    {
        return include_once __DIR__.'/fixtures/invalid.php';
    }

    /**
     * DataProvider for rules with references
     *
     * @return array
     */
    public function validDataWithReferencesProvider()
    {
        return include_once __DIR__.'/fixtures/valid_with_references.php';
    }

    /**
     * DataProvider for arrays with dot notation
     *
     * @return array
     */
    public function validDataWithDotNotationProvider()
    {
        return include_once __DIR__.'/fixtures/valid_wit_dot_notation.php';
    }

    /**
     * DataProvider for arrays with dot notation
     *
     * @return array
     */
    public function invalidDataWithDotNotationProvider()
    {
        return include_once __DIR__.'/fixtures/invalid_wit_dot_notation.php';
    }

    /**
     * Test validator can work on arrays with dot notation
     * and returns true for valid data
     *
     * @test
     *
     * @dataProvider validDataWithDotNotationProvider
     */
    public function it_validates_correctly_with_dot_notation($data, $rule)
    {
        $payload = [
            'data' => $data,
        ];

        $validator = Validator::make($payload, $rule);

        $this->assertTrue($validator->passes());
        $this->assertEmpty($validator->errors()->all());
    }

    /**
     * Test the correct error messages ist returned
     * on arrays with dot notation
     *
     * @test
     *
     * @dataProvider invalidDataWithDotNotationProvider
     */
    public function validator_returns_correct_error_message_with_dot_notation($data, $rule, $error_message)
    {
        $payload = [
            'data' => $data,
        ];

        $validator = Validator::make($payload, $rule);

        $this->assertTrue($validator->fails());
        $this->assertCount(2, $validator->errors()->all());
        $this->assertEquals($error_message[0], $validator->errors()->first());
    }
}
