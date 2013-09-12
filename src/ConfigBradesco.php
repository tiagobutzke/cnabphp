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
            'IDENTIFICACAO_DO_ARQUIVO_RETORNO' => array(1, 1), 
            'LITERAL_RETORNO' => array(2, 7), 
            'CODIGO_DO_SERVICO' => array(9, 2), 
            'LITERAL_SERVICO' => array(11, 15), 
            'CODIGO_DA_EMPRESA' => array(26, 20), 
            'NOME_DA_EMPRESA' => array(46, 30), 
            'CODIGO_DO_BANCO' => array(76, 3), 
            'NOME_DO_BANCO' => array(79, 15), 
            'DATA_DE_GRAVACAO_DO_ARQUIVO' => array(94, 6),
            'NUMERO_AVISO_BANCARIO' => array(108, 5), 
            'DATA_DO_CREDITO' => array(379, 6)
        ), 
        'DETAIL' => array(
            'TIPO_DE_INSCRICAO_DA_EMPRESA' => array(1, 2), 
            'NUMERO_DE_INSCRICAO_DA_EMPRESA' => array(3, 14), 
            'IDENTIFICACAO_DA_CEDENTE_NO_BANCO' => array(20, 15), 
            'NUMERO_CONTROLE_DO_PARTICIPANTE' => array(37, 25), 
            'IDENTIFICACAO_DO_TITULO_NO_BANCO' => array(70, 12), 
            'CARTEIRA' => array(107, 1), 
            'IDENTIFICACAO_DE_OCORRENCIA' => array(108, 2),
            'DATA_DE_OCORRENCIA_NO_BANCO' => array(110, 6), 
            'NUMERO_DO_DOCUMENTO' => array(116, 10), 
            'DATA_DE_VENCIMENTO' => array(146, 6), 
            'VALOR_DO_TITULO' => array(152, 13), 
            'BANCO_COBRADOR' => array(165, 3), 
            'AGENCIA_COBRADORA' => array(168, 5), 
            'ESPECIE' => array(173, 2),
            'DESPESAS_DE_COBRANCA' => array(175, 13), 
            'CUSTOS_DE_PROTESTO' => array(188, 13), 
            'JUROS' => array(201, 13), 
            'IOF' => array(214, 13), 
            'ABATIMENTO_CONCEDIDO' => array(227, 13), 
            'DESCONTO_CONCEDIDO' => array(240, 13), 
            'VALOR_PAGO' => array(255, 13), 
            'JUROS_DE_MORA' => array(266, 13), 
            'OUTROS_CREDITOS' => array(279, 13), 
            'MOTIVO_DO_CODIGO_DE_OCORRENCIA' => array(294, 1), 
            'DATA_DO_CREDITO' => array(295, 6), 
            'MOTIVOS_DE_REJEICAO_PARA_O_CODIGO_DE_OCORRENCIA' => array(318, 10)
        ), 
        'TRAILLER' => array(
            'IDENTIFICACAO_DO_ARQUIVO_DE_RETORNO' => array(1, 1), 
            'IDENTIFICACAO_DO_TIPO_DE_REGISTRO' => array(2, 2), 
            'CODIGO_DO_BANCO' => array(4, 3), 
            'QUANTIDADE_DE_TITULOS_EM_COBRANCA' => array(17, 8), 
            'VALOR_TOTAL_EM_COBRANCA' => array(25, 14), 
            'NUMERO_DO_AVISO_BANCARIO' => array(39, 8), 
            'QUANTIDADE_DE_REGISTROS_CONFIRMACAO_DE_ENTRADAS' => array(57, 5), 
            'VALOR_DOS_REGISTROS_CONFIRMACAO_DE_ENTRADAS' => array(62, 12), 
            'VALOR_DOS_REGISTROS_LIQUIDACAO' => array(74, 12), 
            'QUANTIDADE_DE_REGISTROS_LIQUIDACAO' => array(86, 5), 
            'VALOR_DOS_REGISTROS' => array(91, 12), 
            'VALOR_DOS_REGISTROS_TITULOS_BAIXADOS' => array(108, 12), 
            'QUANTIDADE_DE_REGISTROS_ABATIMENTO_CANCELADO' => array(120, 5), 
            'VALOR_DOS_REGISTROS_ABATIMENTO_CANCELADO' => array(125, 12), 
            'QUANTIDADE_DE_REGISTROS_VENCIMENTO_ALTERADO' => array(137, 12), 
            'VALOR_DOS_REGISTROS_VENCIMENTO_ALTERADO' => array(142, 12), 
            'QUANTIDADE_DE_REGISTROS_ABATIMENTO_CONCEDIDO' => array(154, 5), 
            'VALOR_DOS_REGISTROS_ABATIMENTO_CONCEDIDO' => array(159, 12), 
            'QUANTIDADE_DE_REGISTROS_CONFIRMACAO_DA_INSTRUCAO_PROTESTO' => array(171, 5), 
            'VALOR_DOS_REGISTROS_CONFIRMACAO_DA_INSTRUCAO_PROTESTO' => array(176, 12), 
            'VALOR_TOTAL_DOS_RATEIOS_EFETUADOS' => array(362, 15), 
            'QUANTIDADE_TOTAL_DOS_RATEIOS_EFETUADOS' => array(377, 8)
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
