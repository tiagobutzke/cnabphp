<?php
require_once '../src/Cnab.php';
require_once '../src/ConfigBradesco.php';

/**
 * Description of CnabTest
 *
 * @author butzke
 */
class CnabTest extends PHPUnit_Framework_TestCase
{
    public $cnab;
    public $data;

    public function setUp()
    {
        $this->cnab = new Cnab(
            new SplFileObject('./data/CB010800.RET'), 
            ConfigBradesco::getLocations()
        );
        
        $this->data = $this->cnab->getData();
    }
    
    public function testParseHeader()
    {
        $header = $this->data['HEADER'][0];
        
        $this->assertEquals(2, $header['IDENTIFICATION_FILE_RETURN']);
        $this->assertEquals('RETORNO', $header['STRING_RETURN']);
        $this->assertEquals('01', $header['SERVICE_CODE']);
        $this->assertEquals('COBRANCA       ', $header['SERVICE_STRING']);
        $this->assertEquals('00000000000000022850', $header['COMPANY_CODE']);
        $this->assertEquals('ASSOC COML DE SAO PAULO       ', $header['COMPANY_NAME']);
        $this->assertEquals(237, $header['BANK_CODE']);
        $this->assertEquals('BRADESCO       ', $header['BANK_NAME']);
        $this->assertEquals('310713', $header['RECORD_DATE']);
        $this->assertEquals('06885', $header['WARN_BANK_NUMBER']);
        $this->assertEquals('010813', $header['CREDIT_DATE']);
    }
    
    public function testParseDetail()
    {
        $detail1 = $this->data['DETAIL'][0];
        $detail2 = $this->data['DETAIL'][1];
        
        $this->assertEquals('02', $detail1['REGISTRATION_TYPE_COMPANY']);
        $this->assertEquals('02', $detail2['REGISTRATION_TYPE_COMPANY']);
        
        $this->assertEquals('60524550000131', $detail1['COMPANY_CODE']);
        $this->assertEquals('60524550000131', $detail2['COMPANY_CODE']);
        
        $this->assertEquals('000900099024048', $detail1['TRANSFEROR_COMPANY_IDENTIFICATION']);
        $this->assertEquals('000900099024048', $detail2['TRANSFEROR_COMPANY_IDENTIFICATION']);
        
        $this->assertEquals('2318439552               ', $detail1['PARTICIPANT_CONTROL_CODE']);
        $this->assertEquals('2318439553               ', $detail2['PARTICIPANT_CONTROL_CODE']);
        
        $this->assertEquals('23001952646P', $detail1['IDENTIFY_TITLE_BANK']);
        $this->assertEquals('230019526478', $detail2['IDENTIFY_TITLE_BANK']);
        
        $this->assertEquals(9, $detail1['WALLET']);
        $this->assertEquals(9, $detail2['WALLET']);
        
        $this->assertEquals('02', $detail1['OCCURRENCE']);
        $this->assertEquals('02', $detail2['OCCURRENCE']);
        
        $this->assertEquals('310713', $detail1['OCCURRENCE_DATE']);
        $this->assertEquals('310713', $detail2['OCCURRENCE_DATE']);
        
        $this->assertEquals('2318439552', $detail1['DOCUMENT_NUMBER']);
        $this->assertEquals('2318439553', $detail2['DOCUMENT_NUMBER']);
        
        $this->assertEquals('230813', $detail1['EXPIRATION_DATE']);
        $this->assertEquals('230913', $detail2['EXPIRATION_DATE']);
        
        $this->assertEquals('0000000013167', $detail1['TITLE_VALUE']);
        $this->assertEquals('0000000013166', $detail2['TITLE_VALUE']);
        
        $this->assertEquals(237, $detail1['COLLECTING_BANK']);
        $this->assertEquals(237, $detail2['COLLECTING_BANK']);
        
        $this->assertEquals('04151', $detail1['COLLECTING_AGENCY']);
        $this->assertEquals('04151', $detail2['COLLECTING_AGENCY']);
        
        $this->assertEquals('  ', $detail1['ESPECIE']);
        $this->assertEquals('  ', $detail2['ESPECIE']);        
    }
    
    public function testParseTrailler()
    {
        $trailler = $this->data['TRAILLER'][0];
        
        $this->assertEquals(2, $trailler['IDENTIFICATION_FILE_RETURN']);
        
        $this->assertEquals(237, $trailler['BANK_CODE']);
    }
}
