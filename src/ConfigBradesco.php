<?php
/**
 * Description of Config
 *
 * @author butzke
 */
abstract class ConfigBradesco
{
    /**
     * Array of location
     *
     * @var array
     */
    private static $_location = array(
        'HEADER' => array(
            'IDENTIFICATION_FILE_RETURN' => array(1, 1), 
            'STRING_RETURN' => array(2, 7), 
            'SERVICE_CODE' => array(9, 2), 
            'SERVICE_STRING' => array(11, 15), 
            'COMPANY_CODE' => array(26, 20), 
            'COMPANY_NAME' => array(46, 30), 
            'BANK_CODE' => array(76, 3), 
            'BANK_NAME' => array(79, 15), 
            'RECORD_DATE' => array(94, 6),
            'WARN_BANK_NUMBER' => array(108, 5), 
            'CREDIT_DATE' => array(379, 6)
            
        ), 
        'DETAIL' => array(
            'REGISTRATION_TYPE_COMPANY' => array(1, 2), 
            'COMPANY_CODE' => array(3, 14), 
            'TRANSFEROR_COMPANY_IDENTIFICATION' => array(20, 15), 
            'PARTICIPANT_CONTROL_CODE' => array(37, 25), 
            'IDENTIFY_TITLE_BANK' => array(70, 12), 
            'WALLET' => array(107, 1), // hehehe
            'OCCURRENCE' => array(108, 2),
            'OCCURRENCE_DATE' => array(110, 6), 
            'DOCUMENT_NUMBER' => array(116, 10), 
            'EXPIRATION_DATE' => array(146, 6), 
            'TITLE_VALUE' => array(152, 13), 
            'COLLECTING_BANK' => array(165, 3), 
            'COLLECTING_AGENCY' => array(168, 5), 
            'ESPECIE' => array(173, 2),
            'COLLECTION_COSTS' => array(175, 13), 
            'PROTEST_COSTS' => array(188, 13), 
            'INTEREST' => array(201, 13), 
            'IOF' => array(214, 13), 
            'ABATEMENT' => array(227, 13), 
            'DISCOUNT' => array(240, 13), 
            'PAYMENT_VALUE' => array(255, 13), 
            'DEFAULT_INTEREST' => array(266, 13), 
            'OTHER_CREDITS' => array(279, 13), 
            'REASON_CODE_OCCURRENCE' => array(294, 1), 
            'CREDIT_DATE' => array(295, 6), 
            'REJECTION_REASON' => array(318, 10)
        ), 
        'TRAILLER' => array(
            'IDENTIFICATION_FILE_RETURN' => array(1, 1), 
            'IDENTIFICATION_REGISTRY_TYPE' => array(2, 2), 
            'BANK_CODE' => array(4, 3), 
            'QUANTITY_TITLES' => array(17, 8), 
            'TOTAL_VALUE' => array(25, 14), 
            'WARN_BANK_NUMBER' => array(39, 8), 
            'QUANTITY_REGISTRY_OCCURRENCE' => array(57, 5), 
            'REGISTRY_VALUE_ENTRY' => array(62, 12), 
            'REGISTRY_VALUE_SETTLEMENT' => array(74, 12), 
            'QUANTITY_REGISTRY_OCCURRENCE_SETTLEMENT' => array(86, 5), 
            'REGISTRY_VALUE' => array(91, 12), 
            'REGISTRY_VALUE_ISSUE' => array(108, 12), 
            'QUANTITY_REGISTRY_OCCURRENCE_CANCELED' => array(120, 5), 
            'REGISTRY_VALUE_OCCURRENCE_CANCELED' => array(125, 12), 
            'QUANTITY_REGISTRY_OCCURRENCE_EXPIRATION_CHANGED' => array(137, 12), 
            'REGISTRY_VALUE_OCCURRENCE_EXPIRATION_CHANGED' => array(142, 12), 
            'QUANTITY_REGISTRY_OCCURRENCE_ABATEMENT_GRANTED' => array(154, 5), 
            'REGISTRY_VALUE_OCCURRENCE_ABATEMENTE_GRANTED' => array(159, 12), 
            'QUANTITY_REGISTRY_OCCURRENCE_PROTEST_CONFIRMATION' => array(171, 5), 
            'REGISTRY_VALUE_OCCURRENCE_PROTEST_CONFIRMATION' => array(176, 12), 
            'TOTAL_VALUE_APPORTIONMENT' => array(362, 15), 
            'QUANTITY_TOTALAPPORTIONMENT' => array(377, 8)
        )
    );
    
    /**
     * Get default location
     * 
     * @return array
     */
    public static function getLocations()
    {
        return self::$_location;
    }
}
