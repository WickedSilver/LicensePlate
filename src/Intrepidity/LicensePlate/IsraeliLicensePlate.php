<?php
namespace Intrepidity\LicensePlate;

class IsraeliLicensePlate extends AbstractLicensePlate implements LicensePlateInterface
{
     /**
     * Tests if the license plate is valid
     * The license plate is valid if the sidecode can be determined
     *
     * @return bool
     */
    public function isValid()
    {
        $licenseplate = str_replace('-', '', $this->licenseplate);

        if(preg_match('/^[\d]{7}$/', $licenseplate))
        {
            return true;
        }
        return false;
    }

    /**
     * Format the license plate
     *
     * Example: will output 196-BTD for input of 196btd
     *
     * @param int $sidecode Optional input of sidecode. Automatically determined if omitted
     * @return string Formatted license plate
     */
    public function format($sidecode = 0)
    {
        $licenseplate = strtoupper(str_replace(array('-', '.'), '', $this->licenseplate));

        if(!$this->isValid())
        {
            return false;
        }

        return substr($licenseplate, 0, 2) . '-' . substr($licenseplate, 2, 3) . '-' . substr($licenseplate, 5, 2);
    }
}