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
        
        $this->assertEquals(2, $header['IDENTIFICACAO_DO_ARQUIVO_RETORNO']);
        $this->assertEquals('RETORNO', $header['LITERAL_RETORNO']);
        $this->assertEquals('01', $header['CODIGO_DO_SERVICO']);
        $this->assertEquals('COBRANCA       ', $header['LITERAL_SERVICO']);
        $this->assertEquals('00000000000000022850', $header['CODIGO_DA_EMPRESA']);
        $this->assertEquals('ASSOC COML DE SAO PAULO       ', $header['NOME_DA_EMPRESA']);
        $this->assertEquals(237, $header['CODIGO_DO_BANCO']);
        $this->assertEquals('BRADESCO       ', $header['NOME_DO_BANCO']);
        $this->assertEquals('310713', $header['DATA_DE_GRAVACAO_DO_ARQUIVO']);
        $this->assertEquals('06885', $header['NUMERO_AVISO_BANCARIO']);
        $this->assertEquals('010813', $header['DATA_DO_CREDITO']);
    }
    
    public function testParseDetail()
    {
        $detail1 = $this->data['DETAIL'][0];
        $detail2 = $this->data['DETAIL'][1];
        
        $this->assertEquals('02', $detail1['TIPO_DE_INSCRICAO_DA_EMPRESA']);
        $this->assertEquals('02', $detail2['TIPO_DE_INSCRICAO_DA_EMPRESA']);
        
        $this->assertEquals('60524550000131', $detail1['NUMERO_DE_INSCRICAO_DA_EMPRESA']);
        $this->assertEquals('60524550000131', $detail2['NUMERO_DE_INSCRICAO_DA_EMPRESA']);
        
        $this->assertEquals('000900099024048', $detail1['IDENTIFICACAO_DA_CEDENTE_NO_BANCO']);
        $this->assertEquals('000900099024048', $detail2['IDENTIFICACAO_DA_CEDENTE_NO_BANCO']);
        
        $this->assertEquals('2318439552               ', $detail1['NUMERO_CONTROLE_DO_PARTICIPANTE']);
        $this->assertEquals('2318439553               ', $detail2['NUMERO_CONTROLE_DO_PARTICIPANTE']);
        
        $this->assertEquals('23001952646P', $detail1['IDENTIFICACAO_DO_TITULO_NO_BANCO']);
        $this->assertEquals('230019526478', $detail2['IDENTIFICACAO_DO_TITULO_NO_BANCO']);
        
        $this->assertEquals(9, $detail1['CARTEIRA']);
        $this->assertEquals(9, $detail2['CARTEIRA']);
        
        $this->assertEquals('02', $detail1['IDENTIFICACAO_DE_OCORRENCIA']);
        $this->assertEquals('02', $detail2['IDENTIFICACAO_DE_OCORRENCIA']);
        
        $this->assertEquals('310713', $detail1['DATA_DE_OCORRENCIA_NO_BANCO']);
        $this->assertEquals('310713', $detail2['DATA_DE_OCORRENCIA_NO_BANCO']);
        
        $this->assertEquals('2318439552', $detail1['NUMERO_DO_DOCUMENTO']);
        $this->assertEquals('2318439553', $detail2['NUMERO_DO_DOCUMENTO']);
        
        $this->assertEquals('230813', $detail1['DATA_DE_VENCIMENTO']);
        $this->assertEquals('230913', $detail2['DATA_DE_VENCIMENTO']);
        
        $this->assertEquals('0000000013167', $detail1['VALOR_DO_TITULO']);
        $this->assertEquals('0000000013166', $detail2['VALOR_DO_TITULO']);
        
        $this->assertEquals(237, $detail1['BANCO_COBRADOR']);
        $this->assertEquals(237, $detail2['BANCO_COBRADOR']);
        
        $this->assertEquals('04151', $detail1['AGENCIA_COBRADORA']);
        $this->assertEquals('04151', $detail2['AGENCIA_COBRADORA']);
        
        $this->assertEquals('  ', $detail1['ESPECIE']);
        $this->assertEquals('  ', $detail2['ESPECIE']);        
    }
    
    public function testParseTrailler()
    {
        $trailler = $this->data['TRAILLER'][0];
        
        $this->assertEquals(2, $trailler['IDENTIFICACAO_DO_ARQUIVO_DE_RETORNO']);
        
        $this->assertEquals(237, $trailler['CODIGO_DO_BANCO']);
    }
}
