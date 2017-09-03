<?php

namespace Intrepidity\LicensePlate;


/**
 * German license plate formatter and validator
 *
 * Class GermanLicensePlate
 * @package Intrepidity\LicensePlate
 */
class GermanLicensePlate extends AbstractLicensePlate implements LicensePlateInterface
{

    const SIDE_CODE_POLITICAL_HEADS = '0';
    const SIDE_CODE_CORPS_DIPLOMATIC = 'CD';
    const SIDE_CODE_AMERICAN_FORCES = 'AF';
    const SIDE_CODE_SPECIAL_TRANSPORT = 'AG';
    const SIDE_CODE_FEDERAL_POLICE = 'BG';
    const SIDE_CODE_TECHNICAL_RELIEF = 'THW';
    const SIDE_CODE_NATO = 'X';
    const SIDE_CODE_ARMY = 'Y';

    const DISCTRICTS = array(
        'A','AA','AB','ABG','ABI','AC','AE','AD','AF','AIC','AK','ALF','AM','AN','ANA','ANK','AÖ','AP','APD','ARN','ART','AS','ASL','ASZ','AT','AU','AUR','AW','AZ','AZE',
        'B','BA','BAD','BAR','BB','BBG','BC','BCH','BD','BED','BER','BF','BGL','BI','BID','BIN','BIR','BIT','BIW','BK','BKS','BL','BLB','BLK','BM','BN','BNA','BO','BÖ','BOR','BOT','BRA','BRB','BRG','BRL','BRV','BS','BT','BTF','BÜD','BÜS','BÜZ','BW','BWL','BYL','BZ',
        'C','CA','CAS','CB','CE','CHA','CLP','CLZ','CO','COC','COE','CUX','CW',
        'D','DA','DAH','DAN','DAU','DB','DBR','DD','DE','DEG','DEL','DGF','DH','DI','DIN','DL','DLG','DM','DN','DO','DON','DU','DÜW','DW','DZ',
        'E','EA','EB','EBE','ECK','ED','EE','EF','EH','EI','EIC','EIL','EIN','EIS','EL','EM','EMD','EMS','EN','ER','ERB','ERH','ERZ','ES','ESW','EU','EW',
        'F','FB','FD','FDS','FF','FFB','FG','FI','FL','FLO','FN','FO','FOR','FR','FRG','FRI','FRW','FS','FT','FTL','FÜ',
        'G','GA','GAP','GC','GD','GDB','GE','GER','GEO','GF','GG','GHA','GHC','GI','GL','GLA','GM','GMN','GN','GNT','GÖ','GOA','GP','GR','GRH','GRZ','GS','GT','GTH','GUB','GÜ','GVM','GW','GZ',
        'H','HA','HAL','HAM','HAS','HB','HBN','HBS','HC','HCH','HD','HDH','HDL','HE','HEF','HEI', 'HEL','HER','HET','HF','HG','HGN','HGW','HH','HHM','HI','HIG','HK','HK','HL','HM','HMÜ','HN','HO','HOG','HOL','HOM','HOT','HP','HR','HRO','HS','HSK','HST','HU','HVL','HWI','HX','HY','HZ',
        'IGB','IK','IL','IN','IZ',
        'J','JE','JL','JÜL',
        'K','KA','KB','KC','KE','KEH','KF','KG','KH','KI','KIB','KL','KLE','KLZ','KM','KN','KO','KÖT','KR','KS','KT','KU','KÜN','KUS','KY','KYF',
        'L','LA','LAU','LB','LBS','LBZ','LD','LDK','LDS','LEO','LER','LEV','LG','LI','LIF','LIP','LL','LM','LÖ','LÖB','LOS','LP','LRO','LSA','LSN','LSZ','LU','LUN','LWL',
        'M','MA','MAB','MB','MC','MD','ME','MEI','MEK','MG','MGN','MH','MHL','MI','MIL','MKK','ML','MK','MM','MN','MO','MOL','MOS','MQ','MR','MS','MSH','MSP','MST','MTK','MTL','MÜ','MÜR','MVL','MW','MYK','MZ','MZG',
        'N','NB','ND','NDH','NE','NEA','NEB','NES','NEW','NF','NH','NI','NK','NL','NM','NMB','NMS','NOH','NOL','NOM','NOR','NP','NR','NRW','NU','NVP','NW','NWM','NY','NZ',
        'OA','OAL','OB','OBG','OC','OCH','OD','OE','OF','OG','OH','OHA','OHV','OHZ','OK','OL','OPR','OS','OSL','OVL','OVP',
        'P','PA','PAF','PAN','PB','PCH','PE','PF','PI','PIR','PL','PLÖ','PM','PN','PR','PRÜ','PS','PW',
        'QFT','QLB',
        'R','RA','RC','RD','RDG','RE','REG','RG','RH','RI','RIE','RL','RM','RO','ROW','RP','RPL','RS','RSL','RT','RÜD','RÜG','RV','RW','RZ',
        'S','SAB','SAL','SAW','SB','SBK','SC','SCZ','SDH','SDL','SE','SEB','SEE','SFA','SFB','SFT','SG','SGH','SH','SHA','SHG','SHK','SHL','SI','SIG','SIM','SK','SL','SLF','SLK','SLN','SLS','SLÜ','SLZ','SM','SN','SO','SÖM','SOK','SON','SP','SPN','SR','SRB','SRO','ST','STA','STD','STL','SU','SÜW','SW','SZ','SZB',
        'TBB','TDO','TE','TET','TF','TG','THL','TIR','TO','TÖL','TR','TS','TÜ','TUT',
        'UE','UEM','UER','UH','UL','UM','UN','USI',
        'V','VB','VEC','VER','VG','VIE','VK','VR','VS',
        'W','WAF','WAK','WAN','WAT','WB','WBS','WDA','WE','WEN','WES','WF','WHV','WI','WIL','WIS','WIT','WK','WL','WLG','WM','WMS','WN','WND','WO','WOB','WOH','WR','WSF','WST','WT','WTM','WÜ','WUG','WUN','WUR','WW','WZL',
        'X',
        'Y',
        'Z','ZE','ZEL','ZI','ZP','ZR','ZW','ZZ'
    );

    /**
     * Get the sidecode of the license plate
     *
     * More info: https://nl.wikipedia.org/wiki/Lijst_van_Duitse_kentekens#Speciale_kentekens (in Dutch)
     *
     * @return bool|int|string
     */
    public function getSidecode()
    {
        $licenseplate = strtoupper(str_replace(array('-', ' '), '', $this->licenseplate));
        $sidecodes = array();

        $district_regex = '/^('.implode('|',self::DISCTRICTS).')';
        $default_plate_regex = '[a-zA-Z]{1,2}[\d]{1,4}$/';
        $default_complete_plate_regex = $district_regex.$default_plate_regex;

        // Special sidecodes
        $sidecodes[self::SIDE_CODE_POLITICAL_HEADS]    = '/^(0[0-4]{1,1}|1{2,2})$/';             // Political heads
        $sidecodes[self::SIDE_CODE_CORPS_DIPLOMATIC]   = '/^0[\d]{3,6}$/';                       // Corps diplomatique license plates
        $sidecodes[self::SIDE_CODE_AMERICAN_FORCES]    = '/^(AD|AF|HK|IF)'.$default_plate_regex; // American forces license plates
        $sidecodes[self::SIDE_CODE_SPECIAL_TRANSPORT]  = '/^AG'.$default_plate_regex;            // Special transport license plates
        $sidecodes[self::SIDE_CODE_FEDERAL_POLICE]     = '/^(BG|BP)'.$default_plate_regex;       // German federal police license plates
        $sidecodes[self::SIDE_CODE_TECHNICAL_RELIEF]   = '/^THW'.$default_plate_regex;           // Federal Agency for Technical Relief license plates
        $sidecodes[self::SIDE_CODE_NATO]               = '/^X'.$default_plate_regex;             // NATO license plates
        $sidecodes[self::SIDE_CODE_ARMY]               = '/^Y'.$default_plate_regex;             // Army license plates


        // Normal sidecodes
        $sidecodes[1] =     $default_complete_plate_regex;          // Default: district, 1-2 letters, 1-4 numbers

        return $this->checkPatterns($sidecodes, $licenseplate);
    }

    /**
     * Format the license plate
     *
     * Example: will output 08-TT-NP for input of 08ttnp
     *
     * @param int $sidecode Optional input of sidecode. Automatically determined if omitted
     * @return string Formatted license plate
     */
    public function format($sidecode = 0)
    {
        //TODO: find out right format per side code
        /*if($sidecode === 0)
        {
            $sidecode = $this->getSidecode();
        }

        if(false === $sidecode)
        {
            return false;
        }

        $licenseplate = strtoupper(str_replace('-', '', $this->licenseplate));

        switch($sidecode)
        {
            case 'CD':
                if(strlen($licenseplate) < 6)
                {
                    return 'CD-' . substr($licenseplate, 2);
                }
                else
                {
                    return 'CD-' . substr($licenseplate, 2, 2) . "-" . substr($licenseplate, 4, 2);
                }

            case 'CDJ':
                return 'CDJ-' . substr($licenseplate, 3);

            case 'AA':
                return 'AA-' . substr($licenseplate, 2);

            case 7:
            case 9:
                // XX-XXX-X
                return substr($licenseplate, 0, 2) . '-' . substr($licenseplate, 2, 3) .'-' . substr($licenseplate, 5, 1);

            case 8:
            case 10:
                // X-XXX-XX
                return substr($licenseplate, 0, 1) . '-' . substr($licenseplate, 1, 3) . '-' . substr($licenseplate, 4, 2);

            case 11:
            case 14:
                // XXX-XX-X
                return substr($licenseplate, 0, 3) . '-' . substr($licenseplate, 3, 2) . '-' . substr($licenseplate, 5, 1);

            case 12:
            case 13:
                // X-XX-XXX
                return substr($licenseplate, 0, 1) . '-' . substr($licenseplate, 1, 2) . '-' . substr($licenseplate, 3, 3);

            default:
                // Sidecodes 1-6: XX-XX-XX
                return substr($licenseplate, 0, 2) . '-' . substr($licenseplate, 2, 2) . '-' . substr($licenseplate, 4, 2);
        }*/
    }

    /**
     * Tests if the license plate is valid
     * The license plate is valid if the sidecode can be determined
     *
     * @return bool
     */
    public function isValid()
    {
        return $this->getSidecode() !== false;
    }
}