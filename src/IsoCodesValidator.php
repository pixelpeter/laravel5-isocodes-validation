<?php

namespace Pixelpeter\IsoCodesValidation;


use Exception;
use Illuminate\Support\Arr;
use Illuminate\Validation\Validator as BaseValidator;

class IsoCodesValidator extends BaseValidator
{
    /**
     * Validate a BBAN code
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateBban($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\Bban::class, $value);
    }

    /**
     * Validate a CIF code
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateCif($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\Cif::class, $value);
    }

    /**
     * Validate a credit card number
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateCreditcard($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\CreditCard::class, $value);
    }

    /**
     * Validate a EAN-8 code
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateEan8($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\Ean8::class, $value);
    }

    /**
     * Validate a EAN-13 code
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateEan13($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\Ean13::class, $value);
    }

    /**
     * Validate a GTIN-8 code
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateGtin8($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\Gtin8::class, $value);
    }

    /**
     * Validate a GTIN-12 code
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateGtin12($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\Gtin12::class, $value);
    }

    /**
     * Validate a GTIN-13 code
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateGtin13($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\Gtin13::class, $value);
    }

    /**
     * Validate a GTIN-14 code
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateGtin14($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\Gtin14::class, $value);
    }

    /**
     * Validate an IBAN
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateIban($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\Iban::class, $value);
    }

    /**
     * Validate a "numéro de sécurité sociale" (INSEE)
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateInsee($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\Insee::class, $value);
    }

    public function validateIpaddress($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\IP::class, $value);
    }

    /**
     * Validate an ISBN
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateIsbn($attribute, $value, $parameters)
    {
        $this->requireParameterCount(1, $parameters, 'isbn');
        $type = Arr::get($this->data, $parameters[0]);

        return $this->runIsoCodesValidator(\IsoCodes\Isbn::class, $value, $type);
    }

    /**
     * Validate an "International Securities Identification Number" (ISIN)
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateIsin($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\Isin::class, $value);
    }

    /**
     * Validate a MAC address
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateMac($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\Mac::class, $value);
    }

    /**
     * Validate a "Número de Identificación Fiscal" (NIF)
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateNif($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\Nif::class, $value);
    }

    /**
     * Validate a "Organisme Type12 Norme B2"
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateOrganismeType12NormeB2($attribute, $value, $parameters)
    {
        $this->requireParameterCount(1, $parameters, 'organisme_type12_norme_b2');
        $clef = Arr::get($this->data, $parameters[0]);

        return $this->runIsoCodesValidator(\IsoCodes\OrganismeType12NormeB2::class, $value, $clef);
    }

    /**
     * Validate a phone number
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validatePhonenumber($attribute, $value, $parameters)
    {
        $this->requireParameterCount(1, $parameters, 'phonenumber');
        $country = Arr::get($this->data, $parameters[0]);

        return $this->runIsoCodesValidator(\IsoCodes\PhoneNumber::class, $value, $country);
    }

    /**
     * Validate a Stock Exchange Daily Official List (SEDOL)
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateSedol($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\Sedol::class, $value);
    }

    /**
     * Validate "Système d’Identification du Répertoire des Entreprises" (SIREN)
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateSiren($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\Siren::class, $value);
    }

    /**
     * Validate "Système d’Identification du Répertoire des ETablissements" (SIRET)
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateSiret($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\Siret::class, $value);
    }

    /**
     * Validate a European/International Article Number (SSCC)
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateSscc($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\Sscc::class, $value);
    }

    /**
     * Validate a Social Security Number (SSN)
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateSsn($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\Ssn::class, $value);
    }

    /**
     * Validate structured communication
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateStructuredCommunication($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\StructuredCommunication::class, $value);
    }

    /**
     * Validate a SWIFT/BIC
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateSwiftBic($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\SwiftBic::class, $value);
    }

    /**
     * Validate a UK National Insurance Number
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateUknin($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\Uknin::class, $value);
    }

    /**
     * Validate a Universal Product Code
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateUpca($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\Upca::class, $value);
    }

    /**
     * Validate Value Added Tax (VAT)
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateVat($attribute, $value, $parameters)
    {
        return $this->runIsoCodesValidator(\IsoCodes\Vat::class, $value);
    }

    /**
     * Validate a zip code
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */
    public function validateZipcode($attribute, $value, $parameters)
    {
        $this->requireParameterCount(1, $parameters, 'zipcode');
        $country = Arr::get($this->data, $parameters[0]);

        return $this->runIsoCodesValidator(\IsoCodes\ZipCode::class, $value, $country);
    }

    /**
     * Execute the validation function
     * and catch every other Exception from underlying libraries
     * so we will only display the Laravel validation error
     *
     * @param $validator
     * @param $value
     * @param string $reference
     * @return mixed
     */
    protected function runIsoCodesValidator($validator, $value, $reference = '')
    {
        try {
            if (empty($reference)) {
                return call_user_func($validator . '::validate', $value);
            }

            return call_user_func($validator . '::validate', $value, $reference);
        } catch (Exception $e) {
            // do nothing
        }
    }

    /**
     * Replace all country place-holders
     *
     * @param $message
     * @param $parameter
     * @return mixed
     */
    protected function countryReplacer($message, $parameter)
    {
        return str_replace(':country', Arr::get($this->data, $parameter[0]), $message);
    }

    /**
     * Replace all value place-holders
     *
     * @param $message
     * @param $attribute
     * @return mixed
     */
    protected function valueReplacer($message, $attribute)
    {
        return str_replace(':value', $this->getValue($attribute), $message);
    }

    /**
     * Replace all place-holders for the bban rule
     *
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceBban($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the cif rule
     *
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceCif($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the creditcard rule
     *
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceCreditcard($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the ena8 rule
     *
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceEan8($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the ean13 rule
     *
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceEan13($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the gitin8 rule
     *
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceGtin8($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the gtin12 rule
     *
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceGtin12($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the gtin13 rule
     *
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceGtin13($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the gtin14 rule
     *
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceGtin14($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the iban rule
     * 
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceIban($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the insee rule
     * 
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceInsee($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the ipaddress rule
     * 
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceIpaddress($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the isbn rule
     * 
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceIsbn($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the isin rule
     * 
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceIsin($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the mac rule
     * 
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceMac($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the nif rule
     * 
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceNif($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the organisme_type12_norme_b2 rule
     * 
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceOrganismeType12NormeB2($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the phonenumber rule
     * 
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    protected function replacePhonenumber($message, $attribute, $rule, $parameter)
    {
        $message = $this->valueReplacer($message, $attribute);
        $message = $this->countryReplacer($message, $parameter);

        return $message;
    }

    /**
     * Replace all place-holders for the sedol rule
     * 
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceSedol($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the siren rule
     * 
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceSiren($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the siret rule
     * 
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceSiret($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the sscc rule
     * 
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceSscc($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the ssn rule
     * 
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceSSn($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the structured_communication rule
     * 
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceStructuredCommunication($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the swift_bic rule
     * 
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceSwiftBic($message, $attribute, $rule, $parameter)
    {
        return $this->valueReplacer($message, $attribute);
    }

    /**
     * Replace all place-holders for the zipcode rule
     * 
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameter
     * @return mixed
     */
    public function replaceZipcode($message, $attribute, $rule, $parameter)
    {
        $message = $this->valueReplacer($message, $attribute);
        $message = $this->countryReplacer($message, $parameter);

        return $message;
    }
}
