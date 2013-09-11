<?php
/**
 * Description of Cnab
 *
 * @author butzke
 */
class Cnab
{
    const PERFIX_HEADER = 0;
    const PREFIX_DETAIL = 1;
    const PREFIX_TRAILLER = 9;
    
    private $_data = array();

    /**
     * Location fields
     *
     * @var array 
     */
    private $_location;

    /**
     * @param SplFileObject $file
     * @param array $location
     */
    public function __construct(SplFileObject $file, array $location)
    {
        $this->_location = $location;
        
        $this->_parse($file);
    }
    
    /**
     * Parse CNAB file
     * 
     * @param SplFileObject $file
     * 
     * @throws Exception
     */
    private function _parse(SplFileObject $file)
    {
        while ( !$file->eof() ) {
            $line = $file->fgets();
            
            switch (substr($line, 0, 1)) {
                case self::PERFIX_HEADER:
                    $this->_parseLine('HEADER', $line);
                    break;
                
                case self::PREFIX_DETAIL:
                    $this->_parseLine('DETAIL', $line);
                    break;
                
                case self::PREFIX_TRAILLER:
                    $this->_parseLine('TRAILLER', $line);
                    break;
                
                default:
                    throw new Exception('Registry type not identified.');
                    break;
            }            
        }
    }
    
    /**
     * Parse line content and set 
     * 
     * @param string $identification
     * @param string $line
     */
    private function _parseLine($identification, $line)
    {
        $lineData = array();
        
        foreach ($this->_location[$identification] as $key => $positions) {
            $keyPosition = (string) substr($line, $positions[0], $positions[1]);
            $lineData[$key] = $keyPosition;
        }
        
        if ( !isset($this->_data[$identification]) )
                $this->_data[$identification] = array();
        
        array_push($this->_data[$identification], $lineData);
    }
    
    /**
     * Get CNAB data
     * 
     * @return array
     */
    public function getData()
    {
        return $this->_data;
    }
}
